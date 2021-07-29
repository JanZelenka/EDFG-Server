<?php
namespace App\Libraries\MinorFactionCatalogue;

/**
 *
 * @author Jan Zelenka <jan.zelenka@clickworks.eu>
 *
 */
interface MinorFactionCatalogueInterface
{
    /**
     *
     * @param array|\App\Entities\MinorFaction $MinorFaction
     * @return bool
     */
    public function getMinorFaction ( $MinorFaction ): bool;

    /**
     *
     * @param array|\App\Entities\MinorFaction $objMinorFaction
     * @return bool
     */
    public function getPresence ( $MinorFaction ): bool;
}

