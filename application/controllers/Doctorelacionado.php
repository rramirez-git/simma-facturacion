<?php
class Doctorelacionado extends MY_Controller {
	protected $base_model = 'modcfdi_doctorelacionado';
	protected $controler_name = 'Documento Relacionado';
	protected $auto_display_on_index = true;
	public function __construct() {
		parent::__construct();
		if( ! ( $this->modsesion->logedin() ) ) {
			header( "location: " . base_url( "sesiones/logout" ) );
		}
	}
}
?>
