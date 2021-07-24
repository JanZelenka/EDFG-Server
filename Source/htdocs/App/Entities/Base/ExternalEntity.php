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
    public static string $externalIdColumn = 'ebgsId';
    public static string $externalIdDataKey = '_id';
}

