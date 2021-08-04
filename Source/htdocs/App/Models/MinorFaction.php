<?php
namespace App\Models;

use App\Entities\Base\Base as BaseEntity;
use App\Entities\MinorFaction as Entity;
use App\Entities\MinorFactionPresence as PresenceEntity;
use App\Entities\StarSystem as StarSystemEntity;
use CodeIgniter\Entity\Entity as SystemEntity;

/**
 *
 * @author Jan Zelenka <jan.zelenka@clickworks.eu>
 *
 */
final class MinorFaction extends Base\ExternalData
{
    protected $allowedFields = [
            'ebgsId'
            , 'eddbId'
            , 'allegiance'
            , 'government'
            , 'name'
    ];
    public $loadedMinorFactions = [];
    protected $primaryKey = 'id';
    protected $returnType = Entity::class;
    protected $table = 'minor_faction';
    protected $useSoftDeletes = false;

    public function findEntity(
            $key
            , $value = null
            ): ?SystemEntity
    {
        $objEntity = parent::findEntity(
                $key
                , $value
                );
        $strName = $objEntity->name;

        if ( ! empty( $strName ) ) {
            $this->loadedMinorFactions[ $strName ] = $objEntity;
        }

        return $objEntity;
    }

    public function findPresence ( Entity $objEntity ): bool {
        $strPresencePrefix = 'mfp_';
        /** @var \CodeIgniter\Database\ResultInterface $objResult */
        $objResult = $this->db
            ->table( 'minor_faction_star_systems_view' )
            ->where( [ $strPresencePrefix . 'minorFactionId' => $objEntity->id ] )
            ->get();

        $arrResult = $objResult->getResultArray();

        if ( ! count( $arrResult ) ) {
            return false;
        }

        $strStarSystemPrefix = 'sts_';
        /** @var MinorFactionPresence $objPresenceModel */
        $objPresenceModel = model( MinorFactionPresence::class );
        /** @var StarSystem $objStarSystemModel */
        $objStarSystemModel = model( StarSystem::class );
        /**
         * @var PresenceEntity $objPresenceEntity
         * @var StarSystemEntity $objStarSystemEntity
         */

        if ( is_null( $objEntity->MinorFactionPresence ) ) {
            $objEntity->MinorFactionPresence = [];
        }

        foreach ( $arrResult as $arrRow ) {
            $objPresenceEntity = $objPresenceModel->newFromResultRow(
                    $arrRow
                    , $strPresencePrefix
                    );

            if ( isset( $objPresenceEntity ) ) {
                $objPresenceEntity->StarSystem = $objStarSystemModel->newFromResultRow(
                        $arrRow
                        , $strStarSystemPrefix
                        );
                $objEntity->MinorFactionPresence[ $objPresenceEntity->StarSystem->name ] = $objPresenceEntity;
            }
        }

        return true;
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
                , $strExternalKey ?? 'name'
                , $arrLoadedEntities ?? $this->loadedMinorFactions
                );
    }

    /**
     *
     * {@inheritDoc}
     * @see \CodeIgniter\BaseModel::save()
     */
    public function save ( $MinorFaction = null ): bool {
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
            $arrToBeDeleted = [];

            foreach ( $MinorFaction->MinorFactionPresence as $strKey => $objPresenceEntity ) {
                if ( $objPresenceEntity->_exists ) {
                    $objPresenceEntity->minorFactionId = $MinorFaction->id;
                    $objPresenceModel->save( $objPresenceEntity );
                } else {
                    $arrToBeDeleted[] = $objPresenceEntity->id;
                    unset( $MinorFaction->MinorFactionPresence[ $strKey ] );
                }
            }

            if ( ! empty( $arrToBeDeleted ) ) {
                $objPresenceModel->delete( $arrToBeDeleted );
            }
        }

        return $blnSuccess;
    }
}

