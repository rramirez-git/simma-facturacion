<!-- Vista cliente/menureportes -->
<table class="menuCreacion">
	<tr>
		<th>
			Seleccione el reporte a generar:
		</th>
	</tr>
	<?php if($this->modsesion->hasPermisoHijo(103)): ?>
		<tr>
			<td>
				<button type="button" class="btn btn-outline-secondary" onclick="window.open('<?= base_url("reporte/ver/1"); ?>','winreporte')">
					Maestro de Clientes
				</button>
			</td>
		</tr>
	<?php endif;
	if($this->modsesion->hasPermisoHijo(104)): ?>
		<tr>
			<td>
				<button type="button" class="btn btn-outline-secondary" onclick="window.open('<?= base_url("reporte/ver/2"); ?>','winreporte')">
					Maestro de Generadores
				</button>
			</td>
		</tr>
	<?php endif;?>
	<tr>
		<td>
			<button type="button" class="btn btn-outline-secondary" onclick="Manifiesto.CerrarMenuCreacion()">
				Cancelar
			</button>
		</td>
	</tr>
</table>
<!-- Vista cliente/menureportes End -->