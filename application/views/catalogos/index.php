<?= $menumain; ?>
<div class="container">
	<div class="btn-toolbar float-right" role="toolbar">
		<div class="btn-group" role="group">
			<?php if($this->modsesion->hasPermisoHijo(45)): ?>
			<button type="button" class="btn btn-outline-secondary" title="Nuevo Catalogo" onclick="Catalogos.MuestraFrmNuevo()">
				<i class="far fa-file-alt"></i>
			</button>
			<?php endif; ?>
		</div>
	</div>
	<h3>Catalogos</h3>
		<table class="table table-hover table-sm table-responsive">
			<thead>
				<tr>
					<th>Catalogo</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>Catalogo</th>
				</tr>
			</tfoot>
			<tbody>
				<?php foreach($catalogos as $catalogo): ?>
					<tr>
						<td>
							<?php if($this->modsesion->hasPermisoHijo(46)): ?>
							<a href="<?= base_url('catalogos/ver/'.$catalogo["idcatalogo"]); ?>">
							<?php endif; ?>
								<?= $catalogo["descripcion"]; ?>
							<?php if($this->modsesion->hasPermisoHijo(46)): ?>
							</a>
							<?php endif; ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
</div>