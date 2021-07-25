<script type="text/javascript" title="Common Nexus scripts">
//Shielding common Faction Guard functions from the Global context.
//See https://www.developintelligence.com/blog/2010/10/how-good-c-habits-can-encourage-bad-javascript-habits-part-1/
(
function (
	    factionGuard
	    , $
	    , undefined
	    )
{
    // Atempts to set the language and in case of a success refreshes the page.
    factionGuard.setLanguage = function () {
        const objData = axios.create();
        const strLocale = $( this ).attr( 'data-language' );

        objData
            .get(
                '<?= base_url( 'language/set' ) ?>/' + strLocale
                , { headers: { "X-Requested-With": "XMLHttpRequest" } }
                )
            .then( function ( response ) {
                location.reload();
                } );
        }
    }
(
    window.factionGuard = window.factionGuard || {}
    , jQuery
    )
)
</script>