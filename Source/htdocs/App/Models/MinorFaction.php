<?php
namespace App\Models;

use App\Entities\MinorFaction as Entity;

/**
 *
 * @author Jan Zelenka <jan.zelenka@clickworks.eu>
 *
 */
class MinorFaction extends Base\StampedModel
{
    protected $table = 'minor_faction';
    protected $primaryKey = 'id';
    protected $returnType = Entity::class;
    protected $useSoftDeletes = false;
    protected $allowedFields = [
            'ebgsId'
            , 'eddbId'
            , 'allegiance'
            , 'government'
            , 'lastCheckOn'
            , 'name'
            , 'updatedOn'
    ];

    /**
     * Attempts to find the Minor Faction in the datatbase.
     * If not found, a new Entity with query parameters is returned.
     * @param mixed $key Either name of a search key, either an array of search key/value pairs
     * @param mixed $value The value to search for in case the $kye
     * @return Entity
     */
    public function findMinorFaction (
            $key
            , $value = null
            ): Entity
    {
        if (! is_array($key))
        {
            $key = [$key => $value];
        }

        $objEntity = $this
            ->where( $key )
            ->first();

        if ( is_null( $objEntity ) ) {
            $objEntity = new Entity( $key );
        }

        return $objEntity;
    }

    /**
     *
     * {@inheritDoc}
     * @see \CodeIgniter\BaseModel::save()
     */
    public function save ( $MinorFaction ): bool {
        /**
         * @var \App\Entities\MinorFaction $MinorFaction
         * @var \App\Entities\MinorFactionPresence $objPresenceEntity
         * @var MinorFactionPresence $objPresenceModel
         */

        $blnSuccess = parent::save( $MinorFaction );

        if (
                $blnSuccess
                 &&
                ( $MinorFaction instanceof Entity )
                 &&
                ! empty( $MinorFaction->MinorFactionPresence )
                )
        {
            //Saving the Minor Faction Presence data as well.
            $objPresenceModel = model( MinorFactionPresence::class );

            foreach ( $MinorFaction->MinorFactionPresence as $objPresenceEntity ) {
                $objPresenceEntity->minorFactionId = $MinorFaction->id;
                $objPresenceModel->save( $objPresenceEntity );
            }
        }

        return $blnSuccess;
    }
}

