<?php
class Comprobante extends MY_Controller {
	protected $base_model = 'modcfdi_comprobante';
	protected $controler_name = 'Comprobante';
	protected $auto_display_on_index = true;
	public function __construct() {
		parent::__construct();
		if( ! ( $this->modsesion->logedin() ) ) {
			header( "location: " . base_url( "sesiones/logout" ) );
		}
		//var_dump("","","");
	}
}
?>
