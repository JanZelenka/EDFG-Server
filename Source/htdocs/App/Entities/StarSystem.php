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
 * @property string name
 * @property int population
 * @property string security
 * @property string state
 */
class StarSystem extends Base\ExternalEntity
{
    /** @var ?array \App\Entities\MinorFactionPresence */
    public ?array $MinorFactions = null;

    /**
     * Synchronizes the Star System data with an external Star System Catalogue.
     * The attempt is skipped in case it is still too soon after the previous check
     * or we already have data from after the last detected BGS Tick.
     */
    public function synchronize () {
        /** @var \Config\App $objAppConfig */
        /** @var \App\Libraries\StarSystemCatalogue\StarSystemCatalogueInterface $objCatalogue */

        if ( $this->canSynchronize() ) {
            $objCatalogue = Services::starSystemCatalogue();

            if ( $objCatalogue->getStarSystem( $this ) ) {
                model( Model::class )->save( $this );
            }
        }
    }
}
