<p><strong>Seleccione el reporte a generar:</strong></p>
<div class="list-group">
	<?php if($this->modsesion->hasPermisoHijo(106)): ?>
		<a href="<?= base_url("reporte/ver/4"); ?>" target="winreporte" class="list-group-item list-group-item-action">
			Maestro de Plan de Servicios
		</a>
	<?php endif;?>
	<?php if($this->modsesion->hasPermisoHijo(107)): ?>
		<a href="<?= base_url("reporte/ver/5"); ?>" target="winreporte" class="list-group-item list-group-item-action">
			Reporte de Operaciones
		</a>
	<?php endif;?>
</div>