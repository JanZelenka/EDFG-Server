<?php
namespace App\Models;

use App\Entities\BgsTick as Entity;

/**
 *
 * @author Jan Zelenka <jan.zelenka@telenet.be>
 *
 */
class BgsTick extends Base\StampedModel
{
    protected $table = 'bgs_tick';
    protected $primaryKey = 'id';
    protected $returnType = Entity::class;
    protected $useSoftDeletes = false;
    protected $allowedFields = [
            'ebgsId'
            , 'lastCheckOn'
            , 'occuredOn'
    ];

    public function GetLastTick(): ?Entity {
        return $this
            ->limit( 1 )
            ->orderBy( 'occuredOn', 'desc' )
            ->first();
    }
}
