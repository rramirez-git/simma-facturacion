<?php
function innerHTML( $node ) { return trim( implode( "", array_map( [ $node->ownerDocument, "saveHTML" ], iterator_to_array( $node->childNodes ) ) ) ); }
function create_input( $id, $type, $cols, $value, $placeholder, $params = array() ) {
	if( "datetime" == $type ) {
		$type .= "-local";
		$value = str_replace( " ", "T", $value );
	}
	$atribs = array( "id" => $id, "name" => $id, "value" => $value, "type" => $type );
	$atribs = array_merge( $atribs, $params );
	if( "hidden" == $type ) {
		?>
		<input <?php
			foreach( $atribs as $attr => $val ) {
				echo $attr . '="' . $val . '"';
			}
			?> />
		<?php
	} else if( "checkbox" == $type || "radio" == $type ) {
		if( 1 == $value ) {
			$atribs[ "checked" ] = "checked";
		}
		$atribs[ "value" ] = 1;
		?>
		<div class="form-check col-sm-<?php echo $cols; ?>">
			<input class="" <?php
			foreach( $atribs as $attr => $val ) {
				echo $attr . '="' . $val . '"';
			}
			?> />
			<label class="form-check-label" for="<?php echo $id; ?>"><?php echo $placeholder; ?></label>
		</div>
		<?php
	} else {
		?>
		<div class="form-group col-sm-<?php echo $cols; ?>">
			<label for="<?php echo $id; ?>">
				<?php echo $placeholder; ?>
			</label>
			<input class="form-control" <?php
			foreach( $atribs as $attr => $val ) {
				echo $attr . '="' . $val . '"';
			}
			?> />
		</div>
		<?php
	}
}
function create_select( $id, $cols, $value, $placeholder, $choices, $params = array() ) {
	$atribs = array( "id" => $id, "name" => $id );
	$atribs = array_merge( $atribs, $params );
	?>
	<div class="form-group col-sm-<?php echo $cols; ?>">
		<label for="<?php echo $id; ?>">
			<?php echo $placeholder; ?>
		</label>
		<select class="form-control" <?php
		    foreach( $atribs as $attr => $val ) {
				echo $attr . '="' . $val . '"';
			}
			?>
			>
			<?php foreach( $choices as $val => $txt ): ?>
				<option value="<?php echo $val; ?>" <?php echo ( $val == $value ? 'selected="selected"' : '' ); ?>><?php echo $txt; ?></option>
			<?php endforeach; ?>
		</select>
	</div>
	<?php
}
function create_textarea( $id, $cols, $value, $placeholder, $params = array() ) {
	$atribs = array( "id" => $id, "name" => $id );
	$atribs = array_merge( $atribs, $params );
	
		?>
		<div class="form-group col-sm-<?php echo $cols; ?>">
			<label for="<?php echo $id; ?>">
				<?php echo $placeholder; ?>
			</label>
			<?php if( isset( $params[ "disabled" ] ) && "disabled" == $params[ "disabled" ] ): ?>
				<p class="form-control"><?php echo str_replace( array( chr( 13 ) . chr( 10 ) ,chr( 13 ), chr( 10 ) ), '<br />', $value ); ?></p>
			<?php else: ?>
				<textarea class="form-control" <?php
				foreach( $atribs as $attr => $val ) {
					echo $attr . '="' . $val . '"';
				}
				?>><?php echo $value; ?></textarea>
			<?php endif; ?>
		</div>
		<?php
}
function create_form_controls( $controls, $values, $form = "", $toolBars = null, $hidden_fields = array() ) {
	ob_start();
	$cols = 0;
	$acum_cols = 0;
	?>
	<div class="form-row">
		<?php foreach( $controls as $id => $ctrl_field ):
			$as_hidden = in_array( $id, $hidden_fields );
		    $ctrl = $ctrl_field[ "control" ];
		    $params = array();
			if( $ctrl_field[ "ismandatory" ] ) {
				$params[ "required" ] = "required";
			}
			if( $ctrl[ "readonly" ] ) {
				$params[ "readonly" ] = "readonly";
			}
			?>
			<?php if( $cols + $ctrl[ "cols" ] > 12 ): 
				$cols = 0;
				?>
				</div>
				<div class="form-row">
			<?php endif;
			if( "true" == $ctrl_field[ "isdirect" ] || "entity" == $ctrl_field[ "type" ] ) {
				if( $as_hidden ) {
					create_input( $form . $id, "hidden" , 0, $values[ $id ], $ctrl[ "label" ], $params );
					$acum_cols += $ctrl[ "cols" ];
				} else if( "entity" == $ctrl_field[ "type" ] && "part-of" == $ctrl_field[ "relation" ] ) {
					?>
					</div>
						<fieldset>
							<legend>
								<?php echo $ctrl[ "label" ]; ?>
							</legend>
							<div id="part-<?php echo $ctrl_field[ "type" ]; ?>">
								<?php
								$webPage = new DOMDocument();
								if( "" == $values[ $id ] || "0" == $values[ $id ] ) {
									@$webPage->loadHTMLFile( base_url( "/{$ctrl_field[ "entity" ]}/nuevo" ) );
								} else {
									@$webPage->loadHTMLFile( base_url( "/{$ctrl_field[ "entity" ]}/actualizar/{$values[ $id ]}" ) );
								}
								if( $btn = $webPage->getElementById( "btn-action" ) ) {
									$btn->parentNode->removeChild( $btn );
								}
								if( $btn = $webPage->getElementById( "btn-submit" ) ) {
									$btn->parentNode->removeChild( $btn );
								}
								echo innerHTML( $webPage->getElementsByTagName( 'form' )->item( 0 ) );
								?>
							</div>
						</fieldset>
					<div class="form-row">
					<?php
				} else if( "input" == $ctrl[ "type" ] ) {
					if( "text" == $ctrl[ "subtype" ] || "number" == $ctrl[ "subtype" ] ) {
						if( "decimal" == $ctrl_field[ "type" ] ) {
							$params[ "maxlength" ] = $ctrl_field[ "dimension" ][ 0 ] + $ctrl_field[ "dimension" ][ 1 ] + 1;
						} else {
							$params[ "maxlength" ] = ( isset( $ctrl_field[ "dimension" ][ 0 ] ) ? $ctrl_field[ "dimension" ][ 0 ] : '10' );
						}
					}
					$ctrl_cols = min( array( 12, $ctrl[ "cols" ] + $acum_cols ) );
					create_input( $form . $id, $ctrl[ "subtype" ] , $ctrl_cols, $values[ $id ], $ctrl[ "label" ], $params ); 
					$cols += $ctrl_cols;
					$acum_cols = 0;
				} else if( "select" == $ctrl[ "type" ] ) {
					if( isset( $params[ "readonly" ] ) && "readonly" == $params[ "readonly" ] ) {
						$params[ "disabled" ] = "disabled";
					}
					$ctrl_cols = min( array( 12, $ctrl[ "cols" ] + $acum_cols ) );
					create_select( $form . $id, $ctrl_cols, $values[ $id ], $ctrl[ "label" ], $ctrl_field[ "choices" ], $params ); 
					$cols += $ctrl_cols;
					$acum_cols = 0;
				} else if( "textarea" == $ctrl[ "type" ] ) {
					$ctrl_cols = min( array( 12, $ctrl[ "cols" ] + $acum_cols ) );
					create_textarea( $form . $id, $ctrl_cols, $values[ $id ], $ctrl[ "label" ], $params );
					$cols += $ctrl_cols;
					$acum_cols = 0;
				} else {
					throw new Exception( "Tipo de control no definido {$ctrl[ "type" ]}" );
				}
			} else if( "array" == $ctrl_field[ "type" ] && ! $as_hidden ) {
				?>
				</div>
				<fieldset>
					<legend>
						<?php if( null != $toolBars && isset( $toolBars[ $id ] ) ): ?>
							<div class="float-right">
								<?php echo $toolBars[ $id ]; ?>
							</div>
						<?php endif; ?>
						<?php echo $ctrl[ "label" ]; ?>
					</legend>
					<div class="form-row" id="options-for-<?php echo $id; ?>">
						<?php
						if( count( $values[ $id ] ) > 0 ) {
							$opcs = $values[ $id ][ 0 ]->get_options_combo();
							foreach( $values[ $id ] as $opc ) {
								create_input( $form . $id . "[" . $opc->get_field( $opc->get_pk() ) . "]", $ctrl[ "subtype" ], $ctrl[ "cols" ], $opc->get_field( $opc->get_pk() ), $opcs[ $opc->get_field( $opc->get_pk() ) ], $params );
							}
						}
						?>
					</div>
				</fieldset>
				<div class="form-row">
				<?php
			}
			?>
		<?php endforeach; ?>
	</div>
	<?php
	return ob_get_clean();
}
function create_form_controls_read( $controls, $values, $hidden_fields = array() ) {
	ob_start();
	$cols = 0;
	$form_pk = "";
	foreach( $controls as $id => $ctrl_field ) { if( $ctrl_field[ "ispk" ] ) { $form_pk .= "~$id"; } }
	$form_pk = ( "" == $form_pk ? '' : "/" . substr( $form_pk, 1 ) );
	$acum_cols = 0;
	?>
	<div class="form-row">
		<?php foreach( $controls as $id => $ctrl_field ): 
		    $ctrl = $ctrl_field[ "control" ];
			if( in_array( $id, $hidden_fields ) ) { 
				$acum_cols += $ctrl[ "cols" ];
				continue; 
			}
		    $params = array( "disabled" => "disabled" );
			?>
			<?php if( $cols + $ctrl[ "cols" ] > 12 ): 
				$cols = 0;
				?>
				</div>
				<div class="form-row">
			<?php endif;
			if( "true" == $ctrl_field[ "isdirect" ] || "entity" == $ctrl_field[ "type" ] ) {
				if( "entity" == $ctrl_field[ "type" ] && "part-of" == $ctrl_field[ "relation" ] ) {
					?>
					</div>
						<fieldset>
							<legend>
								<?php echo $ctrl[ "label" ]; ?>
							</legend>
							<div id="part-<?php echo $ctrl_field[ "type" ]; ?>">
								<?php
								$webPage = new DOMDocument();
								@$webPage->loadHTMLFile( base_url( "/{$ctrl_field[ "entity" ]}/ver/{$values[ $id ]}" . $form_pk ) );
								if( $btn = $webPage->getElementById( "btn-action" ) ) {
									$btn->parentNode->removeChild( $btn );
								}
								if( $btn = $webPage->getElementById( "btn-submit" ) ) {
									$btn->parentNode->removeChild( $btn );
								}
								echo innerHTML( $webPage->getElementsByTagName( 'form' )->item( 0 ) );
								?>
							</div>
						</fieldset>
					<div class="form-row">
					<?php
				} else if( "input" == $ctrl[ "type" ] ) {
					if( "text" == $ctrl[ "subtype" ] || "number" == $ctrl[ "subtype" ] ) {
						if( "decimal" == $ctrl_field[ "type" ] ) {
							$params[ "maxlength" ] = $ctrl_field[ "dimension" ][ 0 ] + $ctrl_field[ "dimension" ][ 1 ] + 1;
						} else {
							$params[ "maxlength" ] = ( isset( $ctrl_field[ "dimension" ][ 0 ] ) ? $ctrl_field[ "dimension" ][ 0 ] : '10' );
						}
					}
					create_input( $id, $ctrl[ "subtype" ] , $ctrl[ "cols" ] + $acum_cols, $values[ $id ], $ctrl[ "label" ], $params );
					$cols += $ctrl[ "cols" ] + $acum_cols;
					$acum_cols = 0;
				} else if( "select" == $ctrl[ "type" ] ) {
					create_select( $id, $ctrl[ "cols" ] + $acum_cols, $values[ $id ], $ctrl[ "label" ], $ctrl_field[ "choices" ], $params );
					$cols += $ctrl[ "cols" ] + $acum_cols;
					$acum_cols = 0;
				} else if( "textarea" == $ctrl[ "type" ] ) {
					$ctrl_cols = min( array( 12, $ctrl[ "cols" ] + $acum_cols ) );
					create_textarea( $id, $ctrl_cols, $values[ $id ], $ctrl[ "label" ], $params );
					$cols += $ctrl_cols;
					$acum_cols = 0;
				} else {
					throw new Exception( "Tipo de control no definido {$ctrl[ "type" ]}" );
				}
			} else if( "array" == $ctrl_field[ "type" ] ) {
				?>
				</div>
				<fieldset>
					<legend><?php echo $ctrl[ "label" ]; ?></legend>
						<?php
						if( count( $values[ $id ] ) > 0 ) {
							if( "part-of" == $ctrl_field[ "relation" ] ) {
								foreach( $values[ $id ] as $obj ) {
									$id_html_obj = str_replace( " ", '-', $obj->get_pk(). "_" .$obj->get_field( $obj->get_pk() ) );
									?>
									<script type="text/javascript">
										$( document ).ready( function() {
											$.post( '<?php echo base_url( "/{$ctrl_field[ "entity" ]}/ver/{$obj->get_field( $obj->get_pk() )}" . $form_pk ); ?>', function( data ) {
												data = $( data );
												data.find( "#btn-action" ).remove();
												data.find( "#btn-submit" ).remove();
												data = data.find( "form" );
												$( "#<?php echo $id_html_obj; ?>" ).append( $( data ) );
											} );
										} );
									</script>
									<div id="<?php echo $id_html_obj; ?>" style="border: 1px solid silver; padding: 5px; border-radius: 5px; margin-bottom: 10px; font-size: 85%;"></div>
									<?php
									/*$webPage = new DOMDocument();
									@$webPage->loadHTMLFile( base_url( "/{$ctrl_field[ "entity" ]}/ver/{$obj->get_field( $obj->get_pk() )}" . $form_pk ) );
									if( $btn = $webPage->getElementById( "btn-action" ) ) {
										$btn->parentNode->removeChild( $btn );
									}
									if( $btn = $webPage->getElementById( "btn-submit" ) ) {
										$btn->parentNode->removeChild( $btn );
									}
									?><div style="border: 1px solid silver; padding: 5px; border-radius: 5px; margin-bottom: 10px; font-size: 85%;"><?php
									echo innerHTML( $webPage->getElementsByTagName( 'form' )->item( 0 ) );
									?></div><?php */
								}
							} else {
								$opcs = $values[ $id ][ 0 ]->get_options_combo();
								?>
								<div class="form-row">
								<?php
								foreach( $values[ $id ] as $opc ) {
									$params[ "checked" ] = "checked";
									create_input( $id . "[" . $opc->get_field( $opc->get_pk() ) . "]", $ctrl[ "subtype" ], $ctrl[ "cols" ], $opc->get_field( $opc->get_pk() ), $opcs[ $opc->get_field( $opc->get_pk() ) ], $params );
								}
								?>
								</div>
								<?php
							}
						}
						?>
				</fieldset>
				<div class="form-row">
				<?php
			}
			?>
		<?php endforeach; ?>
	</div>
	<?php
	return ob_get_clean();
}
?>
