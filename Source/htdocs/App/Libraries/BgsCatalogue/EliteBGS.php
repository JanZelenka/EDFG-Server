<?php
namespace App\Libraries\BgsCatalogue;

use Config\Services;
use App\Entities\BgsTick;
use App\Libraries\EliteBGS as EliteBGSBase;
use CodeIgniter\I18n\Time;
use App;
/**
 *
 * @author Jan Zelenka <jan.zelenka@clickworks.eu>
 *
 */
class EliteBGS
    extends EliteBGSBase
    implements BgsCatalogueInterface
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
            $arrData = json_decode(
                    $objResponse->getBody()
                    , true
                    );

            if ( $arrData[ 0 ][ '_id' ] !== $objBgsTick->ebgsId ) {
                $objBgsTick->
                $objOccuredOn = $this->getTime( $arrData[ 0 ][ 'time' ] );
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
