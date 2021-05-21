<?php

namespace app\Models;

use CodeIgniter\Model;

/**
 *
 * @author Jan Zelenka <jan.zelenka@telenet.be>
 *
 */
class SysStampedModel extends Model {
    /**
     *
     */
    public function __construct() {
        $this->allowedFields[] = 'zzzCreatedBy';
        $this->allowedFields[] = 'zzzModifiedBy';
    }

    /**
     *
     * {@inheritDoc}
     * @see \CodeIgniter\Model::insert()
     */
    public function insert(
            $data
            , $returnId
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
            $id
            , $data
            )
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

