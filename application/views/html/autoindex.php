<!-- html/autoindex starts<?php if( $this->config->item( 'log_threshold' ) ) : ?>, called by
<?php print_r( pretty_backtrace() ); ?>
<?php endif; ?> -->
<?php
$fields_to_show = array();
?>
<?php if( isset( $title ) ): ?>
	<h1>
		<?php echo $title; ?>
		<?php if( isset( $subtitle ) ): ?>
			<small class="text-muted"><?php echo $subtitle; ?></small>
		<?php endif; ?>
	</h1>
<?php endif; ?>
<div class="clearfix"></div>
<form autocomplete="off" method="post">
	<div class="float-right">
		<div class="btn-toolbar" role="toolbar" aria-label="Filtro">
			<div class="btn-group mr-2" role="group" aria-label="Acciones de Filtros">
				<button type="submit" class="btn btn-secondary" title="<?php echo $this->lang->line( "auto_search" ); ?>" id="apply_filter" name="apply_filter">
					<i class="fas fa-search"></i>
					<?php echo $this->lang->line( "auto_search" ); ?>
				</button>
				<button onclick="$( '#data-filter' ).toggle( 1 * 1000 )" type="button" title="<?php echo $this->lang->line( "auto_filters" ); ?>" class="btn btn-outline-secondary btn-sm">
					<i class="fas fa-filter"></i>
				</button>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
	<div id="data-filter" style="display: none;">
		<div class="form-row">
			<?php $cols = 0; ?>
			<?php foreach( $fields as $field => $info ): ?>
				<?php if( $info[ "showgeneral" ] ): ?>
					<?php 
					if( $cols == 12 ) {
						$cols = 0;
						?>
						</div>
						<div class="form-row">
						<?php
					}
					create_input( "filter_" . $field, "text", 4, $filters[ $field ], $info[ "control" ][ "label" ] ); 
					$cols += 4;
					?>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
	</div>
</form>
<p>&nbsp;</p>
<?php if( isset( $fields ) && isset( $records ) && count( $records ) > 0 ): ?>
	<table class="table table-hover table-sm table-responsive-sm">
		<thead>
			<tr>
				<th></th>
				<?php $col_number = 2; ?>
				<?php foreach( $fields as $field => $info ): ?>
					<?php if( $info[ "showgeneral" ] ): 
						array_push( $fields_to_show, $field );
						?>
						<th class="sort-column-header">
							<div class="sort-column-bar">
								<div class="btn-toolbar" role="toolbar" aria-label="Ordenación">
									<div class="btn-group mr-2" role="group" aria-label="Acciones de Ordenación">
										<button onclick="sort_asc( <?php echo $col_number; ?> )" type="button" title="<?php echo $this->lang->line( "auto_sort_down" ); ?>" class="btn btn-outline-secondary btn-sm">
											<i class="fas fa-sort-alpha-down"></i>
										</button>
										<button onclick="sort_desc( <?php echo $col_number; ?> )" type="button" title="<?php echo $this->lang->line( "auto_sort_up" ); ?>" class="btn btn-outline-secondary btn-sm">
											<i class="fas fa-sort-alpha-up"></i>
										</button>
									</div>
								</div>
							</div>
							<?php echo $info[ "control" ][ "label" ];?>
						</th>
						<?php $col_number++; ?>
					<?php endif; ?>
				<?php endforeach; ?>
				<th colspan="3">
					<div class="float-right">
						<div class="btn-toolbar" role="toolbar" aria-label="Acciones">
							<div class="btn-group mr-2" role="group" aria-label="Acciones por Elemento">
								<a title="<?php echo $this->lang->line( "auto_new" )?>" href="<?php echo base_url( $controler . '/nuevo' ); ?>" class="btn btn-outline-primary">
									<i class="far fa-file"></i>
									<?php if( $this->config->item( 'display_default_btn_labels' ) ): ?>
										<?php echo $this->lang->line( "auto_new" ); ?>
									<?php endif; ?>
								</a>
								<a title="<?php echo $this->lang->line( "auto_delete" )?>" href="" onclick="do_delete_selected(); return false;" class="btn btn-outline-primary">
									<i class="far fa-trash-alt"></i>
									<?php if( $this->config->item( 'display_default_btn_labels' ) ): ?>
										<?php echo $this->lang->line( "auto_delete" ); ?>
									<?php endif; ?>
								</a>
							</div>
						</div>
					</div>
				</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th></th>
				<?php foreach( $fields as $field => $info ): ?>
					<?php if( $info[ "showgeneral" ] ): ?>
						<th>
							<?php echo $info[ "control" ][ "label" ];?>
						</th>
					<?php endif; ?>
				<?php endforeach; ?>
				<th></th>
				<th></th>
				<th></th>
			</tr>
		</tfoot>
		<tbody id="data-table">
			<?php foreach( $records as $record ): ?>
				<tr>
					<td>
						<input type="checkbox" value="<?php echo $record[ $pk ]; ?>" />
					</td>
					<?php foreach( $fields_to_show as $field ): ?>
						<td>
							<?php echo $record[ $field ]; ?>
						</td>
					<?php endforeach; ?>
					<td>
						<a title="<?php echo $this->lang->line( "auto_see" ); ?>" href="<?php echo base_url( $controler . '/ver/' . $record[ $pk ] ); ?>" class="btn btn-outline-primary">
							<i class="fas fa-external-link-alt"></i>
							<?php if( $this->config->item( 'display_default_btn_labels' ) ): ?>
								<?php echo $this->lang->line( "auto_see" ); ?>
							<?php endif; ?>
						</a>
					</td>
					<td>
						<a title="<?php echo $this->lang->line( "auto_update" ); ?>" href="<?php echo base_url( $controler . '/actualizar/' . $record[ $pk ] ); ?>" class="btn btn-outline-primary">
							<i class="far fa-edit"></i>
							<?php if( $this->config->item( 'display_default_btn_labels' ) ): ?>
								<?php echo $this->lang->line( "auto_update" ); ?>
							<?php endif; ?>
						</a>
					</td>
					<td>
						<a title="<?php echo $this->lang->line( "auto_delete" ); ?>" href="" onclick="do_delete( <?php echo $record[ $pk ]; ?> );return false;" class="btn btn-outline-primary">
							<i class="far fa-trash-alt"></i>
							<?php if( $this->config->item( 'display_default_btn_labels' ) ): ?>
								<?php echo $this->lang->line( "auto_delete" ); ?>
							<?php endif; ?>
						</a>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
