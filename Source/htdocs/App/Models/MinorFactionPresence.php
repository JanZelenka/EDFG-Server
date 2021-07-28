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

    public function newFromResultRow (
            array $arrRow
            , string $strFieldPrefix
            ): Entity
    {
        return parent::newFromResultRow(
                $arrRow
                , $strFieldPrefix
                , Services::minorFactionCatalogue()->externalPresenceKey()
                );
    }

    /**
     *
     * {@inheritDoc}
     * @see \App\Models\Base\ExternalDataModel::save()
     */
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
