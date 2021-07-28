<?php
namespace App\Models;

use Config\Services;
use App\Entities\MinorFaction as Entity;
use App\Entities\MinorFactionPresence as PresenceEntity;
use App\Entities\StarSystem as StarSystemEntity;

/**
 *
 * @author Jan Zelenka <jan.zelenka@clickworks.eu>
 *
 */
final class MinorFaction extends Base\ExternalDataModel
{
    protected $allowedFields = [
            'ebgsId'
            , 'eddbId'
            , 'allegiance'
            , 'government'
            , 'name'
    ];
    public array $loadedMinorFactions = [];
    protected $primaryKey = 'id';
    protected $returnType = Entity::class;
    protected $table = 'minor_faction';
    protected $useSoftDeletes = false;

    public function findEntity(
            $key
            , $value = null
            )
    {
        $objEntity = parent::findEntity(
                $key
                , value
                );
        $strExternalKey = Services::minorFactionCatalogue()->externalKey();
        $varKeyValue = $objEntity->{$strExternalKey};

        if ( ! empty( $varKeyValue ) ) {
            $this->loadedMinorFactions[ $varKeyValue ] = $objEntity;
        }

        return $objEntity;
    }

    public function findEntityStarSystems (
            $key
            , $value = null
            ): Entity
    {
        if ( empty( $this->returnType ) ) {
            return null;
        }

        if ( ! is_array( $key ) )
        {
            $key = [$key => $value];
        }

        /** @var \CodeIgniter\Database\ResultInterface $objResult */
        $objResult = $this->db
            ->table( 'minor_faction_star_system_view' )
            ->where( $key )
            ->get();

        $arrResult = $objResult->getResultArray();

        if ( ! count( $arrResult ) ) {
            return new Entity( $key );
        }

        $strPrefix = 'mfc_';
        $objEntity = $this->newFromResultRow(
                $arrResult[ 0 ]
                , $strPrefix
                );

        if ( is_null( $objEntity ) ) {
            return new Entity( $key );
        }

        $strPresencePrefix = 'mfp_';
        $strStarSystemPrefix = 'sts_';
        /** @var MinorFactionPresence $objPresenceModel */
        $objPresenceModel = model( MinorFactionPresence::class );
        /** @var StarSystem $objStarSystemModel */
        $objStarSystemModel = model( StarSystem::class );
        /**
         * @var PresenceEntity $objPresenceEntity
         * @var StarSystemEntity $objStarSystemEntity
         */
        $objPresenceEntity = $objStarSystemEntity = null;
        $strPresenceKey = Services::minorFactionCatalogue()->externalPresenceKey();

        if ( is_null( $objEntity->MinorFactionPresence ) ) {
            $objEntity->MinorFactionPresence = [];
        }

        foreach ( $arrResult as $arrRow ) {
            if ( $objEntity->id != $arrRow[ $strPrefix . 'id' ] ) {
                // Finding only one Entity, there should never be more in the result.
                break;
            }

            $objPresenceEntity = $objPresenceModel->newFromResultRow(
                    $arrRow
                    , $strPresencePrefix
                    );

            if ( ! is_null( $objPresenceEntity ) ) {
                $objEntity->StarSystem = $objStarSystemModel->newFromResultRow(
                        $arrRow
                        , $strStarSystemPrefix
                        );
                $objEntity->MinorFactionPresence[ $objPresenceEntity->{$strPresenceKey} ] = $objPresenceEntity;
            }
        }

        return $objEntity;
    }

    public function newFromResultRow (
            array $arrRow
            , string $strFieldPrefix
            ): ?Entity
    {
        return parent::newFromResultRow(
                $arrRow
                , $strFieldPrefix
                , Services::minorFactionCatalogue()->externalKey()
                , $this->loadedMinorFactions
                );
    }

    /**
     *
     * {@inheritDoc}
     * @see \CodeIgniter\BaseModel::save()
     */
    public function save ( $MinorFaction ): bool {
        /**
         * @var \App\Entities\MinorFaction $MinorFaction
         * @var \App\Entities\MinorFactionPresence $objPresenceEntity
         * @var MinorFactionPresence $objPresenceModel
         */
        $blnSuccess = parent::save( $MinorFaction );

        if (
                $blnSuccess
                 &&
                $MinorFaction instanceof Entity
                 &&
                ! empty( $MinorFaction->MinorFactionPresence )
                )
        {
            //Saving the Minor Faction Presence data as well.
            $objPresenceModel = model( MinorFactionPresence::class );

            foreach ( $MinorFaction->MinorFactionPresence as $objPresenceEntity ) {
                $objPresenceEntity->minorFactionId = $MinorFaction->id;
                $objPresenceModel->save( $objPresenceEntity );
            }
        }
    }
}

