<?php
namespace app\Libraries\BgsCatalogue;

use app\Entities\BgsTick;

/**
 *
 * @author Jan Zelenka <jan.zelenka@telenet.be>
 *
 */
interface BgsCatalogueInterface
{
    public function getLastTick ( BgsTick $objBgsTick );
}

