<?php
/**
 * @var \App\Entities\MinorFaction $objMinorFaction
 * @var \App\Entities\StarSystem $objStarSystem
 * @var \CodeIgniter\View\View $this
 * @var array $arrStarSystems
 */

helper( 'starMap' );
helper( 'deployment' );
?>
<?= $this->extend( 'Layouts/default' ) ?>
<?= $this->section( 'styles' )?>
<link rel="stylesheet" href="http://www.x3dom.org/download/dev/x3dom.css">
<?= $this->endSection() ?>
<?= $this->section( 'dialogs' ) ?>

<?= $this->endSection() ?>
<?= $this->section('main') ?>
<div id="starMapView" class="row">
    <div class="h-100 col-sm-3 col-xl-2 d-flex flex-column flex-shrink-0 p-3 text-white bg-dark">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
            <span class="fs-4"><?= $objMinorFaction->name ?></span>
        </a>
        <hr>
        <div id="modeChoice" class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="modeChoiceLabel" data-bs-toggle="dropdown" aria-expanded="false">
                <strong id="selectedModeDisplay"><?= lang( 'StarMap.viewMode_StarClass' ) ?></strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="modeChoiceLabel">
                <li>
                    <a
                            class="dropdown-item"
                            href="#"
                            onclick="applyFilter( this );"
                            data-view-mode='{"name": "star-system-class"}'
                        ><?= lang( 'StarMap.viewMode_StarClass' ) ?></a>
                </li>
                <li>
                    <a
                            class="dropdown-item"
                            href="#"
                            onclick="applyFilter( this );"
                            data-view-mode='{"name": "minor-faction-influence"}'
                        ><?= lang( 'StarMap.viewMode_Influence' ) ?></a>
                </li>
                <li>
                    <a
                            class="dropdown-item"
                            href="#"
                            onclick="applyFilter( this );"
                            data-view-mode='{"name": "security"}'
                        ><?= lang( 'StarMap.viewMode_Security' ) ?></a>
                </li>
                <!--<li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Sign out</a></li> -->
            </ul>
        </div>
    </div>
    <x3d
            id="x3DViewer"
            class="h-100 col"
            >
        <scene>
            <background transparency="1"></background>
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
                    data-allegiance='<?=
                            json_encode( [
                                    'display' => lang( 'StarSystemAllegiances.' . $objStarSystem->allegiance )
                                    , 'diffuseColor' => '0.5 0.5 0.5'
                                    ] )
                            ?>'
                    data-class="StarSystem"
                    data-id="<?= $objStarSystem->id ?>"
                    data-minor-faction-influence='<?=
                            json_encode( [
                                    'displayText' => round( 100 * $objPresence->influence, 2 ) . '%'
                                    , 'diffuseColor' => starSystemInfluenceColor( $objPresence->influence )
                                    ] )
                            ?>'
                    data-security='<?=
                            json_encode( [
                                    'displayText' => lang( 'StarSystemSecurity.' . $objStarSystem->security )
                                    , 'diffuseColor' => starSystemSecurityColor( $objStarSystem->security )
                                    ] )
                            ?>'
                    data-star-system-class='<?=
                            json_encode( [
                                    'displayText' => lang( 'StarSystemClasses.' . $objStarSystem->mainStarClass )
                                    , 'diffuseColor' => starSystemClassColor( $objStarSystem->mainStarClass )
                                    ] )
                            ?>'
                    >
                <shape>
                    <appearance>
                        <material diffuseColor="<?= starSystemClassColor( $objStarSystem->mainStarClass ) ?>" />
                    </appearance>
                    <sphere radius="0.5" />
                </shape>
                <billboard axisOfRotation="0 0 0">
                    <transform
                            translation="1 0.2 0"
                            data-labelPart="title"
                            >
                        <shape>
                            <appearance>
                                <material diffuseColor="1 1 1" />
                            </appearance>
                            <text string="<?= $objStarSystem->name ?>" />
                        </shape>
                    </transform>
                    <transform
                            translation="1 -0.6 0"
                            data-labelPart="description"
                            >
                        <shape>
                            <appearance>
                                <material diffuseColor="1 0.882 0.498" />
                            </appearance>
                            <text string="<?= $objStarSystem->mainStarClass ?>">
                                <fontstyle size="0.5" />
                            </text>
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
<script src="<?= base_url( 'scripts/star-map.js' ) ?>" crossorigin="anonymous"></script>
<?= $this->endSection() ?>
