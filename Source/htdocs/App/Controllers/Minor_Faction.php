<?php

namespace App\Controllers;

use App\Models\MinorFaction as Model;

class Minor_Faction extends Base\TickSensitive
{
    public function index ( string $minor_faction_id = null ) {
        return view('welcome_message');
    }

    public function update_presence( string $strName = null )
	{
	    return view('welcome_message');
	}
}
