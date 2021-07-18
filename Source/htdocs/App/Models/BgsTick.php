<?php
namespace App\Models;
use App\Entities\BgsTick as BgsTickEntity;

/**
 *
 * @author Jan Zelenka <jan.zelenka@telenet.be>
 *
 */
class BgsTick extends Base\StampedModel
{
    protected $table = 'bgs_tick';
    protected $primaryKey = 'id';
    protected $returnType = BgsTickEntity::class;
    protected $useSoftDeletes = false;
    protected $allowedFields = [
            'ebgsId'
            , 'lastCheckOn'
            , 'occuredOn'
    ];

    public function GetLastTick(): ?BgsTickEntity {
        return $this
            ->limit( 1 )
            ->orderBy( 'occuredOn', 'desc' )
            ->first();
    }
}
