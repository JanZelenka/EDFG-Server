<?php
namespace App\Entities;

use Config\Services;
use App\Models\MinorFaction as MinorFactionModel;
use App\Models\StarSystem as Model;

/**
 *
 * @author Jan Zelenka <jan.zelenka@clickworks.eu>
 *
 * @property string allegiance
 * @property float coordX
 * @property float coordY
 * @property float coordZ
 * @property string ebgsId
 * @property string economyPrimary
 * @property string economySecondary
 * @property string eddbId
 * @property string mainStarClass
 * @property string mainStarIsScoopable
 * @property string name
 * @property int population
 * @property string security
 * @property string state
 */
class StarSystem extends Base\External
{
    /** @var ?array \App\Entities\MinorFactionPresence */
    public ?array $MinorFactions = null;

    public const STAR_CLASS_COLORS = [
            'A (Blue-White) Star' => '0.7843 0.8353 1'
            , 'A (Blue-White super giant) Star' => '0.8118 0.8588 1'
            , 'B (Blue-White) Star' => '0.6784 0.749 1'
            , 'B (Blue-White super giant) Star' => '0.6863 0.7608 1'
            , 'Black Hole' => '0 0 0'
            , 'C Star' => '1 0.8275 0.5608'
            , 'CJ Star' => '1 0.8275 0.5608'
            , 'CN Star' => '1 0.8275 0.5608'
            , 'F (White) Star' => '0.9647 0.9529 1'
            , 'F (White super giant) Star' => '0.9255 0.9294 1'
            , 'G (White-Yellow) Star' => '1 0.9569 0.9216'
            , 'G (White-Yellow super giant) Star' => '1 0.9059 0.7961'
            , 'Herbig Ae/Be Star' => '0.7137 0.7882 1'
            , 'K (Yellow-Orange) Star' => '1 0.7804 0.5569'
            , 'K (Yellow-Orange giant) Star' => '1 0.8 0.502'
            , 'L (Brown dwarf) Star' => '1 0.7765 0.4235'
            , 'M (Red dwarf) Star' => '1 0.8118 0.5961'
            , 'M (Red giant) Star' => '1 0.698 0.3059'
            , 'M (Red super giant) Star' => '1 0.7569 0.4078'
            , 'MS-type Star' => '1 0.7961 0.5176'
            , 'Neutron Star' => '1 1 1'
            , 'O (Blue-White) Star' => '0.6 0.6941 1'
            , 'S-type Star' => '1 0.7961 0.5176'
            , 'Supermassive Black Hole' => '0 0 0'
            , 'T (Brown dwarf) Star' => '1 0.7765 0.4235'
            , 'T Tauri Star' => '1 0.8118 0.5961'
            , 'White Dwarf (D) Star' => '0.8118 0.8549 1'
            , 'White Dwarf (DA) Star' => '0.8118 0.8549 1'
            , 'White Dwarf (DAB) Star' => '0.8118 0.8549 1'
            , 'White Dwarf (DAV) Star' => '0.8118 0.8549 1'
            , 'White Dwarf (DAZ) Star' => '0.8118 0.8549 1'
            , 'White Dwarf (DB) Star' => '0.8118 0.8549 1'
            , 'White Dwarf (DBV) Star' => '0.8118 0.8549 1'
            , 'White Dwarf (DBZ) Star' => '0.8118 0.8549 1'
            , 'White Dwarf (DC) Star' => '0.8118 0.8549 1'
            , 'White Dwarf (DCV) Star' => '0.8118 0.8549 1'
            , 'White Dwarf (DQ) Star' => '0.7529 0.8118 1'
            , 'Wolf-Rayet C Star' => '0.6 0.6941 1'
            , 'Wolf-Rayet N Star' => '0.6 0.6941 1'
            , 'Wolf-Rayet NC Star' => '0.5922 0.6863 1r'
            , 'Wolf-Rayet O Star' => '0.5843 0.6706 1'
            , 'Wolf-Rayet Star' => '0.5647 0.651 1'
            , 'Y (Brown dwarf) Star' => '1 0.7765 0.4235'
    ];

    /**
     * Synchronizes the Star System data with an external Star System Catalogue.
     * The attempt is skipped in case it is still too soon after the previous check
     * or we already have data from after the last detected BGS Tick.
     */
    public function synchronize () {
        model( Model::class )->findMinorFactions ( $this );

        if ( $this->canSynchronize() ) {
            /** @var \Config\App $objAppConfig */
            $objAppConfig = config( 'App' );
            /** @var \App\Libraries\StarSystemCatalogue\StarSystemCatalogueInterface $objCatalogue */
            $objCatalogue = new $objAppConfig->StarSystemCatalogue();

            if ( $objCatalogue->getStarSystem( $this ) ) {
                model( Model::class )->save( $this );
            }
        }
    }

    public function synchronizeMinorFactions () {
        if (
                is_null( $this->MinorFactions )
                 ||
                empty ( $this->MinorFactions )
                )
        {
            return;
        }

        $arrToSynchronize = [];

        /** @var MinorFaction $objMinorFaction */
        foreach ( $this->MinorFactions as $strName => $objMinorFaction ) {
            if ( $objMinorFaction->canSynchronize() ) {
                $arrToSynchronize[ $strName ] = $objMinorFaction;
            }
        }

        if ( ! empty( $arrToSynchronize ) ) {
            /** @var \Config\App $objAppConfig */
            $objAppConfig = config( 'App' );
            /** @var \App\Libraries\MinorFactionCatalogue\MinorFactionCatalogueInterface $objMinorFactionCatalogue */
            $objMinorFactionCatalogue = new $objAppConfig->MinorFactionCatalogue();
            $objMinorFactionCatalogue->getMinorFaction( $arrToSynchronize );
            $objMinorFactionCatalogue->getPresence( $arrToSynchronize );
        }

        /** @var MinorFactionModel $objMinorFactionModel */
        $objMinorFactionModel = model( MinorFactionModel::class );

        foreach ( $arrToSynchronize as $objMinorFaction) {
            $objMinorFactionModel->save( $objMinorFaction );
        }
    }
}
