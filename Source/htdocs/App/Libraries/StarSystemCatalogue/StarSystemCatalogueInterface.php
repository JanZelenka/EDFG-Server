<?php
namespace App\Libraries\StarSystemCatalogue;

use App\Entities\MinorFaction as MinorFactionEntity;
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
     * @param MinorFactionEntity $objMinorFaction
     * @return bool
     */
    public function getMinorFactionStarSystems ( MinorFactionEntity $objMinorFaction ): bool;

    /**
     * Gets Elite BGS Star System data for the specified Star System.
     *
     * @return bool
     * @param Entity $objEntity
     */
    public function getStarSystem ( Entity $objEntity ) : bool;

    /**
     * Defines which Star System attribute is used as the key in other arrays
     * of these objects.
     *
     * @return string
     */
    public function externalKey (): string;
}
