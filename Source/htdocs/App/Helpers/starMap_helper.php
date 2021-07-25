<?php
/**
 * @author Jan Zelenka <jan.zelenka@telenet.be>
 * @return string
 */
if ( ! function_exists ('translateCoords' ) ) {
	function translateCoords (
	        $coordX
	        , $coordY
	        , $coordZ
	        ): string {
		return $coordX . ' ' . $coordY . ' ' . $coordZ;
	};
}

if ( ! function_exists ( 'starSystemInfluenceColor' ) ) {
    function starSystemInfluenceColor ( float $fltInfluence ): string {
        return ( 1 - $fltInfluence) . ' ' . $fltInfluence . ' 0';
    }
}