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
		//$this->{$this->base_model}->set_fields_2_null();
		//var_dump("","","");
		$this->load->model( 'modcliente' );
		$this->load->model( 'modgenerador' );
		$this->load->model( 'modsucursal' );
		$this->load->model( 'modempresa' );
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
		$autoview = $this->load->view( 'mfacturacion/prefacturas/index', array(
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
	public function nueva_libre(){
		$no_cte = "";
		$no_gen = "";
		$cte = null;
		$gen = null;
		$message = null;
		$fiscales = array( 'fecha' => date_format( new DateTime(), "Y-m-d\\TH:i:s" ), "tipodecomprobante" => 105 );
		$opciones = array(
		    "formapago" => $this->modopciones->get_options_combo( "idcatalogo = 18" ),
		    "moneda" => $this->modopciones->get_options_combo( "idcatalogo = 21" ),
		    "tipodecomprobante" => $this->modopciones->get_options_combo( "idcatalogo = 15" ),
		    "metodopago" => $this->modopciones->get_options_combo( "idcatalogo = 20" ),
		    "regimenfiscal" => $this->modopciones->get_options_combo( "idcatalogo = 23" ),
		    "usocfdi" => $this->modopciones->get_options_combo( "idcatalogo = 27" ),
			);
		if( "nuevo" == $this->input->post( 'action' ) ) {
			$no_cte = $this->input->post( 'no_cte' );
			if( "" == $no_cte ) {
				$message = array( "type" => "danger", "txt" => "Debe ingresar un número de cliente" );
			} else {
				$no_gen = $this->input->post( 'no_gen' );
				$cte = new Modcliente();
				$data = $cte->getIdclienteWithIdentificador( 0, $no_cte );
				if( false == $data ) {
					$message = array( "type" => "danger", "txt" => "No se encontró el cliente" );
				} else {
					$cte->getFromDatabase( $data );
					$suc = new Modsucursal();
					$suc->getFromDatabase( $cte->getIdsucursal() );
					$emp = new Modempresa();
					$emp->getFromDatabase( $suc->getIdempresa() );
					if( $cte->getFacturaxgenerador() ) {
						if( "" == $no_gen ) {
							$message = array( "type" => "danger", "txt" => "Debe ingresar un número de generador" );
						} else {
							foreach( $cte->getGeneradores() as $g ) {
								$aux = new Modgenerador();
								$aux->getFromDatabase( $g[ 'idgenerador' ] );
								if( $no_gen == $aux->getIdentificador() ) {
									$gen = $aux;
									break;
								}
							}
							if( null == $gen ) {
								$message = array( "type" => "danger", "txt" => "No se encontró el generador" );
							} else {
								$fiscales[ "formapago" ] = $cte->getCfdi_formapago();
								$fiscales[ "moneda" ] = $cte->getCfdi_moneda();
								$fiscales[ "metodopago"] = $cte->getCfdi_metodopago();
								$fiscales[ "lugarexpedicion" ] = $emp->getCp();
								$fiscales[ "emisor_rfc" ] = $emp->getRfc();
								$fiscales[ "emisor_nombre" ] = $emp->getRazonsocial();
								$fiscales[ "emisor_regimenfiscal" ] = $emp->getRegimenfiscal();
								$fiscales[ "receptor_rfc" ] = $gen->getRfc();
								$fiscales[ "receptor_nombre" ] = $gen->getRazonsocial();
								$fiscales[ "receptor_residenciafiscal" ] = $gen->getCp();
								$fiscales[ "receptor_usocfdi" ] = $cte->getCfdi_usocfdi();
								$fiscales[ "idcliente" ] = $cte->getIdcliente();
								$fiscales[ "idsucursal" ] = $suc->getIdsucursal();
								$fiscales[ "idempresa" ] = $emp->getIdempresa();
							}
						}
					} else {
						$fiscales[ "formapago" ] = $cte->getCfdi_formapago();
						$fiscales[ "moneda" ] = $cte->getCfdi_moneda();
						$fiscales[ "metodopago"] = $cte->getCfdi_metodopago();
						$fiscales[ "lugarexpedicion" ] = $emp->getCp();
						$fiscales[ "emisor_rfc" ] = $emp->getRfc();
						$fiscales[ "emisor_nombre" ] = $emp->getRazonsocial();
						$fiscales[ "emisor_regimenfiscal" ] = $emp->getRegimenfiscal();
						$fiscales[ "receptor_rfc" ] = $cte->getRfc();
						$fiscales[ "receptor_nombre" ] = $cte->getRazonsocial();
						$fiscales[ "receptor_residenciafiscal" ] = $cte->getCp();
						$fiscales[ "receptor_usocfdi" ] = $cte->getCfdi_usocfdi();
						$fiscales[ "idcliente" ] = $cte->getIdcliente();
						$fiscales[ "idsucursal" ] = $suc->getIdsucursal();
						$fiscales[ "idempresa" ] = $emp->getIdempresa();
					}
				}
			}
		} else if( "crear" == $this->input->post( 'action' ) ) {
			$this->{$this->base_model}->set_field( 'idcliente', $this->input->post( 'modcfdi_comprobante_idcliente' ) );
			$this->{$this->base_model}->set_field( 'fecha', $this->input->post( 'modcfdi_comprobante_fecha' ) );
			$this->{$this->base_model}->set_field( 'formapago', $this->input->post( 'modcfdi_comprobante_formapago' ) );
			$this->{$this->base_model}->set_field( 'moneda', $this->input->post( 'modcfdi_comprobante_moneda' ) );
			$this->{$this->base_model}->set_field( 'tipodecomprobante', $this->input->post( 'modcfdi_comprobante_tipodecomprobante' ) );
			$this->{$this->base_model}->set_field( 'metodopago', $this->input->post( 'modcfdi_comprobante_metodopago' ) );
			$this->{$this->base_model}->set_field( 'lugarexpedicion', $this->input->post( 'modcfdi_comprobante_lugarexpedicion' ) );
			$this->{$this->base_model}->set_field( 'emisor_rfc', $this->input->post( 'modcfdi_comprobante_emisor_rfc' ) );
			$this->{$this->base_model}->set_field( 'emisor_nombre', $this->input->post( 'modcfdi_comprobante_emisor_nombre' ) );
			$this->{$this->base_model}->set_field( 'emisor_regimenfiscal', $this->input->post( 'modcfdi_comprobante_emisor_regimenfiscal' ) );
			$this->{$this->base_model}->set_field( 'receptor_rfc', $this->input->post( 'modcfdi_comprobante_receptor_rfc' ) );
			$this->{$this->base_model}->set_field( 'receptor_nombre', $this->input->post( 'modcfdi_comprobante_receptor_nombre' ) );
			$this->{$this->base_model}->set_field( 'receptor_residenciafiscal', $this->input->post( 'modcfdi_comprobante_receptor_residenciafiscal' ) );
			$this->{$this->base_model}->set_field( 'receptor_usocfdi', $this->input->post( 'modcfdi_comprobante_receptor_usocfdi' ) );
			$suc = new Modsucursal();
			$emp = new Modempresa();
			$suc->getFromDatabase( $this->input->post( 'idsucursal' ) );
			$emp->getFromDatabase( $this->input->post( 'idempresa') );
			$serie = null;
			$folio = null;
			/*switch( $this->{$this->base_model}->seg_field( 'tipodecomprobante' ) ) {
				case 106: // Egreso
					$serie = $suc->getNc_serie();
					$folio = intval( $suc->getNc_folio_actual() ) + 1;
					if( $folio > intval( $suc->getNc_folio_final() ) ) {
						$message = array( "type" => "danger", "txt" => "Se han terminado los folios" );
					}
					break;
				case 105: // Ingreso
					$serie = $suc->getFac_serie();
					$folio = intval( $suc->getFac_folio_actual() ) + 1;
					if( $folio > intval( $suc->getFac_folio_final() ) ) {
						$message = array( "type" => "danger", "txt" => "Se han terminado los folios" );
					}
					break;
				case 107: // Pago
					$serie = $suc->getPago_serie();
					$folio = intval( $suc->getPago_folio_actual() ) + 1;
					if( $folio > intval( $suc->getPago_folio_final() ) ) {
						$message = array( "type" => "danger", "txt" => "Se han terminado los folios" );
					}
					break;	
			} */
			$this->{$this->base_model}->set_field( 'serie', $serie );
			$this->{$this->base_model}->set_field( 'folio', $folio );
			$this->{$this->base_model}->add_to_database();
			$id = $this->{$this->base_model}->get_field( $this->{$this->base_model}->get_pk() );
			header( "location: " . base_url( "prefacturas/actualizar_pfl/" . $id ) );
			return true;
		}
		$view = $this->load->view( 'mfacturacion/prefacturas/nuevo-libre', array(
			"no_cte" => $no_cte,
			"no_gen" => $no_gen,
			"message" => $message,
			"fiscales" => $fiscales,
			"cte" => $cte,
			"opciones" => $opciones,
		), true );
		$menumain=$this->load->view('menu/menumain',array(),true);
		$body = $this->load->view( 'html/body', array(
			"body" => $menumain . $view
		), true );
		$head = $this->load->view( 'html/head', array(), true );
		$this->load->view( 'html/html', array(
			"head"	=> $head,
			"body"	=> $body
		) );
	}
	public function actualizar_pfl( $id ) {
		$pf = $this->{$this->base_model};
		$pf = new Modcfdi_comprobante();
		$pf->load_subentities = false;
		$pf->get_from_database( $id );
		//if( "update" == $ )
		$opciones = array(
		    "formapago" => $this->modopciones->get_options_combo( "idcatalogo = 18" ),
		    "moneda" => $this->modopciones->get_options_combo( "idcatalogo = 21" ),
		    "tipodecomprobante" => $this->modopciones->get_options_combo( "idcatalogo = 15" ),
		    "metodopago" => $this->modopciones->get_options_combo( "idcatalogo = 20" ),
		    "regimenfiscal" => $this->modopciones->get_options_combo( "idcatalogo = 23" ),
		    "usocfdi" => $this->modopciones->get_options_combo( "idcatalogo = 27" ),
			);
		$cte = new Modcliente();
		$suc = new Modsucursal();
		$emp = new Modempresa();
		$cte->getFromDatabase( $pf->get_field( 'idcliente' ) );
		$suc->getFromDatabase( $cte->getIdsucursal() );
		$suc->getFromDatabase( $suc->getIdempresa() );
		$fiscales = array( 
			'fecha' => date_format( new DateTime( $pf->get_field( 'fecha' ) ), "Y-m-d\\TH:i:s" ), 
			"tipodecomprobante" => $pf->get_field( 'tipodecomprobante' ),
			"formapago" => $pf->get_field( 'formapago' ),
			"moneda" => $pf->get_field( 'moneda' ),
			"metodopago" => $pf->get_field( 'metodopago' ),
			"lugarexpedicion" => $pf->get_field( 'lugarexpedicion' ),
			"emisor_rfc" => $pf->get_field( 'emisor_rfc' ),
			"emisor_nombre" => $pf->get_field( 'emisor_nombre' ),
			"emisor_regimenfiscal" => $pf->get_field( 'emisor_regimenfiscal' ),
			"receptor_rfc" => $pf->get_field( 'receptor_rfc' ),
			"receptor_nombre" => $pf->get_field( 'receptor_nombre' ),
			"receptor_residenciafiscal" => $pf->get_field( 'receptor_residenciafiscal' ),
			"receptor_usocfdi" => $pf->get_field( 'receptor_usocfdi' ),
			"idcliente" => $cte->getIdcliente(),
			"idsucursal" => $suc->getIdsucursal(),
			"idempresa" => $emp->getIdempresa()
		);
		$view = $this->load->view( 'mfacturacion/prefacturas/upd-libre', array(
			"fiscales" => $fiscales,
			"cte" => $cte,
			"opciones" => $opciones,
			"pf" => $pf
		), true );
		$menumain=$this->load->view('menu/menumain',array(),true);
		$body = $this->load->view( 'html/body', array(
			"body" => $menumain . $view
		), true );
		$head = $this->load->view( 'html/head', array(), true );
		$this->load->view( 'html/html', array(
			"head"	=> $head,
			"body"	=> $body
		) );
	}
	public function agregar_concepto( $idpf ) {
		
	}
}
?>
