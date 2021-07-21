<?php
namespace App\Libraries\MinorFactionCatalogue;

use App\Entities\MinorFaction;
use App\Entities\MinorFactionPresence;

/**
 *
 * @author Jan Zelenka <jan.zelenka@clickworks.eu>
 *
 */
interface MinorFactionCatalogueInterface
{
    /**
     *
     * @param \App\Entities\MinorFaction $objMinorFaction
     * @return bool
     */
    public function getMinorFaction ( MinorFaction $objMinorFaction ): bool;

    /**
     *
     * @param \App\Entities\MinorFaction $objMinorFaction
     * @return bool
     */
    public function getMinorFactionPresence( MinorFaction $objMinorFaction ): bool;
}

