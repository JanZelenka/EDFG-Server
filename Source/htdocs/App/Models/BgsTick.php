<?php
namespace App\Models;

use App\Entities\BgsTick as Entity;

/**
 *
 * @author Jan Zelenka <jan.zelenka@telenet.be>
 *
 */
class BgsTick extends Base\ExternalDataModel
{
    protected $table = 'bgs_tick';
    protected $primaryKey = 'id';
    protected $returnType = Entity::class;
    protected $useSoftDeletes = false;
    protected $allowedFields = [
            'ebgsId'
    ];

    protected ?Entity $LastBgsTick = null;

    public function GetLastTick(): Entity {
        return
            $this->LastBgsTick
            ?? $this->LastBgsTick = $this
                ->limit( 1 )
                ->orderBy( 'occuredOn', 'desc' )
                ->first()
            ?? $this->LastBgsTick = new Entity();
    }
}
