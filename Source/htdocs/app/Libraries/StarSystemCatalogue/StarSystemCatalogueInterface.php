<?php
namespace app\Libraries\StarSystemCatalogue;

use app\Entities\StarSystem as StarSystemEntity;

/**
 *
 * @author Jan Zelenka <jan.zelenka@clickworks.eu>
 *
 */
interface StarSystemCatalogueInterface
{
    /**
     * @return StarSystemEntity[]
     * @param array $arrParams
     */
    public function getStarSystems ( array $arrParams ) : array;
}
