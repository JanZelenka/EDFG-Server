<?php
namespace App\Entities;

use Config\Services;
use App\Models\BgsTick as BgsTickModel;
use CodeIgniter\Entity\Entity;
use CodeIgniter\I18n\Time;

/**
 *
 * @author Jan Zelenka <jan.zelenka@telenet.be>
 *
 * @property string ebgsId
 * @property Time lastCheckOn
 * @property Time occuredOn
 */
class BgsTick extends Entity
{
    protected $dates = [
        'lastCheckOn'
        , 'occuredOn'
    ];

    /**
     *
     * @param string $strEbgsId
     * @param \DateTime $dtmOccuredOn
     * @param \DateTime $dtmLastCheckOn
     */
    public function __construct (
            string $strEbgsId = null
            , \DateTime $dtmOccuredOn = null
            , \DateTime $dtmLastCheckOn = null          )
    {
        if ( ! is_null( $strEbgsId ) )
            $this->ebgsId = $strEbgsId;

        /** @var \Config\App $objAppConfig */
        $objAppConfig = config( 'App' );

        if ( is_null( $dtmOccuredOn ) ) {
            $objExpiredInterval = new \DateInterval( 'PT' . ( $objAppConfig->TickExpiryPeriod + 1 ) . 'S' );
            $objExpiredInterval->invert = 1;
            $this->occuredOn = Time::now()->add( $objExpiredInterval );
        } else {
            $this->occuredOn = $dtmOccuredOn;
        }

        if ( is_null( $dtmLastCheckOn ) ) {
            $objExpiredInterval = new \DateInterval( 'PT' . ( $objAppConfig->TickCheckExpiryPeriod + 1 ) . 'S' );
            $objExpiredInterval->invert = 1;
            $this->lastCheckOn = Time::now()->add( $objExpiredInterval );

        } else {
            $this->lastCheckOn = $dtmLastCheckOn;
        }
    }

    public static function refreshTick() {
        $objSession = Services::session();
        $objLastTick = $objSession->LastBgsTick;

        if ( is_null( $objLastTick ) ) {
            $objBgsTickModel = model( BgsTickModel::class );
            $objLastTick = $objBgsTickModel->GetLastTick();

            if ( is_null( $objLastTick ) )
                $objLastTick = new BgsTick();

            $blnIsLoaded = true;
        } else {
            $blnIsLoaded = false;
        }

        /** @var \Config\App $objAppConfig */
        $objAppConfig = config( 'App' );
        if (
                $objLastTick->isExpired( $objAppConfig->TickSafetyExpiry )
                 ||
                (
                    $objLastTick->isExpired( $objAppConfig->TickExpiryPeriod )
                     &&
                    $objLastTick->isCheckExpired()
                    )
                )
        {
            $blnStillExpired = true;

            if ( ! $blnIsLoaded ) {
                $objBgsTickModel = model( BgsTickModel::class );
                $objLastTick = $objBgsTickModel->GetLastTick();
                $blnIsLoaded = true;
                $blnStillExpired =
                    $objLastTick->isExpired()
                     &&
                    $objLastTick->isCheckExpired();
            }

            if ( $blnStillExpired ) {
                $objBgsCatalogue = Services::bgsCatalogue();
                $objLastTick = $objBgsCatalogue->getLastTick( $objLastTick );
                $objBgsTickModel = model( BgsTickModel::class );
                $objBgsTickModel->save( $objLastTick );
                $blnIsLoaded = true;
            }
        }

        if ( $blnIsLoaded )
            $objSession->LastBgsTick = $objLastTick;
    }

    public function isExpired( int $intExpiryPeriod ) {
        $objExpiryInterval = new \DateInterval( 'PT' . $intExpiryPeriod . 'S' );
        $objExpiryInterval->invert = 1;
        $objExpiresOn = Time::now()->add( $objExpiryInterval );
        return $this->occuredOn < $objExpiresOn;
    }

    public function isCheckExpired() {
        /** @var \Config\App $objAppConfig */
        $objAppConfig = config( 'App' );
        $objCheckExpiryInterval = new \DateInterval( 'PT' . $objAppConfig->TickCheckExpiryPeriod. 'S' );
        $objCheckExpiryInterval->invert = 1;
        $objCheckExpiresOn = Time::now()->add( $objCheckExpiryInterval );
        return $this->lastCheckOn < $objCheckExpiresOn;
    }
}
