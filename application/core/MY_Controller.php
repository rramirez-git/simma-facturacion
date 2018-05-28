<?php
class MY_Controller extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model( $this->base_model );
	}
	public function index() {
		$this->auto_index();
	}
	public function nuevo( $hidden_fields = "" ) {
		$this->auto_new( $hidden_fields );
	}
	public function ver( $pk, $hidden_fields = "" ) {
		$this->auto_see( $pk, $hidden_fields );
	}
	public function actualizar( $pk, $hidden_fields = "" ) {
		$this->auto_update( $pk, $hidden_fields );
	}
	public function add() {
		$this->auto_do_add();
	}
	public function update() {
		$this->auto_do_update();
	}
	public function delete( $pk ) {
		$this->auto_do_delete( $pk );
	}
	private function auto_index() {
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
		if( null !== $this->input->post( 'apply_filter' ) || $this->auto_display_on_index ) {
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
		$body = $this->load->view( 'html/body', array(
			"body" => $autoview
		), true );
		$head = $this->load->view( 'html/head', array(), true );
		$this->load->view( 'html/html', array(
			"head"	=> $head,
			"body"	=> $body
		) );
	}
	private function auto_form( $pk = 0, $hidden_fields= "" ) {
		$hidden_fields = ( "" == $hidden_fields ? array() : explode( "~", $hidden_fields ) );
		if( 0 != $pk ) {
			$this->{$this->base_model}->get_from_database( $pk );
		}
		$fields_definition = $this->{$this->base_model}->get_definitions();
		$fields = $this->{$this->base_model}->get_fields();
		$fields_key = array_keys( $fields_definition );
		$autoview = $this->load->view( 'html/autoform', array(
		    "title"			=> $this->controler_name,
		    "subtitle"		=> ( 0 == $pk ? $this->lang->line( "auto_new" ) : $this->lang->line( "auto_update" ) ),
		    "id_form"		=> "frm_" . $this->controler_name,
		    "action"		=> base_url( strtolower( get_class( $this ) ) . "/" . ( 0 == $pk ? 'add' : 'update' ) ),
		    "method"		=> "post",
		    "controls"		=> create_form_controls( $fields_definition, $fields, $this->base_model . "_", $this->auto_update_toolbars( $fields_definition ), $hidden_fields ),
		    "btn"			=> "",
		    "btn_action"	=> "",
		    "btn_submit"	=> '<i class="far fa-save"></i> ' . $this->lang->line( "auto_save" ),
		    "extra"			=> $this->auto_update_scripts( $fields_definition, $pk )
			), true );
		$body = $this->load->view( 'html/body', array(
			"body" => $autoview
		), true );
		$head = $this->load->view( 'html/head', array(), true );
		$this->load->view( 'html/html', array(
			"head"	=> $head,
			"body"	=> $body
		) );
	}	
	private function auto_new( $hidden_fields = "" ) {
		$this->auto_form( 0, $hidden_fields );
	}
	private function auto_see( $pk, $hidden_fields = "" ) {
		$hidden_fields = ( "" == $hidden_fields ? array() : explode( "~", $hidden_fields ) );
		$this->{$this->base_model}->get_from_database( $pk );
		$fields_definition = $this->{$this->base_model}->get_definitions();
		$fields = $this->{$this->base_model}->get_fields();
		$autoview = $this->load->view( 'html/autosee', array(
		    "title"			=> $this->controler_name,
		    "subtitle"		=> $this->lang->line( "auto_see" ),
		    "id_form"		=> "frm_" . $this->controler_name,
		    "method"		=> "post",
		    "controls"		=> create_form_controls_read( $fields_definition, $fields, $hidden_fields ),
		    "controler"		=> strtolower( get_class( $this ) ),
		    "pk"			=> $pk
			), true );
		$body = $this->load->view( 'html/body', array(
			"body" => $autoview
		), true );
		$head = $this->load->view( 'html/head', array(), true );
		$this->load->view( 'html/html', array(
			"head"	=> $head,
			"body"	=> $body
		) );
	}
	private function auto_update( $pk, $hidden_fields = "" ) {
		$this->auto_form( $pk, $hidden_fields );
	}
	private function auto_do_add() {
		$this->{$this->base_model}->get_from_input();
		$this->{$this->base_model}->add_to_database();
		header( "location: " . base_url( strtolower( get_class( $this ) ) . '/ver/' . $this->{$this->base_model}->get_field( $this->{$this->base_model}->get_pk() ) ) );
	}
	private function auto_do_update() {
		$this->{$this->base_model}->get_from_input();
		$this->{$this->base_model}->update_to_database();
		header( "location: " . base_url( strtolower( get_class( $this ) ) . '/ver/' . $this->{$this->base_model}->get_field( $this->{$this->base_model}->get_pk() ) ) );
	}
	private function auto_do_delete( $pk ) {
		$this->{$this->base_model}->delete( $pk );
		header( "location: " . base_url( strtolower( get_class( $this ) ) ) );
	}
	private function auto_update_toolbars( $definitions ) {
		$res = array();
		foreach( $definitions as $field => $definition ) {
			if( "array" == $definition[ "type" ] && "part-of" == $definition[ "relation" ] ) {
				$btn_new = '<a title="' . $this->lang->line( "auto_new" ) . '" href="" onclick="do_new_' . $definition[ "entity" ] . '(); return false;" class="btn btn-outline-primary"> <i class="far fa-file"></i> ' . ( $this->config->item( 'display_default_btn_labels' ) ? $this->lang->line( "auto_new" ) : '' ). ' </a>';
				$btn_del = '<a title="' . $this->lang->line( "auto_delete" ) . '" href="" onclick="do_delete_' . $definition[ "entity" ] . '(); return false;" class="btn btn-outline-primary"> <i class="far fa-trash-alt"></i> ' . ( $this->config->item( 'display_default_btn_labels' ) ? $this->lang->line( "auto_delete" ) : '' ) . ' </a>';
				$tool_bar = '<div class="btn-toolbar" role="toolbar" aria-label="Acciones_' . $definition[ "entity" ] . '"><div class="btn-group mr-2" role="group" aria-label="Acciones por Elemento ' . $definition[ "entity" ] . '">' . $btn_new . $btn_del . '</div></div>';
				$res[ $field ] = $tool_bar;
			}
		}
		if( count( $res ) > 0 ) {
			return $res;
		}
		return null;
	}
	private function auto_update_scripts( $definitions, $pk ) {
		$res = "";
		foreach( $definitions as $field => $definition ) {
			if( "array" == $definition[ "type" ] && "part-of" == $definition[ "relation" ] ) {
				ob_start();
				?>
				<script type="text/javascript">
					function do_new_<?php echo $definition[ "entity" ]; ?>() {
						$.post( 
							'<?php echo base_url( "/{$definition[ "entity" ]}/nuevo" ); ?>', 
							{}, 
							function( data ) {
								var data = $( data );
								var title = data.find( "h1" ).html();
								var form = '<form id="new-element" onsubmit="return false;" autocomplete="off">' + data.find( "form" ).html() + '</form>';
								openModal( form, title );
								var elem = $( "#new-element #mod<?php echo $definition[ "entity" ] . "_" .$this->{$this->base_model}->get_pk(); ?>" );
								var btn = $( '#new-element button[type=submit]' );
								elem.val( <?php echo $pk; ?> );
								btn.click( do_add_<?php echo $definition[ "entity" ]; ?> );
							}
						).fail( function( jqXHR, textStatus, errorThrown ) {
							closeModal();
							console.log( "Error: ", arguments );
							openModal( jqXHR.responseText, textStatus + ": " + errorThrown );
						} );
					}
					function do_add_<?php echo $definition[ "entity" ]; ?>() {
						actions_number = 0;
						$.post(
							'<?php echo base_url( "/{$definition[ "entity" ]}/add" ); ?>',
							$( "#new-element" ).serialize(),
							function( data ) {
								data = $( data );
								var pk = data.find( "#pk" ).val();
								do_reload();
							}
						).fail( function( jqXHR, textStatus, errorThrown ) {
							closeModal();
							console.log( "Error: ", arguments );
							openModal( jqXHR.responseText, textStatus + ": " + errorThrown );
						} );
					}
					function do_delete_<?php echo $definition[ "entity" ]; ?>() {
						openModal( "Eliminando información", "Mensaje de Sistema" );
						actions_number = 0;
						$( "#options-for-<?php echo $field; ?> input[type=checkbox]").each( function() {
							if( this.checked ) {
								actions_number++;
								$.post(
									'<?php echo base_url( "/{$definition[ "entity" ]}/delete/" ); ?>' + this.value,
									{},
									function() { actions_number--; }
								).fail( function( jqXHR, textStatus, errorThrown ) {
									closeModal();
									console.log( "Error: ", arguments );
									openModal( jqXHR.responseText, textStatus + ": " + errorThrown );
								} );
							}
						} );
						do_reload();
					}
				</script>
				<?php
				$res .= ob_get_clean();
			}
		}
		return $res;
	}
}
?>
