<?php
namespace App\Entities;


use Config\Services;
use App\Models\MinorFaction as Model;
use App\Models\MinorFactionPresence as PresenceModel;
use App\Models\StarSystem as StarSystemModel;
use CodeIgniter\Entity\Entity;
use CodeIgniter\I18n\Time;

/**
 *
 * @author Jan Zelenka <jan.zelenka@telenet.be>
 *
 * @property int id
 * @property string ebgsId
 * @property string eddbId
 * @property string allegiance
 * @property string government
 * @property CodeIgniter\I18n\Time lastCheckOn
 * @property string name
 * @property CodeIgniter\I18n\Time updatedOn
 */
class MinorFaction extends Entity
{
    /**
     *
     * @var array
     */
    protected $dates = [
            'lastCheckOn'
            , 'updatedOn'
            ];
    /**
     * Array of al the Minor Faction Presence records for Minor Faction.
     * @var array
     */
    public ?array $MinorFactionPresence = null;

    public function findPresence () {
        if ( ! empty( $this->id ) ) {
            $this->MinorFactionPresence = model( PresenceModel::class )->findMinorFaction(
                    $this->id
                    , Services::minorFactionCatalogue()->presenceRelationshipMap()[ self::class ][ 'MinorFactionPresence' ]
                    );
        }
    }

    public function synchronize() {
        /**
         * @var \App\Entities\MinorFactionPresence $objPresence
         */

        $dtmLastCheckOn = $this->lastCheckOn;

        if ( ! empty( $dtmLastCheckOn ) ) {
            $objAppConfig = config( 'App' );
            $objLastCheckExpiryInterval = new \DateInterval( 'PT' . ( $objAppConfig->ExternalCheckExpiryPeriod ) . 'S' );
            $objLastCheckExpiryInterval->invert = 1;

            if ( $dtmLastCheckOn >= Time::now()->add( $objLastCheckExpiryInterval ) ) {
                return;
            }
        }


        $objCatalogue = Services::minorFactionCatalogue();

        if ( ! $objCatalogue->getMinorFaction( $this ) ) {
            return;
        }

        if ( is_null( $this->MinorFactionPresence ) ) {
            $this->MinorFactionPresence = array();
        }

        if ( ! $objCatalogue->getPresence( $this ) ) {
            throw \Exception( 'Synchrinizing Minor Faction Presence has failed to retrieve data from the Minor Faction Catalogue.');
        }

        $arrRelationshipMap = Services::starSystemCatalogue()->starSystemRelationshipMap();

        foreach ($this->MinorFactionPresence as $objPresence) {
            if ( is_null( $objPresence->StarSystem ) ) {
                $objPresence->StarSystem = model( StarSystemModel::class )->findEntity( [ $arrRelationshipMap[ StarSystem::class ][ '_key' ] => $objPresence->{$arrRelationshipMap[ MinorFactionPresence::class ][ 'StarSystem' ]} ] );
            };

            $objPresence->StarSystem->synchronize();
        }

        model( Model::class )->save( $this );
    }
}

