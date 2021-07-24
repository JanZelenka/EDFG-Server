<?php
namespace App\Libraries\StarSystemCatalogue;

use Config\Services;
use App\Entities\StarSystem;
use App\Libraries\EliteBGS as EliteBGSBase;
use CodeIgniter\I18n\Time;
/**
 *
 * @author Jan Zelenka <jan.zelenka@telenet.be>
 *
 */
class EliteBGS
    extends EliteBGSBase
    implements StarSystemCatalogueInterface
{
    /**
     * (non-PHPdoc)
     *
     * @see \App\Libraries\StarSystemCatalogue\StarSystemCatalogueInterface::getStarSystems()
     */
    public function getStarSystem ( StarSystem $objStarSystem ): bool
    {
        /**
         * @var \CodeIgniter\HTTP\CURLRequest $objClient
         * @var \CodeIgniter\HTTP\Response $objResponse
         * @var \App\Entities\StarSystem $objStarSystem
         * @var \Config\EliteBGS $objConfig
         */

        $strEbgsId = $objStarSystem->ebgsId;

        if ( ! empty( $strEbgsId ) ) {
            $strUrlParams = 'id=' . urlencode( $strEbgsId );
        } else {
            $strName = $objStarSystem->name;

            if ( ! empty( $strName ) ) {
                $strUrlParams = 'name=' . urlencode( $strName );
            } else {
                $intEddbId = $objStarSystem->eddbId;

                if ( ! empty( $intEddbId ) ) {
                    $strUrlParams = 'eddbId=' . urlencode( $strName );
                }
            }
        }

        if ( ! isset ( $strUrlParams ) ) {
            throw new \Exception( 'No recognized parameter specified.' );
        }

        $objConfig = config( 'EliteBGS');
        $objClient = Services::curlrequest();
        $objResponse = $objClient->request(
                'GET'
                , $objConfig->strUrlRoot . 'systems?' . $strUrlParams
                );

        if ($objResponse->getStatusCode() < 300 ) {
            $objStarSystemData = json_decode( $objResponse->getBody() )->docs[0];
            $objStarSystem->id = $objStarSystemData->eddb_id;
            $objStarSystem->name = $objStarSystemData->name;
            $objStarSystem->coordX = $objStarSystemData->x;
            $objStarSystem->coordY = $objStarSystemData->y;
            $objStarSystem->coordZ = $objStarSystemData->z;
            $objStarSystem->ebgsId = $objStarSystemData->_id;
            $objStarSystem->eddbId = $objStarSystemData->eddb_id;
            $objStarSystem->updatedOn = $this->getTime( $objStarSystemData->updated_at );
            $objStarSystem->lastCheckOn = Time::now();
        } else {
            return false;
        }

        return true;
    }
}

