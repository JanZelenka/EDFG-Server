<?php
namespace App\Models;

use App\Entities\MinorFactionPresence as Entity;
use Config\Services;

/**
 *
 * @author Jan Zelenka <jan.zelenka@clickworks.eu>
 *
 */
class MinorFactionPresence extends Base\StampedModel
{
    protected $table = 'minor_faction_presence';
    protected $primaryKey = 'id';
    protected $returnType = Entity::class;
    protected $useSoftDeletes = false;
    protected $allowedFields = [
            'ebgsSystemId'
            , 'influence'
            , 'minorFactionId'
            , 'starSystemId'
            , 'updatedOn'
    ];

    public function findMinorFaction (
            int $intMinorFactionId
            , string $strKeyAttribute
            ): ?array
    {
        /** @var \CodeIgniter\Database\ResultInterface $objResult */
        $objResult = $this->db
            ->table( 'minor_faction_presence_view' )
            ->where(
                    'minorFactionId'
                    , $intMinorFactionId
                    )
            ->get();

        $arrPresence = array();

        foreach ( $objResult->getResult() as $objData ) {
            $objEntity = new Entity();
            $objEntity->id = $objData->id;

            foreach ( $this->allowedFields as $strFieldName ) {
                $objEntity->{$strFieldName} = $objData->{$strFieldName};
            }

            $strColumnNamePrefix = 'starSystem_';

            if ( isset( $objData->{$strColumnNamePrefix . 'id'} ) ) {
                $objEntity->StarSystem = model( StarSystem::class )->newFromViewResult(
                        $strColumnNamePrefix
                        , $objData
                        );
            }

            $arrPresence[ $objEntity->{$strKeyAttribute} ] = $objEntity;
        }

        return (
                empty( $arrPresence )
                ? null
                : $arrPresence
                );
    }

    public function findStarSystem ( int $intStarSystemId ): ?array {
        /** @var \CodeIgniter\Database\ResultInterface $objResult */

        $arrResult = $this
            ->where(
                    'starSystemId'
                    , $intStarSystemId
                    )
            ->findAll();

        $arrPresence = array();

        /** @var \App\Entities\MinorFactionPresence $objPresenceEntity */
        foreach ( $arrResult as $objPresenceEntity ) {
            $arrPresence[ $objPresenceEntity->minorFactionId ] = $objPresenceEntity;
        }

        return (
                empty( $arrPresence )
                ? null
                : $arrPresence
                );
    }

    public function save( $MinorFactionPresence ): bool {
        if ( $MinorFactionPresence instanceof Entity ) {
            /** @var \App\Entities\MinorFactionPresence $MinorFactionPresence */
            if ( ! is_null( $MinorFactionPresence->StarSystem ) ) {
                $MinorFactionPresence->starSystemId = $MinorFactionPresence->StarSystem->id;
            }
        }

        return parent::save( $MinorFactionPresence );
    }
}

