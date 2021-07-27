<?php
namespace App\Entities;


use Config\Services;
use App\Models\MinorFaction as Model;
use App\Models\MinorFactionPresence as PresenceModel;
use App\Models\StarSystem as StarSystemModel;
use CodeIgniter\I18n\Time;

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
class MinorFaction extends Base\ExternalEntity
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

        if ( ! $this->isCheckExpired() ) {
            return;
        }

        $objCatalogue = Services::minorFactionCatalogue();

        if ( ! $objCatalogue->getMinorFaction( $this ) ) {
            return;
        }

        if ( is_null( $this->MinorFactionPresence ) ) {
            model( PresenceModel::class )->findForMinorFaction( $this );
        }

        if ( ! $objCatalogue->getPresence( $this ) ) {
            throw \Exception( 'Synchronizing Minor Faction Presence has failed to retrieve data from the Minor Faction Catalogue.');
        }

        Services::starSystemCatalogue()->getMinorFactionStarSystems( $this );
        model( Model::class )->save( $this );
    }
}
