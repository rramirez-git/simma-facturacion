<?= $menumain; ?>
<div class="container">
	<div class="btn-toolbar float-right" role="toolbar">
		<div class="btn-group" role="group">
			<?php if($this->modsesion->hasPermisoHijo(85)): ?>
			<button type="button" class="btn btn-outline-secondary" title="Nuevo Permiso" onclick="Permiso.CapturarNuevosElementos()">
				<i class="far fa-file-alt"></i>
			</button>
			<?php endif;
			if($this->modsesion->hasPermisoHijo(86)):?>
			<button type="button" class="btn btn-outline-secondary" title="Actualizar Permiso" onclick="Permiso.ActualizarElementos()">
				<i class="far fa-edit"></i>
			</button>
			<?php endif;
			if($this->modsesion->hasPermisoHijo(87)):?>
			<button type="button" class="btn btn-outline-secondary" title="Borrar Permiso" onclick="Permiso.EliminarConfirm()">
				<i class="far fa-trash-alt"></i>
			</button>
			<?php endif; ?>
		</div>
	</div>
	<h3>Permisos</h3>
		<table class="table table-hover table-sm table-responsive-sm">
			<thead>
				<tr>
					<th>Permiso</th>
					<th>Descripción</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>Permiso</th>
					<th>Descripción</th>
				</tr>
			</tfoot>
			<tbody id="elementosMenu">
				<?php if($permisos!==false) foreach($permisos as $permiso) PrintPermiso($permiso); ?>
			</tbody>
		</table>
</div>
<?php
function PrintPermiso($permiso,$level=0)
{
	$levelStr="";
	for($x=1;$x<=$level;$x++)
		$levelStr.="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	?>
	<tr>
		<td>
			<div class="checkbox">
				<?= $levelStr; ?>
				<label>
					<input type="checkbox" value="<?= $permiso["idpermiso"]; ?>" />
					(<?= $permiso["idpermiso"]; ?>) <?= $permiso["nombre"]; ?>
				</label>
			</div>
		</td>
		<td>
			<?= $permiso["descripcion"]; ?>
		</td>
	</tr>
	<?php
	if($permiso["hijos"]!==false)
		foreach($permiso["hijos"] as $p)
			PrintPermiso($p,$level+1);
}
?>