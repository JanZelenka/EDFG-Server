<?php
namespace App\Libraries\StarSystemCatalogue;

use Config\Services;
use App\Entities\MinorFaction as MinorFactionEntity;
use App\Entities\MinorFactionPresence as PresenceEntity;
use App\Entities\StarSystem as Entity;
use App\Models\MinorFaction as MinorFactionModel;
use App\Models\StarSystem as Model;
use App\Libraries\EliteBGS as EliteBGSBase;
use CodeIgniter\I18n\Time;
/**
 *
 * @author Jan Zelenka <jan.zelenka@telenet.be>
 *
 */
class EliteBGS
    extends EliteBGSBase
    implements StarSystemCatalogueInterface
{
    protected array $starSystemRelationshipMap = [
            Entity::class => [ '_key' => 'ebgsId' ]
            , PresenceEntity::class => [ 'StarSystem' => 'ebgsSystemId' ]
    ];

    /**
     * Performs the call to Elite BGS and return array of teh data received back or FALSE in case the call fails.
     * @param string $strUrlParams
     * @return ?array
     */
    protected function callEliteBgs ( string $strUrlParams ): ?array {
        $objConfig = config( 'EliteBGS');
        $objClient = Services::curlrequest();
        $objResponse = $objClient->request(
                'GET'
                , $objConfig->strUrlRoot . 'systems?' . $strUrlParams
                );

        if ($objResponse->getStatusCode() < 300 ) {
            return json_decode(
                    $objResponse->getBody()
                    , true
                    );
        } else {
            return null;
        }
    }

    public function getMinorFactionStarSystems ( MinorFactionEntity $objMinorFaction ): bool {
        $strId = $objMinorFaction->ebgsId;

        if ( ! empty( $strId ) ) {
            $strUrlParams = 'factionId=' . urlencode( $strId );
        } else {
            $strId = $objMinorFaction->name;

            if ( ! empty( $strId ) ) {
                $strUrlParams = 'faction=' . urlencode( $strId );
            }
        }

        if ( ! isset ( $strUrlParams ) ) {
            throw new \Exception( 'No recognized parameter specified.' );
        }

        $intPage = null;
        /** @var Model $objModel */
        $objModel = model( Model::class );

        do {
            $strFinalUrlParams = $strUrlParams . ( $intPage ?? '' );
            $arrData = $this->callEliteBgs( $strFinalUrlParams );

            foreach ( $arrData[ 'docs' ] as $arrStarSystem) {
                /** @var PresenceEntity $objPresence */
                $objPresence = $objMinorFaction->MinorFactionPresence[ $arrStarSystem[ '_id' ] ] ?? null;

                if ( ! is_null( $objPresence ) ) {
                    /*
                     * We get null here only if Elite BGS receives star system update with new Minor Faction Presence
                     * just after we queried teh Minor Faction and before we queried Star System. So pretty much never
                     * but you know how it goes...
                     */

                    $objEntity = $objPresence->StarSystem;

                    if ( is_null( $objEntity ) ) {
                        $objEntity =
                            $objModel->loadedStarSystems[ $arrStarSystem[ '_id' ] ]
                            ?? $objModel->loadedStarSystems[ $arrStarSystem[ '_id' ] ] = new Entity();
                        $objPresence->StarSystem = $objEntity;
                    }

                    $this->setEntityData(
                            $objEntity
                            , $arrStarSystem
                            );
                }
            }

            $intPage = $arrData[ 'nextPage' ];
        } while ( ! is_null( $intPage ) );
    }

    /**
     * (non-PHPdoc)
     *
     * @see \App\Libraries\StarSystemCatalogue\StarSystemCatalogueInterface::getStarSystems()
     */
    public function getStarSystem ( Entity $objEntity ): bool
    {
        /**
         * @var \CodeIgniter\HTTP\CURLRequest $objClient
         * @var \CodeIgniter\HTTP\Response $objResponse
         * @var \App\Entities\StarSystem $objEntity
         * @var \Config\EliteBGS $objConfig
         */

        $strId = $objEntity->ebgsId;

        if ( ! empty( $strId ) ) {
            $strUrlParams = 'id=' . urlencode( $strId );
        } else {
            $strId = $objEntity->name;

            if ( ! empty( $strId ) ) {
                $strUrlParams = 'name=' . urlencode( $strId );
            } else {
                $strId = $objEntity->eddbId;

                if ( ! empty( $strId ) ) {
                    $strUrlParams = 'eddbId=' . urlencode( $strId );
                }
            }
        }

        if ( ! isset ( $strUrlParams ) ) {
            throw new \Exception( 'No recognized parameter specified.' );
        }

        $arrData = $this->callEliteBgs($strUrlParams);

        if ( is_null( $arrData ) ) {
            return false;
        }

        $this->setEntityData(
                $objEntity
                , $arrData[ 'docs' ][0]
                );
        return true;
    }

    /**
     *
     * {@inheritDoc}
     * @see \App\Libraries\StarSystemCatalogue\StarSystemCatalogueInterface::externalKey()
     */
    public function externalKey(): string {
        return 'ebgsId';
    }

    protected function setEntityData(
            Entity $objEntity
            , object $arrData
            )
    {
        $objEntity->allegiance = $arrData[ 'allegiance' ];
        $objEntity->coordX = $arrData[ 'x' ];
        $objEntity->coordY = $arrData[ 'y' ];
        $objEntity->coordZ = $arrData[ 'z' ];
        $objEntity->ebgsId = $arrData[ '_id' ];
        $objEntity->economyPrimary = $arrData[ 'primary_economy' ];
        $objEntity->economySecondary = $arrData[ 'secondary_economy' ];
        $objEntity->eddbId = $arrData[ 'eddb_id' ];
        $objEntity->lastCheckOn = Time::now();
        $objEntity->name = $arrData[ 'name' ];
        $objEntity->population = $arrData[ 'population' ];
        $objEntity->security = $arrData[ 'security' ];
        $objEntity->state = $arrData[ 'state' ];
        $objEntity->updatedOn = $this->getTime( $arrData[ 'updated_at' ] );
        /** @var MinorFactionModel $objMinorFactionModel */
        $objMinorFactionModel = model( MinorFactionModel::class );

        foreach ($arrData[ 'factions' ] as $arrFactionData ) {
            /** @var MinorFactionEntity $objMinorFactionEntity */
            $strMinorFactionId = $arrFactionData[ 'faction_id' ];
            $objEntity->MinorFactions[ $strMinorFactionId ] =
                $objMinorFactionModel->loadedMinorFactions[ $strMinorFactionId ]
                ?? $objMinorFactionModel->loadedMinorFactions[ $strMinorFactionId ] = new MinorFactionEntity( [
                        'ebgsId' => $strMinorFactionId
                        , 'name' => $arrFactionData[ 'name' ]
                        ]);
        }
    }
}
