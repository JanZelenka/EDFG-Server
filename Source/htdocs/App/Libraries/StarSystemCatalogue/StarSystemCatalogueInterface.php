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
    public function getStarSystem ( StarSystem $objStarSystem ) : bool;

    /**
     * Defines which Star System attributes are used as key in other entities' arrays
     * of these objects.
     *
     * @var array
     */
    public function starSystemRelationshipMap (): array;
}
