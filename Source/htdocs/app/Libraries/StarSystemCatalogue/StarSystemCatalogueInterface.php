<?php
namespace app\Libraries\StarSystemCatalogue;

use app\Entities\StarSystem;

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
