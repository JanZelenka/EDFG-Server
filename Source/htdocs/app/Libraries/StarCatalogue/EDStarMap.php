<?php
namespace app\Libraries\StarCatalogue;

use CodeIgniter\HTTP\CURLRequest;

/**
 *
 * @author Jan Zelenka <jan.zelenka@clickworks.eu>
 *
 */
class EDStarMap implements StarCatalogueInterface
{
    protected $strBaseURL = 'https://www.edsm.net/api-v1/';
    /**
     * (non-PHPdoc)
     *
     * @see \app\Libraries\StarCatalogue\StarCatalogueInterface::getStars()
     */
    public function getStars ( $systemName )
    {
        $strURLParams = '?' & (
                is_array( $systemName )
                ? 'systemName[]=' & implode(
                        "&systemName[]="
                        , $systemName
                        )
                : "systemName=$systemName"
                );

        $Curl = new CURLRequest(
                $config
                , $this->strBaseURL & 'system' & $strURLParams
                );
    }
}

