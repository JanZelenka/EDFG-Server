<?php
namespace App\Libraries\StarSystemCatalogue;

use App\Entities\StarSystem as Entity;

/**
 *
 * @author Jan Zelenka <jan.zelenka@telenet.be>
 *
 */
interface StarSystemCatalogueInterface
{
    /**
     * Gets all the Star Systems for the specified Minor Faction.
     * Links the StarSystem attribute of each Minor Faction Presence Entity with the obtained data.
     *
     * @param array|\App\Entities\MinorFaction $objMinorFaction
     * @return bool
     */
    public static function getMinorFactionStarSystems ( $MinorFaction ): bool;

    /**
     * Gets Elite BGS Star System data for the specified Star System.
     *
     * @param array|\App\Entities\StarSystem $objEntity
     * @return bool
     */
    public static function getStarSystem ( Entity $StarSystem ) : bool;
}
