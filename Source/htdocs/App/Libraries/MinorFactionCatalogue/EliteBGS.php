<?php
namespace App\Libraries\MinorFactionCatalogue;

use Config\Services;
use App\Entities\MinorFaction;
use App\Entities\MinorFactionPresence;
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
    protected $arrMinorFactionData = array();

    /**
     * (non-PHPdoc)
     *
     * @see \App\Libraries\MinorFactionCatalogue\MinorFactionCatalogueInterface::getMinorFaction()
     */
    public function getMinorFaction ( MinorFaction $objMinorFaction ): bool    {
        $objData = $this->getMinorFactionData( $objMinorFaction );

        if ( is_null( $objData ) ) {
            return false;
        }

        /** @var \Config\EliteBGS $objConfig */
        $objConfig = config( 'EliteBGS');

        $objMinorFaction->ebgsId = $objData->_id;
        $objMinorFaction->eddbId = $objData->eddb_id;
        $objMinorFaction->allegiance = $objData->allegiance;
        $objMinorFaction->government = $objData->government;
        $objMinorFaction->name = $objData->name;
        $objMinorFaction->updatedOn = $this->getTime( $objData->updated_at );
        return true;
    }

    /**
     * Returns the JSON object as received from the EliteBGS Factions endpoint.
     * @param MinorFaction $objMinorFaction
     * @throws \Exception
     * @return object|NULL
     */
    protected function getMinorFactionData ( MinorFaction $objMinorFaction ): ?object {
        $objData = $this->arrMinorFactionData[ $objMinorFaction->ebgsId ] ?? null;

        if ( ! is_null( $objData ) ) {
            return $objData;
        }

        $strEbgsId = $objMinorFaction->ebgsId;

        if ( empty ( $strEbgsId ) ) {
            //When the EliteBGS id is not known, we know it hasn't been fetched yet and the caal to API is always made.
            $strName = $objMinorFaction->name;

            if ( empty( $strName ) ) {
                $intEddbId = $objMinorFaction->eddbId;

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

    public function getMinorFactionPresence ( MinorFaction $objMinorFaction ): bool {
        $objData = $this->getMinorFactionData( $objMinorFaction );

        if ( is_null( $objData ) ) {
            return false;
        }

        foreach ($objData->faction_presence as $objPresenceData ) {
            $objMinorFactionPresence = $objMinorFaction->MinorFactionPresence[ $objPresenceData->{MinorFactionPresence::$externalIdDataKey} ] ?? null;

            if ( is_null( $objMinorFactionPresence ) ) {
                $objMinorFactionPresence = new MinorFactionPresence();
                $objMinorFaction->MinorFactionPresence[ $objPresenceData->{MinorFactionPresence::$externalIdDataKey} ] = $objMinorFactionPresence;
            }

            $objMinorFactionPresence->ebgsSystemId = $objPresenceData->system_id;
            $objMinorFactionPresence->influence = $objPresenceData->influence;
            $objMinorFactionPresence->updatedOn = $this->getTime( $objData->updated_at );
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
         * @var \App\Entities\MinorFactionPresence $objMinorFactionPresence
         */

        $objConfig = config( 'EliteBGS');
        $objClient = Services::curlrequest();
        $objResponse = $objClient->request(
                'GET'
                , $objConfig->strUrlRoot . 'factions?' . $strLookupParams
                );

        if ( $objResponse->getStatusCode() < 300 ) {
            $objResponseBody = json_decode( $objResponse->getBody() );
            $blnSuccess = $objResponseBody->total;

            if ( $blnSuccess ) {
                $objData = $objResponseBody->docs[0];
                $this->arrMinorFactionData[ $objData->_id ] = $objData;
            }
        } else {
            $objData = null;
        }

        return $objData;
    }
}

