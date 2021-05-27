<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
/*
	    $a = new \stdClass();
	    $a->prop = 1;
	    $b = $this->subfn($a);
	    $b->prop = 2;
	    echo $a->prop . '<br>' . $b->prop . '<br>';
*/
	    return view('welcome_message');
	}

	private function subfn ( $param ) {
	    $param->prop = 5;
	    return $param;
	}
}
