<?php
namespace app\Libraries\MinorFactionCatalogue;

use app\Entities\MinorFaction;
use app\Entities\MinorFactionPresence;

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
     * @param \app\Entities\MinorFaction $objMinorFaction
     * @return \app\Entities\MinorFaction
     */
    public function getMinorFaction (
            array $arrParams
            , MinorFaction $objMinorFaction = null
            ): MinorFaction;

    /**
     *
     * @param array $arrParams
     * @param \app\Entities\MinorFactionPresence[] $arrMinorFactionPresence
     * @return \app\Entities\MinorFactionPresence[]
     */
    public function getMinorFactionPresence(
            array $arrParams
            , array $arrMinorFactionPresence = null
            ): MinorFactionPresence;
}

