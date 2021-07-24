<?php
namespace App\Libraries\StarSystemCatalogue;

use Config\Services;
use App\Entities\StarSystem;

/**
 *
 * @author Jan Zelenka <jan.zelenka@telenet.be>
 *
 */
class EDStarMap implements StarSystemCatalogueInterface
{
    /**
     * (non-PHPdoc)
     *
     * @see \App\Libraries\StarSystemCatalogue\StarSystemCatalogueInterface::getStarSystems()
     */
    public function getStarSystem ( StarSystem $objStarSystem )
    {
        /** @var \Config\EDStarMap $objConfig */
        /** @var \CodeIgniter\HTTP\CURLRequest $objClient */
        /** @var \CodeIgniter\HTTP\Response $objResponse */

        $strName = $objStarSystem->name;

        if ( empty( $strName ) )
            throw new \Exception( 'Parameter \'name\' is missing.' );

        $strURLParams = '?showCoordinates=1&systemName' . urlencode( $strName );

        $objConfig = config( 'EDStarMap');
        $objClient = Services::curlrequest();
        $objResponse = $objClient->request(
                'GET'
                , $objConfig->strBaseURL . 'systems' . $strURLParams
                );

        if ($objResponse->getStatusCode() < 300 ) {
            $objStarSystemData = json_decode( $objResponse->getBody() );
            $objStarSystem->name = $objStarSystemData->name;
            $objStarSystem->coordX = $objStarSystemData->coords->x;
            $objStarSystem->coordY = $objStarSystemData->coords->y;
            $objStarSystem->coordZ = $objStarSystemData->coords->z;
        } else {
            return false;
        }

        return true;
    }
}

