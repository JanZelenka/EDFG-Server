<?php
namespace App\Entities\Base;

use App\Models\BgsTick as BgsTickModel;
use CodeIgniter\I18n\Time;

/**
 *
 * @author Jan Zelenka <jan.zelenka@clickworks.eu>
 *
 * @property Time lastCheckOn
 * @property Time updatedOn
 */
class ExternalEntity extends BaseEntity
{
    public function __construct ( array $data = null ) {
        parent::__construct( $data );
        $this->dates[] = 'lastCheckOn';
        $this->dates[] = 'updatedOn';
    }

    /**
     * Determins whether the Entity fulfills all the conditions for contacting Catalogue service for fresh data.
     *
     * @return bool
     */
    public function canSynchronize (): bool {
        return
            $this->isUpdateExpired()
             &&
            $this->isCheckExpired();
    }

    /**
     * Determins whether the last check for fresh External Catalogue data has expired.
     *
     * @return bool
     */
    protected function isCheckExpired (): bool {
        $dtmLastCheckOn = $this->lastCheckOn;

        if ( empty( $dtmLastCheckOn ) ) {
            return true;
        }

        $objAppConfig = config( 'App' );
        $objLastCheckExpiryInterval = new \DateInterval( 'PT' . ( $objAppConfig->ExternalCheckExpiryPeriod ) . 'S' );
        $objLastCheckExpiryInterval->invert = 1;
        return $dtmLastCheckOn < ( Time::now()->add( $objLastCheckExpiryInterval ) );
    }

    /**
     * Determins whether the last data received from an External Catalogue is expired.
     *
     * @return bool
     */
    protected function isUpdateExpired (): bool {
        $dtmUpdatedOn = $this->updatedOn;
        return
            empty( $dtmUpdatedOn )
             ||
            $dtmUpdatedOn < model( BgsTickModel::class )->getLastTick()->updatedOn;
    }
}

