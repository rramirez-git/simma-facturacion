<h3>(<?= $permiso->getIdpermiso(); ?>) <?= $permiso->getNombre(); ?> <small class="text-muted"><?= $permiso->getDescripcion(); ?></small></h3>
<form autocomplete="off" id="elementosMenu">
	<input type="hidden" name="idpermiso" id="idpermiso" value="<?= $permiso->getIdpermiso(); ?>" />
	<div class="table-responsive">
		<table class="table table-striped table-hover">
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
	</div>
</form>