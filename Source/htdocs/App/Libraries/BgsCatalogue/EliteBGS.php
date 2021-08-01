<?php
namespace App\Libraries\BgsCatalogue;

use Config\Services;
use App\Entities\BgsTick;
use App\Libraries\TimeOperations;
use CodeIgniter\I18n\Time;
use App;
/**
 *
 * @author Jan Zelenka <jan.zelenka@clickworks.eu>
 *
 */
class EliteBGS
    implements BgsCatalogueInterface
{
    use TimeOperations;

    /**
     * (non-PHPdoc)
     *
     * @see \App\Libraries\BgsCatalogue\BgsCatalogueInterface::getLastTick()
     */
    public static function getLastTick ( BgsTick $objBgsTick ): BgsTick {
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
            $arrTickData = $arrData[ 0 ];

            if ( $arrTickData[ '_id' ] !== $objBgsTick->ebgsId ) {
                $objBgsTick = new BgsTick( [
                        'ebgsId' => $arrTickData[ '_id' ]
                        , 'updatedOn' => self::getTime( $arrTickData[ 'time' ] )
                        ] );
            }

            $objBgsTick->lastCheckOn = Time::now();
        }

        return $objBgsTick;
    }
}
