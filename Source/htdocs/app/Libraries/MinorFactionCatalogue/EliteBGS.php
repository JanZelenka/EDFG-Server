<?php
namespace app\Libraries\MinorFactionCatalogue;

use Config\Services;
use app\Entities\MinorFaction as MinorFactionEntity;
use app\Entities\MinorFactionPresence as MinorFactionPresenceEntity;
/**
 *
 * @author Jan Zelenka <jan.zelenka@clickworks.eu>
 *
 */
class EliteBGS implements MinorFactionCatalogueInterface
{
    protected $objMinorFaction = null;
    protected $intMinorFactionId = null;
    protected $arrPresence = null;

    /**
     *
     * @param array $arrParams
     * @throws \Exception
     */
    protected function loadMinorFaction ( array $arrParams ) {
        /** @var \CodeIgniter\HTTP\CURLRequest $objClient */
        /** @var \CodeIgniter\HTTP\Response $objResponse */
        /** @var \app\Entities\MinorFactionPresence $objMinorFactionPresence */

        if ( isset( $arrParams[ 'name' ] ) )
            $strUrlParams = 'name=' . $arrParams[ 'name' ];
        else
            throw new \Exception( 'No recognized parameters specified.' );

        $objConfig = config( 'EliteBGS');
        $objClient = Services::curlrequest();
        $objResponse = $objClient->request(
                'GET'
                , $objConfig->strUrlRoot & 'factions?' & $strUrlParams
                );

        if ($objResponse->getStatusCode() < 300 ) {
            $this->objMinorFaction = new MinorFactionEntity();
            $objMinorFactionData = $objResponse->getBody()->docs[0];
            $this->objMinorFaction->name = $objMinorFactionData->name;
            $this->objMinorFaction->ebgsId = $objMinorFactionData->{'_id'};

            $this->arrPresence = array();

            foreach ( $objMinorFactionData->faction_presence as $objPresenceData ) {
                $objMinorFactionPresence = new MinorFactionPresenceEntity();
                $objMinorFactionPresence->
            }
        }
    }

    /**
     * (non-PHPdoc)
     *
     * @see \app\Libraries\MinorFactionCatalogue\MinorFactionCatalogueInterface::getMinorFaction()
     */
    public function getMinorFaction ( array $arrParams ): MinorFactionEntity {
        if ( is_null( $this->objMinorFaction ) )
            $this->loadMinorFaction( $arrParams );

        return $this->objMinorFaction;
    }
}

