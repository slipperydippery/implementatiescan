jQuery( document ).ready( function( $ ) {
    // $('.actie-omschrijving').on('submit', function() {
    //     alert('yo');
    //     return false;
    // });
    // alert('ready');
 
    $( '.actie-omschrijving' ).blur( function() {
        // alert('submit it')
 
        //.....
        //show some spinner etc to indicate operation in progress
        //.....
 
        $('#actie-form').post(
            $( this ).prop( 'action' ),
            {
                "_token": $( this ).find( 'input[name=_token]' ).val(),
                "setting_name": $( '#setting_name' ).val(),
                "setting_value": $( '#setting_value' ).val()
            },
            function( data ) {
                //do something with data/response returned by server
            },
            'json'
        );
 
        //.....
        //do anything else you might want to do
        //.....
 

        //prevent the form from actually submitting in browser
        return false;
    } );
 
} );