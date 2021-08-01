<?php
namespace App\Entities;


use App;

/**
 *
 * @author Jan Zelenka <jan.zelenka@clickworks.eu>
 *
 * @property string ebgsSystemId
 * @property float influence
 * @property int minorFactionId
 * @property int starSystemId
 * @property CodeIgniter\I18n\Time updatedOn
 *
 */
class MinorFactionPresence extends Base\External
{
    /** @var ?App\Entities\StarSystem $StarSystem */
    public ?StarSystem $StarSystem = null;
}

