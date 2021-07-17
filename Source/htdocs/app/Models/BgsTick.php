<?php
namespace app\Models;
use app\Entities\BgsTick as BgsTickEntity;

/**
 *
 * @author Jan Zelenka <jan.zelenka@telenet.be>
 *
 */
class BgsTick extends StampedModel
{
    protected $table = 'bgs_tick';
    protected $primaryKey = 'id';
    protected $returnType = BgsTickEntity::class;
    protected $useSoftDeletes = false;
    protected $allowedFields = [
            'occuredOn'
    ];
}

