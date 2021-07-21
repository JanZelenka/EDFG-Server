<?php
namespace App\Libraries\BgsCatalogue;

use Config\Services;
use App\Entities\BgsTick;
use CodeIgniter\I18n\Time;
/**
 *
 * @author Jan Zelenka <jan.zelenka@clickworks.eu>
 *
 */
class EliteBGS implements BgsCatalogueInterface
{

    /**
     * (non-PHPdoc)
     *
     * @see \App\Libraries\BgsCatalogue\BgsCatalogueInterface::getLastTick()
     */
    public function getLastTick ( BgsTick $objBgsTick ): BgsTick {
        /** @var \Config\EliteBGS $objConfig */
        $objConfig = config( 'EliteBGS');
        $objClient = Services::curlrequest();
        $objResponse = $objClient->request(
                'GET'
                , $objConfig->strUrlRoot . 'ticks'
                );

        if ( $objResponse->getStatusCode() < 300 ) {
            $objResponseBody = json_decode( $objResponse->getBody());

            if ( $objResponseBody[0]->_id !== $objBgsTick->ebgsId ) {
                $objOccuredOn = Time::createFromFormat(
                        $objConfig->strTimeFormat
                        , $objResponseBody[0]->time
                        , $objConfig->strTimeZone
                        );
                $objBgsTick = new BgsTick(
                        $objResponseBody[0]->_id
                        , $objOccuredOn
                        );
            }

            $objBgsTick->lastCheckOn = Time::now();
        }

        return $objBgsTick;
    }
}
