<?= $menumain; ?>
<?php
$sucursal->getFromDatabase($objeto->getIdSucursal());
$operador->setIdoperador($objeto->getIdoperador());
$operador->getFromDatabase();
$vehiculo->setIdvehiculo($objeto->getIdvehiculo());
$vehiculo->getFromDatabase();
?>
<div class="container">
	<div class="btn-toolbar float-right" role="toolbar">
		<div class="btn-group" role="group">
			<?php if($this->modsesion->hasPermisoHijo(52)): ?>
			<button type="button" class="btn btn-outline-secondary" title="Ver todas las rutas" onclick="location.href='<?= base_url('rutas/index/'.$sucursal->getIdempresa().'/'.$sucursal->getIdsucursal()); ?>';">
				<i class="fas fa-th-list"></i>
			</button>
			<?php endif;
			if($this->modsesion->hasPermisoHijo(25)):?>
			<button type="button" class="btn btn-outline-secondary" title="Ver la Sucursal Asociada" onclick="location.href='<?= base_url('sucursales/ver/'.$sucursal->getIdsucursal()); ?>';">
				<i class="fas fa-eye"></i>
			</button>
			<?php endif;
			if($this->modsesion->hasPermisoHijo(94)):?>
			<button type="button" class="btn btn-outline-secondary" title="Ver Plan de Recoleccion" onclick="location.href='<?= base_url("rutas/planrecoleccion/".$objeto->getIdruta()); ?>'">
				<i class="fas fa-briefcase"></i>
			</button>
			<?php endif;
			if($this->modsesion->hasPermisoHijo(73)):?>
			<button type="button" class="btn btn-outline-secondary" title="Actualizar Ruta" onclick="location.href='<?= base_url('rutas/actualizar/'.$objeto->getIdruta()); ?>';">
				<i class="far fa-edit"></i>
			</button>
			<?php endif;
			if($this->modsesion->hasPermisoHijo(74)):?>
			<button type="button" class="btn btn-outline-secondary" title="Borrar Ruta" onclick="Ruta.Eliminar(<?= $sucursal->getIdempresa(); ?>,<?= $sucursal->getIdsucursal(); ?>,<?= $objeto->getIdruta(); ?>)">
				<i class="far fa-trash-alt"></i>
			</button>
			<?php endif; ?>
		</div>
	</div>
	<h3>Rutas</h3>
	<form autocomplete="off" id="frm_rutas">
		<div class="form-row"><div class="form-group">
			<label for="frm_ruta_nombre" class="col-sm-2 control-label">Nombre de la Ruta</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getNombre(); ?>" />
			</div>
			<label for="frm_ruta_identificador" class="col-sm-2 control-label">Número de Ruta</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getIdentificador(); ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group">
			<label for="empresadestinofinal" class="col-sm-2 control-label">Planta de Tratamiento</label>
			<div class="col-sm-4">
				<?php
				$sucursal->setIdsucursal($objeto->getEmpresadestinofinal());
				$sucursal->getFromDatabase();
				$empresa->setIdempresa($sucursal->getIdempresa());
				$empresa->getFromDatabase();
				?>
				<input class="form-control" disabled="disabled" value="<?= "{$empresa->getRazonsocial()} - {$sucursal->getNombre()}"; ?>" />
			</div>
			<label for="empresatransportista" class="col-sm-2 control-label">Transportista</label>
			<div class="col-sm-4">
				<?php
				$sucursal->setIdsucursal($objeto->getEmpresatransportista());
				$sucursal->getFromDatabase();
				$empresa->setIdempresa($sucursal->getIdempresa());
				$empresa->getFromDatabase();
				?>
				<input class="form-control" disabled="disabled" value="<?= "{$empresa->getRazonsocial()} - {$sucursal->getNombre()}"; ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group">
			<label for="frm_ruta_descripcion" class="col-sm-2 control-label">Descripción de la Ruta</label>
			<div class="col-sm-10">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getDescripcion(); ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group">
			<label for="frm_ruta_idoperador" class="col-sm-2 control-label">Operador</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= "{$operador->getNombre()} {$operador->getApaterno()} {$operador->getAmaterno()}"; ?>" />
			</div>
			<label for="frm_ruta_idvehiculo" class="col-sm-2 control-label">Vehiculo</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= "{$vehiculo->getPlaca()} ({$vehiculo->getTipo()})"; ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group">
			<div class="col-sm-2">
				<div class="checkbox">
					<label>
						<input type="checkbox" value="1" id="frm_ruta_serviciolunes" name="frm_ruta_serviciolunes" <?= ($objeto->getServiciolunes()==1?'checked="checked"':''); ?> disabled="disabled" />
						Lunes
					</label>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="checkbox">
					<label>
						<input type="checkbox" value="1" id="frm_ruta_serviciomartes" name="frm_ruta_serviciomartes" <?= ($objeto->getServiciomartes()==1?'checked="checked"':''); ?> disabled="disabled" />
						Martes
					</label>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="checkbox">
					<label>
						<input type="checkbox" value="1" id="frm_ruta_serviciomiercoles" name="frm_ruta_serviciomiercoles" <?= ($objeto->getServiciomiercoles()==1?'checked="checked"':''); ?> disabled="disabled" />
						Miércoles
					</label>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="checkbox">
					<label>
						<input type="checkbox" value="1" id="frm_ruta_serviciojueves" name="frm_ruta_serviciojueves" <?= ($objeto->getServiciojueves()==1?'checked="checked"':''); ?> disabled="disabled" />
						Jueves
					</label>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="checkbox">
					<label>
						<input type="checkbox" value="1" id="frm_ruta_servicioviernes" name="frm_ruta_servicioviernes" <?= ($objeto->getServicioviernes()==1?'checked="checked"':''); ?> disabled="disabled" />
						Viernes
					</label>
				</div>
			</div>
			<div class="col-sm-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" value="1" id="frm_ruta_serviciosabado" name="frm_ruta_serviciosabado" <?= ($objeto->getServiciosabado()==1?'checked="checked"':''); ?> disabled="disabled" />
						Sabado
					</label>
				</div>
			</div>
			<div class="col-sm-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" value="1" id="frm_ruta_serviciodomingo" name="frm_ruta_serviciodomingo" <?= ($objeto->getServiciodomingo()==1?'checked="checked"':''); ?> disabled="disabled" />
						Domingo
					</label>
				</div>
			</div>
		</div>
	</form>
	<h5>
		Generadores Asociados
		<?php if($this->modsesion->hasPermisoHijo(80)): ?>
	    <button type="button" class="btn btn-outline-secondary btn-xs" title="Asociar Generadores" onclick="location.href='<?= base_url("rutas/agregargeneradores/".$objeto->getIdruta()); ?>'">
			<i class="fas fa-plus"></i>
		</button>
	    <button type="button" class="btn btn-outline-secondary btn-xs" title="Desasociador Generadores" onclick="location.href='<?= base_url("rutas/eliminargeneradores/".$objeto->getIdruta()); ?>'">
			<i class="fas fa-minus"></i>
		</button>
		<?php endif; ?>
	</h5>
	<div class="table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>No. Cliente</th>
					<th>Cliente</th>
					<th>No. Generador</th>
					<th>Generador</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>No. Cliente</th>
					<th>Cliente</th>
					<th>No. Generador</th>
					<th>Generador</th>
				</tr>
			</tfoot>
			<tbody>
				<?php
				$gs=$objeto->getGeneradoresAsociados($objeto->getIdruta());
				if($gs!==false && count($gs)>0) foreach($gs as $g)
				{
					$generador->setIdgenerador($g["idgenerador"]);
					$generador->getFromDatabase();
					$cliente->setIdcliente($generador->getIdcliente());
					$cliente->getFromDatabase();
					?>
					<tr>
						<td><?= $cliente->getIdentificador(); ?></td>
						<td><?= $cliente->getRazonsocial(); ?></td>
						<td><?= $generador->getIdentificador(); ?></td>
						<td><?= $generador->getRazonsocial(); ?></td>
					</tr>
					<?php
				}
				?>
			</tbody>
		</table>
	</div>
</div>