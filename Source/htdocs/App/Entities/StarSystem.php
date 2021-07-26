<?php
namespace App\Entities;

use Config\Services;
use App\Models\MinorFactionPresence as PresenceModel;
use App\Models\StarSystem as Model;
use CodeIgniter\Entity\Entity;
use CodeIgniter\I18n\Time;

/**
 *
 * @author Jan Zelenka <jan.zelenka@clickworks.eu>
 *
 * @property int id
 * @property string allegiance
 * @property float coordX
 * @property float coordY
 * @property float coordZ
 * @property string ebgsId
 * @property string economyPrimary
 * @property string economySecondary
 * @property string eddbId
 * @property \CodeIgniter\I18n\Time lastCheckOn
 * @property string name
 * @property int population
 * @property string security
 * @property string state
 * @property \CodeIgniter\I18n\Time updatedOn
 */
class StarSystem extends Entity
{
    protected $dates = [
            'lastCheckOn'
            , 'updatedOn'
            ];
    /** @var ?array \App\Entities\MinorFactionPresence */
    public ?array $MinorFactions = null;

    public function findMinorFactions () {
        if ( ! empty( $this->id ) ) {
            $this->MinorFactions = model( PresenceModel::class )->findStarSystem( $this->id );
        }
    }

    /**
     * Synchronizes the Star System data with an external Star System Catalogue.
     * The attempt is skipped in case it is still too soon after the previous check
     * or we already have data from after the last detected BGS Tick.
     */
    public function synchronize () {
        /** @var \Config\App $objAppConfig */
        /** @var \App\Libraries\StarSystemCatalogue\StarSystemCatalogueInterface $objCatalogue */

        $blnsynchronize = true;
        $dtmUpdateOn = $this->updatedOn;

        if ( ! empty( $dtmUpdateOn ) ) {
            $dtmLastCheckOn = $this->lastCheckOn;

            if ( ! empty( $dtmLastCheckOn ) ) {
                $objSession = Services::session();
                $objAppConfig = config( 'App' );
                $objLastCheckExpiryInterval = new \DateInterval( 'PT' . ( $objAppConfig->ExternalCheckExpiryPeriod ) . 'S' );
                $objLastCheckExpiryInterval->invert = 1;
                $blnsynchronize =
                    $dtmUpdateOn < $objSession->LastBgsTick->occuredOn
                     &&
                    $dtmLastCheckOn < ( Time::now()->add( $objLastCheckExpiryInterval ) );
            }
        }

        if ( $blnsynchronize ) {
            $objCatalogue = Services::starSystemCatalogue();

            if ( $objCatalogue->getStarSystem( $this ) ) {
                model( Model::class )->save( $this );
            }
        }
    }
}
