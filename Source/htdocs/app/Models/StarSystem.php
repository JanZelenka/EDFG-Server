<?php

namespace app\Models;

use CodeIgniter\Model;

/**
 *
 * @author Jan Zelenka <jan.zelenka@telenet.be>
 *
 */
class StarSystem extends Model {
    protected $table = 'auth_logins';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'coordX'
        , 'coordY'
        , 'coordZ'
        , 'zzzCreatedBy'
        , 'zzzModifiedBy'
        ];
    }
