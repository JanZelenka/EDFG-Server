<?php
namespace app\Libraries\StarCatalogue;

use app\Entities\StarSystem as StarSystemEntity;

/**
 *
 * @author Jan Zelenka <jan.zelenka@clickworks.eu>
 *
 */
interface StarCatalogueInterface
{
    /**
     * @return StarSystemEntity[]
     * @param string§ $strStarName
     */
    public function getStars( $systemName ) : array;
}

