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
final class StarSystem extends Base\ExternalDataModel {
    protected array $allowedFields = [
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
    public array $loadedStarSystems = [];
    protected string $primaryKey = 'id';
    protected string $returnType = Entity::class;
    protected string $table = 'star_system';
    protected bool $useSoftDeletes = false;


    public function findStarSystemEntities (
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
            ->table( 'star_system_minor_factions_view' )
            ->where( $key )
            ->get();

        $arrResult = $objResult->getResultArray();

        if ( ! count( $arrResult ) ) {
            return new Entity( $key );
        }

        $strPrefix = 'sts_';
        $objEntity = $this->newFromResultRow(
                $arrResult[ 0 ]
                , $strPrefix
                );

        if ( is_null( $objEntity ) ) {
            return new Entity( $key );
        }

        $strPresencePrefix = 'mfp_';
        $strMinorFactionPrefix = 'mfc_';
        /** @var MinorFactionPresence $objPresenceModel */
        $objPresenceModel = model( MinorFactionPresence::class );
        /** @var MinorFaction $objMinorFactionModel */
        $objMinorFactionModel = model( MinorFaction::class );
        /**
         * @var PresenceEntity $objPresenceEntity
         * @var MinorFactionEntity $objMinorFactionEntity
         */
        $objPresenceEntity = $objMinorFactionEntity = null;
        $objMinorFactionCatalogue = Services::minorFactionCatalogue();
        $strPresenceKey = $objMinorFactionCatalogue->externalPresenceKey();
        $strMinorFactionKey = $objMinorFactionCatalogue->externalKey();

        if ( is_null( $objEntity->MinorFactions ) ) {
            $objEntity->MinorFactions = [];
        }

        foreach ( $arrResult as $arrRow ) {
            if ( $objEntity->id != $arrRow[ $strPrefix . 'id' ] ) {
                // Finding only one Entity, there should never be more in the result.
                break;
            }

            $objMinorFactionEntity = $objMinorFactionModel->newFromResultRow(
                    $arrRow
                    , $strMinorFactionPrefix
                    );

            if ( ! is_null( $objMinorFactionEntity ) ) {
                $objEntity->MinorFactions[ $objMinorFactionEntity->{$strMinorFactionKey} ] = $objMinorFactionEntity;
                $objPresenceEntity = $objPresenceModel->newFromResultRow(
                        $arrRow
                        , $strPresencePrefix
                        );

                if ( ! is_null( $objPresenceEntity ) ) {
                    $objMinorFactionEntity->MinorFactionPresence[ $objPresenceEntity->{$strPresenceKey} ] = $objPresenceEntity;
                }
            }
        }

        return $objEntity;
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
            ): ?Entity
    {
        return parent::newFromResultRow(
                $arrRow
                , $strFieldPrefix
                , Services::starSystemCatalogue()->externalKey()
                , $this->loadedStarSystems
                );
    }
}
