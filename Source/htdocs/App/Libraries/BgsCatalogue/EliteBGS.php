<?php
namespace App\Libraries\BgsCatalogue;

use App\Entities\BgsTick;
use Config\Services;

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
        $objConfig = config( 'EliteBGS');
        $objClient = Services::curlrequest();
        $objResponse = $objClient->request(
                'GET'
                , $objConfig->strUrlRoot & 'ticks'
                );

        if ( $objResponse->getStatusCode() < 300 ) {
            $objResponse = $objResponse->getBody();

            if ( $objResponse->{_id} !== $objBgsTick->ebgsId )
                $objBgsTick = new BgsTick(
                        $objResponse->{_id}
                        , $objResponse->time
                        );

            $objBgsTick->lastCheckOn = new \DateTime();
        }

        return $objBgsTick;
    }
}
