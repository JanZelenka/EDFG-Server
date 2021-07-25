<?php
namespace App\Libraries\StarSystemCatalogue;

use Config\Services;
use App\Entities\StarSystem as Entity;
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

        $strEbgsId = $objEntity->ebgsId;

        if ( ! empty( $strEbgsId ) ) {
            $strUrlParams = 'id=' . urlencode( $strEbgsId );
        } else {
            $strName = $objEntity->name;

            if ( ! empty( $strName ) ) {
                $strUrlParams = 'name=' . urlencode( $strName );
            } else {
                $intEddbId = $objEntity->eddbId;

                if ( ! empty( $intEddbId ) ) {
                    $strUrlParams = 'eddbId=' . urlencode( $strName );
                }
            }
        }

        if ( ! isset ( $strUrlParams ) ) {
            throw new \Exception( 'No recognized parameter specified.' );
        }

        $objConfig = config( 'EliteBGS');
        $objClient = Services::curlrequest();
        $objResponse = $objClient->request(
                'GET'
                , $objConfig->strUrlRoot . 'systems?' . $strUrlParams
                );

        if ($objResponse->getStatusCode() < 300 ) {
            $objEntityData = json_decode( $objResponse->getBody() )->docs[0];
            $objEntity->name = $objEntityData->name;
            $objEntity->coordX = $objEntityData->x;
            $objEntity->coordY = $objEntityData->y;
            $objEntity->coordZ = $objEntityData->z;
            $objEntity->ebgsId = $objEntityData->_id;
            $objEntity->eddbId = $objEntityData->eddb_id;
            $objEntity->updatedOn = $this->getTime( $objEntityData->updated_at );
            $objEntity->lastCheckOn = Time::now();
        } else {
            return false;
        }

        return true;
    }
}

