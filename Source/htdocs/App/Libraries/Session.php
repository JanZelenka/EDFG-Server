<?php
namespace App\Libraries;

use App\Entities;
use CodeIgniter\Session\Session as BaseSession;

/**
 *
 * @author Jan Zelenka <jan.zelenka@telenet.be>
 *
 * @property Entities\LastBgsTick $LastTick
 * @property Entities\User as $User
 */
class Session extends BaseSession
{
    public function __unset ( $strName ) {
        unset( $_SESSION[ $strName ] );
    }
}
