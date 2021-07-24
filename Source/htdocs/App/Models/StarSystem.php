<?php

namespace App\Models;

use App\Entities\StarSystem as StarSystemEntity;

/**
 *
 * @author Jan Zelenka <jan.zelenka@telenet.be>
 *
 */
class StarSystem extends Base\StampedModel {
    protected $table = 'star_system';
    protected $primaryKey = 'id';
    protected $returnType = StarSystemEntity::class;
    protected $useSoftDeletes = false;
    protected $allowedFields = [
            'coordX'
            , 'coordY'
            , 'coordZ'
            , 'ebgsId'
            , 'eddbId'
            , 'lastCheckOn'
            , 'name'
            , 'updatedOn'
           ];

    /**
     * Creates the Return object populated with data from other source than the native table.
     * Usefull when getting star system data from different views.
     *
     * @param string $strColumnNamePrefix
     * @param object $objViewRow
     * @return StarSystemEntity
     */
    public function newFromViewResult (
            string $strColumnNamePrefix
            , object $objViewRow
            ): StarSystemEntity
    {
        $objStarSystem = new $this->returnType();

        foreach ($this->allowedFields as $strFieldName) {
            $strFieldName = $strColumnNamePrefix . $strFieldName;
            $objStarSystem->{$strFieldName} = $objViewRow->{$strFieldName};
        }
    }
}
