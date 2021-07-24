<?php

namespace App\Models\Base;

use Config\Services;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Validation\ValidationInterface;

/**
 *
 * @author Jan Zelenka <jan.zelenka@telenet.be>
 *
 */
class StampedModel extends BaseModel {
    /**
     *
     */
    public function __construct(
            ConnectionInterface &$db = null
            , ValidationInterface $validation = null
            )
    {
        parent::__construct();
        $this->allowedFields[] = 'zzzCreatedBy';
        $this->allowedFields[] = 'zzzModifiedBy';
    }

    /**
     *
     * {@inheritDoc}
     * @see \CodeIgniter\Model::insert()
     */
    public function insert(
            $data = null
            , bool $returnId = true
            )
    {
        $objSession = Services::session();
        $objUser = $objSession->User;

        if ( ! is_null( $objUser ) ) {
            if ( is_object( $data ) )
                $data->zzzCreatedBy = $objUser->username;
            elseif ( is_array( $data ) )
                $data[ 'zzzCreatedBy' ] = $objUser->username;
        }

        return parent::insert(
                $data
                , $returnId
                );
    }

    /**
     *
     * {@inheritDoc}
     * @see \CodeIgniter\Model::update()
     */
    public function update(
            $id = null
            , $data = null
            ): bool
    {
        $objSession = Services::session();
        $objUser = $objSession->User;

        if ( ! is_null( $objUser ) ) {
            if ( is_object( $data ) )
                $data->zzzModifiedBy = $objUser->username;
            elseif ( is_array( $data ) )
                $data[ 'zzzModifiedBy' ] = $objUser->username;
        }

        return parent::update(
                $id
                , $data
                );
    }
}

