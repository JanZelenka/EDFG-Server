<?php
namespace App\Models;

use Config\Services;
use App\Entities\MinorFaction as MinorFactionEntity;
use App\Entities\MinorFactionPresence as Entity;
use App\Models\StarSystem as StarSystemModel;

/**
 *
 * @author Jan Zelenka <jan.zelenka@clickworks.eu>
 *
 */
class MinorFactionPresence extends Base\ExternalDataModel
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
    ];

    public function findForMinorFaction ( MinorFactionEntity $objMinorFactionEntity ) {
        if ( is_null( $objMinorFactionEntity->MinorFactionPresence ) ) {
            $objMinorFactionEntity->MinorFactionPresence = array();
        }

        $intId = $objMinorFactionEntity->id;

        if ( empty( $intId ) ) {
            return;
        }

        /** @var \CodeIgniter\Database\ResultInterface $objResult */
        $objResult = $this->db
            ->table( 'minor_faction_presence_view' )
            ->where(
                    'minorFactionId'
                    , $intId
                    )
            ->get();

        $arrResult = $objResult->getResultArray();

        if ( ! count( $arrResult ) ) {
            return;
        }

        $strPresencePrefix = 'mfp_';
        $intPresencePrefixLength = strlen( $strPresencePrefix );
        $strStarSystemPrefix = 'sts_';
        $strKeyAttribute = Services::minorFactionCatalogue()->presenceExternalKey();

        foreach ( $arrResult as $arrRow ) {
            $objEntity = new Entity();

            foreach ($arrRow as $strField => $varValue) {
                if ( substr( $strField, 0, 4 ) = $strPresencePrefix ) {
                    $objEntity->{substr( $strField, $intPresencePrefixLength )} = $varValue;
                }
            }

            if ( isset( $arrRow->{$strStarSystemPrefix . 'id'} ) ) {
                $objEntity->StarSystem = model( StarSystem::class )->newFromResultRow(
                        $strStarSystemPrefix
                        , $arrRow
                        );
            }

            $objMinorFactionEntity->MinorFactionPresence[ $objEntity->{$strKeyAttribute} ] = $objEntity;
        }
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
                model( StarSystemModel::class )->save( $MinorFactionPresence->StarSystem );
                $MinorFactionPresence->starSystemId = $MinorFactionPresence->StarSystem->id;
            }
        }

        return parent::save( $MinorFactionPresence );
    }
}
