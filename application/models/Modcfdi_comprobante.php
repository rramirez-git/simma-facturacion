<?php
class Modcfdi_comprobante extends MY_Model {
	protected $base_table			= "cfdi_comprobante";
	protected $general_view			= "cfdi_comprobante";
	protected $particular_view		= "cfdi_comprobante";
	protected $definition_file		= 'cfdi_comprobante.json';
	protected $order_by				= "serie, folio, fecha";
	protected $reload_constructor	= true;
	public function __construct() {
		parent::__construct();
		$this->set_field( "fecha", ( new DateTime() )->format( 'Y-m-d\Th:i:s' ) );
	}
	public function set_field( $field, $value ) {
		if( "_sat_id" == strtolower( substr( $field, strlen( $field ) - 7 ) ) ) {
			return false;
		}
		if( "_sat_txt" == strtolower( substr( $field, strlen( $field ) - 8 ) ) ) {
			return false;
		}
		if( in_array( $field, array( "formapago", "moneda", "tipodecomprobante", "metodopago", "emisor_regimenfiscal", "receptor_usocfdi" ) ) ) {
			if( "" != $value ) {
				$opcion = $this->modopciones->get_options_combo( "idcatalogo = " . $this->fields_definition[ $field ][ "idcatalogo" ] )[ $value ];
				list( $id, $txt ) = explode( "|", $opcion );
				parent::set_field( $field . "_sat_id", trim( $id ) );
				parent::set_field( $field . "_sat_txt", trim( $txt ) );
			}
		}
		return parent::set_field( $field, $value );
	}
	public function add_to_database() {
		$this->set_field( "estadofactura", 149 );
		$this->set_field( "fechacancelacion", "0000-00-00 00:00" );
		return parent::add_to_database();
	}
	public function is_prefactura() {
		return '' == $this->get_field( 'sello' ) or '' == $this->get_field( 'uuid' ) or '' == $this->get_field( 'xml' ) or '' == $this->get_field( 'pdf' );
	}
}
?>
