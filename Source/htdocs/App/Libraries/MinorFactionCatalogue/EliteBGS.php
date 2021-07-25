<?php
namespace App\Libraries\MinorFactionCatalogue;

use Config\Services;
use App\Entities\MinorFaction as Entity;
use App\Entities\MinorFactionPresence as PresenceEntity;
use App\Libraries\EliteBGS as EliteBGSBase;
use CodeIgniter\I18n\Time;

/**
 *
 * @author Jan Zelenka <jan.zelenka@clickworks.eu>
 *
 */
class EliteBGS
    extends EliteBGSBase
    implements MinorFactionCatalogueInterface
{
    protected $arrData = array();

    /**
     * (non-PHPdoc)
     *
     * @see \App\Libraries\MinorFactionCatalogue\MinorFactionCatalogueInterface::getMinorFaction()
     */
    public function getMinorFaction ( Entity $objEntity ): bool    {
        $objData = $this->getData( $objEntity );

        if ( is_null( $objData ) ) {
            return false;
        }

        /** @var \Config\EliteBGS $objConfig */
        $objConfig = config( 'EliteBGS');

        $objEntity->ebgsId = $objData->_id;
        $objEntity->eddbId = $objData->eddb_id;
        $objEntity->allegiance = $objData->allegiance;
        $objEntity->government = $objData->government;
        $objEntity->lastCheckOn = Time::now();
        $objEntity->name = $objData->name;
        $objEntity->updatedOn = $this->getTime( $objData->updated_at );
        return true;
    }

    /**
     * Returns the JSON object as received from the EliteBGS Factions endpoint.
     * @param Entity $objEntity
     * @throws \Exception
     * @return object|NULL
     */
    protected function getData ( Entity $objEntity ): ?object {
        $objData = $this->arrData[ $objEntity->ebgsId ] ?? null;

        if ( ! is_null( $objData ) ) {
            return $objData;
        }

        $strEbgsId = $objEntity->ebgsId;

        if ( empty ( $strEbgsId ) ) {
            //When the EliteBGS id is not known, we know it hasn't been fetched yet and the caal to API is always made.
            $strName = $objEntity->name;

            if ( empty( $strName ) ) {
                $intEddbId = $objEntity->eddbId;

                if ( empty( $intEddbId ) ) {
                    throw new \Exception( 'The MinorFaction object contains no values recognized as parameters by EliteBGS.' );
                }

                $strLookupParams = 'eddbId=' . $intEddbId;
            }

            $strLookupParams = 'name=' . urlencode( $strName );
        } else {
            $strLookupParams = 'id=' . $strEbgsId;
        }

        return $this->loadMinorFaction( $strLookupParams);
    }

    public function getPresence ( Entity $objEntity ): bool {
        $objData = $this->getData( $objEntity );

        if ( is_null( $objData ) ) {
            return false;
        }

        foreach ($objData->faction_presence as $objPresenceData ) {
            $objPresence = $objEntity->MinorFactionPresence[ $objPresenceData->{PresenceEntity::$externalIdDataKey} ] ?? null;

            if ( is_null( $objPresence ) ) {
                $objPresence = new PresenceEntity();
                $objEntity->MinorFactionPresence[ $objPresenceData->{PresenceEntity::$externalIdDataKey} ] = $objPresence;
            }

            $objPresence->ebgsSystemId = $objPresenceData->system_id;
            $objPresence->influence = $objPresenceData->influence;
            $objPresence->updatedOn = $this->getTime( $objData->updated_at );
        }

        return true;
    }

    /**
     *
     * @param array $arrParams
     * @throws \Exception
     */
    protected function loadMinorFaction ( string $strLookupParams ): ?object {
        /**
         * @var \CodeIgniter\HTTP\CURLRequest $objClient
         * @var \CodeIgniter\HTTP\Response $objResponse
         * @var \App\Entities\MinorFactionPresence $objEntityPresence
         */

        $objConfig = config( 'EliteBGS');
        $objClient = Services::curlrequest();
        $objResponse = $objClient->request(
                'GET'
                , $objConfig->strUrlRoot . 'factions?' . $strLookupParams
                );

        if ( $objResponse->getStatusCode() < 300 ) {
            $objResponseBody = json_decode( $objResponse->getBody() );

            if ( $objResponseBody->total ) {
                $objData = $objResponseBody->docs[0];
                $this->arrMinorFactionData[ $objData->_id ] = $objData;
            }
        }

        return $objData ?? null;
    }
}

