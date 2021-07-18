<?php
namespace App\Models;

use App\Entities\MinorFaction as MinorFactionEntity;

/**
 *
 * @author Jan Zelenka <jan.zelenka@clickworks.eu>
 *
 */
class MinorFaction extends StampedModel
{
    protected $table = 'minor_faction';
    protected $primaryKey = 'id';
    protected $returnType = MinorFactionEntity::class;
    protected $useSoftDeletes = false;
    protected $allowedFields = [
            'id'
            , 'ebgsId'
            , 'name'
    ];

    public function function_name($param) {
        ;
    }
}

