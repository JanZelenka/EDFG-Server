<?php
namespace app\Libraries\MinorFactionCatalogue;

use Config\Services;
use app\Entities\MinorFaction;
use app\Entities\MinorFactionPresence;

/**
 *
 * @author Jan Zelenka <jan.zelenka@clickworks.eu>
 *
 */
class EliteBGS implements MinorFactionCatalogueInterface
{
    protected $arrMinorFactionData = array();

    /**
     * (non-PHPdoc)
     *
     * @see \app\Libraries\MinorFactionCatalogue\MinorFactionCatalogueInterface::getMinorFaction()
     */
    public function getMinorFaction (
            array $arrParams
            , MinorFaction $objEntity
            ): MinorFaction
    {
        /**
         * @var \app\Entities\MinorFaction $objMinorFaction
         */

        $strName = $arrParams[ 'name' ] ?? null;

        if ( is_null( $strName ) ) {
            throw new \Exception( 'No recognized parameters specified.' );
        }

        if ( ! isset( $this->arrMinorFactionData[ $strName ] ) ) {
            if ( ! $this->loadMinorFaction( $arrParams ) ) {
                return false;
            }
        }

        $objData = $this->arrMinorFactionData[ $strName ];

        $objEntity->id = $objData->eddb_id;
        $objEntity->name = $objData->name;
        $objEntity->ebgsId = $objData->{'_id'};
        return $objMinorFaction;
    }

    public function getMinorFactionPresence (
            array $arrParams
            , array $arrMinorFactionPresence = null
            ): array {
        ;
    }

    /**
     *
     * @param array $arrParams
     * @throws \Exception
     */
    protected function loadMinorFaction ( array $arrParams ): bool {
        /**
         * @var \CodeIgniter\HTTP\CURLRequest $objClient
         * @var \CodeIgniter\HTTP\Response $objResponse
         * @var \app\Entities\MinorFactionPresence $objMinorFactionPresence
         */

        $strMinorFactionName = $arrParams[ 'name' ] ?? null;

        if ( is_null( $strMinorFactionName ) ) {
            throw new \Exception( 'No recognized parameters specified.' );
        }

        $strUrlParams = 'name=' . urlencode($strMinorFactionName);
        $objConfig = config( 'EliteBGS');
        $objClient = Services::curlrequest();
        $objResponse = $objClient->request(
                'GET'
                , $objConfig->strUrlRoot & 'factions?' & $strUrlParams
                );

        if ( $objResponse->getStatusCode() < 300 ) {
            $blnSuccess = $objResponse->getBody()->total;

            if ( $blnSuccess ) {
                $this->arrMinorFactionData[ $strMinorFactionName ] = $objResponse->getBody()->docs[0];
            }
        } else {
            $blnSuccess = false;
        }

        return $blnSuccess;
                    /*
                     $objMinorFaction = new MinorFactionEntity();
                     $objMinorFactionData = $objResponse->getBody()->docs[0];
                     $objMinorFaction->name = $objMinorFactionData->name;
                     $objMinorFaction->ebgsId = $objMinorFactionData->{'_id'};
                     $this->arrMinorFactions[ $objMinorFaction->name ] = $objMinorFaction;

                     foreach ( $objMinorFactionData->faction_presence as $objPresenceData ) {
                     $objMinorFactionPresence = new MinorFactionPresenceEntity();
                     $objMinorFactionPresence->minorFactionId = $this->intMinorFactionId;
                     }
                     */
    }
}

