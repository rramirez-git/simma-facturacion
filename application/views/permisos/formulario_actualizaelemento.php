<h3>(<?= $permiso->getIdpermiso(); ?>) <?= $permiso->getNombre(); ?> <small class="text-muted"><?= $permiso->getDescripcion(); ?></small></h3>
<form autocomplete="off" id="elementosMenu">
	<input type="hidden" name="idpermiso" id="idpermiso" value="<?= $permiso->getIdpermiso(); ?>" />
		<table class="table table-hover table-sm table-responsive-sm">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Descripción</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><input class="form-control" type="text" name="elemento" id="elemento" value="<?= $permiso->getNombre(); ?>" /></td>
					<td><input class="form-control" type="text" name="descripcion" id="descripcion" value="<?= $permiso->getDescripcion(); ?>" /></td>
				</tr>
			</tbody>
		</table>
</form>