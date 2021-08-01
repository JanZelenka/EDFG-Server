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
    public static function getMinorFactionStarSystems ( $MinorFaction ): bool {
        return false;
    }

    /**
     * (non-PHPdoc)
     *
     * @see \App\Libraries\StarSystemCatalogue\StarSystemCatalogueInterface::getStarSystems()
     */
    public static function getStarSystem ( StarSystem $objStarSystem ): bool
    {
        /** @var \Config\EDStarMap $objConfig */
        /** @var \CodeIgniter\HTTP\CURLRequest $objClient */
        /** @var \CodeIgniter\HTTP\Response $objResponse */

        $strName = $objStarSystem->name;

        if ( empty( $strName ) ) {
            throw new \Exception( 'Parameter \'name\' is missing.' );
        }

        $strURLParams = '?showPrimaryStar=1&systemName=' . urlencode( $strName );

        $objConfig = config( 'EDStarMap');
        $objClient = Services::curlrequest();
        $objResponse = $objClient->request(
                'GET'
                , $objConfig->strUrlRoot . 'systems' . $strURLParams
                );

        if ($objResponse->getStatusCode() < 300 ) {
            $arrData = json_decode(
                    $objResponse->getBody()
                    , true
                    );
            $arrPrimaryStar = $arrData[ 0 ][ 'primaryStar' ];
            $objStarSystem->mainStarClass = $arrPrimaryStar[ 'type'];
            $objStarSystem->mainStarIsScoopable = $arrPrimaryStar[ 'isScoopable' ];
        } else {
            return false;
        }

        return true;
    }
}
