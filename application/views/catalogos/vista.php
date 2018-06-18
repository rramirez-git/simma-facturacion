<?= $menumain; ?>
<div class="container">
	<div class="btn-toolbar float-right" role="toolbar">
		<div class="btn-group" role="group">
			<?php if($this->modsesion->hasPermisoHijo(29)): ?>
			<button type="button" class="btn btn-outline-secondary" title="Ver todos las Catalogos" onclick="location.href='<?= base_url('catalogos'); ?>';">
				<i class="fas fa-th-list"></i>
			</button>
			<?php endif;
			if($this->modsesion->hasPermisoHijo(47)):?>
			<button type="button" class="btn btn-outline-secondary" title="Actualizar Catalogo" onclick="Catalogos.MuestraFrmUpd()">
				<i class="far fa-edit"></i>
			</button>
			<?php endif;
			if($this->modsesion->hasPermisoHijo(48)):?>
			<button type="button" class="btn btn-outline-secondary" title="Agregar Opciones al Catalogo" onclick="Catalogos.MuestraFrmOpcs()">
				<i class="fas fa-plus"></i>
			</button>
			<?php endif;
			if($this->modsesion->hasPermisoHijo(49)):?>
			<button type="button" class="btn btn-outline-secondary" title="Borrar Opciones del Catalogo" onclick="Catalogos.BorrarOpciones()">
				<i class="far fa-trash-alt"></i>
			</button>
			<?php endif; ?>
		</div>
	</div>
	<h3>Catalogos <small class="text-muted"><?= $catalogo["descripcion"]; ?></small></h3>
	<input type="hidden" name="idcatalogo" id="idcatalogo" value="<?= $catalogo["idcatalogo"]; ?>" />
		<table class="table table-hover table-sm table-responsive-sm">
			<thead>
				<tr>
					<td></td>
					<th>Opción</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<td></td>
					<th>Opción</th>
				</tr>
			</tfoot>
			<tbody id="tablaOpciones">
				<?php if($catalogo["opciones"]!==false) foreach($catalogo["opciones"] as $opc): ?>
					<tr>
						<td>
							<input type="checkbox" value="<?= $opc["idcatalogodet"] ?>" />
						</td>
						<td>
							<?= $opc["descripcion"]; ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
</div>