<!-- Vista cliente/menureportes -->
<p><strong>Seleccione el reporte a generar:</strong></p>
<div class="list-group">
	<?php if($this->modsesion->hasPermisoHijo(103)): ?>
		<a href="<?= base_url("reporte/ver/1"); ?>" target="winreporte" class="list-group-item list-group-item-action">
			Maestro de Clientes
		</a>
	<?php endif; ?>
	<?php if($this->modsesion->hasPermisoHijo(104)): ?>
		<a href="<?= base_url("reporte/ver/2"); ?>" target="winreporte" class="list-group-item list-group-item-action">
			Maestro de Generadores
		</a>
	<?php endif;?>
</div>
<!-- Vista cliente/menureportes End -->