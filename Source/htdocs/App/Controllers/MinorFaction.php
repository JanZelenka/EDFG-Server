<?php

namespace App\Controllers;

use App\Entities\MinorFaction as MinorFactionEntity;
use App\Models\MinorFaction as MinorFactionModel;

class MinorFaction extends Base\TickSensitive
{
    public function index ( string $minor_faction_id = null ) {
        /**
         * @var \Config\App $objAppConfig
         * @var \App\Entities\MinorFaction $objMinorFactionEntity
         */
        $objAppConfig = config( 'App' );
        $objMinorFactionEntity = model( MinorFactionModel::class )
            ->where(
                    'name'
                    , $minor_faction_id
                    )
            ->first();

        if ( is_null( $objMinorFactionEntity ) ) {
            $objMinorFactionEntity = new MinorFactionEntity( ['name' => $minor_faction_id] );
        }

        $objMinorFactionEntity->synchronize();
        return view('welcome_message');
    }

    public function updatePresence( string $strName = null )
	{
	    return view('welcome_message');
	}
}
