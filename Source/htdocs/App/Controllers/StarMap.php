<?php

namespace App\Controllers;

use App\Models\MinorFaction as MinorFactionModel;

class StarMap extends Base\TickSensitive
{

	public function minorFaction ( $identifier ) {
	    /**
	     * @var \App\Entities\MinorFaction $objMinorFaction
	     * @var \App\Entities\MinorFactionPresence $objPresence
	     */

	    $objMinorFaction = model( MinorFactionModel::class )->findMinorFaction(
	            'name'
	            , $identifier
	            );
	    $objMinorFaction->findPresence();
	    $objMinorFaction->synchronize();
	    $arrStarSystems = array();
	    $fltViewPointX = $fltViewPointY = $fltViewPointZ = 0;

	    foreach ( $objMinorFaction->MinorFactionPresence as $objPresence ) {
	        $objPresence->StarSystem->findMinorFactions();
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
}
