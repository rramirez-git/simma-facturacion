<!-- html/autoindex starts<?php if( $this->config->item( 'log_threshold' ) ) : ?>, called by
<?php print_r( pretty_backtrace() ); ?>
<?php endif; ?> -->
<?php
$fields_to_show = array();
?>
<?php if( isset( $title ) ): ?>
	<h3>
		<?php echo $title; ?>
		<?php if( isset( $subtitle ) ): ?>
			<small class="text-muted"><?php echo $subtitle; ?></small>
		<?php endif; ?>
	</h3>
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
<?php if( isset( $fields ) && isset( $records ) && count( $records ) > 0 ): ?>
	<table class="table table-hover table-sm table-responsive-xl">
		<thead>
			<tr>
				<th></th>
				<?php $col_number = 2; ?>
				<?php foreach( $fields as $field => $info ): ?>
					<?php if( $info[ "showgeneral" ] ): 
						array_push( $fields_to_show, $field );
						?>
						<th class="sortable" onclick="TableSortByColumn( 'data-table', <?php echo $col_number; ?>, 'asc' )" ondblclick="TableSortByColumn( 'data-table', <?php echo $col_number; ?>, 'desc' )">
							<?php echo $info[ "control" ][ "label" ];?>
						</th>
						<?php $col_number++; ?>
					<?php endif; ?>
				<?php endforeach; ?>
				<th colspan="3">
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
						<a title="<?php echo $this->lang->line( "auto_delete" ); ?>" href="" onclick="do_delete( '<?php echo $record[ $pk ]; ?>' );return false;" class="btn btn-outline-primary">
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
<?php endif; ?>
<script type="text/javascript">
	function do_delete( id ) {
		$.post( 
			'<?php echo base_url( $controler ."/delete/" ); ?>' + id, 
			{}, 
			function() { location.reload(); } 
		).fail( function( jqXHR, textStatus, errorThrown ) {
			console.log( "Error: ", arguments );
			closeModal();
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
					closeModal();
					openModal( jqXHR.responseText, textStatus + ": " + errorThrown );
				} );
			}
		} );
		do_reload();
	}
</script>
<!-- html/autoindex ends -->