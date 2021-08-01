<?php
namespace App\Entities;


use Config\Services;
use App\Models\MinorFaction as Model;
use App\Models\StarSystem as StarSystemModel;
use App;

/**
 *
 * @author Jan Zelenka <jan.zelenka@telenet.be>
 *
 * @property string ebgsId
 * @property string eddbId
 * @property string allegiance
 * @property string government
 * @property string name
 */
class MinorFaction extends Base\External
{
    /**
     * Array of al the Minor Faction Presence records for Minor Faction.
     * @var array
     */
    public ?array $MinorFactionPresence = null;

    public function synchronize() {
        /**
         * @var \App\Entities\MinorFactionPresence $objPresence
         */

        model( Model::class )->findPresence( $this );

        if ( ! $this->isCheckExpired() ) {
            return;
        }

        /** @var \Config\App $objAppConfig */
        $objAppConfig = config( 'App' );
        /** @var App\Libraries\MinorFactionCatalogue\MinorFactionCatalogueInterface $objCatalogue */
        $objCatalogue = new $objAppConfig->MinorFactionCatalogue();

        if ( ! $objCatalogue->getMinorFaction( $this ) ) {
            return;
        }

        if ( ! $objCatalogue->getPresence( $this ) ) {
            throw \Exception( 'Synchronizing Minor Faction Presence has failed to retrieve data from the Minor Faction Catalogue.');
        }

        $objStarSystemCatalogue = new $objAppConfig->StarSystemCatalogue();
        $objStarSystemCatalogue->getMinorFactionStarSystems( $this );
        $arrNewStarNames = [];
        /** @var \App\Entities\MinorFactionPresence $objPresence */
        foreach ( $this->MinorFactionPresence as $objPresence) {
            if ( empty( $objPresence->StarSystem->id ) ) {
                $arrNewStarNames[] = $objPresence->StarSystem->name;
            }

            if ( empty( $objPresence->StarSystem->mainStarClass ) ) {
                /** @var App\Libraries\StarSystemCatalogue\StarSystemCatalogueInterface $objMainStarInfoCatalogue */
                if ( empty( $objMainStarInfoCatalogue ) ) {
                    $objMainStarInfoCatalogue = new $objAppConfig->MainStarInfoCatalogue();
                }

                $objMainStarInfoCatalogue->getStarSystem( $objPresence->StarSystem );
            }
        }

        if ( ! empty( $arrNewStarNames ) ) {
            /** @var \App\Models\StarSystem $objStarSystemModel */
            $objStarSystemModel = model( StarSystemModel::class );
            $objResult = $objStarSystemModel
                ->whereIn(
                        'name'
                        , $arrNewStarNames
                        )
                ->get();
            $arrResult = $objResult->getResultArray();

            if ( count( $arrResult ) ) {
                foreach ( $arrResult as $arrRow) {
                    $this->MinorFactionPresence[ $arrRow[ 'name' ] ]->StarSystem = $objStarSystemModel->newFromResultRow(
                            $arrRow
                            , ''
                            );
                }
            }
        }

        model( Model::class )->save( $this );
    }
}
