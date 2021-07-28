<?php
namespace App\Models\Base;

use App\Entities\Base\BaseEntity;
use CodeIgniter\Model;
use CodeIgniter\Entity\Entity;

/**
 *
 * @author Jan Zelenka <jan.zelenka@telenet.be>
 *
 */
class BaseModel extends Model
{
    public function findEntity (
            $key
            , $value = null
            ): ?Entity
    {
        if ( empty( $this->returnType ) ) {
            return null;
        }

        if ( ! is_array( $key ) )
        {
            $key = [$key => $value];
        }

        $objEntity = $this
        ->where( $key )
        ->first();

        if ( is_null( $objEntity ) ) {
            $objEntity = new $this->returnType( $key );
        }

        return $objEntity;
    }

    public function newFromResultRow (
            array $arrRow
            , string $strFieldPrefix
            , string $strExternalKey
            , ?array $arrLoadedEntities = null
            ): ?BaseEntity
    {
        $varId = $arrRow[ $strFieldPrefix . $strExternalKey ];

        if ( empty( $varId ) ) {
            return null;
        }

        /** @var Entity $objEntity */
        $objEntity = new $this->returnType();
        $objEntity->fillFromResultRow(
                $arrRow
                , $strFieldPrefix
                );

        if ( ! is_null( $arrLoadedEntities ) ) {
            $arrLoadedEntities[ $varId ] = $objEntity;
        }

        return $objEntity;
    }

    public function save($data): bool {
        if (empty($data))
        {
            return true;
        }

        if ($this->shouldUpdate($data))
        {
            $response = $this->update($this->getIdValue($data), $data);
        }
        else
        {
            $response = $this->insert($data, true);

            if ($response !== false)
            {
                if (
                        $data instanceof Entity
                         &&
                        ! empty( $this->primaryKey )
                        )
                {
                    $data->{$this->primaryKey} = $response;
                }

                $response = true;
            }
        }

        return $response;
    }
}

