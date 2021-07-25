<?php
/**
 * @var \App\Entities\MinorFaction $objMinorFaction
 * @var \App\Entities\StarSystem $objStarSystem
 */
?>
<transform translation="<?= translateCoords( $objStarSystem->coordX, $objStarSystem->coordY, $objStarSystem->coordZ) ?>">
    <shape>
        <appearance>
            <material diffuseColor="<?= starSystemInfluenceColor( $objStarSystem->MinorFactions[ $objMinorFaction->id ]->influence )?>" />
        </appearance>
        <sphere radius="0.2" />
    </shape>
</transform>
