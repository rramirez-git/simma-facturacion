<!-- html/autoform starts<?php if( $this->config->item( 'log_threshold' ) ) : ?>, called by
<?php print_r( pretty_backtrace() ); ?>
<?php endif; ?> -->
<?php if( isset( $title ) ): ?>
	<h1>
		<?php echo $title; ?>
		<?php if( isset( $subtitle ) ): ?>
			<small class="text-muted"><?php echo $subtitle; ?></small>
		<?php endif; ?>
	</h1>
<?php endif; ?>
<form autocomplete="off"
	id="<?php echo ( isset( $id_form ) ? $id_form : '' ); ?>" 
	action="<?php echo ( isset( $action ) ? $action : '' ); ?>" 
	method="<?php echo ( isset( $method ) ? $method : 'post' ); ?>" 
	onsubmit="<?php echo ( isset( $onsubmit ) ? $onsubmit : '' ); ?>">
	<?php if( isset( $main_pk ) ): ?>
		<input type="hidden" id="main-pk" name="main-pk" value="<?php echo $main_pk; ?>" />
	<?php endif; ?>
	<?php echo $controls; ?>
	<?php if( isset( $btn_action ) && isset( $btn ) && "" != $btn && "" != $btn_action ): ?>
		<button type="button" id="btn-action" class="btn btn-primary" onclick="<?php echo $btn_action; ?>">
			<?php echo $btn; ?>
		</button>
	<?php endif; ?>
	<?php if( isset( $btn_submit ) && "" != $btn_submit ): ?>
		<button type="submit" id="btn-submit" class="btn btn-primary">
			<?php echo $btn_submit; ?>
		</button>
	<?php endif; ?>
</form>
<?php if( isset( $extra ) ): ?>
	<?php echo $extra; ?>
<?php endif; ?>
<!-- html/autoform ends -->