<?php else: ?>
	<div class="float-right">
		<div class="btn-toolbar" role="toolbar" aria-label="Acciones">
			<div class="btn-group mr-2" role="group" aria-label="Acciones por Elemento">
				<a title="<?php echo $this->lang->line( "auto_new" )?>" href="<?php echo base_url( $controler . '/nuevo' ); ?>" class="btn btn-outline-primary">
					<i class="far fa-file"></i>
					<?php if( $this->config->item( 'display_default_btn_labels' ) ): ?>
						<?php echo $this->lang->line( "auto_new" ); ?>
					<?php endif; ?>
				</a>
				<a title="<?php echo $this->lang->line( "auto_delete" )?>" href="" onclick="do_delete_selected(); return false;" class="btn btn-outline-primary">
					<i class="far fa-trash-alt"></i>
					<?php if( $this->config->item( 'display_default_btn_labels' ) ): ?>
						<?php echo $this->lang->line( "auto_delete" ); ?>
					<?php endif; ?>
				</a>
			</div>
		</div>
	</div>
<?php endif; ?>
<script type="text/javascript">
	function do_delete( id ) {
		$.post( 
			'<?php echo base_url( $controler ."/delete/" ); ?>' + id, 
			{}, 
			function() { location.reload(); } 
		).fail( function( jqXHR, textStatus, errorThrown ) {
			console.log( "Error: ", arguments );
			openModal( jqXHR.responseText, textStatus + ": " + errorThrown );
		} );
	}
	function do_delete_selected() {
		actions_number = 0;
		openModal( "Eliminando información", "Mensaje de Sistema" );
		$( '#data-table input[type="checkbox"]' ).each( function(){
			if( this.checked ) {
				var id = this.value;
				actions_number++;
				$.post( 
					'<?php echo base_url( $controler ."/delete/" ); ?>' + id,
					{},
					function() { actions_number--; }
				).fail( function( jqXHR, textStatus, errorThrown ) {
					console.log( "Error: ", arguments );
				} );
			}
		} );
		do_reload();
	}
	function sort_asc( column ) {
		var data_cels = $( "#data-table tr td:nth-child(" + column + ")" );
		var data = [];
		data_cels.each( function() { 
			var text = $( this ).text().trim();
			var num = parseFloat( text );
			if( isNaN( num ) || text.length != ( "" + num ).length ) {
				if( -1 == data.indexOf( text ) ) {
					data.push( text );
				}
			} else {
				if( -1 == data.indexOf( num ) ) {
					data.push( num );
				}
			}
		} );
		data.sort( data_sort );
		sort_column( column, data );
	}
	function sort_desc( column ) {
		var data_cels = $( "#data-table tr td:nth-child(" + column + ")" );
		var data = [];
		data_cels.each( function() { 
			var text = $( this ).text().trim();
			var num = parseFloat( text );
			if( isNaN( num ) || text.length != ( "" + num ).length ) {
				if( -1 == data.indexOf( text ) ) {
					data.push( text );
				}
			} else {
				if( -1 == data.indexOf( num ) ) {
					data.push( num );
				}
			}
		} );
		data.sort( data_sort );
		data.reverse();
		sort_column( column, data );
	}
	function sort_column( column, data ) {
		console.log( column );
		var tmp_tbl = $( '<table></table>' );
		for( idx in data ) {
			var trs = $( "#data-table tr" );
			for( var i = 0; i < trs.length; i++ ) {
				if( $( trs[ i ] ).find( "td:nth-child(" + column + ")" ).text().trim() == data[ idx ] ) {
					tmp_tbl.append( $( trs[ i ] ) );
				}
			}
		}
		$( "#data-table" ).html( tmp_tbl.html() );
	}
</script>
<!-- html/autoindex ends -->