<?php
class Modcfdi_concepto_informacionaduanera extends MY_Model {
	protected $base_table			= "cfdi_concepto_informacionaduanera";
	protected $general_view			= "cfdi_concepto_informacionaduanera";
	protected $particular_view		= "cfdi_concepto_informacionaduanera";
	protected $definition_file		= 'cfdi_concepto_informacionaduanera.json';
	protected $order_by				= "numeropedimento";
	protected $reload_constructor	= true;
	public function __construct() {
		parent::__construct();
	}
	public function set_field( $field, $value ) {
		if( "primary_key" != $field ) {
			return parent::set_field( $field, $value );
		}
		$this->fields[ $field ] = parent::get_field( 'idcfdi_concepto' ) . "___" . parent::get_field( 'numeropedimento' );
		return true;
	}
	public function get_field( $field ) {
		if( 'primary_key' == $field ) {
			return parent::get_field( 'idcfdi_concepto' ) . "___" . parent::get_field( 'numeropedimento' );
		}
		return parent::get_field( $field );
	}
	public function get_from_database( $pk_value = "" ) {
		$pk = $this->get_field( $this->get_pk() );
		if( "" == $pk || 0 == $pk ) {
			if( $pk_value > 0 ) {
				$pk = $pk_value;
			} else {
				return false;
			}
		}
		$pk = urldecode($pk);
		log_message( 'info', 'Getting from DB ' . get_class( $this ) . ' ' . $pk . ' with ' . ( $this->load_subentities ? '' : 'no ' ) . 'load_subentities.' );
		$this->db->where( " concat( idcfdi_concepto, '___' , numeropedimento ) = '$pk' " );
		$regs = $this->db->get( $this->particular_view );
		$this->db->reset_query();
		if( 0 === $regs->num_rows() ) {
			return false;
		}
		$reg = $regs->row_array();
		foreach( $this->fields as $field => $value ) {
			if( isset( $this->fields_definition[ $field ] ) && true === $this->fields_definition[ $field ][ "isdirect" ] ) {
				$this->set_field( $field, $reg[ $field ] );
			} else if( isset( $this->fields_definition[ "id" . $field ] ) && "entity" === $this->fields_definition[ "id" . $field ][ "type" ] ) {
				if( $this->load_subentities ) {
					eval( '$data = new Mod' . $this->fields_definition[ "id" . $field ][ "entity" ] . ';' );
					if( isset( $this->fields_definition[ $field ] ) && "part-of" != $this->fields_definition[ $field ][ "relation"] ) {
						$data->load_subentities = false;
					}
					$data->get_from_database( $this->get_field( "id" . $field ) );
					$this->set_field( $field, $data );
				}
			} else if( isset( $this->fields_definition[ $field ] ) && array_key_exists( $field, $reg ) ) {
				$this->set_field( $field, $reg[ $field ] );
			} else if( isset( $this->fields_definition[ $field ] ) && "array" == $this->fields_definition[ $field ][ "type" ] ) {
				if( $this->load_subentities ) {
					eval( '$objAux = new Mod' . $this->fields_definition[ $field ][ "entity" ] . '();' );
					$objs = $objAux->get_all( $this->pk . " = " . $this->get_field( $this->pk ) );
					foreach( $objs as $obj ) {
						eval( '$data = new Mod' . $this->fields_definition[ $field ][ "entity" ] . '();' );
						$data->load_subentities = false;
						$data->get_from_database( $obj[ $objAux->get_pk() ] );
						$this->set_field( $field, $data );
					}
				}
			} else {
				throw new Exception( "Campos indirectos no definidos: $field" );
				return false;
			}
		}
		return true;
	}
	public function update_to_database( $pk_value = 0 ) {
		if( "primary_key" != $this->get_pk() ) {
			if( "" == $this->fields[ $this->pk ] || 0  == $this->fields[ $this->pk ] ) {
				if( $pk_value > 0 ) {
					$this->set_field( $this->pk, $pk_value );
					$pk = $this->get_field( $this->get_pk() );
				} else {
					return false;
				}
			}	
		} else {
			if( $pk_value > 0 ) {
				$pk = $pk_value;
			} else {
				return false;
			}
		}
		foreach( $this->fields as $field => $value ) {
			if( isset( $this->fields_definition[ $field ] ) && "entity" == $this->fields_definition[ $field ][ "type" ] && "part-of" == $this->fields_definition[ $field ][ "relation" ] ) {
				$obj = $this->get_field( substr( $field, 2 ) );
				$obj->update_to_database();
			}
		}
		$this->db->where( " concat( idcfdi_concepto, '___' , numeropedimento ) = '$pk' " );
		$this->db->update( $this->base_table, $this->create_data_for_database() );
		$this->db->reset_query();
		return true;
	}
	public function get_all( $where = "" ) {
		log_message( 'info', 'Getting All ' . get_class( $this ) . '.' );
		if( $where != "" ) {
			$this->db->where( " ( $where ) " );
		}
		if( null !== $this->order_by ) {
			$this->db->order_by( $this->order_by );
		}
		$regs = $this->db->get( $this->general_view );
		log_message( 'info', 'Query: ' . str_replace( array( chr( 10 ), chr( 13 ) ), array( '', ''), $this->db->last_query() ) );
		$this->db->reset_query();
		$res = array();
		if( 0 < $regs->num_rows() ) {
			$res = $regs->result_array();
			foreach( $res as $k => $reg ) {
				$res[ $k ][ "primary_key" ] = $reg[ "idcfdi_concepto"] . "___" . $reg[ "numeropedimento" ];
			}
		}
		return $res;
	}
	public function delete( $pk_value = 0 ) {
		$pk = null;
		if( "primary_key" != $this->get_pk() ) {
			if( "" == $this->fields[ $this->pk ] || 0  == $this->fields[ $this->pk ] ) {
				if( $pk_value > 0 ) {
					$this->set_field( $this->pk, $pk_value );
				} else {
					return false;
				}
			}
			$pk = $this->get_field( $this->get_pk() );
		} else {
			if( $pk_value > 0 ) {
				$pk = $pk_value;
			} else {
				return false;
			}
		}
		$this->load_subentities = true;
		$this->get_from_database();
		log_message( 'info', 'Deleting ' . get_class( $this ) . ' ' . $pk . '.' );
		foreach( $this->fields_definition as $field => $definition ) {
			if( "array" == $definition[ "type" ] && "part-of" == $definition[ "relation"] ) {
				$objs = $this->get_field( $field );
				foreach( $objs as $obj ) {
					log_message( 'info', '(1) To delete ' . get_class( $obj ) . ' ' . $obj->get_field( $obj->get_pk() ) . '.' );
					$obj->delete();
				}
			}
		}
		$this->db->where( " concat( idcfdi_concepto, '___' , numeropedimento ) = '$pk' " );
		$this->db->delete( array( $this->base_table ) );
		$this->db->reset_query();
		foreach( $this->fields_definition as $field => $definition ) {
			if( "entity" == $definition[ "type" ] && "part-of" == $definition[ "relation" ] ) {
				log_message( 'info', '(2) To delete ' . get_class( $this->get_field( substr( $field, 2 ) ) ) . ' ' . $this->get_field( substr( $field, 2 ) )->get_field( $this->get_field( substr( $field, 2 ) )->get_pk() ) . '.' );
				$this->get_field( substr( $field, 2 ) )->delete();
			} else if( "array" == $definition[ "type" ] && "part-of" == $definition[ "relation"] ) {
				$objs = $this->get_field( $field );
				foreach( $objs as $obj ) {
					log_message( 'info', '(3) To delete ' . get_class( $obj ) . ' ' . $obj->get_field( $obj->get_pk() ) . '.' );
					$obj->delete();
				}
			}
		}
		return true;
	}
}
?>
