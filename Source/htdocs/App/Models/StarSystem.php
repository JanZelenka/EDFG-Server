<?php

namespace App\Models;

use App\Entities\StarSystem as StarSystemEntity;

/**
 *
 * @author Jan Zelenka <jan.zelenka@telenet.be>
 *
 */
class StarSystem extends StampedModel {
    protected $table = 'star_system';
    protected $primaryKey = 'id';
    protected $returnType = StarSystemEntity::class;
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'id'
        , 'coordX'
        , 'coordY'
        , 'coordZ'
        , 'name'
        ];
    }
