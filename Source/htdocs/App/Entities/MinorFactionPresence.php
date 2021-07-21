<?php
namespace App\Entities;

/**
 *
 * @author Jan Zelenka <jan.zelenka@clickworks.eu>
 *
 * @property int id
 * @property string ebgsSystemId
 * @property float influence
 * @property int minorFactionId
 * @property int starSystemId
 * @property CodeIgniter\I18n\Time updatedOn
 *
 */
class MinorFactionPresence extends Base\ExternalEntity
{
    protected $dates = [
            'updatedOn'
    ];
    public static string $strExternalIdColumn = 'ebgsSystemId';
    public static string $strExternalIdRef = 'system_id';
}

