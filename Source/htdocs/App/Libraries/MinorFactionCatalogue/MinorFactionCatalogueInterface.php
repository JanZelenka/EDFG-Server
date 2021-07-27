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
     * Defines which Minor Faction Presence attribute is used as the key in arrays of the Entity object.
     *
     * @var array
     */
    public function presenceExternalKey (): string;
}

