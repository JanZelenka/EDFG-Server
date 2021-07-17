<?php
namespace app\Models;

use app\Entities\MinorFactionPresence as MinorFactionPresenceEntity;

/**
 *
 * @author Jan Zelenka <jan.zelenka@clickworks.eu>
 *
 */
class MinorFactionPresence extends StampedModel
{
    protected $table = 'minor_faction_presence';
    protected $primaryKey = 'id';
    protected $returnType = MinorFactionPresenceEntity::class;
    protected $useSoftDeletes = false;
    protected $allowedFields = [
            'id'
            , 'minorFactionId'
            , 'starSystemId'
    ];

    public function function_name($param) {
        ;
    }
}

