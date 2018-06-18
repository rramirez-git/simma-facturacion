<?php
class Add extends CI_Controller {
	private $condicionesdelpago = array(
		"", "Donec in volutpat mauris, quis vestibulum magna.",
		"", "Fusce metus ex, ullamcorper at vulputate et, posuere ut libero.",
		"", "Nulla sapien libero, eleifend ut consequat ut, lobortis ut nisl.",
		"", "Mauris sodales eleifend eros, eu rutrum ex viverra nec.",
		"", "Nunc tristique lectus eget tempus venenatis.",
		"", "Vivamus malesuada dui non bibendum cursus.",
		"", "Vivamus justo dui, pretium eget nisi id, euismod tristique lacus.",
		"", "Duis enim mi, maximus quis gravida nec, lacinia sed ipsum.",
		"", "Morbi in nisi id felis porta pulvinar iaculis pellentesque metus.",
		"", "Maecenas posuere lorem sed cursus faucibus.",
		"", "Nam sed neque laoreet, viverra ligula sed, sagittis elit.",
		"", "Integer quis consequat mauris, in tincidunt orci.",
		"", "Quisque placerat fringilla condimentum.",
		"", "Cras a justo est.",
		"", "Etiam erat justo, aliquet finibus vehicula sed, sollicitudin ut odio.",
		"", "Aenean molestie elementum consectetur.",
		"", "Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.",
		"" );
	private $rfc = array( "OLB110126U8A", "MIR980115RE7", "IMS1004145W0", "CDI050422H83", "CMA9901083WA", "LRE750911DM0", "GCS060531LX8", "CMQ600819R6A", "LSC0804022A4", "HSJ760616A91", "ITM130731SB2", "SSC101208I63", "WSC080327U78", "TEAJ600730 C66", "GUAE741127DY4", "GUM961002UP6", "GAGC600201CI4", "VATS811117DP2", "AEA610204627", "OOTL810918MV8", "MII970217BU8", "LGQ051010U31", "NSD610711RT0", "CIT09030349A", "GAAE7802181R1", "REPB670208HP3", "GACA550307T19", "COJX830620GV6", "GOMC520116AS2", "IPN811229H26", "ILD041028IT1", "LCG820524A51", "LAME630104R17", "RECM5210186V7", "NFN810430AR7", "SOVP670125LA0", "RIM850614LJ2", "FES840823HH0", "EIAL710128SI8", "VAME621119A22", "CASM700708KRA", "RALJ800816N26", "RUAE810518I52", "AEYT840509K16", "PCR110621EG7", "FAM050401CJ0", "PST050124EX1", "GARE7506227YA", "FBE9110215Z3", "SNS960412AH4" );
	private $razon_social = array( "Municipio de Tuxtla Gutierrez", "Jaime Isaac Mendiola Jiménez", "Aseca, S.A. de C.V.", 
		"Instituto de Seguridad y Servicios Sociales de los Trabajadores del Estado", "Laboratorios Clínicos Especializados Integrales Lindavista, S.A. De C.V.", 
		"María Cristina Bollo Molina", "Cruz Roja Mexicana IAP", "Universidad Nacional Autónoma de México", "Sanborn Hermanos, S.A. ", "Claudia  Eva Corral Barrientos", 
		"Sante Medical Center S.A. de C.V.", "Promotora y servicios integrales SAPI", "ClÍnica de Diagnostico Lindavista, S. A. de C.V.", "Laser Ocular Lomas, S.C.", 
		"Farmacias ABC de México SA de CV", "Comisión Federal de Electricidad", "Comercializadora DAX, S.A. de C.V.", 
		"Seguros Atlas, SA", "Eco 4 Ambiental, S. De R.L. De C.V.", "Tratamientos Ecológicos SGA, S.A. de C.V.", "Martha Rosario Montiel Gutierrez", 
		"Sanatorio Oftalmológico Mérida, S.A. de C.V. ", "Ramón Bejarano Blanes", "O3 Clínica Medica S. de R.L. de C.V.", "Alfredo Caudillo Morales", 
		"Comercializadora Latinoamericana Kitsi, SAPI de C.V.", "Distribuidora Internacional de Medicamentos y Equipo Medico, S.A. de C.V.", "SALUCOM, S.A. de C.V.", 
		"SALUCOM, S.A. de C.V.", "Productos Hospitalarios, S.A. de C.V", "Productos Hospitalarios, S.A. de C.V", "Pharma Plus, S.A. de C.V", 
		"Líder en Cirugía Plástica, S.A de C.V.", "Proveedora Clínica Medica, S.A. de C.V.", "Clínica de Traumatología y Ortopedia de Oriente, S.A de C.V.", 
		"Instituto de Seguridad y Servicios Sociales de los Trabajadores del Estado", "Laboratorio Medico Polanco, S.A. de C.V.", "Centro Hospitalario Mac, S.A. de C.V.", 
		"Instituto Mexicano Del Seguro Social", "Comercializadora Latinoamericana Kitsi, SAPI de C.V.", "Instituto Nacional de Perinatologia", "Secretaria de Marina", 
		"Jorge Alejandro Rosas Pérez", "Jorge Rios Santa Cruz Polanco", "Tip Servicios Medicos Integrales, S.A. de C.V.", "Dental Integrada del Sur, S.C.", 
		"Pharma Plus, S.A. de C.V.", "Sandra Paulina Rodriguez Dominguez", "Miriam Edith Rodriguez Rosales", "ISMEDERM, S.C." );
	private $idcte = array( 109, 112, 113, 114, 115, 116, 117, 118, 119, 120, 121, 122, 123, 124, 125, 126, 127, 128, 130, 131, 132, 134, 135, 136, 137, 138, 139, 140, 141, 142, 143, 144, 145, 146, 147, 148, 149, 150, 151, 152, 153, 154, 155, 156, 157, 158, 159, 160, 161, 162 );
	private $unds = array( "Servicio", "Kilogramo", "M3", "Contenedor", "Tambo", "Transporte - Tratamiento", "Tratamiento", "Metro cúbico", "Unidad de servicio", "Pieza", "Kilogramo, incluyendo el contenedor", "Kilogramo neto, después de las deducciones", "Litro  1 DM 3", "Tambor", "Contenedor para líquidos a granel" );
	private $descs = array(
		"Pellentesque malesuada diam vitae fermentum sodales.", 
		"Integer dui nisi, semper laoreet massa non, luctus vestibulum risus.", 
		"Sed maximus justo nunc.", 
		"Nam sagittis, neque non semper ultricies, odio enim tincidunt felis, at lobortis augue magna a leo.", 
		"Nam viverra neque in interdum ultrices.", 
		"Nam blandit interdum ante at ultricies.", 
		"Quisque eu leo at tellus ullamcorper fringilla malesuada gravida felis.", 
		"Praesent quis porta tellus, at feugiat massa.", 
		"Vestibulum sagittis, tellus in molestie lacinia, turpis velit feugiat sapien, at tristique risus elit quis est.", 
		"Fusce in est odio.", 
		"Nulla iaculis eros ut facilisis lobortis.", 
		"Phasellus tempor tincidunt neque a convallis.", 
		"Suspendisse posuere tellus at porta facilisis.", 
		"In consectetur a nisl non mattis.", 
		"Nulla et nulla euismod, lacinia ligula tincidunt, dictum mi.", 
		"Aliquam suscipit neque ac vestibulum vehicula.", 
		"Donec iaculis semper dui ac finibus.", 
		"Aliquam pretium risus eget eros vestibulum, quis lobortis sapien vestibulum.", 
		"Donec imperdiet, magna sed auctor rutrum, diam sapien facilisis velit, nec feugiat libero libero vitae enim.", 
		"Phasellus egestas finibus ligula sit amet finibus.", 
		"Proin cursus magna non turpis dapibus, non rutrum nulla faucibus.", 
		"Proin rhoncus, dui eu convallis lacinia, risus quam sodales neque, et tempus enim justo at nisl.", 
		"Interdum et malesuada fames ac ante ipsum primis in faucibus.", 
		"Nulla a quam in mi interdum sollicitudin eget vel lectus.", 
		"Mauris eleifend nulla vitae eleifend facilisis.", 
		"Quisque auctor elit ligula, in consequat metus molestie vitae.", 
		"Suspendisse egestas velit mollis felis pulvinar, dapibus bibendum arcu mattis.", 
		"Quisque pellentesque mauris vel tincidunt semper.", 
		"Donec euismod quam in tincidunt vehicula.", 
		"Fusce eu condimentum diam.", 
		"Morbi et rutrum erat.", 
		"Nullam tincidunt mi nec pulvinar volutpat."
	);
	private $palabras = array( "Lorem", "ipsum", "dolor", "sit", "amet", "consectetur", "adipiscing", "elit", "Donec", "sit", "amet", "nisl", "nulla", "Nulla", "facilisi", "Morbi", "facilisis", "metus", "et", "augue", "laoreet", "sed", "auctor", "metus", "auctor", "Nam", "felis", "turpis", "efficitur", "ac", "ornare", "nec", "dignissim", "vel", "eros", "Phasellus", "dignissim", "lorem", "sed", "condimentum", "tristique", "erat", "nulla", "mattis", "lectus", "id", "viverra", "augue", "dolor", "eu", "neque", "Fusce", "risus", "mauris", "varius", "ut", "congue", "eget", "tempor", "vel", "nibh", "Nullam", "vehicula", "sollicitudin", "consequat" );
	private function chooseOne( $data_array ) {
		return $data_array[ rand( 0, count( $data_array ) - 1 ) ];
	}
	private function random_date( $yr_start, $yr_end ) {
		$month = rand( 1, 12 );
		$day = rand( 1, 28 );
		$yr = rand( $yr_start, $yr_end );
		return $yr . "-" . ( $month < 10 ? '0' : '' ) . $month . "-" . ( $day < 10 ? '0' : '' ) . $day;
	}
	private function random_money( $ini = 1, $fin = 9999 ) { return floatval( rand( $ini, $fin ) . "." . rand( 1, 9999 ) ); }
	private function random_time() {
		$h = rand( 0, 23 );
		$m = rand( 0, 60 );
		$s = rand( 0, 60 );
		return ( $h < 10 ? '0' : '' ) . $h . ":" . ( $m < 10 ? '0' : '' ) . $m . ":" . ( $s < 10 ? '0' : '' ) . $s;
	}
	private function random_datetime( $yr_start, $yr_end ) { return $this->random_date( $yr_start, $yr_end ) . " " . $this->random_time(); }
	private function cfdi_comprobante() {
		$comprobante = new Modcfdi_comprobante();
		$comprobante->set_field( "version", rand( 1, 3 ) . "." . rand( 0, 9) );
		$comprobante->set_field( "serie", chr( rand( 65, 90 ) ) . chr( rand( 65, 90 ) ) . chr( rand( 65, 90 ) ) . chr( rand( 65, 90 ) ) );
		$comprobante->set_field( "folio", rand( 1, 999999 ) );
		$comprobante->set_field( "fecha", $this->random_date( 2018, 2018 ) );
		$comprobante->set_field( "sello", base64_encode( sha1( $comprobante->get_field( 'serie' ) . $comprobante->get_field( 'folio' ) ) ) );
		$comprobante->set_field( "formapago", $this->chooseOne( array_keys( $this->modopciones->get_options_combo( "idcatalogo = 18" ) ) ) );
		$comprobante->set_field( "nocertificado", rand( 1, 999999 ) . rand( 1, 999999 ) );
		$comprobante->set_field( "certificado", base64_encode( sha1( $comprobante->get_field( 'nocertificado' ) ) ) );
		$comprobante->set_field( "condicionesdelpago", $this->chooseOne( $this->condicionesdelpago ) );
		$comprobante->set_field( "subtotal", $this->random_money() );
		$comprobante->set_field( "descuento", $this->random_money() );
		$comprobante->set_field( "moneda", $this->chooseOne( array_keys( $this->modopciones->get_options_combo( "idcatalogo = 21" ) ) ) );
		$comprobante->set_field( "tipocambio", 1 / rand( 1, 3 ) );
		$comprobante->set_field( "total", $this->random_money() );
		$comprobante->set_field( "tipodecomprobante", $this->chooseOne( array_keys( $this->modopciones->get_options_combo( "idcatalogo = 15" ) ) ) );
		$comprobante->set_field( "metodopago", $this->chooseOne( array_keys( $this->modopciones->get_options_combo( "idcatalogo = 20" ) ) ) );
		$comprobante->set_field( "lugarexpedicion", rand( 10000, 99999 ) );
		$comprobante->set_field( "confirmacion", base64_encode( sha1( $comprobante->get_field( 'certificado' ) ) ) );
		$comprobante->set_field( "emisor_rfc", $this->chooseOne( $this->rfc ) );
		$comprobante->set_field( "emisor_nombre", $this->chooseOne( $this->razon_social ) );
		$comprobante->set_field( "emisor_regimenfiscal", $this->chooseOne( array_keys( $this->modopciones->get_options_combo( "idcatalogo = 23" ) ) ) );
		$comprobante->set_field( "receptor_rfc", $this->chooseOne( $this->rfc ) );
		$comprobante->set_field( "receptor_nombre", $this->chooseOne( $this->razon_social ) );
		$comprobante->set_field( "receptor_residenciafiscal", rand( 10000, 99999 ) );
		$comprobante->set_field( "receptor_numregidtrib", substr( sha1( $comprobante->get_field( 'receptor_nombre' ) ), 0, 25 ) );
		$comprobante->set_field( "receptor_usocfdi", $this->chooseOne( array_keys( $this->modopciones->get_options_combo( "idcatalogo = 27" ) ) ) );
		$comprobante->set_field( "uuid", base64_encode( sha1( $comprobante->get_field( 'sello' ) ) ) );
		$comprobante->set_field( "impuestos_totalimpuestosretenidos", $this->random_money() );
		$comprobante->set_field( "impuestos_totalimpuestostrasladados", $this->random_money() );
		$comprobante->set_field( "xml", $comprobante->get_field( 'serie' ) . $comprobante->get_field( 'folio' ) . ".xml" );
		$comprobante->set_field( "pdf", $comprobante->get_field( 'serie' ) . $comprobante->get_field( 'folio' ) . ".pdf" );
		$comprobante->set_field( "idcliente", $this->chooseOne( $this->idcte ) );
		return $comprobante;
	}
	public function comprobante( $qty = 5 ) {
		$this->load->model( 'modcfdi_comprobante' );
		for( $cont = 0; $cont < $qty; $cont++ ) {
			$comprobante = $this->cfdi_comprobante();
			$comprobante->add_to_database();
			$comprobante->set_field( "estadofactura", ( rand( 1, 10 ) > 7 ? 150 : 149 ) );
			if( $comprobante->get_field( "estadofactura" ) == 150 ) {
				$comprobante->set_field( "fechacancelacion", $this->random_date( 2018, 2018 ) );
				$comprobante->update_to_database();
			}
			echo "Agregando cfdi_comprobante: " . $comprobante->get_field( "idcfdi_comprobante" ) . '<br />';
		}
	}
	private function cfdi_concepto( $idcomprobante ) {
		$concepto = new Modcfdi_concepto();
		$concepto->set_field( "idcfdi_comprobante", $idcomprobante );
		$concepto->set_field( "claveprodserv", $this->chooseOne( array_keys( $this->modopciones->get_options_combo( "idcatalogo = 16" ) ) ) );
		$concepto->set_field( "noidentificacion", rand( 1, 999999 ) . rand( 1, 999999 ) );
		$concepto->set_field( "cantidad", rand( 1, 50 ) );
		$concepto->set_field( "claveunidad", $this->chooseOne( array_keys( $this->modopciones->get_options_combo( "idcatalogo = 17" ) ) ) );
		$concepto->set_field( "unidad", $this->chooseOne( $this->unds ) );
		$concepto->set_field( "descripcion", $this->chooseOne( $this->descs ) );
		$concepto->set_field( "valorunitario", rand( 1, 9999 ) );
		$concepto->set_field( "descuento", rand( 1, 10 ) > 7 ? rand( 1, $concepto->get_field( 'cantidad' ) * $concepto->get_field( 'valorunitario' ) / 2 ) : 0 );
		$concepto->set_field( "cuentapredial_numero", base64_encode( sha1( $concepto->get_field( 'noidentificacion' ) ) ) );
		return $concepto;
	}
	public function concepto( $qty = 5 ) {
		$this->load->model( 'modcfdi_concepto' );
		$comprobs = $this->modcfdi_comprobante->get_all();
		for( $cont = 0; $cont < $qty; $cont++ ) {
			$concepto = $this->cfdi_concepto( $comprobs[ rand( 0, count( $comprobs ) - 1 ) ][ "idcfdi_comprobante" ] );
			$concepto->add_to_database();
			echo "Agregando cfdi_concepto: " . $concepto->get_field( "idcfdi_concepto" ) . '<br />';
		}
	}
	private function cfdi_concepto_impuestos( $idconcepto ) {
		$impuesto = new Modcfdi_concepto_impuestos();
		$impuesto->set_field( 'idcfdi_concepto', $idconcepto );
		$impuesto->set_field( 'tipo', rand( 1, 20 ) > 7 ? 'R' : 'T' );
		$impuesto->set_field( 'base', rand( 1, 9999 ) );
		$impuesto->set_field( 'impuesto', $this->chooseOne( array_keys( $this->modopciones->get_options_combo( "idcatalogo = 19" ) ) ) );
		$impuesto->set_field( 'tipofactor', $this->chooseOne( array_keys( $this->modopciones->get_options_combo( "idcatalogo = 25" ) ) ) );
		$impuesto->set_field( 'tasaocuota', ( rand( 1, 10 ) < 7 ? 0.16 : ( rand( 1, 10 ) < 7 ? 0.10 : 0.00 ) ) );
		$impuesto->set_field( 'importe', $impuesto->get_field( 'base' ) * $impuesto->get_field( 'tasaocuota' ) );
		return $impuesto;
	}
	public function impuesto( $qty = 5 ) {
		$this->load->model( 'modcfdi_concepto_impuestos' );
		$concs = $this->modcfdi_concepto->get_all();
		for( $cont = 0; $cont < $qty; $cont++ ) {
			$impuesto = $this->cfdi_concepto_impuestos( $concs[ rand( 0, count( $concs ) - 1 ) ][ "idcfdi_concepto" ] );
			$impuesto->add_to_database();
			echo "Agregando cfdi_concepto_impuesto al concepto: " . $impuesto->get_field( "idcfdi_concepto" ) . '<br />';
		}
	}
	private function cfdi_concepto_informacionaduanera( $idconcepto ) {
		$informacionaduanera = new Modcfdi_concepto_informacionaduanera();
		$informacionaduanera->set_field( 'idcfdi_concepto', $idconcepto );
		$informacionaduanera->set_field( 'numeropedimento', $this->chooseOne( $this->palabras ) );
		return $informacionaduanera;
	}
	public function informacionaduanera( $qty = 5 ) {
		$this->load->model( 'modcfdi_concepto_informacionaduanera' );
		$concs = $this->modcfdi_concepto->get_all();
		for( $cont = 0; $cont < $qty; $cont++ ) {
			$informacionaduanera = $this->cfdi_concepto_informacionaduanera( $concs[ rand( 0, count( $concs ) - 1 ) ][ "idcfdi_concepto" ] );
			$informacionaduanera->add_to_database();
			echo "Agregando cfdi_concepto_informacionaduanera al concepto: " . $informacionaduanera->get_field( "idcfdi_concepto" ) . '<br />';
		}
	}
	private function cfdi_parte( $idconcepto ) {
		$parte = new Modcfdi_parte();
		$parte->set_field( 'idcfdi_concepto', $idconcepto );
		$parte->set_field( 'claveprodserv', $this->chooseOne( array_keys( $this->modopciones->get_options_combo( "idcatalogo = 16" ) ) ) );
		$parte->set_field( 'noidentificacion', rand( 1, 999999 ) . rand( 1, 999999 ) );
		$parte->set_field( 'cantidad', rand( 1, 50 ) );
		$parte->set_field( 'unidad', $this->chooseOne( $this->unds ) );
		$parte->set_field( 'descripcion', $this->chooseOne( $this->descs ) );
		$parte->set_field( 'valorunitario', rand( 1, 5000 ) );
		return $parte;
	}
	public function parte( $qty = 5 ) {
		$this->load->model( 'modcfdi_parte' );
		$concs = $this->modcfdi_concepto->get_all();
		for( $cont = 0; $cont < $qty; $cont++ ) {
			$parte = $this->cfdi_parte( $concs[ rand( 0, count( $concs ) - 1 ) ][ "idcfdi_concepto" ] );
			$parte->add_to_database();
			echo "Agregando cfdi_parte: " . $parte->get_field( "idcfdi_parte" ) . '<br />';
		}
	}
	private function cfdi_parte_informacionaduanera( $idparte) {
		$informacionaduanera = new Modcfdi_parte_informacionaduanera();
		$informacionaduanera->set_field( 'idcfdi_parte', $idparte );
		$informacionaduanera->set_field( 'numeropedimento', $this->chooseOne( $this->palabras ) );
		return $informacionaduanera;
	}
	public function parteinformacionaduanera( $qty = 5 ) {
		$this->load->model( 'modcfdi_parte_informacionaduanera' );
		$partes = $this->modcfdi_parte->get_all();
		for( $cont = 0; $cont < $qty; $cont++ ) {
			$informacionaduanera = $this->cfdi_parte_informacionaduanera( $partes[ rand( 0, count( $partes ) - 1 ) ][ "idcfdi_parte" ] );
			$informacionaduanera->add_to_database();
			echo "Agregando cfdi_concepto_informacionaduanera a la parte: " . $informacionaduanera->get_field( "idcfdi_parte" ) . '<br />';
		}
	}
	private function cfdi_relacionado( $idcomprobante ) {
		$rel = new Modcfdi_relacionado();
		$comprobs = $this->modcfdi_comprobante->get_all();
		$rel->set_field( 'idcfdi_comprobante', $idcomprobante );
		$rel->set_field( 'tiporelacion', $this->chooseOne( array_keys( $this->modopciones->get_options_combo( "idcatalogo = 26" ) ) ) );
		$rel->set_field( 'idcfdi_comprobante_relacionado', $this->chooseOne( $comprobs )[ "idcfdi_comprobante" ] );
		$rel->set_field( 'uuid', $this->chooseOne( $this->palabras ) . "-" . rand( 10000, 99999) . $this->chooseOne( $this->palabras ) . "-" . rand( 10000, 99999) );
		return $rel;
	}
	public function relacionado( $qty = 5 ) {
		$this->load->model( 'modcfdi_relacionado' );
		$comprobs = $this->modcfdi_comprobante->get_all();
		for( $cont = 0; $cont < $qty; $cont++ ) {
			$rel = $this->cfdi_relacionado( $comprobs[ rand( 0 , count( $comprobs ) - 1 ) ][ "idcfdi_comprobante" ] );
			$rel->add_to_database();
			echo "Agregando cfdi_relacionado al comprobante: " . $rel->get_field( "idcfdi_comprobante" ) . '<br />';
		}
	}
	private function cfdi_pago( $idcomprobante ) {
		$pago = new Modcfdi_pago();
		$pago->set_field( 'idcfdi_comprobante', $idcomprobante );
		$pago->set_field( 'fechapago', $this->random_datetime( 2019, 2019 ) );
		$pago->set_field( 'formadepagop', $this->chooseOne( array_keys( $this->modopciones->get_options_combo( "idcatalogo = 18" ) ) ) );
		$pago->set_field( 'monedap', $this->chooseOne( array_keys( $this->modopciones->get_options_combo( "idcatalogo = 21" ) ) ) );
		$pago->set_field( 'tipocambiop', rand( 1,10 ) > 7 ? rand()/rand() * 10 : 1 );
		$pago->set_field( 'monto', rand( 1, 9999 ) );
		$pago->set_field( 'numoperacion', rand( 1, 9999 ) . rand( 1, 9999 ) );
		$pago->set_field( 'rfcemisorctaord', $this->chooseOne( $this->rfc ) );
		$pago->set_field( 'nombancoordext', $this->chooseOne( $this->razon_social ) );
		$pago->set_field( 'ctaordenante', rand( 1, 9999 ) . rand( 1, 9999 ) . rand( 1, 9999 ) );
		$pago->set_field( 'rfcemisorctaben', $this->chooseOne( $this->rfc ) );
		$pago->set_field( 'ctabeneficiario', rand( 1, 9999 ) . rand( 1, 9999 ) . rand( 1, 9999 ) );
		$pago->set_field( 'tipocadpago', $this->chooseOne( array_keys( $this->modopciones->get_options_combo( "idcatalogo = 31" ) ) ) );
		$pago->set_field( 'certpago', rand( 10000, 99999) . $this->chooseOne( $this->palabras ) . "-" . rand( 10000, 99999) . $this->chooseOne( $this->palabras ) . rand( 10000, 99999) );
		$pago->set_field( 'cadpago', $this->chooseOne( $this->palabras ) . "-" . rand( 10000, 99999) . $this->chooseOne( $this->palabras ) );
		$pago->set_field( 'sellopago', base64_encode( sha1( rand( 10000, 99999) . $this->chooseOne( $this->palabras ) . "-" . rand( 10000, 99999) . $this->chooseOne( $this->palabras ) . rand( 10000, 99999) ) ) );
		return $pago;
	}
	public function pago( $qty = 5 ) {
		$this->load->model( 'modcfdi_pago' );
		$comprobs = $this->modcfdi_comprobante->get_all();
		for( $cont = 0; $cont < $qty; $cont++ ) {
			$pago = $this->cfdi_pago( $comprobs[ rand( 0 , count( $comprobs ) - 1 ) ][ "idcfdi_comprobante" ] );
			$pago->add_to_database();
			echo "Agregando cfdi_pago: " . $pago->get_field( "idcfdi_pago" ) . '<br />';
		}
	}
	private function cfdi_retenciones( $idcomprobante ) {
		$retenciones = new Modcfdi_retenciones();
		$retenciones->set_field( 'idcfdi_comprobante', $idcomprobante );
		$retenciones->set_field( 'impuesto', $this->chooseOne( array_keys( $this->modopciones->get_options_combo( "idcatalogo = 19" ) ) ) );
		$retenciones->set_field( 'importe', rand( 100, 9999 ) );
		return $retenciones;
	}
	public function retenciones( $qty = 5 ) {
		$this->load->model( 'modcfdi_retenciones' );
		$comprobs = $this->modcfdi_comprobante->get_all();
		for( $cont = 0; $cont < $qty; $cont++ ) {
			$ret = $this->cfdi_retenciones( $comprobs[ rand( 0 , count( $comprobs ) - 1 ) ][ "idcfdi_comprobante" ] );
			$ret->add_to_database();
			echo "Agregando cfdi_retenciones al comprobante: " . $ret->get_field( "idcfdi_comprobante" ) . '<br />';
		}
	}
	private function cfdi_traslados( $idcomprobante ) {
		$traslados = new Modcfdi_traslados();
		$traslados->set_field( 'idcfdi_comprobante', $idcomprobante );
		$traslados->set_field( 'impuesto', $this->chooseOne( array_keys( $this->modopciones->get_options_combo( "idcatalogo = 19" ) ) ) );
		$traslados->set_field( 'tipofactor', $this->chooseOne( array_keys( $this->modopciones->get_options_combo( "idcatalogo = 25" ) ) ) );
		$traslados->set_field( 'tasaocuota', rand()/rand() * 5 );
		$traslados->set_field( 'importe', rand( 100, 9999 ) );
		return $traslados;
	}
	public function traslados( $qty = 5 ) {
		$this->load->model( 'modcfdi_traslados' );
		$comprobs = $this->modcfdi_comprobante->get_all();
		for( $cont = 0; $cont < $qty; $cont++ ) {
			$tras = $this->cfdi_traslados( $comprobs[ rand( 0 , count( $comprobs ) - 1 ) ][ "idcfdi_comprobante" ] );
			$tras->add_to_database();
			echo "Agregando cfdi_traslados al comprobante: " . $tras->get_field( "idcfdi_comprobante" ) . '<br />';
		}
	}
	public function cfdi_doctorelacionado( $idpago ) {
		$docto = new Modcfdi_doctorelacionado();
		$comprobs = $this->modcfdi_comprobante->get_all( "tipodecomprobante = 105 and estadofactura = 149" );
		$comprob = new Modcfdi_comprobante();
		$comprob->get_from_database( $comprobs[ rand( 0, count( $comprobs ) - 1 ) ][ "idcfdi_comprobante" ] );
		$docto->set_field( 'idcfdi_pago', $idpago );
		$docto->set_field( 'iddocumento', $comprob->get_field( 'uuid' ) );
		$docto->set_field( 'serie', $comprob->get_field( 'serie' ) );
		$docto->set_field( 'folio', $comprob->get_field( 'folio' ) );
		$docto->set_field( 'monedadr', $comprob->get_field( 'moneda' ) );
		$docto->set_field( 'tipocambiodr', $comprob->get_field( 'tipocambio' ) );
		$docto->set_field( 'metododepagodr', $comprob->get_field( 'metodopago' ) );
		$docto->set_field( 'numparcialidad', rand( 1, 10 ) );
		$docto->set_field( 'impsaldoant', rand( 1, $comprob->get_field( 'total' ) ) );
		$docto->set_field( 'imppagado', rand( 1, $comprob->get_field( 'total' ) - $docto->get_field( 'impsaldoant' ) ) );
		$docto->set_field( 'impsaldoinsoluto', $comprob->get_field( 'total' ) - $docto->get_field( 'impsaldoant' ) - $docto->get_field( 'imppagado' ) );
		return $docto;
	}
	public function doctorelacionado( $qty = 5 ) {
		$this->load->model( 'modcfdi_doctorelacionado' );
		$pagos = $this->modcfdi_pago->get_all();
		for( $cont = 0; $cont < $qty; $cont++ ) {
			$doc = $this->cfdi_doctorelacionado( $pagos[ rand( 0, count( $pagos ) - 1 ) ][ "idcfdi_pago" ] );
			$doc->add_to_database();
			echo "Agregando cfdi_doctorelacionado al pago: " . $doc->get_field( "idcfdi_pago" ) . '<br />';
		}
	}
	private function cfdi_parte_comp( $idconcepto, $qty_items ) {
		$main_item = $this->cfdi_parte( $idconcepto );
		for( $cont_items = 0; $cont_items < $qty_items; $cont_items++ ) {
			$sec_item = $this->cfdi_parte_informacionaduanera( 0 );
			$main_item->set_field( 'informacionaduanera', $sec_item );
		}
		return $main_item;
	}
	public function parte_comp( $qty = 5 ) {
		$this->load->model( 'modcfdi_parte' );
		$parents = $this->modcfdi_concepto->get_all();
		for( $cont = 0; $cont < $qty; $cont++ ) {
			$item = $this->cfdi_parte_comp( $parents[ rand( 0, count( $parents ) - 1 ) ][ "idcfdi_concepto" ], rand( 1, 10 ) < 7 ? 0 : rand( 1, 10) );
			$item->add_to_database();
			echo "Agregando cfdi_parte: " . $item->get_field( "idcfdi_parte" ) . '<br />';
		}
	}
	private function cfdi_pago_comp( $idcomprobante, $qty_items ) {
		$main_item = $this->cfdi_pago( $idcomprobante );
		$main_item->set_field( 'monto', 0 );
		for( $cont_items = 0; $cont_items < $qty_items; $cont_items++ ) {
			$item = $this->cfdi_doctorelacionado( 0 );
			$item->set_field( 'monedadr', $main_item->get_field( 'monedap' ) );
			$item->set_field( 'tipocambiodr', $main_item->get_field( 'tipocambiop' ) );
			$main_item->set_field( 'monto', $main_item->get_field( 'monto' ) + $item->get_field( 'imppagado' ) );
			$main_item->set_field( 'documentos', $item );
		}
		return $main_item;
	}
	public function pago_comp( $qty = 5 ) {
		$this->load->model( 'modcfdi_pago' );
		$parents = $this->modcfdi_comprobante->get_all();
		for( $cont = 0; $cont < $qty; $cont++ ) {
			$item = $this->cfdi_pago_comp( $parents[ rand( 0, count( $parents ) - 1 ) ][ "idcfdi_comprobante" ], rand( 1, 10 ) < 7 ? 1 : rand( 1, 10) );
			$item->add_to_database();
			echo "Agregando cfdi_pago: " . $item->get_field( "idcfdi_pago" ) . '<br />';
		}
	}
	private function cfdi_concepto_comp( $idcomprobante, $qty_items ) {
		$main_item = $this->cfdi_concepto( $idcomprobante );
		$impuesto = $this->cfdi_concepto_impuestos( 0 );
		$impuesto->set_field( 'base', $main_item->get_field( 'importe' ) );
		$impuesto->set_field( 'importe', $impuesto->get_field( 'base' ) * $impuesto->get_field( 'tasaocuota' ) );
		$main_item->set_field( 'impuestos', $impuesto );
		for( $cont_items = 0; $cont_items < $qty_items; $cont_items++ ) {
			$item = $this->cfdi_parte_comp( 0, rand( 1, 10 ) < 7 ? 0 : rand( 0, 10 ) );
			$main_item->set_field( 'partes', $item );
		}
		for( $cont_items = 0; $cont_items < $qty_items; $cont_items++ ) {
			$item = $this->cfdi_concepto_informacionaduanera( 0 );
			$main_item->set_field( 'informacionaduanera', $item );
		}
		return $main_item;
	}
	public function concepto_comp( $qty = 5 ) {
		$this->load->model( 'modcfdi_concepto' );
		$parents = $this->modcfdi_comprobante->get_all();
		for( $cont = 0; $cont < $qty; $cont++ ) {
			$item = $this->cfdi_concepto_comp( $parents[ rand( 0, count( $parents ) - 1 ) ][ "idcfdi_comprobante" ], rand( 0, 10 ) );
			$item->add_to_database();
			echo "Agregando cfdi_concepto: " . $item->get_field( "idcfdi_concepto" ) . '<br />';
		}
	}
}
?>
