<!-- html/autosee starts<?php if( $this->config->item( 'log_threshold' ) ) : ?>, called by
<?php print_r( pretty_backtrace() ); ?>
<?php endif; ?> -->
<div class="float-right">
	<div class="btn-toolbar" role="toolbar" aria-label="Acciones">
		<div class="btn-group mr-2" role="group" aria-label="Acciones del Elemento Actual">
			<a title="<?php echo $this->lang->line( "auto_list" )?>" href="<?php echo base_url( $controler ); ?>" class="btn btn-outline-primary">
				<i class="far fa-list-alt"></i>
				<?php if( $this->config->item( 'display_default_btn_labels' ) ): ?>
					<?php echo $this->lang->line( "auto_list" )?>
				<?php endif; ?>
			</a>
			<a title="<?php echo $this->lang->line( "auto_update" )?>" href="<?php echo base_url( $controler ."/actualizar/$pk" ); ?>" class="btn btn-outline-primary">
				<i class="far fa-edit"></i>
				<?php if( $this->config->item( 'display_default_btn_labels' ) ): ?>
					<?php echo $this->lang->line( "auto_update" )?>
				<?php endif; ?>
			</a>
			<a title="<?php echo $this->lang->line( "auto_delete" )?>" href="<?php echo base_url( $controler ."/delete/$pk" ); ?>" class="btn btn-outline-primary">
				<i class="far fa-trash-alt"></i>
				<?php if( $this->config->item( 'display_default_btn_labels' ) ): ?>
					<?php echo $this->lang->line( "auto_delete" )?>
				<?php endif; ?>
			</a>
		</div>
	</div>
</div>
<?php if( isset( $title ) ): ?>
	<h3>
		<?php echo $title; ?>
		<?php if( isset( $subtitle ) ): ?>
			<small class="text-muted"><?php echo $subtitle; ?></small>
		<?php endif; ?>
	</h3>
<?php endif; ?>
<div class="clearfix"></div>
<form autocomplete="off"
	id="<?php echo ( isset( $id_form ) ? $id_form : '' ); ?>" 
	action="<?php echo ( isset( $action ) ? $action : '' ); ?>" 
	method="<?php echo ( isset( $method ) ? $method : 'post' ); ?>" 
	onsubmit="<?php echo ( isset( $onsubmit ) ? $onsubmit : '' ); ?>">
	<input type="hidden" id="pk" name="pk" value="<?php echo $pk; ?>" />
	<?php echo $controls; ?>
	<?php if( isset( $btn_action ) && isset( $btn ) && "" != $btn && "" != $btn_action ): ?>
		<button type="button" class="btn btn-primary" onclick="<?php echo $btn_action; ?>">
			<?php echo $btn; ?>
		</button>
	<?php endif; ?>
	<?php if( isset( $btn_submit ) && "" != $btn_submit ): ?>
		<button type="submit" class="btn btn-primary">
			<?php echo $btn_submit; ?>
		</button>
	<?php endif; ?>
</form>
<!-- html/autosee ends -->