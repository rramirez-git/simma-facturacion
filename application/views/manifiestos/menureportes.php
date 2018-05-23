<!-- Vista manifiestos/menureportes -->
<p><strong>Seleccione el reporte a generar:</strong></p>
<div class="list-group">
	<?php if($this->modsesion->hasPermisoHijo( 105 ) ): ?>
		<a href="<?= base_url( "reporte/ver/3" ); ?>" target="winreporte" class="list-group-item list-group-item-action">
			Maestro de Manifiestos
		</a>
	<?php endif;?>
	<?php if($this->modsesion->hasPermisoHijo( 128 ) ): ?>
		<a href="<?= base_url( "reporte/ver/8" ); ?>" target="winreporte" class="list-group-item list-group-item-action">
			Captura de Manifiestos
		</a>
	<?php endif;?>
</div>
<!-- Vista manifiestos/menureportes End -->