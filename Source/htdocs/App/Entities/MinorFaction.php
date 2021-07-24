<?php
namespace App\Entities;


use Config\Services;
use App\Models\MinorFaction as MinorFactionModel;
use App\Models\MinorFactionPresence as MinorFactionPresenceModel;
use App\Models\StarSystem as StarSystemModel;

/**
 *
 * @author Jan Zelenka <jan.zelenka@telenet.be>
 *
 * @property int id
 * @property string ebgsId
 * @property string eddbId
 * @property string allegiance
 * @property string government
 * @property string name
 * @property CodeIgniter\I18n\Time updatedOn
 */
class MinorFaction extends Base\ExternalEntity
{
    /**
     *
     * @var array
     */
    protected $dates = [
            'updatedOn'
            ];
    /**
     * Array of al the Minor Faction Presence records for Minor Faction.
     * @var array
     */
    public array $MinorFactionPresence = array();

    public function synchronize() {
        /**
         * @var \App\Entities\MinorFactionPresence $objMinorFactionPresence
         * @var \App\Models\MinorFactionPresence $objMinorFactionPresenceModel
         */

        $objMinorFactionCatalogue = Services::minorFactionCatalogue();
        $blnMinorFactionSynchronized = $objMinorFactionCatalogue->getMinorFaction( $this );

        if (
                empty( $this->id )
                ||
                $this->hasChanged( 'updatedOn' )
                )
        {
            model( MinorFactionModel::class )->save( $this );
        }

        $objMinorFactionPresenceModel = model( MinorFactionPresenceModel::class );
        $this->MinorFactionPresence = $objMinorFactionPresenceModel->findMinorFaction( $this->id );

        if ( $blnMinorFactionSynchronized ) {
            $objMinorFactionCatalogue->getMinorFactionPresence( $this );
        }

        foreach ($this->MinorFactionPresence as $objMinorFactionPresence) {
            if ( is_null( $objMinorFactionPresence->StarSystem ) ) {
                $objMinorFactionPresence->StarSystem = new StarSystem( [ StarSystem::$externalIdColumn => $objMinorFactionPresence->{MinorFactionPresence::$externalSystemIdColumn} ] );
            };

            $objMinorFactionPresence->StarSystem->synchronize();
        }
    }
}

