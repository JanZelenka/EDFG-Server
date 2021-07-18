<?php
namespace App\Libraries;

use App\Entities\BgsTick;
use CodeIgniter\Session\Session as BaseSession;

/**
 *
 * @author Jan Zelenka <jan.zelenka@telenet.be>
 *
 * @property BgsTick $LastTick
 */
class Session extends BaseSession
{
    public function __unset ( $strName ) {
        unset( $_SESSION[ $strName ] );
    }
}
