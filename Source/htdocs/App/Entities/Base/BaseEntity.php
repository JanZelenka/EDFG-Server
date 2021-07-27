<?php
namespace App\Entities\Base;

use CodeIgniter\Entity\Entity;

/**
 *
 * @author Jan Zelenka <jan.zelenka@telenet.be>
 *
 * @property int id
 * @property string zzzCreatedBy
 * @property \CodeIgniter\I18n\Time zzzCreatedOn
 * @property string zzzModifiedBy
 * @property \CodeIgniter\I18n\Time zzzModifiedOn
 */
class BaseEntity extends Entity
{
    public function __construct ( array $data = null ) {
        parent::__construct( $data );
        $this->dates[] = 'zzzCreatedOn';
        $this->dates[] = 'zzzModifiedOn';
    }
}
