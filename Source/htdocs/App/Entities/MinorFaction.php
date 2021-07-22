<?php
namespace App\Entities;


/**
 *
 * @author Jan Zelenka <jan.zelenka@clickworks.eu>
 *
 * @property int id
 * @property string ebgsId
 * @property string eddbId
 * @property string allegiance
 * @property string government
 * @property string name
 * @property CodeIgniter\I18n\Time updatedOn
 */
class MinorFaction extends Base\ExternalEntity
{
    protected $dates = [
            'updatedOn'
    ];
    public array $arrMinorFactionPresence = array();

}

