<!-- Vista operadores/vista -->
<?= $menumain; ?>
<div class="container">
	<div class="btn-toolbar float-right" role="toolbar">
		<div class="btn-group" role="group">
			<?php if($this->modsesion->hasPermisoHijo(8)): ?>
			<button type="button" class="btn btn-outline-secondary" title="Ver todos los Operadores" onclick="location.href='<?= base_url('operadores/index/'.$sucursal->getIdempresa().'/'.$sucursal->getIdsucursal()); ?>';">
				<i class="fas fa-th-list"></i>
			</button>
			<?php endif;
			if($this->modsesion->hasPermisoHijo(25)):?>
			<button type="button" class="btn btn-outline-secondary" title="Ver la Sucursal Asociada" onclick="location.href='<?= base_url('sucursales/ver/'.$sucursal->getIdsucursal()); ?>';">
				<i class="fas fa-eye"></i>
			</button>
			<?php endif;
			if($this->modsesion->hasPermisoHijo(60)):?>
			<button type="button" class="btn btn-outline-secondary" title="Actualizar Operador" onclick="location.href='<?= base_url('operadores/actualizar/'.$objeto->getIdoperador()); ?>';">
				<i class="far fa-edit"></i>
			</button>
			<?php endif;
			if($this->modsesion->hasPermisoHijo(61)):?>
			<button type="button" class="btn btn-outline-secondary" title="Borrar Operador" onclick="Operador.Eliminar(<?= $sucursal->getIdempresa(); ?>,<?= $sucursal->getIdsucursal(); ?>,<?= $objeto->getIdoperador(); ?>)">
				<i class="far fa-trash-alt"></i>
			</button>
			<?php endif; ?>
		</div>
	</div>
	<h3>Operadores</h3>
	<form autocomplete="off" id="frm_operadores">
		<div class="form-row"><div class="form-group col">
			<label for="frm_operador_nombre">Nombre <abbr class="text-danger" title="Campo Obligatorio">(obligatorio)</abbr></label>
				<input disabled="disabled" type="text" class="form-control" id="frm_operador_nombre" name="frm_operador_nombre" value="<?= $objeto->getNombre(); ?>" placeholder="Nombre del Operador" />
			</div>
			<div class="form-group col">
			<label for="frm_operador_apaterno">Apellido Paterno</label>
				<input disabled="disabled" type="text" class="form-control" id="frm_operador_apaterno" name="frm_operador_apaterno" value="<?= $objeto->getApaterno(); ?>" placeholder="Apellido Paterno" />
			</div>
			<div class="form-group col">
			<label for="frm_operador_amaterno">Apellido Materno</label>
				<input disabled="disabled" type="text" class="form-control" id="frm_operador_amaterno" name="frm_operador_amaterno" value="<?= $objeto->getAmaterno(); ?>" placeholder="Apellido Materno" />
			</div>
		</div>
		<div class="form-row"><div class="form-group col">
			<label for="frm_operador_detalle">Comentarios</label>
				<p class="form-control" id="frm_operador_detalle" name="frm_operador_detalle"><?= $objeto->getDetalle(); ?></p>
			</div>
		</div>
		<div class="form-row"><div class="form-group col">
			<label for="frm_operador_cargo">Cargo</label>
				<input disabled="disabled" type="text" class="form-control" id="frm_operador_cargo" name="frm_operador_cargo" value="<?= $objeto->getCargo(); ?>" placeholder="Cargo del Operador" maxlength="37" />
			</div>
			<div class="form-group col">
			<label for="frm_operador_telefono">Teléfono</label>
				<input disabled="disabled" type="tel" class="form-control" id="frm_operador_telefono" name="frm_operador_telefono" value="<?= $objeto->getTelefono(); ?>" placeholder="Teléfono del Operador" maxlength="13" />
			</div>
			<div class="form-group col">
			<label for="frm_operador_email">Correo Electrónico</label>
				<input disabled="disabled" type="text" class="form-control" id="frm_operador_email" name="frm_operador_email" value="<?= $objeto->getEmail(); ?>" placeholder="Correo Eletrónico del Operador" />
			</div>
		</div>
	</form>
</div>
<!-- Vista operadores/vista End -->