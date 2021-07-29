<?php
namespace App\Models;

use App\Entities\Base\Base as BaseEntity;
use App\Entities\MinorFactionPresence as Entity;
use App\Models\StarSystem as StarSystemModel;

/**
 *
 * @author Jan Zelenka <jan.zelenka@clickworks.eu>
 *
 */
class MinorFactionPresence extends Base\ExternalData
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
            , ?string $strExternalKey = null
            , ?array $arrLoadedEntities = null
            ): ?BaseEntity
    {
        return parent::newFromResultRow(
                $arrRow
                , $strFieldPrefix
                );
    }

    /**
     *
     * {@inheritDoc}
     * @see \App\Models\Base\ExternalData::save()
     */
    public function save( $MinorFactionPresence = null ): bool {
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
