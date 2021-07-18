<?php
namespace App\Libraries\BgsCatalogue;

use App\Entities\BgsTick;

/**
 *
 * @author Jan Zelenka <jan.zelenka@telenet.be>
 *
 */
interface BgsCatalogueInterface
{
    public function getLastTick ( BgsTick $objBgsTick ): BgsTick;
}

