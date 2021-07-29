<?php

namespace App\Models\Base;

use App\Entities\Base\External as ExternalEntity;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Validation\ValidationInterface;

/**
 *
 * @author Jan Zelenka <jan.zelenka@telenet.be>
 *
 */
class ExternalData extends Stamped {
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

    public function save ( $data = null ): bool {
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

