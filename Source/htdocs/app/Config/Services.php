<?php

namespace Config;

use CodeIgniter\Config\BaseService;
use app\Libraries\MinorFactionCatalogue;
use app\Libraries\StarSystemCatalogue;

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

	/**
	 *
	 * @param boolean $blnGetShared
	 * @return \app\Libraries\MinorFactionCatalogue\MinorFactionCatalogueInterface
	 */
	public function minorFactionCatalogue ( $blnGetShared = true ): MinorFactionCatalogue\MinorFactionCatalogueInterface {
	    if ( $blnGetShared )
	        return static::getSharedInstance( 'minorFactionCatalogue' );

	        return new MinorFactionCatalogue\EliteBGS();
	}


	/**
	 *
	 * @param boolean $blnGetShared
	 * @return \app\Libraries\StarSystemCatalogue\StarSystemCatalogueInterface
	 */
    public static function starCatalogue ( $blnGetShared = true ): StarSystemCatalogue\StarSystemCatalogueInterface {
        if ( $blnGetShared )
            return static::getSharedInstance( 'starCatalogue' );

        return new StarSystemCatalogue\EDStarMap();
    }
}
