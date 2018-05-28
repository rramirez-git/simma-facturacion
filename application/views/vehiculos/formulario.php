<!-- Vista vehiculos/formulario -->
<?= $menumain; ?>
<div class="container">
	<h3>Vehículos</h3>
	<form autocomplete="off" id="frm_vehiculos">
        <input type="hidden" id="frm_vehiculo_idvehiculo" name="frm_vehiculo_idvehiculo" value="<?= $objeto->getIdvehiculo(); ?>" />
        <input type="hidden" id="frm_vehiculo_idsucursal" name="frm_vehiculo_idsucursal" value="<?= $idsucursal; ?>" />
		<div class="form-row"><div class="form-group col">
            <label for="frm_vehiculo_tipo">Tipo de Vehículo</label>
				<input type="text" class="form-control" id="frm_vehiculo_tipo" name="frm_vehiculo_tipo" value="<?= $objeto->getTipo(); ?>" placeholder="Tipo de Vehículo" maxlength="28" />
			</div>
			 <div class="form-group col">
			<label for="frm_vehiculo_placa">Placa del Vehículo <abbr class="text-danger" title="Campo Obligatorio">(obligatorio)</abbr></label>
				<input type="text" class="form-control" id="frm_vehiculo_placa" name="frm_vehiculo_placa" value="<?= $objeto->getPlaca(); ?>" placeholder="Placa del Vehículo" maxlength="20" />
			</div>
		</div>
		<div class="form-row"><div class="form-group col">
			<label for="frm_vehiculo_numautsct">Número de Autorizacion SCT</label>
				<input type="text" class="form-control" id="frm_vehiculo_numautsct" name="frm_vehiculo_numautsct" value="<?= $objeto->getNumautsct(); ?>" placeholder="Número de Autorizacion SCT" />
			</div>
			<div class="form-group col">
			<label for="frm_vehiculo_numautsct">Número de Autorizacion SEMARNAT</label>
				<input type="text" class="form-control" id="frm_vehiculo_autsemarnat" name="frm_vehiculo_autsemarnat" value="<?= $objeto->getAutsemarnat(); ?>" placeholder="Número de Autorizacion SEMARNAT" />
			</div>
		</div>
		<div class="form-row"><div class="form-group col">
			<label for="frm_vehiculo_detalle">Comentarios</label>
				<textarea rows="3" class="form-control" id="frm_vehiculo_detalle" name="frm_vehiculo_detalle"><?= $objeto->getDetalle(); ?></textarea>
			</div>
		</div>
		<button type="button" class="btn btn-outline-primary" onclick="Vehiculo.Enviar(<?= ($objeto->getIdvehiculo()!="" && $objeto->getIdvehiculo()!=0?'false':'true'); ?>)" >Guardar</button>
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='<?= base_url('vehiculos'); ?>'">Cancelar</button>
	</form>
</div>
<!-- Vista vehiculos/formulario End -->