<?php

namespace App\Models\Base;

use App\Entities\Base\ExternalEntity;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Validation\ValidationInterface;

/**
 *
 * @author Jan Zelenka <jan.zelenka@telenet.be>
 *
 */
class ExternalDataModel extends StampedModel {
    /**
     *
     */
    public function __construct(
            ConnectionInterface &$db = null
            , ValidationInterface $validation = null
            )
    {
        parent::__construct();
        $this->allowedFields[] = 'lastCheckOn';
        $this->allowedFields[] = 'updatedOn';
    }

    public function save ( $data ) {
        if (
                ! $data instanceof ExternalEntity
                 ||
                $data->hasChanged( 'updatedOn' )
                 ||
                $data->hasChanged( 'lastCheckOn' )
                )
        {
            return parent::save( $data );
        } else {
            return true;
        }
    }
}

