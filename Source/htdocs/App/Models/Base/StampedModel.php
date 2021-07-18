<?php

namespace App\Models\Base;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Validation\ValidationInterface;

/**
 *
 * @author Jan Zelenka <jan.zelenka@telenet.be>
 *
 */
class StampedModel extends Model {
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
        if ( is_object( $data ) )
            $data->zzzCreatedBy = $_SESSION[ 'User' ]->username;
        elseif ( is_array( $data ) )
            $data[ 'zzzCreatedBy' ] = $_SESSION[ 'User' ]->username;

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
        if ( is_object( $data ) )
            $data->zzzModifiedBy = $_SESSION[ 'User' ]->username;
        elseif ( is_array( $data ) )
            $data[ 'zzzModifiedBy' ] = $_SESSION[ 'User' ]->username;

        return parent::update(
                $id
                , $data
                );
    }
}

