<?php

namespace App\Controllers;

use App\Entities\MinorFaction as Entity;
use App\Models\MinorFaction as Model;

class MinorFaction extends Base\TickSensitive
{
    public function index ( string $minor_faction_id = null ) {
        /**
         * @var \App\Entities\MinorFaction $objEntity
         */

        $objEntity = model( Model::class )->findEntity(
                'name'
                , $minor_faction_id
                );

        $objEntity->findPresence();
        $objEntity->synchronize();
        return view('welcome_message');
    }

    public function updatePresence( string $strName = null )
	{
	    return view('welcome_message');
	}
}
