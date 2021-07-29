<?php
namespace App\Models\Base;

use App\Entities\Base\Base as BaseEntity;
use CodeIgniter\Model as SystemModel;
use CodeIgniter\Entity\Entity as SystemEntity;

/**
 *
 * @author Jan Zelenka <jan.zelenka@telenet.be>
 *
 */
class Base extends SystemModel
{
    public function findEntity (
            $key
            , $value = null
            ): ?SystemEntity
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
            , ?string $strExternalKey = null
            , ?array $arrLoadedEntities = null
            ): ?BaseEntity
    {
        if ( ! is_null( $arrLoadedEntities ) ) {
            if ( is_null( $strExternalKey ) ) {
                return null;
            }

            $varId = $arrRow[ $strFieldPrefix . $strExternalKey ];
        }

        /** @var BaseEntity $objEntity */
        $objEntity = new $this->returnType();
        $objEntity->fillFromResultRow(
                $arrRow
                , $strFieldPrefix
                );

        if (
                ! is_null( $arrLoadedEntities )
                 &&
                ! empty( $varId ) )
        {
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
                        $data instanceof BaseEntity
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

