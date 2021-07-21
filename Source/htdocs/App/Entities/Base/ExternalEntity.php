<?php
namespace App\Entities\Base;
use CodeIgniter\Entity\Entity;

/**
 *
 * @author Jan Zelenka <jan.zelenka@telenet.be>
 *
 */
class ExternalEntity extends Entity
{
    public static string $strExternalIdColumn = 'ebgsId';
    public static string $strExternalIdRef = '_id';
}

