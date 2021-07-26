<?php

namespace App\Models;

use App\Entities\StarSystem as Entity;

/**
 *
 * @author Jan Zelenka <jan.zelenka@telenet.be>
 *
 */
class StarSystem extends Base\StampedModel {
    protected $table = 'star_system';
    protected $primaryKey = 'id';
    protected $returnType = Entity::class;
    protected $useSoftDeletes = false;
    protected $allowedFields = [
            'allegiance'
            , 'coordX'
            , 'coordY'
            , 'coordZ'
            , 'ebgsId'
            , 'economyPrimary'
            , 'economySecondary'
            , 'eddbId'
            , 'lastCheckOn'
            , 'name'
            , 'population'
            , 'security'
            , 'state'
            , 'updatedOn'
           ];

    /**
     * Creates the Return object populated with data from other source than the native table.
     * Usefull when getting star system data from different views.
     *
     * @param string $strColumnNamePrefix
     * @param object $objViewRow
     * @return Entity
     */
    public function newFromViewResult (
            string $strColumnNamePrefix
            , object $objViewRow
            ): Entity
    {
        $objStarSystem = new $this->returnType();
        $objStarSystem->id = $objViewRow->{$strColumnNamePrefix . 'id'};

        foreach ($this->allowedFields as $strFieldName) {
            $strViewFieldName = $strColumnNamePrefix . $strFieldName;
            $objStarSystem->{$strFieldName} = $objViewRow->{$strViewFieldName};
        }

        return $objStarSystem;
    }
}
