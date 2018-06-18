<?php
class Prefacturas extends MY_Controller {
	protected $base_model = 'modcfdi_comprobante';
	protected $controler_name = 'Prefacturación';
	protected $auto_display_on_index = true;
	public function __construct() {
		parent::__construct();
		if( ! ( $this->modsesion->logedin() ) ) {
			header( "location: " . base_url( "sesiones/logout" ) );
		}
		$this->{$this->base_model}->set_fields_2_null();
		//var_dump("","","");
	}
	public function index() {
		$defs = $this->{$this->base_model}->get_definitions();
		$filters = array();
		$whr_str = "";
		foreach( $defs as $field => $info ) {
			if( $info[ "showgeneral" ] ) {
				if( $this->input->post( "filter_" . $field ) ) {
					$filters[ $field ] = $this->input->post( "filter_" . $field );
					$whr_str .= ( "" != $whr_str ? ' and ' : '' ) . "convert( $field, char ) like '%{$filters[ $field ]}%'";
				} else {
					$filters[ $field ] = '';
				}
			}
		}
		$regs = array();
		if( null !== $this->input->post( 'apply_filter' ) ) {
			$regs = $this->{$this->base_model}->get_all( $whr_str );
		}
		$autoview = $this->load->view( 'html/autoindex', array(
			"title"			=> $this->controler_name,
		    "subtitle"		=> "Principal",
			"controler"		=> strtolower( get_class( $this ) ),
		    "fields"		=> $defs,
		    "pk"			=> $this->{$this->base_model}->get_pk(),
		    "records"		=> $regs,
		    "filters"		=> $filters
		), true );
		$menumain=$this->load->view('menu/menumain',array(),true);
		$body = $this->load->view( 'html/body', array(
			"body" => $menumain . $autoview
		), true );
		$head = $this->load->view( 'html/head', array(), true );
		$this->load->view( 'html/html', array(
			"head"	=> $head,
			"body"	=> $body
		) );
	}
}
?>
