function applyFilter ( objTrigger ) {
    const objFilterDef = JSON.parse( objTrigger.dataset.viewMode );
    const colStarSystems = document.querySelectorAll( '[data-class="StarSystem"]' );
    
    for ( let objStarSystem of colStarSystems ) {
        const objFilterData = JSON.parse( objStarSystem.getAttribute( 'data-' + objFilterDef.name ) );
        objStarSystem.querySelector( ":scope shape appearance material").setAttribute(
                'diffuseColor'
                , objFilterData.diffuseColor
                );
        objStarSystem.querySelector( ':scope billboard transform[data-labelPart="description"] shape text').setAttribute(
                'string'
                , objFilterData.displayText
                );
    }
    
    document.querySelector( '#selectedModeDisplay' ).innerHTML = objTrigger.text;
}