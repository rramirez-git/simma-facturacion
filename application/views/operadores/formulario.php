<!-- Vista operadores/formulario -->
<?= $menumain; ?>
<div class="container">
	<h3>Operadores</h3>
	<form autocomplete="off" id="frm_operadores">
		<input type="hidden" id="frm_operador_idoperador" name="frm_operador_idoperador" value="<?= $objeto->getIdoperador(); ?>" />
		<input type="hidden" id="frm_operador_idsucursal" name="frm_operador_idsucursal" value="<?= $idsucursal; ?>" />
		<div class="form-row"><div class="form-group col">
			<label for="frm_operador_nombre">Nombre <abbr class="text-danger" title="Campo Obligatorio">(obligatorio)</abbr></label>
				<input type="text" class="form-control" id="frm_operador_nombre" name="frm_operador_nombre" value="<?= $objeto->getNombre(); ?>" placeholder="Nombre del Operador" />
			</div>
			<div class="form-group col">
			<label for="frm_operador_apaterno">Apellido Paterno</label>
				<input type="text" class="form-control" id="frm_operador_apaterno" name="frm_operador_apaterno" value="<?= $objeto->getApaterno(); ?>" placeholder="Apellido Paterno" />
			</div>
			<div class="form-group col">
			<label for="frm_operador_amaterno">Apellido Materno</label>
				<input type="text" class="form-control" id="frm_operador_amaterno" name="frm_operador_amaterno" value="<?= $objeto->getAmaterno(); ?>" placeholder="Apellido Materno" />
			</div>
		</div>
		<div class="form-row"><div class="form-group col">
			<label for="frm_operador_detalle">Comentarios</label>
				<textarea rows="3" class="form-control" id="frm_operador_detalle" name="frm_operador_detalle"><?= $objeto->getDetalle(); ?></textarea>
			</div>
		</div>
		<div class="form-row"><div class="form-group col">
			<label for="frm_operador_cargo">Cargo</label>
				<input type="text" class="form-control" id="frm_operador_cargo" name="frm_operador_cargo" value="<?= $objeto->getCargo(); ?>" placeholder="Cargo del Operador" maxlength="37" />
			</div>
			<div class="form-group col">
			<label for="frm_operador_telefono">Teléfono</label>
				<input type="tel" class="form-control" id="frm_operador_telefono" name="frm_operador_telefono" value="<?= $objeto->getTelefono(); ?>" placeholder="Teléfono del Operador" maxlength="13" />
			</div>
			<div class="form-group col">
			<label for="frm_operador_email">Correo Electrónico</label>
				<input type="text" class="form-control" id="frm_operador_email" name="frm_operador_email" value="<?= $objeto->getEmail(); ?>" placeholder="Correo Eletrónico del Operador" />
			</div>
		</div>
		<button type="button" class="btn btn-outline-primary" onclick="Operador.Enviar(<?= ($objeto->getIdoperador()!="" && $objeto->getIdoperador()!=0?'false':'true'); ?>)" >Guardar</button>
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='<?= base_url('operadores'); ?>'">Cancelar</button>
	</form>
</div>
<!-- Vista operadores/formulario End -->