<?php

namespace App\Models;

use App\Entities\StarSystem as Entity;
use Config\Services;

/**
 *
 * @author Jan Zelenka <jan.zelenka@telenet.be>
 *
 */
final class StarSystem extends Base\ExternalDataModel {
    protected array $allowedFields = [
            'allegiance'
            , 'coordX'
            , 'coordY'
            , 'coordZ'
            , 'ebgsId'
            , 'economyPrimary'
            , 'economySecondary'
            , 'eddbId'
            , 'name'
            , 'population'
            , 'security'
            , 'state'
           ];
    public array $loadedStarSystems = [];
    protected string $primaryKey = 'id';
    protected string $returnType = Entity::class;
    protected string $table = 'star_system';
    protected bool $useSoftDeletes = false;

    /**
     * Creates the Return object populated with data from other source than the native table.
     * Usefull when getting star system data from different views.
     *
     * @param string $strColumnNamePrefix
     * @param object $objViewRow
     * @return Entity
     */
    public function newFromResultRow (
            string $strColumnNamePrefix
            , array $arrRow
            ): Entity
    {
        $strExternalKey = Services::starSystemCatalogue()->externalKey();
        $varId = $arrRow[ $strColumnNamePrefix . $strExternalKey ];

        if ( empty( $varId ) ) {
            return null;
        }

        $objEntity =
            $this->loadedStarSystems[ $varId ]
            ?? $this->loadedStarSystems[ $varId ] = new $this->returnType();

        $intPrefixLength = strlen( $strColumnNamePrefix );

        foreach ($arrRow as $strField => $varValue) {
            if ( substr( $strField, 0, $intPrefixLength ) = $strColumnNamePrefix ) {
                $objEntity->{substr( $strField, $intPrefixLength )} = $varValue;
            }
        }

        return $objEntity;
    }
}
