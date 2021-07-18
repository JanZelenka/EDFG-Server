<?php
namespace App\Models;

use App\Controllers\MinorFaction;

/**
 *
 * @author Jan Zelenka <jan.zelenka@telenet.be>
 *
 */
final class ModelsService
{
    static private BgsTick $BgsTick;
    static private MinorFaction $MinorFaction;
    static private MinorFactionPresence $MinorFactionPresence;
    static private StarSystem $StarSystem;

    static function BgsTick(): BgsTick{
        if ( ! isset( self::$BgsTick) ) {
            self::$BgsTick = new BgsTick();
        }

        return self::$BgsTick;
    }

    /**
     *
     * @return MinorFaction
     */
    static function MinorFaction(): MinorFaction {
        if ( ! isset( self::$MinorFaction ) ) {
            self::$MinorFaction = new MinorFaction();
        }

        return self::$MinorFaction;
    }

    /**
     *
     * @return MinorFactionPresence
     */
    static function MinorFactionPresence(): MinorFactionPresence {
        if ( ! isset( self::$MinorFactionPresence ) ) {
            self::$MinorFactionPresence = new MinorFactionPresence();
        }

        return self::$MinorFactionPresence;
    }

    static function StarSystem(): StarSystem {
        if ( ! isset( self::$StarSystem ) ) {
            self::$StarSystem = new StarSystem();
        }

        return self::$StarSystem;
    }
}
