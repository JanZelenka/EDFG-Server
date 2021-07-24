<?php
namespace App\Models\Base;
use CodeIgniter\Model;
use CodeIgniter\Entity\Entity;

/**
 *
 * @author Jan Zelenka <jan.zelenka@telenet.be>
 *
 */
class BaseModel extends Model
{
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

