<!-- Vista vehiculos/vista -->
<?= $menumain; ?>
<div class="container">
	<div class="btn-toolbar float-right" role="toolbar">
		<div class="btn-group" role="group">
			<?php if($this->modsesion->hasPermisoHijo(9)): ?>
			<button type="button" class="btn btn-outline-secondary" title="Ver todos los Vehiculos" onclick="location.href='<?= base_url('vehiculos/index/'.$sucursal->getIdempresa().'/'.$sucursal->getIdsucursal()); ?>';">
				<i class="fas fa-th-list"></i>
			</button>
			<?php endif;
			if($this->modsesion->hasPermisoHijo(25)):?>
			<button type="button" class="btn btn-outline-secondary" title="Ver la Sucursal Asociada" onclick="location.href='<?= base_url('sucursales/ver/'.$sucursal->getIdsucursal()); ?>';">
				<i class="fas fa-eye"></i>
			</button>
			<?php endif;
			if($this->modsesion->hasPermisoHijo(22)):?>
			<button type="button" class="btn btn-outline-secondary" title="Actualizar Vehículo" onclick="location.href='<?= base_url('vehiculos/actualizar/'.$objeto->getIdvehiculo()); ?>';">
				<i class="far fa-edit"></i>
			</button>
			<?php endif;
			if($this->modsesion->hasPermisoHijo(23)):?>
			<button type="button" class="btn btn-outline-secondary" title="Borrar Vehículo" onclick="Vehiculo.Eliminar(<?= $sucursal->getIdempresa(); ?>,<?= $sucursal->getIdsucursal(); ?>,<?= $objeto->getIdvehiculo(); ?>)">
				<i class="far fa-trash-alt"></i>
			</button>
			<?php endif; ?>
		</div>
	</div>
	<h3>Vehículos</h3>
	<form autocomplete="off" id="frm_vehiculos">
		<div class="form-row"><div class="form-group col">
            <label for="frm_vehiculo_tipo">Tipo de Vehículo</label>
				<input disabled="disabled" type="text" class="form-control" id="frm_vehiculo_tipo" name="frm_vehiculo_tipo" value="<?= $objeto->getTipo(); ?>" placeholder="Tipo de Vehículo" maxlength="28" />
			</div>
			 <div class="form-group col">
			<label for="frm_vehiculo_placa">Placa del Vehículo <abbr class="text-danger" title="Campo Obligatorio">(obligatorio)</abbr></label>
				<input disabled="disabled" type="text" class="form-control" id="frm_vehiculo_placa" name="frm_vehiculo_placa" value="<?= $objeto->getPlaca(); ?>" placeholder="Placa del Vehículo" maxlength="20" />
			</div>
		</div>
		<div class="form-row"><div class="form-group col">
			<label for="frm_vehiculo_numautsct">Número de Autorizacion SCT</label>
				<input disabled="disabled" type="text" class="form-control" id="frm_vehiculo_numautsct" name="frm_vehiculo_numautsct" value="<?= $objeto->getNumautsct(); ?>" placeholder="Número de Autorizacion SCT" />
			</div>
			<div class="form-group col">
			<label for="frm_vehiculo_numautsct">Número de Autorizacion SEMARNAT</label>
				<input disabled="disabled" type="text" class="form-control" id="frm_vehiculo_autsemarnat" name="frm_vehiculo_autsemarnat" value="<?= $objeto->getAutsemarnat(); ?>" placeholder="Número de Autorizacion SEMARNAT" />
			</div>
		</div>
		<div class="form-row"><div class="form-group col">
			<label for="frm_vehiculo_detalle">Comentarios</label>
				<p class="form-control" id="frm_vehiculo_detalle" name="frm_vehiculo_detalle"><?= $objeto->getDetalle(); ?></p>
			</div>
		</div>
	</form>
</div>
<!-- Vista vehiculos/vista End -->