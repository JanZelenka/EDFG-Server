<?php
namespace App\Libraries\StarSystemCatalogue;

use Config\Services;
use App\Entities\MinorFaction as MinorFactionEntity;
use App\Entities\MinorFactionPresence as PresenceEntity;
use App\Entities\StarSystem as Entity;
use App\Models\MinorFaction as MinorFactionModel;
use App\Models\StarSystem as Model;
use App\Libraries\TimeOperations;
use CodeIgniter\I18n\Time;
/**
 *
 * @author Jan Zelenka <jan.zelenka@telenet.be>
 *
 */
class EliteBGS
    implements StarSystemCatalogueInterface
{
    use TimeOperations;
    /**
     * Performs the call to Elite BGS and return array of teh data received back or FALSE in case the call fails.
     * @param string $strUrlParams
     * @return ?array
     */
    protected static function callEliteBgs ( string $strUrlParams ): ?array {
        $objConfig = config( 'EliteBGS');
        $objClient = Services::curlrequest();
        $objResponse = $objClient->request(
                'GET'
                , $objConfig->strUrlRoot . 'systems?' . $strUrlParams
                );

        if ( $objResponse->getStatusCode() < 300 ) {
            return json_decode(
                    $objResponse->getBody()
                    , true
                    );
        } else {
            return null;
        }
    }

    public static function getMinorFactionStarSystems ( $MinorFaction ): bool {
        if ( ! is_array( $MinorFaction ) ) {
            if ( ! $MinorFaction instanceof MinorFactionEntity) {
                throw 'Parameter must be of type ' . MinorFactionEntity::class;
            }

            $MinorFaction = [ $MinorFaction->name => $MinorFaction ];
        }

        $arrParams = [];

        /** @var MinorFactionEntity $objMinorFaction */
        foreach ($MinorFaction as $objMinorFaction) {
            if ( ! $objMinorFaction instanceof MinorFactionEntity) {
                throw 'Parameter array must be exclusively of type ' . MinorFactionEntity::class;
            }

            $strKey = $objMinorFaction->ebgsId;

            if ( ! empty( $strKey ) ) {
                $arrParams[] = 'factionId=' . urlencode( $strKey );
            } else {
                $strKey = $objMinorFaction->name;

                if ( ! empty( $strKey ) ) {
                    $arrParams[] = 'faction=' . urlencode( $strKey );
                } else {
                    throw new \Exception( 'No recognized parameters specified.' );
                }
            }
        }

        $strUrlParams = implode(
                '&'
                , $arrParams
                );

        $intPage = null;
        /** @var Model $objModel */
        $objModel = model( Model::class );

        do {
            $strFinalUrlParams
                =
                $strUrlParams
                . (
                        is_null( $intPage )
                        ? ''
                        : '&page=' . $intPage
                        );
            $arrData = self::callEliteBgs( $strFinalUrlParams );

            foreach ( $arrData[ 'docs' ] as $arrStarSystem) {
                foreach ( $arrStarSystem[ 'factions' ] as $arrMinorfaction ) {
                    $objMinorFaction = $MinorFaction[ $arrMinorfaction[ 'name' ] ] ?? null;

                    if ( isset( $objMinorFaction ) ) {
                        /** @var PresenceEntity $objPresence */
                        $objPresence = $objMinorFaction->MinorFactionPresence[ $arrStarSystem[ 'name' ] ] ?? null;

                        if ( is_null( $objPresence ) ) {
                            /*
                             * We get null here only if Elite BGS receives star system update with new Minor Faction Presence
                             * just after we queried teh Minor Faction and before we queried Star System. So pretty much never
                             * but you know how it goes...
                             */
                            $objMinorFaction->expireCheck();
                        } else {
                            $objEntity = $objPresence->StarSystem;

                            if ( is_null( $objEntity ) ) {
                                $objEntity =
                                $objModel->loadedStarSystems[ $arrStarSystem[ 'name' ] ]
                                ?? $objModel->loadedStarSystems[ $arrStarSystem[ 'name' ] ] = new Entity();
                                $objPresence->StarSystem = $objEntity;
                            }

                            self::setEntityData(
                                    $objEntity
                                    , $arrStarSystem
                                    , true
                                    );
                        }
                    }
                }
            }

            $intPage = $arrData[ 'nextPage' ];
        } while ( isset( $intPage ) );

        return true;
    }

    /**
     * (non-PHPdoc)
     *
     * @see \App\Libraries\StarSystemCatalogue\StarSystemCatalogueInterface::getStarSystems()
     */
    public static function getStarSystem ( Entity $objEntity ): bool
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

        $arrData = self::callEliteBgs($strUrlParams);

        if ( is_null( $arrData ) ) {
            return false;
        }

        self::setEntityData(
                $objEntity
                , $arrData[ 'docs' ][0]
                );
        return true;
    }

    protected static function setEntityData(
            Entity $objEntity
            , array $arrData
            , bool $blnNoFactions = false
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
        $objEntity->updatedOn = self::getTime( $arrData[ 'updated_at' ] );

        if ( $blnNoFactions ) {
            return;
        }

        /** @var MinorFactionModel $objMinorFactionModel */
        $objMinorFactionModel = model( MinorFactionModel::class );

        foreach ($arrData[ 'factions' ] as $arrFactionData ) {
            /** @var MinorFactionEntity $objMinorFactionEntity */
            $strMinorFactionKey = $arrFactionData[ 'name' ];
            $objEntity->MinorFactions[ $strMinorFactionKey ] =
                    $objMinorFactionModel->loadedMinorFactions[ $strMinorFactionKey ]
                    ?? $objMinorFactionModel->loadedMinorFactions[ $strMinorFactionKey ] = new MinorFactionEntity( [
                            'ebgsId' => $arrFactionData[ 'faction_id' ]
                            , 'name' => $arrFactionData[ 'name' ]
                            ]);
        }
    }
}
