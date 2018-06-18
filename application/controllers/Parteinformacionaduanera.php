<?php
class Parteinformacionaduanera extends MY_Controller {
	protected $base_model = 'modcfdi_parte_informacionaduanera';
	protected $controler_name = 'Parte / Información Aduanera';
	protected $auto_display_on_index = true;
	public function __construct() {
		parent::__construct();
		if( ! ( $this->modsesion->logedin() ) ) {
			header( "location: " . base_url( "sesiones/logout" ) );
		}
	}
}
?>
