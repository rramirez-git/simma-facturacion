<?php
class Parte extends MY_Controller {
	protected $base_model = 'modcfdi_parte';
	protected $controler_name = 'Parte';
	protected $auto_display_on_index = true;
	public function __construct() {
		parent::__construct();
		if( ! ( $this->modsesion->logedin() ) ) {
			header( "location: " . base_url( "sesiones/logout" ) );
		}
	}
}
?>
