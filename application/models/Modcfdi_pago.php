<?php
class Modcfdi_pago extends MY_Model {
	protected $base_table			= "cfdi_pago";
	protected $general_view			= "cfdi_pago";
	protected $particular_view		= "cfdi_pago";
	protected $definition_file		= 'cfdi_pago.json';
	protected $order_by				= "fechapago";
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
		if( in_array( $field, array( "formadepagop", "monedap", "tipocadpago" ) ) ) {
			$opcion = $this->modopciones->get_options_combo( "idcatalogo = " . $this->fields_definition[ $field ][ "idcatalogo" ] )[ $value ];
			list( $id, $txt ) = explode( "|", $opcion );
			parent::set_field( $field . "_sat_id", trim( $id ) );
			parent::set_field( $field . "_sat_txt", trim( $txt ) );
		}
		return parent::set_field( $field, $value );
	}
}
?>
