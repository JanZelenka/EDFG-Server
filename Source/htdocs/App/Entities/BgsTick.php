<?php
namespace App\Entities;


use App\Models\BgsTick as Model;
use CodeIgniter\I18n\Time;

/**
 *
 * @author Jan Zelenka <jan.zelenka@telenet.be>
 *
 * @property string ebgsId
 */
class BgsTick extends Base\External
{
    public static function refreshTick() {
        /** @var Model $objModel */
        $objModel = model( Model::class );
        $objLastTick = $objModel->GetLastTick();

        if ( $objLastTick->canSynchronize() ) {
            /** @var \Config\App $objAppConfig */
            $objAppConfig = config( 'App' );
            $objBgsCatalogue = new $objAppConfig->BgsCatalogue();
            $objLastTick = $objBgsCatalogue->getLastTick( $objLastTick );
            $objModel->save( $objLastTick );
        }
    }

    protected function isExpired( int $intExpiryPeriod ) {
        if ( empty ( $this->updatedOn ) ) {
            return true;
        }

        $objExpiryInterval = new \DateInterval( 'PT' . $intExpiryPeriod . 'S' );
        $objExpiryInterval->invert = 1;
        $objExpiresOn = Time::now()->add( $objExpiryInterval );
        return $this->updatedOn < $objExpiresOn;
    }

    public  function canSynchronize(): bool{
        /** @var \Config\App $objAppConfig */
        $objAppConfig = config( 'App' );
        return
            $this->isExpired( $objAppConfig->TickExpiryPeriod )
             ||
            (
                $this->isExpired( $objAppConfig->TickSafetyExpiry )
                 &&
                $this->isCheckExpired()
                );
    }
}
