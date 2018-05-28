<h3>(<?= $permiso->getIdpermiso(); ?>) <?= $permiso->getNombre(); ?> <small class="text-muted"><?= $permiso->getDescripcion(); ?></small></h3>
<p>Permisos para agregar:</p>
<form autocomplete="off" id="elementosMenu">
	<input type="hidden" name="idpermiso" id="idpermiso" value="<?= $permiso->getIdpermiso(); ?>" />
		<table class="table table-hover table-sm table-responsive">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Descripción</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><input class="form-control" type="text" name="elemento1" id="elemento1" value="" /></td>
					<td><input class="form-control" type="text" name="descripcion1" id="descripcion1" value="" /></td>
				</tr>
				<tr>
					<td><input class="form-control" type="text" name="elemento2" id="elemento2" value="" /></td>
					<td><input class="form-control" type="text" name="descripcion2" id="descripcion2" value="" /></td>
				</tr>
				<tr>
					<td><input class="form-control" type="text" name="elemento3" id="elemento3" value="" /></td>
					<td><input class="form-control" type="text" name="descripcion3" id="descripcion3" value="" /></td>
				</tr>
				<tr>
					<td><input class="form-control" type="text" name="elemento4" id="elemento4" value="" /></td>
					<td><input class="form-control" type="text" name="descripcion4" id="descripcion4" value="" /></td>
				</tr>
				<tr>
					<td><input class="form-control" type="text" name="elemento5" id="elemento5" value="" /></td>
					<td><input class="form-control" type="text" name="descripcion5" id="descripcion5" value="" /></td>
				</tr>
			</tbody>
		</table>
</form>