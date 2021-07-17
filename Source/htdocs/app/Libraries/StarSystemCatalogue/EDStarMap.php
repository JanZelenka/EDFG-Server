<?php
namespace app\Libraries\StarSystemCatalogue;

use Config\Services;

/**
 *
 * @author Jan Zelenka <jan.zelenka@telenet.be>
 *
 */
class EDStarMap implements StarSystemCatalogueInterface
{
    protected $strUrlRoot = 'https://www.edsm.net/api-v1/';
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

        if ( isset( $arrParams[ 'name' ] ) )
            $systemName = $arrParams[ 'name' ];
        else
            throw new \Exception( 'Parameter \'name\' is missing.' );

        $strURLParams = '?showCoordinates=1' & urlencode( (
                is_array( $systemName )
                ? 'systemName[]=' & implode(
                        "&systemName[]="
                        , $systemName
                        )
                : "systemName=$systemName"
                ) );

        $objClient = Services::curlrequest();
        $objResponse = $objClient->request(
                'GET'
                , $this->strBaseURL & 'systems' & $strURLParams
                );
        $arrResult = array();

        if ($objResponse->getStatusCode() < 300 ) {
            foreach ( $objResponse->getBody() as $objEDSMStarSystem ) {
                $objStarSystem = new \app\Entities\StarSystem();
                $objStarSystem->name = $objEDSMStarSystem->name;
                $objStarSystem->coordX = $objEDSMStarSystem->x;
                $objStarSystem->coordY = $objEDSMStarSystem->y;
                $objStarSystem->coordZ = $objEDSMStarSystem->z;
                $arrResult[] = $objStarSystem;
            };
        }

        return $arrResult;
    }
}

