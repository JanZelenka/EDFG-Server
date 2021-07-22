<?php

namespace App\Controllers;

use App\Entities\MinorFaction as MinorFactionEntity;
use App\Models\MinorFaction as MinorFactionModel;

class MinorFaction extends Base\TickSensitive
{
    public function index ( string $minor_faction_id = null ) {
        /** @var \Config\App $objAppConfig */
        $objAppConfig = config( 'App' );
        $objMinorFactionEntity = new MinorFactionEntity();
        $objMinorFactionEntity->name = $minor_faction_id;
        /** @var \App\Libraries\MinorFactionCatalogue\MinorFactionCatalogueInterface $objMinorFactionCatalogue */
        $objMinorFactionCatalogue = new $objAppConfig->MinorFactionCatalogue;
        $objMinorFactionCatalogue->getMinorFaction( $objMinorFactionEntity );
        $objMinorFactionCatalogue->getMinorFactionPresence( $objMinorFactionEntity );
        /** @var MinorFactionModel $objMinorFactionModel */
        $objMinorFactionModel = model( MinorFactionModel::class );
        $objMinorFactionModel->save( $objMinorFactionEntity );
        return view('welcome_message');
    }

    public function updatePresence( string $strName = null )
	{
	    return view('welcome_message');
	}
}
