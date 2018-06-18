<?php
class Modopciones extends MY_Model {
	protected $base_table			= "opciones_gv";
	protected $general_view			= "opciones_gv";
	protected $particular_view		= "opciones_gv";
	protected $definition_file		= 'opciones.json';
	protected $order_by				= "opcion";
	protected $reload_constructor	= true;
	public function __construct() {
		parent::__construct();
	}
}
?>
