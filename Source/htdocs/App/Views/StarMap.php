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
<div class="row h-100">
<div class="col-sm-3 col-xl-2 d-flex flex-column flex-shrink-0 p-3 text-white bg-dark">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
      <span class="fs-4"><?= $objMinorFaction->name ?></span>
    </a>
    <hr>
    <div id="modeChoice" class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="modeChoiceLabel" data-bs-toggle="dropdown" aria-expanded="false">
        <strong>Mode choice</strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="modeChoiceLabel">
        <li><a class="dropdown-item" href="#">New project...</a></li>
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#">Sign out</a></li>
      </ul>
    </div>
  </div>
    <x3d id="x3DViewer" class="col">
        <scene>
            <background skyColor="0 0 0"></background>
            <viewpoint
                    id="viewpoint_center"
                    position="<?= translateCoords($fltViewPointX, $fltViewPointY, $fltViewPointZ + 25) ?>"
                    centerofrotation="<?= translateCoords($fltViewPointX, $fltViewPointY, $fltViewPointZ) ?>"></viewpoint>
<?php
foreach ($arrStarSystems as $objStarSystem) {
    $objPresence = $objMinorFaction->MinorFactionPresence[ $objStarSystem->name ];
/*
    echo $this->include(
            'StarMapObjects/StarSystem'
            , [
                    'objStarSystem' => $objStarSystem
                    , 'objPresence' => $objMinorFaction->MinorFactionPresence[ $objStarSystem->name ]
                    ]
            );
*/?>
            <transform
                    translation="<?= translateCoords( $objStarSystem->coordX, $objStarSystem->coordY, $objStarSystem->coordZ) ?>"
                    data-allegiance="<?= $objStarSystem->allegiance ?>"
                    data-allegiance-view="<?= lang( 'StarSystemAllegiance.' . $objStarSystem->allegiance ) ?>"
                    data-class="StarSystem"
                    data-id="<?= $objStarSystem->id ?>"
                    data-minor-faction-influence='<?=
                            json_encode( [
                                    'influence' => $objPresence->influence
                                    , 'starColor' => starSystemInfluenceColor( $objPresence->influence )
                                    ] )
                            ?>'
                    data-security="<?= $objStarSystem->security ?>"
                    data-security-view="<?= lang( 'StarSystemSecurity.' . $objStarSystem->security ) ?>"
                    >
                <shape>
                    <appearance>
                        <material diffuseColor="<?= starSystemClassColor( $objStarSystem->mainStarClass ) ?>" />
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
}?>
        </scene>
    </x3d>
</div>
<?= $this->endSection() ?>

<?= $this->section( 'scripts' ) ?>
<script src="http://www.x3dom.org/download/dev/x3dom.js"></script>
<?= $this->endSection() ?>
