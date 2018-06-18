<?php
class Modcfdi_concepto extends MY_Model {
	protected $base_table			= "cfdi_concepto";
	protected $general_view			= "cfdi_concepto";
	protected $particular_view		= "cfdi_concepto";
	protected $definition_file		= 'cfdi_concepto.json';
	protected $order_by				= null;
	protected $reload_constructor	= true;
	public function __construct() {
		parent::__construct();
	}
	public function set_field( $field, $value ) {
		if( "_sat_id" == strtolower( substr( $field, strlen( $field ) - 7 ) ) ) {
			return false;
		}
		if( "_sat_txt" == strtolower( substr( $field, strlen( $field ) - 8 ) ) ) {
			return false;
		}
		if( in_array( $field, array( 'importe' ) ) ) {
			return false;
		}
		if( in_array( $field, array( "claveprodserv", "claveunidad" ) ) ) {
			$opcion = $this->modopciones->get_options_combo( "idcatalogo = " . $this->fields_definition[ $field ][ "idcatalogo" ] )[ $value ];
			list( $id, $txt ) = explode( "|", $opcion );
			parent::set_field( $field . "_sat_id", trim( $id ) );
			parent::set_field( $field . "_sat_txt", trim( $txt ) );
		}
		if( in_array( $field, array( 'cantidad', 'valorunitario', 'descuento' ) ) ) {
			parent::set_field( $field, $value );
			parent::set_field( 'importe', $this->get_field( 'cantidad' ) * $this->get_field( 'valorunitario' ) - $this->get_field( 'descuento' ) );
		}
		return parent::set_field( $field, $value );
	}
}
?>
