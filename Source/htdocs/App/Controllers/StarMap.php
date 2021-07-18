<?php

namespace App\Controllers;

class StarMap extends Base\TickSensitive
{
	/**
	 *
	 * @param int $intFactionID
	 */
	public function faction( $intFactionID ) {
		;
	}

	public function index()
	{
		return view('welcome_message');
	}
}
