<?php
namespace App\Libraries\MinorFactionCatalogue;

use App\Entities\MinorFaction as Entity;

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
    public function getMinorFaction ( Entity $objMinorFaction ): bool;

    /**
     *
     * @param \App\Entities\MinorFaction $objMinorFaction
     * @return bool
     */
    public function getPresence( Entity $objMinorFaction ): bool;

    /**
     * Defines which Minor Faction Presence attributes are used as key in other entities' arrays
     * of these objects
     *
     * @var array
     */
    public function presenceRelationshipMap (): array;
}

