<?php
namespace App\Models;

use App\Entities\MinorFactionPresence as MinorFactionPresenceEntity;

/**
 *
 * @author Jan Zelenka <jan.zelenka@clickworks.eu>
 *
 */
class MinorFactionPresence extends Base\StampedModel
{
    protected $table = 'minor_faction_presence';
    protected $primaryKey = 'id';
    protected $returnType = MinorFactionPresenceEntity::class;
    protected $useSoftDeletes = false;
    protected $allowedFields = [
            'ebgsSystemId'
            , 'influence'
            , 'minorFactionId'
            , 'starSystemId'
            , 'updatedOn'
    ];
}

