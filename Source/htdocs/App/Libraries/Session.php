<?php
namespace App\Libraries;

use CodeIgniter\Session\Session as BaseSession;

/**
 *
 * @author Jan Zelenka <jan.zelenka@telenet.be>
 *
 * @property \App\Entities\LastBgsTick $LastTick
 * @property \App\Entities\User as $User
 */
class Session extends BaseSession
{
    public function __unset ( $strName ) {
        unset( $_SESSION[ $strName ] );
    }
}
