<?php
namespace app\Libraries\MinorFactionCatalogue;

use app\Entities\MinorFaction as MinorFactionEntity;
/**
 *
 * @author Jan Zelenka <jan.zelenka@clickworks.eu>
 *
 */
interface MinorFactionCatalogueInterface
{
    /**
     *
     * @param array $arrParams
     * @return \app\Entities\MinorFaction
     */
    public function getMinorFaction ( array $arrParams ): MinorFactionEntity;
}

