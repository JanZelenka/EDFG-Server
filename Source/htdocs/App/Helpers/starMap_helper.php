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

if ( ! function_exists ( 'starSystemClassColor' ) ) {
    function starSystemClassColor ( string $strStarClass ): string {
        return \App\Entities\StarSystem::STAR_CLASS_COLORS[ $strStarClass ];
    }
}

if ( ! function_exists ( 'starSystemInfluenceColor' ) ) {
    function starSystemInfluenceColor ( float $fltInfluence ): string {
        return ( 1 - $fltInfluence ) . ' ' . $fltInfluence . ' 0';
    }
}

if ( ! function_exists ( 'starSystemSecurityColor' ) ) {
    function starSystemSecurityColor ( string $strSecurity ): string {
        return \App\Entities\StarSystem::SECURITY_COLORS[ $strSecurity ];
    }
}
