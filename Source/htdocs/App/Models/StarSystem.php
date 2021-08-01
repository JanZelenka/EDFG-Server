<?php

namespace App\Models;

use App\Entities\MinorFaction as MinorFactionEntity;
use App\Entities\MinorFactionPresence as PresenceEntity;
use App\Entities\StarSystem as Entity;
use Config\Services;

/**
 *
 * @author Jan Zelenka <jan.zelenka@telenet.be>
 *
 */
final class StarSystem extends Base\ExternalData {
    protected $allowedFields = [
            'allegiance'
            , 'coordX'
            , 'coordY'
            , 'coordZ'
            , 'ebgsId'
            , 'economyPrimary'
            , 'economySecondary'
            , 'eddbId'
            , 'mainStarClass'
            , 'mainStarIsScoopable'
            , 'name'
            , 'population'
            , 'security'
            , 'state'
           ];
    public $loadedStarSystems = [];
    protected $primaryKey = 'id';
    protected $returnType = Entity::class;
    protected $table = 'star_system';
    protected $useSoftDeletes = false;


    public function findMinorFactions ( Entity $objEntity ): bool {
        /** @var \CodeIgniter\Database\ResultInterface $objResult */
        $objResult = $this->db
            ->table( 'minor_factions_star_systems_view' )
            ->where( [ 'mfp_starSystemId' => $objEntity->id ] )
            ->get();

        $arrResult = $objResult->getResultArray();

        if ( ! count( $arrResult ) ) {
            return false;
        }

        /** @var MinorFaction $objMinorFactionModel */
        $objMinorFactionModel = model( MinorFaction::class );
        /** @var MinorFactionPresence $objPresenceModel */
        $objPresenceModel = model( MinorFactionPresence::class );
        /** @var StarSystem $objStarSystemModel */
        $objStarSystemModel = model( StarSystem::class );
        /**
         * @var PresenceEntity $objPresenceEntity
         * @var MinorFactionEntity $objMinorFactionEntity
         */

        if ( is_null( $objEntity->MinorFactions ) ) {
            $objEntity->MinorFactions = [];
        }

        foreach ( $arrResult as $arrRow ) {
            $objMinorFactionEntity = $objMinorFactionModel->newFromResultRow(
                    $arrRow
                    , 'mfp_mfc_'
                    );

            if ( is_null( $objMinorFactionEntity ) ) {
                break;
            }

            $objEntity->MinorFactions[ $objMinorFactionEntity->name ] = $objMinorFactionEntity;
            $objPresenceEntity = $objPresenceModel->newFromResultRow(
                    $arrRow
                    , 'mfp_mfc_mfp_'
                    );

            if ( is_null( $objPresenceEntity ) ) {
                break;
            }
            $objMinorFactionEntity->MinorFactionPresence[ $objEntity->name ] = $objPresenceEntity;
            $objPresenceEntity->StarSystem = $objStarSystemModel->newFromResultRow(
                    $arrRow
                    , 'mfp_mfc_mfp_sts_'
                    );
        }

        return true;
    }
    /**
     * Creates the Return object populated with data from other source than the native table.
     * Usefull when getting star system data from different views.
     *
     * @param string $strColumnNamePrefix
     * @param object $objViewRow
     * @return Entity
     */
    public function newFromResultRow (
            array $arrRow
            , string $strFieldPrefix
            , ?string $strExternalKey = null
            , ?array $arrLoadedEntities = null
            ): ?Entity
    {
        return parent::newFromResultRow(
                $arrRow
                , $strFieldPrefix
                , $strExternalKey ?? 'name'
                , $arrLoadedEntities ?? $this->loadedStarSystems
                );
    }
}
