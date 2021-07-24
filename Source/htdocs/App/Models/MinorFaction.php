<?php
namespace App\Models;

use App\Entities\MinorFaction as MinorFactionEntity;

/**
 *
 * @author Jan Zelenka <jan.zelenka@clickworks.eu>
 *
 */
class MinorFaction extends Base\StampedModel
{
    protected $table = 'minor_faction';
    protected $primaryKey = 'id';
    protected $returnType = MinorFactionEntity::class;
    protected $useSoftDeletes = false;
    protected $allowedFields = [
            'ebgsId'
            , 'eddbId'
            , 'allegiance'
            , 'government'
            , 'name'
            , 'updatedOn'
    ];

    /**
     *
     * {@inheritDoc}
     * @see \CodeIgniter\BaseModel::save()
     */
    public function save ( $MinorFaction ):bool {
        /** @var \App\Entities\MinorFaction $MinorFaction */

        $blnSuccess = parent::save( $MinorFaction );

        if (
                $blnSuccess
                 &&
                ( $MinorFaction instanceof \App\Entities\MinorFaction )
                 &&
                ! empty( $MinorFaction->MinorFactionPresence )
                )
        {
            //Saving the Minor Faction Presence data as well.
            /** @var MinorFaction $objMinorFactionPresenceModel */
            $objMinorFactionPresenceModel = model( MinorFaction::class );
            /** @var \App\Entities\MinorFactionPresence $objMinorFactionPresenceEntity */
            foreach ( $MinorFaction->MinorFactionPresence as $objMinorFactionPresenceEntity ) {
                $objMinorFactionPresenceEntity->minorFactionId = $MinorFaction->id;
                $objMinorFactionPresenceModel->save( $objMinorFactionPresenceEntity );
            }
        }

        return $blnSuccess;
    }
}

