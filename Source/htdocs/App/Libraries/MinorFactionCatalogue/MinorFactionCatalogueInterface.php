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
     * @param array $arrParams
     * @param \App\Entities\MinorFaction $objMinorFaction
     * @return \App\Entities\MinorFaction
     */
    public function getMinorFaction (
            array $arrParams
            , MinorFaction $objMinorFaction = null
            ): MinorFaction;

    /**
     *
     * @param array $arrParams
     * @param \App\Entities\MinorFactionPresence[] $arrMinorFactionPresence
     * @return \App\Entities\MinorFactionPresence[]
     */
    public function getMinorFactionPresence(
            array $arrParams
            , array $arrMinorFactionPresence = null
            ): MinorFactionPresence;
}

