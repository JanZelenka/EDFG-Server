<?php
namespace App\Libraries\MinorFactionCatalogue;

use Config\Services;
use App\Entities\MinorFaction as Entity;
use App\Entities\MinorFactionPresence as PresenceEntity;
use App\Libraries\TimeOperations;
use CodeIgniter\I18n\Time;

/**
 *
 * @author Jan Zelenka <jan.zelenka@clickworks.eu>
 *
 */
class EliteBGS
    implements MinorFactionCatalogueInterface
{
    use TimeOperations;

    /**
     * Caches results of the calls to EliteBGS factions endpoint during the lifetime of the object so that
     * unnecessary calls are avoided
     * @var array
     */
    protected static array $data = array();

    /**
     *
     * @param string $strUrlParams
     * @throws \Exception
     * @return array
     */
    protected static function callEliteBgs ( string $strUrlParams ): array {
        /**
         * @var \CodeIgniter\HTTP\CURLRequest $objClient
         * @var \CodeIgniter\HTTP\Response $objResponse
         * @var \App\Entities\MinorFactionPresence $objEntityPresence
         */

        $objConfig = config( 'EliteBGS');
        $objClient = Services::curlrequest();
        $objResponse = $objClient->request(
                'GET'
                , $objConfig->strUrlRoot . 'factions?' . $strUrlParams
                );

        if ( $objResponse->getStatusCode() < 300 ) {
            $arrResponse = json_decode(
                    $objResponse->getBody()
                    , true
                    );
        } else {
            $arrResponse = [];
        }

        return $arrResponse;
    }

    /**
     * (non-PHPdoc)
     *
     * @see \App\Libraries\MinorFactionCatalogue\MinorFactionCatalogueInterface::getMinorFaction()
     */
    public static function getMinorFaction ( $MinorFaction ): bool    {
        if ( ! is_array( $MinorFaction ) ) {
            if ( ! $MinorFaction instanceof Entity) {
                throw 'Parameter must be of type ' . Entity::class;
            }

            $MinorFaction = [ $MinorFaction->name => $MinorFaction ];
        }

        $arrData = self::getData( $MinorFaction );

        if ( empty( $arrData ) ) {
            return false;
        }

        foreach ( $arrData as $arrMinorFaction ) {
            $arrDoc = $arrMinorFaction[ 'doc' ];
            /** @var Entity $objEntity */
            $objEntity = $MinorFaction[ $arrDoc[ 'name' ] ];
            $objEntity->ebgsId = $arrDoc[ '_id' ];
            $objEntity->eddbId = $arrDoc[ 'eddb_id' ];
            $objEntity->allegiance = $arrDoc[ 'allegiance' ];
            $objEntity->government = $arrDoc[ 'government' ];
            $objEntity->lastCheckOn = $arrMinorFaction[ 'lastCheckOn' ];
            $objEntity->name = $arrDoc[ 'name' ];
            $objEntity->updatedOn = self::getTime( $arrDoc[ 'updated_at' ] );
        }

        return true;
    }

    /**
     * Returns the JSON object as received from the EliteBGS Factions endpoint.
     * @param array $objEntity
     * @throws \Exception
     * @return array
     */
    protected static function getData ( $arrMinorFactions ): array {
        $arrResult = [];
        $arrParams = [];

        /** @var Entity $objEntity */
        foreach ( $arrMinorFactions as $objEntity ) {
            $strName = $objEntity->name;

            if ( isset( self::$data[ $strName ] ) ) {
                $arrResult[ $strName ] = self::$data[ $strName ];
            } else {
                $strKeyValue = $objEntity->ebgsId;

                if ( empty( $strKeyValue ) ) {
                    $strKeyValue = $objEntity->name;

                    if ( empty( $strKeyValue ) ) {
                        throw new \Exception( 'The MinorFaction object contains no values recognized as parameters by EliteBGS.' );
                    } else {
                        $arrParams[] = 'name=' . urlencode( $strKeyValue );
                    }
                } else {
                    $arrParams[] = 'id=' . urldecode( $strKeyValue );
                }
            }
        }

        if ( ! empty( $arrParams )) {
            $strUrlParams = implode(
                    '&'
                    , $arrParams
                    );
            $intPage = null;

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

                foreach ( $arrData[ 'docs' ] as $arrDoc ) {
                    $strName = $arrDoc[ 'name' ];
                    $arrResult[ $strName ] = self::$data[ $strName ] = [
                            'doc' => $arrDoc
                            , 'lastCheckOn' => Time::now()
                            ];
                }

                $intPage = $arrData[ 'nextPage' ];
            } while ( isset( $intPage ) );
        }

        return $arrResult;
    }

    public static function getPresence ( $MinorFaction ): bool {
        if ( ! is_array( $MinorFaction ) ) {
            if ( ! $MinorFaction instanceof Entity) {
                throw 'Parameter must be of type ' . Entity::class;
            }

            $MinorFaction = [ $MinorFaction->name => $MinorFaction ];
        }

        $arrData = self::getData( $MinorFaction );

        if ( empty( $arrData ) ) {
            return false;
        }

        foreach ( $arrData as $arrMinorFaction ) {
            $arrDoc = $arrMinorFaction[ 'doc' ];
            /** @var Entity $objEntity */
            $objEntity = $MinorFaction[ $arrDoc[ 'name' ] ];

            foreach ($arrDoc[ 'faction_presence' ] as $arrPresence ) {
                $strSystemName = $arrPresence[ 'system_name' ];
                $objPresence =
                        $objEntity->MinorFactionPresence[ $strSystemName ]
                        ?? $objEntity->MinorFactionPresence[ $strSystemName ] = new PresenceEntity();
                $objPresence->ebgsSystemId = $arrPresence[ 'system_id' ];
                $objPresence->influence = $arrPresence[ 'influence' ];
                $objPresence->updatedOn = self::getTime( $arrPresence[ 'updated_at'] );
                $objPresence->_exists = true;
            }
        }

        return true;
    }
}

