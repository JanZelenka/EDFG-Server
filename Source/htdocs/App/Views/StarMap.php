<?php
/**
 * @var \App\Entities\MinorFaction $objMinorFaction
 * @var \App\Entities\StarSystem $objStarSystem
 * @var \CodeIgniter\View\View $this
 * @var array $arrStarSystems
 */

helper( 'starMap' );
?>
<?= $this->extend( 'Layouts/default' ) ?>
<?= $this->section( 'styles' )?>
<link rel="stylesheet" href="http://www.x3dom.org/download/dev/x3dom.css">
<?= $this->endSection() ?>
<?= $this->section( 'dialogs' ) ?>

<?= $this->endSection() ?>
<?= $this->section('main') ?>
<x3d style="height=95%;">
    <scene>
        <background skyColor="0 0 0"></background>
        <viewpoint
                id="viewpoint_center"
                position="<?= translateCoords($fltViewPointX, $fltViewPointY, $fltViewPointZ + 25) ?>"
                centerofrotation="<?= translateCoords($fltViewPointX, $fltViewPointY, $fltViewPointZ) ?>"></viewpoint>
<?php
foreach ($arrStarSystems as $objStarSystem) {?>
        <transform translation="<?= translateCoords( $objStarSystem->coordX, $objStarSystem->coordY, $objStarSystem->coordZ) ?>">
            <shape>
                <appearance>
                    <material diffuseColor="<?= starSystemInfluenceColor( $objMinorFaction->MinorFactionPresence[ $objStarSystem->name ]->influence )?>" />
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
        </transform><?php
//    $this->include( 'Include/StarMapObjects/StarSystem');
}?>
    </scene>
</x3d>
<?= $this->endSection() ?>

<?= $this->section( 'scripts' ) ?>
<script src="http://www.x3dom.org/download/dev/x3dom.js"></script>
<?= $this->endSection() ?>
