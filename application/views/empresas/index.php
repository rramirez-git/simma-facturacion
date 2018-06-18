<?= $menumain; ?>
<div class="container">
	<div class="btn-toolbar float-right" role="toolbar">
		<div class="btn-group" role="group">
			<?php if($this->modsesion->hasPermisoHijo(56)): ?>
			<button type="button" class="btn btn-outline-secondary" title="Nueva Empresa" onclick="location.href='<?= base_url('empresas/nuevo');?>';">
				<i class="far fa-file-alt"></i>
			</button>
			<?php endif; ?>
		</div>
	</div>
	<h3>Empresas</h3>
		<table class="table table-hover table-sm table-responsive-sm">
			<thead>
				<tr>
					<th class="sortable" onclick="TableSortByColumn( 'data-table', 1, 'asc' )">Razon Social</th>
					<th class="sortable" onclick="TableSortByColumn( 'data-table', 2, 'asc' )">RFC</th>
					<th class="sortable" onclick="TableSortByColumn( 'data-table', 3, 'asc' )">Representante</th>
					<th>Coorporativo</th>
					<th>Transportista</th>
					<th>Destino Final</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>Razon Social</th>
					<th>RFC</th>
					<th>Representante</th>
					<th>Coorporativo</th>
					<th>Transportista</th>
					<th>Destino Final</th>
				</tr>
			</tfoot>
			<tbody id="data-table">
				<?php foreach($empresas as $empresa): ?>
					<tr>
						<td>
							<?php if($this->modsesion->hasPermisoHijo(57)): ?>
							<a href="<?= base_url('empresas/ver/'.$empresa["idempresa"]); ?>">
							<?php endif; ?>
								<?= $empresa["razonsocial"]; ?>
							<?php if($this->modsesion->hasPermisoHijo(57)): ?>
							</a>
							<?php endif; ?>
						</td>
						<td><?= $empresa["rfc"]; ?></td>
						<td><?= $empresa["representante"]; ?></td>
						<td><input type="checkbox" disabled="disabled" <?= ($empresa["coorporativo"]=="1"?'checked="checked"':''); ?> /></td>
						<td><input type="checkbox" disabled="disabled" <?= ($empresa["transportista"]=="1"?'checked="checked"':''); ?> /></td>
						<td><input type="checkbox" disabled="disabled" <?= ($empresa["destinofinal"]=="1"?'checked="checked"':''); ?> /></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
</div>