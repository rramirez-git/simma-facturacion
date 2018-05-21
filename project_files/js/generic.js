function openModal( body, title, footer ) {
	if( "undefined" == typeof title ) {
		title = "";
	}
	if( "undefined" == typeof footer ) {
		footer = "";
	}
	var panelHTMLCode = Handlebars.compile( $( "#modal-panel-scr" ).html() )( { title, body, footer } );
	$( "#panel-div" ).html( $( panelHTMLCode ) );
	$( "#modal-panel" ).modal( {
		'keyboard'	: true,
		'focus'		: true,
		'show'		: true
	} );
}

function closeModal( idModal ) {
	if( "undefined" == typeof idModal ) {
		idModal = "modal-panel";
	}
	$( "#" + idModal ).modal( 'hide' );
	$( "#" + idModal ).modal( 'dispose' );
	$( "#" + idModal ).remove();
	$( document.body ).removeClass( 'modal-open' );
	$( ".modal-backdrop" ).remove();
}

var actions_number = 0;

function do_reload() {
	if( 0 == actions_number ) {
		location.reload();
	}
	else {
		setTimeout( do_reload, 2000 );
	}
}

function data_sort( a, b ) {
	if( "number" == typeof a && "number" == typeof b ) {
		return a - b;
	} else if( "string" == typeof a && "string" == typeof b ) {
		return ( a < b ? -1 : ( a == b ? 0 : 1 ) );
	}
	return data_sort( "" + a, "" + b );
}