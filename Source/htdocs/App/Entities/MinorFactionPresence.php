<?php
namespace App\Entities;

/*
use Config\Services;
use App\Models\StarSystem as StarSystemModel;
*/
use CodeIgniter\Entity\Entity;

/**
 *
 * @author Jan Zelenka <jan.zelenka@clickworks.eu>
 *
 * @property string ebgsSystemId
 * @property float influence
 * @property int minorFactionId
 * @property int starSystemId
 * @property CodeIgniter\I18n\Time updatedOn
 *
 */
class MinorFactionPresence extends Base\ExternalEntity
{
    public ?StarSystem $StarSystem = null;
/*
    /**
     * Attempts to find the Star System in the database. Creates one if none exists.
     * Then synchronizes the Star System data with the BGS Service.
    public function findStarSystem () {
        $intStartSystemId = $this->starSystemId;

        if ( ! empty( $intStartSystemId) ) {
            $this->StarSystem = model( StarSystemModel::class )->find( $intStartSystemId );
        } else {
            $strStarSystemKey = Services::starSystemCatalogue()->starSystemRelationshipMap()[ self::class ][ 'StarMap' ];
            $strExternalStarSystemId = $this->{$strStarSystemKey};

            if ( ! empty( $strExternalStarSystemId) ) {
                $this->StarSystem = model( StarSystemModel::class )
                    ->where(
                            $strStarSystemKey
                            , $strExternalStarSystemId
                            )
                    ->first();
            }
        }

        if ( is_null( $this->StarSystem ) ) {
            $this->StarSystem = new StarSystem( [StarSystem::externalIdColumn => self::$externalSystemIdColumn] );
        }

        $this->StarSystem->synchronize();

        if ( $this->StarSystem->hasChanged() ) {
            model( StarSystemModel::class )->save( $this->StarSystem );
        }

    }
*/
}

