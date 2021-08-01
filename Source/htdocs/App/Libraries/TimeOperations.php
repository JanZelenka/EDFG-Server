<?php
namespace App\Libraries;

use CodeIgniter\I18n\Time;

/**
 *
 * @author Jan Zelenka <jan.zelenka@clickworks.eu>
 *
 */
trait TimeOperations
{
    /**
     * returns the datetime string received from the EliteBGS API as Codeigniter Time object.
     * @param string $strTime
     * @return Time
     */
    public static function getTime( string $strTime ): Time {
        /** @var \Config\EliteBGS $objConfig */
        $objConfig = config( 'EliteBGS');
        return Time::createFromFormat(
                $objConfig->strTimeFormat
                , $strTime
                , $objConfig->strTimeZone
                );
    }
}

