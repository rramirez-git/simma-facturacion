<?php
class Retenciones extends MY_Controller {
	protected $base_model = 'modcfdi_retenciones';
	protected $controler_name = 'Retenciones';
	protected $auto_display_on_index = true;
	public function __construct() {
		parent::__construct();
		if( ! ( $this->modsesion->logedin() ) ) {
			header( "location: " . base_url( "sesiones/logout" ) );
		}
	}
}
?>
