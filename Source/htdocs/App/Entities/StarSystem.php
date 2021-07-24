<?php
namespace App\Entities;

use Config\Services;
use App\Models\StarSystem as StarSystemModel;
use CodeIgniter\I18n\Time;

/**
 *
 * @author Jan Zelenka <jan.zelenka@clickworks.eu>
 *
 * @property int id
 * @property float coordX
 * @property float coordY
 * @property float coordZ
 * @property string ebgsId
 * @property string eddbId
 * @property \CodeIgniter\I18n\Time lastCheckOn
 * @property string name
 * @property \CodeIgniter\I18n\Time updatedOn
 */
class StarSystem extends Base\ExternalEntity
{
    protected $dates = [
            'lastCheckOn'
            , 'updatedOn'
            ];

    public function synchronize () {
        /** @var \Config\App $objAppConfig */
        /** @var \App\Libraries\StarSystemCatalogue\StarSystemCatalogueInterface $objStarSystemCatalogue */

        $blnsynchronize = true;
        $dtmUpdateOn = $this->updatedOn;

        if ( ! empty( $dtmUpdateOn ) ) {
            $dtmLastCheckOn = $this->lastCheckOn;

            if ( ! empty( $dtmLastCheckOn ) ) {
                $objSession = Services::session();
                $objAppConfig = config( 'App' );
                $objLastCheckExpiryInterval = new \DateInterval( 'PT' . ( $objAppConfig->ExternalCheckExpiryPeriod + 1 ) . 'S' );
                $objLastCheckExpiryInterval->invert = 1;
                $blnsynchronize =
                    $dtmUpdateOn < $objSession->LastTick->occuredOn
                     &&
                    $dtmLastCheckOn < ( Time::now()->add( $objLastCheckExpiryInterval ) );
            }
        }

        if ( $blnsynchronize ) {
            $objStarSystemCatalogue = Services::starSystemCatalogue();
            $objStarSystemCatalogue->getStarSystem( $this );
            model( StarSystemModel::class )->save( $this );
        }
    }
}
