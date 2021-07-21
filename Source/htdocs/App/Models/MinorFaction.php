<?php
namespace App\Models;

use App\Entities\MinorFaction as MinorFactionEntity;

/**
 *
 * @author Jan Zelenka <jan.zelenka@clickworks.eu>
 *
 */
class MinorFaction extends Base\StampedModel
{
    protected $table = 'minor_faction';
    protected $primaryKey = 'id';
    protected $returnType = MinorFactionEntity::class;
    protected $useSoftDeletes = false;
    protected $allowedFields = [
            'ebgsId'
            , 'eddbId'
            , 'allegiance'
            , 'government'
            , 'name'
            , 'updatedOn'
    ];

    public function function_name($param) {
        ;
    }
}

