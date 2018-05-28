<?php
class MY_Model extends CI_Model {
	protected $fields 				= array();
	protected $fields_definition 	= array();
	protected $pk 					= null;
	public $load_subentities		= true;
	public function __construct() {
		parent::__construct();
		$this->load_fields();
	}
	private function load_fields() {
		$data = file_get_contents( __DIR__ . "/../../project_files/models/" . $this->definition_file );
		$this->fields_definition = json_decode( $data, true );
		foreach( $this->fields_definition as $field => $definition ) {
			if( "array" == $definition[ "type" ] ) {
				$this->fields[ $field ] = array();
				if( 'mod' . $definition[ "entity" ] != strtolower( get_class( $this ) ) ) {
					$this->load->model( 'mod' . $definition[ "entity" ] );
				}
			} else { $this->fields[ $field ] = $definition[ "default" ]; }
			if( $definition[ "ispk" ] ) { $this->pk = $field; }
			if( "entity" === $definition[ "type" ] ) {
				$entity_field = substr( $field, 2 );
				if( 'mod' . $definition[ "entity" ] != strtolower( get_class( $this ) ) ) {
					$this->load->model( 'mod' . $definition[ "entity" ] );
					eval( '$this->fields[ $entity_field ] = new Mod' . $definition[ "entity" ] . '();' );
					$this->fields_definition[ $field ][ "choices" ] = $this->fields[ $entity_field ]->get_options_combo();
				} else {
					$this->fields[ $entity_field ] = null;
					$this->fields_definition[ $field ][ "choices" ] = $this->get_options_combo();
				}
			} else if( "catalogo" === $definition[ "type" ] ) {
				$this->load->model( 'modopciones' );
				$this->fields_definition[ $field ][ "choices" ] = $this->modopciones->get_options_combo( "idcatalogo = " . $definition[ "idcatalogo" ] );
			}
		}
	}
	private function create_data_for_database() {
		$data = array();
		foreach( $this->fields as $field => $value ) {
			if( isset( $this->fields_definition[ $field ] ) && true === $this->fields_definition[ $field ][ "isdirect" ] ) {
				$data[ $field ] = $this->get_field( $field );
			}
		}
		if( null != $this->pk ) {
			unset( $data[ $this->pk ] );
		}
		return $data;
	}
	public function set_field( $field, $value ) {
		if( ! array_key_exists( $field, $this->fields ) ) {
			throw new Exception( "Campo no definido $field" );
			return false;
		}
		if( isset( $this->fields_definition[ $field ] ) ) {
			if( null === $value && "checkbox" != $this->fields_definition[ $field ][ "control" ][ "subtype" ] ) { 
				$this->fields[ $field ] = $value; 
			} else {
				switch( $this->fields_definition[ $field ][ "type" ] ) {
					case 'integer' :
						if( "checkbox" == $this->fields_definition[ $field ][ "control" ][ "subtype" ] ) {
							if( 1 != $value ) {
								$value = 0;
							}
						}
					case 'entity' :
					case 'catalogo' :
						$this->fields[ $field ] = intval( $value );
						break;
					case 'decimal' :
						$this->fields[ $field ] = floatval( $value );
						break;
					case 'string' :
					case 'date' :
					case 'time' :
					case 'text' :
						$this->fields[ $field ] = "" . $value;
						break;
					case 'array' :
						if( is_array( $value ) ) {
							$this->fields[ $field ] = $value;
						} else {
							array_push( $this->fields[ $field ], $value );
						}
						break;
					default :
						throw new Exception( "Tipo de campo no definido $field en tipo {$this->fields_definition[ $field ][ "type" ]}" );
						return false;
				}
			}
		} else {
			$entity_field = "id" . $field;
			if( isset( $this->fields_definition[ $entity_field ] ) && "entity" === $this->fields_definition[ $entity_field ][ "type" ] ) {
				$this->fields[ $field ] = $value;
			} else {
				throw new Exception( "Campo sin definicion $entity_field" );
			}
		}
		return true;
	}
	public function set_pk( $value ) {
		return $this->set_field( $this->pk, $value );
	}
	public function get_pk() { 
		return $this->pk; 
	}
	public function get_field( $field ) {
		if( ! array_key_exists( $field, $this->fields ) ) {
			throw new Exception( "Campo no definido $field" );
			return null;
		}
		return $this->fields[ $field ];
	}
	public function get_definitions() {
		return $this->fields_definition;
	}
	public function get_fields() {
		return $this->fields;
	}
	public function get_from_database( $pk_value = 0 ) {
		if( "" == $this->fields[ $this->pk ] || 0  == $this->fields[ $this->pk ] ) {
			if( $pk_value > 0 ) {
				$this->set_field( $this->pk, $pk_value );
			} else {
				return false;
			}
		}
		log_message( 'info', 'Getting from DB ' . get_class( $this ) . ' ' . $this->get_field( $this->pk ) . ' with ' . ( $this->load_subentities ? '' : 'no ' ) . 'load_subentities.' );
		$this->db->where( $this->pk, $this->get_field( $this->pk ) );
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
	public function get_from_input() {
		foreach( $this->fields as $field => $value ) {
			if( isset( $this->fields_definition[ $field ] ) && true === $this->fields_definition[ $field ][ "isdirect" ] ) {
				$this->set_field( $field, $this->input->post( strtolower( get_class( $this ) ) . "_$field" ) );
			}
			if( isset( $this->fields_definition[ $field ] ) && "entity" === $this->fields_definition[ $field ][ "type" ] && "part-of" === $this->fields_definition[ $field ][ "relation" ] ) {
				eval( '$data = new Mod' . $this->fields_definition[ $field ][ "entity" ] . '();' );
				$data->get_from_input();
				$this->set_field( $field, $data->get_field( $data->get_pk() ) );
				$this->set_field( substr( $field, 2 ), $data );
			}
		}
		return true;
	}
	public function add_to_database() {
		foreach( $this->fields as $field => $value ) {
			if( isset( $this->fields_definition[ $field ] ) && "entity" == $this->fields_definition[ $field ][ "type" ] && "part-of" == $this->fields_definition[ $field ][ "relation" ] ) {
				$obj = $this->get_field( substr( $field, 2 ) );
				if( 0 == $obj->get_field( $obj->get_pk() ) || "" == $obj->get_field( $obj->get_pk() ) ) {
					$obj->add_to_database();
				} else {
					$obj->update_to_database();
				}
				$this->set_field( $field, $obj->get_field( $obj->get_pk() ) );
			}
		}
		$this->db->insert( $this->base_table, $this->create_data_for_database() );
		if( null != $this->pk ) {
			$this->set_field( $this->pk, $this->db->insert_id() );
		}
		$this->db->reset_query();
		return true;
	}
	public function update_to_database( $pk_value = 0 ) {
		if( "" == $this->fields[ $this->pk ] || 0  == $this->fields[ $this->pk ] ) {
			if( $pk_value > 0 ) {
				$this->set_field( $this->pk, $pk_value );
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
		$this->db->where( $this->pk, $this->get_field( $this->pk ) );
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
		return ( 0 === $regs->num_rows() ? array() : $regs->result_array() );
	}
	public function delete( $pk_value = 0 ) {
		if( "" == $this->fields[ $this->pk ] || 0  == $this->fields[ $this->pk ] ) {
			if( $pk_value > 0 ) {
				$this->set_field( $this->pk, $pk_value );
			} else {
				return false;
			}
		}
		$this->load_subentities = true;
		$this->get_from_database();
		log_message( 'info', 'Deleting ' . get_class( $this ) . ' ' . $this->get_field( $this->pk ) . '.' );
		foreach( $this->fields_definition as $field => $definition ) {
			if( "array" == $definition[ "type" ] && "part-of" == $definition[ "relation"] ) {
				$objs = $this->get_field( $field );
				foreach( $objs as $obj ) {
					log_message( 'info', '(1) To delete ' . get_class( $obj ) . ' ' . $obj->get_field( $obj->get_pk() ) . '.' );
					$obj->delete();
				}
			}
		}
		$this->db->where( $this->pk, $this->get_field( $this->pk ) );
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
	public function get_options_combo( $where = "" ) {
		$regs = $this->get_all( $where );
		$res = array();
		foreach( $regs as $reg ) {
			$res[ $reg[ $this->pk ] ] = "";
			foreach( $this->fields_definition as $field => $definition ) {
				if( $definition[ "showincombo" ] ) {
					$res[ $reg[ $this->pk ] ] .= ' / ' . $reg[ $field ];
				}
			}
			if( strlen( $res[ $reg[ $this->pk ] ] ) > 3 ) {
				$res[ $reg[ $this->pk ] ] = substr( $res[ $reg[ $this->pk ] ], 3 );
			}
		}
		return $res;
	}
}
?>
