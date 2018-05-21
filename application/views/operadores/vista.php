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
		<div class="form-row"><div class="form-group">
			<label for="frm_operador_nombre" class="col-sm-2 control-label">Nombre</label>
			<div class="col-sm-10">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getNombre(); ?></p>
			</div>
		</div>
		<div class="form-row"><div class="form-group">
			<label for="frm_operador_apaterno" class="col-sm-2 control-label">Apellido Paterno</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getApaterno(); ?></p>
			</div>
			<label for="frm_operador_amaterno" class="col-sm-2 control-label">Apellido Materno</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getAmaterno(); ?></p>
			</div>
		</div>
		<div class="form-row"><div class="form-group">
			<label for="frm_operador_detalle" class="col-sm-2 control-label">Comentarios</label>
			<div class="col-sm-10">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getDetalle(); ?></p>
			</div>
		</div>
		<div class="form-row"><div class="form-group">
			<label for="frm_operador_cargo" class="col-sm-2 control-label">Cargo</label>
			<div class="col-sm-10">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getCargo(); ?></p>
			</div>
		</div>
		<div class="form-row"><div class="form-group">
			<label for="frm_operador_telefono" class="col-sm-2 control-label">Teléfono</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getTelefono(); ?></p>
			</div>
			<label for="frm_operador_email" class="col-sm-2 control-label">Correo Electrónico</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getEmail(); ?>" />
			</div>
		</div>
	</form>
</div>
<!-- Vista operadores/vista End -->