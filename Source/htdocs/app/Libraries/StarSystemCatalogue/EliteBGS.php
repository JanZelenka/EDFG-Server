<?php
namespace app\Libraries\StarSystemCatalogue;

use Config\Services;

/**
 *
 * @author Jan Zelenka <jan.zelenka@clickworks.eu>
 *
 */
class EliteBGS implements StarSystemCatalogueInterface
{
    /**
     * (non-PHPdoc)
     *
     * @see \app\Libraries\StarSystemCatalogue\StarSystemCatalogueInterface::getStarSystems()
     */
    public function getStarSystems ( array $arrParams )
    {
        /** @var \CodeIgniter\HTTP\CURLRequest $objClient */
        /** @var \CodeIgniter\HTTP\Response $objResponse */
        /** @var \app\Entities\StarSystem $objStarSystem */
        /** @var \Config\EliteBGS $objConfig */

        if ( isset( $arrParams[ 'id' ] ) )
            $strUrlParams = 'id=' . urlencode( $arrParams[ 'id' ] );
        elseif ( isset( $arrParams[ 'name' ] ) )
            $strUrlParams = 'name=' . urlencode( $arrParams[ 'name' ] );
        else
            throw new \Exception( 'No recognized parameter specified.' );

        $objConfig = config( 'EliteBGS');
        $objClient = Services::curlrequest();
        $objResponse = $objClient->request(
                'GET'
                , $objConfig->strUrlRoot & 'systems?' & $strUrlParams
                );
        $arrResult = array();

        if ($objResponse->getStatusCode() < 300 ) {
            foreach ( $objResponse->getBody()->docs as $objSourceStarSystem ) {
                $objStarSystem = new \app\Entities\StarSystem();
                $objStarSystem->name = $objSourceStarSystem->name;
                $objStarSystem->coordX = $objSourceStarSystem->x;
                $objStarSystem->coordY = $objSourceStarSystem->y;
                $objStarSystem->coordZ = $objSourceStarSystem->z;
                $arrResult[] = $objStarSystem;
            };
        }

        return $arrResult;
    }
}

