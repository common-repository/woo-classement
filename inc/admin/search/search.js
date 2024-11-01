jQuery( function( $ ) {
    // search filed
    var $s = $( '#s' );
    // the search form
    var $sForm = $s.closest( 'form' );
    console.log( $sForm );
    $sForm.on( 'submit', function( event) {
        event.preventDefault();
        $.post(
            WCCAjax.ajaxurl,
            {
                action:     WCCAjax.action,
                search_term: $s.val()
            },
            function( response ) {
                // just append the result to the search form.
                $sForm.append( response );
            }
        );
    });
});