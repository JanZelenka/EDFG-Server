<?php

namespace App\Controllers;

class MinorFaction extends Base\TickSensitive
{
    public function index ( string $strMinorFactionId ) {
        return view('welcome_message');
    }

    public function updatePresence( string $strName = null )
	{
	    return view('welcome_message');
	}
}
