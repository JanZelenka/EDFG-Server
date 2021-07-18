<?php
namespace App\Libraries\StarSystemCatalogue;

use App\Entities\StarSystem;

/**
 *
 * @author Jan Zelenka <jan.zelenka@telenet.be>
 *
 */
interface StarSystemCatalogueInterface
{
    /**
     * @return StarSystem[]
     * @param array $arrParams
     */
    public function getStarSystems ( array $arrParams ) : array;
}
