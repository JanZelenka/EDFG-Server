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
        $strPresencePrefix = 'mfp_';
        /** @var \CodeIgniter\Database\ResultInterface $objResult */
        $objResult = $this->db
            ->table( 'star_system_minor_factions_view' )
            ->where( [ $strPresencePrefix. 'starSystemId' => $objEntity->id ] )
            ->get();

        $arrResult = $objResult->getResultArray();

        if ( ! count( $arrResult ) ) {
            return false;
        }

        $strMinorFactionPrefix = 'mfc_';
        /** @var MinorFactionPresence $objPresenceModel */
        $objPresenceModel = model( MinorFactionPresence::class );
        /** @var MinorFaction $objMinorFactionModel */
        $objMinorFactionModel = model( MinorFaction::class );
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
                    , $strMinorFactionPrefix
                    );

            if ( ! is_null( $objMinorFactionEntity ) ) {
                $objEntity->MinorFactions[ $objMinorFactionEntity->name ] = $objMinorFactionEntity;
                $objPresenceEntity = $objPresenceModel->newFromResultRow(
                        $arrRow
                        , $strPresencePrefix
                        );

                if ( ! is_null( $objPresenceEntity ) ) {
                    $objMinorFactionEntity->MinorFactionPresence[ $objEntity->name ] = $objPresenceEntity;
                }
            }
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
