<?php
namespace App\Entities;
use CodeIgniter\Entity\Entity;
use Config\Services;
use App\Models\ModelsService;

/**
 *
 * @author Jan Zelenka <jan.zelenka@telenet.be>
 *
 * @property string ebgsId
 * @property \DateTime lastCheckOn
 * @property \DateTime occuredOn
 */
class BgsTick extends Entity
{
    private function __construct (
            string $strEbgsId = null
            , \DateTime $dtmOccuredOn = null
            , \DateTime $dtmLastCheckOn = null          )
    {
        if ( ! is_null( $strEbgsId ) )
            $this->ebgsId = $strEbgsId;

        /** @var \Config\App $objAppConfig */
        $objAppConfig = config( 'App' );

        if ( is_null( $dtmOccuredOn ) ) {
            $objExpiredInterval = new \DateInterval( 'P' . ( $objAppConfig->TickExpiryPeriod + 1 ) . 'S' );
            $objExpiredInterval->invert = 1;
            $this->occuredOn = ( new \DateTime() )->add( $objExpiredInterval );
        } else {
            $this->occuredOn = $dtmOccuredOn;
        }

        if ( is_null( $dtmLastCheckOn ) ) {
            $objExpiredInterval = new \DateInterval( 'P' . ( $objAppConfig->TickCheckExpiryPeriod + 1 ) . 'S' );
            $objExpiredInterval->invert = 1;
            $this->lastCheckOn = ( new \DateTime() )->add( $objExpiredInterval );

        } else {
            $this->lastCheckOn = $dtmLastCheckOn;
        }
    }

    public static function refreshTick() {
        $objSession = Services::session();
        $objLastTick = $objSession->LastTick;

        if ( is_null( $objLastTick ) ) {
            $objBgsTickModel = ModelsService::BgsTick();
            $objLastTick = $objBgsTickModel->GetLastTick();

            if ( is_null( $objLastTick ) )
                $objLastTick = new BgsTick();

            $blnIsLoaded = true;
        } else {
            $blnIsLoaded = false;
        }

        if ( $objLastTick->isExpired() ) {
            if ( $objLastTick->isCheckExpired() ) {
                $blnStillExpired = true;

                if ( ! $blnIsLoaded ) {
                    $objBgsTickModel = ModelsService::BgsTick();
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
                    $objBgsTickModel = ModelsService::BgsTick();
                    $objBgsTickModel->save( $objLastTick );
                    $blnIsLoaded = true;
                }
            }
        }

        if ( $blnIsLoaded )
            $objSession->LastTick = $objLastTick;
    }

    public function isExpired() {
        /** @var \Config\App $objAppConfig */
        $objAppConfig = config( 'App' );
        $objExpiryInterval = new \DateInterval( 'P' . $objAppConfig->TickExpiryPeriod . 'S' );
        $objExpiryInterval->invert = 1;
        $objExpiresOn = ( new \DateTime() )->add( $objExpiryInterval );
        return $this->occuredOn < $objExpiresOn;
    }

    public function isCheckExpired() {
        /** @var \Config\App $objAppConfig */
        $objAppConfig = config( 'App' );
        $objCheckExpiryInterval = new \DateInterval( 'P' . $objAppConfig->TickCheckExpiryPeriod. 'S' );
        $objCheckExpiryInterval->invert = 1;
        $objCheckExpiresOn = ( new \DateTime() )->add( $objCheckExpiryInterval );
        return $this->lastCheckOn < $objCheckExpiresOn;
    }
}
