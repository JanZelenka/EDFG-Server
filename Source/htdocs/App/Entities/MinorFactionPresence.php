<?php
namespace App\Entities;

use App\Models\StarSystem as StarSystemModel;

/**
 *
 * @author Jan Zelenka <jan.zelenka@clickworks.eu>
 *
 * @property int id
 * @property string ebgsSystemId
 * @property float influence
 * @property int minorFactionId
 * @property int starSystemId
 * @property CodeIgniter\I18n\Time updatedOn
 *
 */
class MinorFactionPresence extends Base\ExternalEntity
{
    protected $dates = [
            'updatedOn'
    ];
    public static string $externalIdColumn = 'ebgsSystemId';
    public static string $externalIdDataKey = 'system_id';
    public static string $externalSystemIdColumn = 'ebgsSystemId';
    public ?StarSystem $StarSystem = null;

    /**
     * Attempts to find the Star System in the database. Creates one if none exists.
     * Then synchronizes the Star System data with the BGS Service.
     */
    public function findStarSystem () {
        $intStartSystemId = $this->starSystemId;

        if ( ! empty( $intStartSystemId) ) {
            $this->StarSystem = model( StarSystemModel::class )->find( $intStartSystemId );
        } else {
            $strEbgsSystemId = $this->ebgsSystemId;

            if ( ! empty( $strEbgsSystemId ) ) {
                $this->StarSystem = model( StarSystemModel::class )
                    ->where(
                            'ebgsSystemId'
                            , $strEbgsSystemId
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
}
