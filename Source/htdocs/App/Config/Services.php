<?php

namespace Config;

use CodeIgniter\Config\BaseService;
use App\Libraries\BgsCatalogue;
use App\Libraries\MinorFactionCatalogue;
use App\Libraries\StarSystemCatalogue;
use App\Libraries\Session;

/**
 * Services Configuration file.
 *
 * Services are simply other classes/libraries that the system uses
 * to do its job. This is used by CodeIgniter to allow the core of the
 * framework to be swapped out easily without affecting the usage within
 * the rest of your application.
 *
 * This file holds any application-specific services, or service overrides
 * that you might need. An example has been included with the general
 * method format you should use for your service methods. For more examples,
 * see the core Services file at system/Config/Services.php.
 */
class Services extends BaseService
{
	// public static function example($getShared = true)
	// {
	//     if ($getShared)
	//     {
	//         return static::getSharedInstance('example');
	//     }
	//
	//     return new \CodeIgniter\Example();
	// }

	public static function bgsCatalogue ( $blnGetShared = true ): BgsCatalogue\BgsCatalogueInterface {
	    if ( $blnGetShared )
	        return static::getSharedInstance( 'bgsCatalogue' );

        /** @var \Config\App $objAppConfig */
        $objAppConfig = config( 'App' );
        $strClassName = $objAppConfig->BgsCatalogue;
        return new $strClassName();
	}
	/**
	 *
	 * @param boolean $blnGetShared
	 * @return \App\Libraries\MinorFactionCatalogue\MinorFactionCatalogueInterface
	 */
	public static function minorFactionCatalogue ( $blnGetShared = true ): MinorFactionCatalogue\MinorFactionCatalogueInterface {
	    if ( $blnGetShared )
	        return static::getSharedInstance( 'minorFactionCatalogue' );

        /** @var \Config\App $objAppConfig */
        $objAppConfig = config( 'App' );
        $strClassName = $objAppConfig->MinorFactionCatalogue;
        return new $strClassName();
}


	/**
	 *
	 * @param boolean $blnGetShared
	 * @return \App\Libraries\StarSystemCatalogue\StarSystemCatalogueInterface
	 */
    public static function starCatalogue ( $blnGetShared = true ): StarSystemCatalogue\StarSystemCatalogueInterface {
        if ( $blnGetShared )
            return static::getSharedInstance( 'starCatalogue' );

        /** @var \Config\App $objAppConfig */
        $objAppConfig = config( 'App' );
        $strClassName = $objAppConfig->StarSystemCatalogue;
        return new $strClassName();
}

    public static function session(
            App $config = null
            , bool $getShared = true
            ): Session
    {
        if ($getShared)
        {
            return static::getSharedInstance('session', $config);
        }

        $config = $config ?? config('App');
        $logger = self::logger();

        $driverName = $config->sessionDriver;
        $driver     = new $driverName($config, self::request()->getIPAddress());
        $driver->setLogger($logger);

        $session = new Session($driver, $config);
        $session->setLogger($logger);

        if (session_status() === PHP_SESSION_NONE)
        {
            $session->start();
        }

        return $session;
    }

}
