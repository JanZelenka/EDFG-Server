<?php
/**
 * @var \App\Entities\MinorFactionPresence $objPresence
 * @var \App\Entities\StarSystem $objStarSystem
 * @var \CodeIgniter\View\View $this
 */

if ( empty( $objStarSystem ) ) {
    $objStarSystem = $this->renderVars[ 'options' ][ 'objStarSystem' ];
}

if ( empty( $objPresence ) ) {
    $objPresence = $this->renderVars[ 'options' ][ 'objPresence' ];
}
?>
<transform
        translation="<?= translateCoords( $objStarSystem->coordX, $objStarSystem->coordY, $objStarSystem->coordZ) ?>"
        data-allegiance="<?= $objStarSystem->allegiance ?>"
        data-allegiance-view="<?= lang( 'StarSystemAllegiance.' . $objStarSystem->allegiance ) ?>"
        data-class="StarSystem"
        data-id="<?= $objStarSystem->id ?>"
        data-security="<?= $objStarSystem->security ?>"
        data-security-view="<?= lang( 'StarSystemSecurity.' . $objStarSystem->security ) ?>"
        >
    <shape>
        <appearance>
            <material diffuseColor="<?= starSystemInfluenceColor( $objPresence->influence ) ?>" />
        </appearance>
        <sphere radius="0.5" />
    </shape>
    <billboard axisOfRotation="0 0 0">
        <transform translation="1 -.4 0">
            <shape>
                <appearance>
                    <material diffuseColor="1 1 1" />
                </appearance>
                <text string="<?= $objStarSystem->name ?>" />
            </shape>
        </transform>
    </billboard>
</transform>