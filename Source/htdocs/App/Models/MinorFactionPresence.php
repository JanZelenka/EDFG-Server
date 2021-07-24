<?php
namespace App\Models;

use App\Entities\MinorFactionPresence as MinorFactionPresenceEntity;
use App\Entities\StarSystem as StarSystemEntity;

/**
 *
 * @author Jan Zelenka <jan.zelenka@clickworks.eu>
 *
 */
class MinorFactionPresence extends Base\StampedModel
{
    protected $table = 'minor_faction_presence';
    protected $primaryKey = 'id';
    protected $returnType = MinorFactionPresenceEntity::class;
    protected $useSoftDeletes = false;
    protected $allowedFields = [
            'ebgsSystemId'
            , 'influence'
            , 'minorFactionId'
            , 'starSystemId'
            , 'updatedOn'
    ];

    public function findMinorFaction ( int $intMinorFactionId ): array {
        /** @var \CodeIgniter\Database\ResultInterface $objResult */
        $objResult = $this->db
            ->table( 'minor_faction_presence_view' )
            ->where(
                    'minorFactionId'
                    , $intMinorFactionId
                    )
            ->get();

        $arrMinorFactionPresence = array();

        foreach ( $objResult->getResult() as $objMinorFactionPresenceData ) {
            $objMinorFactionPresenceEntity = new MinorFactionPresenceEntity();
            $objMinorFactionPresenceEntity->id = $arrMinorFactionPresenceData->id;

            foreach ( $this->allowedFields as $strFieldName ) {
                $objMinorFactionPresenceEntity->{$strFieldName} = $objMinorFactionPresenceItem->{$strFieldName};
            }

            $strColumnNamePrefix = 'starSystem_';

            if ( isset( $objMinorFactionPresenceData->{$strColumnNamePrefix . 'id'} ) ) {
                $objMinorFactionPresenceEntity->StarSystem = model( StarSystem::class )->newFromViewResult(
                        $strColumnNamePrefix
                        , $objMinorFactionPresenceData
                        );
            }

            $arrMinorFactionPresence[ $objMinorFactionPresenceEntity->{MinorFactionPresenceEntity::externalIdColumn} ] = $objMinorFactionPresenceEntity;
        }

        return $arrMinorFactionPresence;
    }
}

