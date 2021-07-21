<?php

namespace App\Controllers;

use App\Entities\MinorFaction as MinorFactionEntity;

class MinorFaction extends Base\TickSensitive
{
    public function index ( string $minor_faction_id = null ) {
        /** @var \Config\App $objAppConfig */
        $objAppConfig = config( 'App' );
        $objMinorFaction = new MinorFactionEntity();
        $objMinorFaction->name = $minor_faction_id;
        /** @var \App\Libraries\MinorFactionCatalogue\MinorFactionCatalogueInterface $objMinorFactionCatalogue */
        $objMinorFactionCatalogue = new $objAppConfig->MinorFactionCatalogue;
        $objMinorFactionCatalogue->getMinorFaction( $objMinorFaction );
        $objMinorFactionCatalogue->getMinorFactionPresence( $objMinorFaction );
        return view('welcome_message');
    }

    public function updatePresence( string $strName = null )
	{
	    return view('welcome_message');
	}
}
