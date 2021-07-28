<?php

namespace App\Controllers;

use App\Models\MinorFaction as MinorFactionModel;
use App\Models\StarSystem as StarSystemModel;

class Star_Map extends Base\TickSensitive
{

	public function show_minor_faction ( $identifier ) {
	    /** @var \App\Entities\MinorFaction $objMinorFaction */
	    $objMinorFaction = model( MinorFactionModel::class )->findEntityStarSystems(
	            'name'
	            , $identifier
	            );
	    $objMinorFaction->synchronize();
	    $arrStarSystems = array();
	    $fltViewPointX = $fltViewPointY = $fltViewPointZ = 0;

	    /** @var \App\Entities\MinorFactionPresence $objPresence */
	    foreach ( $objMinorFaction->MinorFactionPresence as $objPresence ) {
	        $arrStarSystems[ $objPresence->StarSystem->id ] = $objPresence->StarSystem;
	        $fltViewPointX += $objPresence->StarSystem->coordX;
	        $fltViewPointY += $objPresence->StarSystem->coordY;
	        $fltViewPointZ += $objPresence->StarSystem->coordZ;
	    }

	    $intStarSystemCount = count( $arrStarSystems );

	    if ( $intStarSystemCount ) {
	        $fltViewPointX = $fltViewPointX / $intStarSystemCount;
	        $fltViewPointY = $fltViewPointY / $intStarSystemCount;
	        $fltViewPointZ = $fltViewPointZ / $intStarSystemCount;
	    }

	    echo view(
	            'StarMap'
	            , [
	                    'objMinorFaction' => $objMinorFaction
	                    , 'arrStarSystems' => $arrStarSystems
	                    , 'fltViewPointX' => $fltViewPointX
	                    , 'fltViewPointY' => $fltViewPointY
	                    , 'fltViewPointZ' => $fltViewPointZ
        	            ]
	            );
	}

	public function star_system ( $intId ) {
	    /** @var \App\Entities\StarSystem $objStarSystem */
	    $objStarSystem = model( StarSystemModel::class )->findStarSystemEntities(
	            'id'
	            , $intId
	            );
	    $objStarSystem->synchronize();
	}
}
