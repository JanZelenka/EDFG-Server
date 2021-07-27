<?php
namespace App\Models;

use App\Entities\MinorFaction as Entity;

/**
 *
 * @author Jan Zelenka <jan.zelenka@clickworks.eu>
 *
 */
final class MinorFaction extends Base\ExternalDataModel
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
            , 'name'
    ];

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
                $MinorFaction instanceof Entity
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
    }
}

