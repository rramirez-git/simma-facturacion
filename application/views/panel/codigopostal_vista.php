<p>Buscador de Códigos Postales</p>
<form autocomplete="off" method="post" id="frm_cp">
	<div class="form-row"><div class="form-group col">
		<label for="frm_cp_cp">Código Postal</label>
			<input type="number" class="form-control" id="frm_cp_cp" name="frm_cp_cp" value="<?= $cp; ?>" placeholder="Código Postal" />
		</div>
		<div class="form-group col">
		<label for="frm_cp_cp">Colonia</label>
			<input type="text" class="form-control" id="frm_cp_colonia" name="frm_cp_colonia" value="<?= $colonia; ?>" placeholder="Colonia" />
		</div>
	</div>
	<div class="form-row"><div class="form-group col">
		<label for="frm_cp_cp">Delegación / Municipio</label>
			<input type="text" class="form-control" id="frm_cp_municipio" name="frm_cp_municipio" value="<?= $municipio; ?>" placeholder="Delegación / Municipio" />
		</div>
		<div class="form-group col">
		<label for="frm_cp_cp">Estado</label>
			<input type="text" class="form-control" id="frm_cp_estado" name="frm_cp_estado" value="<?= $estado; ?>" placeholder="Estado" />
		</div>
	</div>
	<button type="button" class="btn btn-outline-primary" id="btnBuscarCP">Buscar</button>
	<button type="button" class="btn btn-outline-secondary" id="btnCancelarCP">Cancelar</button>
</form>
	<table class="table table-hover table-sm table-responsive-sm">
		<thead>
			<tr>
				<th>CP</th>
				<th>Colonia</th>
				<th>Delegación / Municipio</th>
				<th>Estado</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th>CP</th>
				<th>Colonia</th>
				<th>Delegación / Municipio</th>
				<th>Estado</th>
			</tr>
		</tfoot>
		<tbody>
			<?php foreach($elementos as $elem): ?>
				<tr>
					<td>
						<a href="#" onclick="<?= $fnSelecciona; ?>('<?= $elem["cp"]; ?>','<?= $elem["asentamiento"]; ?>','<?= $elem["municipio"]; ?>','<?= $elem["estado"]; ?>'); return false;">
							<?= $elem["cp"]; ?>
						</a>
					</td>
					<td><?= $elem["asentamiento"]; ?></td>
					<td><?= $elem["municipio"]; ?></td>
					<td><?= $elem["estado"]; ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>