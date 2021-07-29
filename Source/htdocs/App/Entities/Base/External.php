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
class External extends Base
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

    public function checkExpiryInterval ( int $intOffset = 0): \DateInterval {
        $objAppConfig = config( 'App' );
        $objLastCheckExpiryInterval = new \DateInterval( 'PT' . ( $objAppConfig->ExternalCheckExpiryPeriod + $intOffset ) . 'S' );
        $objLastCheckExpiryInterval->invert = 1;
        return $objLastCheckExpiryInterval;
    }

    public function expireCheck () {
        $this->lastCheckOn = Time::now()->add( $this->checkExpiryInterval( 1 ) );
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

        return $dtmLastCheckOn < ( Time::now()->add( $this->checkExpiryInterval() ) );
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

