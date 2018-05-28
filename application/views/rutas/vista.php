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
		<div class="form-row"><div class="form-group col">
			<label for="frm_ruta_nombre">Nombre de la Ruta</label>
				<input disabled="disabled" type="text" class="form-control" id="frm_ruta_nombre" name="frm_ruta_nombre" value="<?= $objeto->getNombre(); ?>" placeholder="Nombre de la Ruta" />
			</div>
			<div class="form-group col">
			<label for="frm_ruta_identificador">Número de Ruta</label>
				<input disabled="disabled" type="text" class="form-control" id="frm_ruta_identificador" name="frm_ruta_identificador" value="<?= $objeto->getIdentificador(); ?>" placeholder="Número de Ruta" />
			</div>
		</div>
		<div class="form-row"><div class="form-group col">
			<label for="empresadestinofinal">Planta de Tratamiento</label>
				<?php
				$sucursal->setIdsucursal($objeto->getEmpresadestinofinal());
				$sucursal->getFromDatabase();
				$empresa->setIdempresa($sucursal->getIdempresa());
				$empresa->getFromDatabase();
				?>
				<input class="form-control" disabled="disabled" value="<?= "{$empresa->getRazonsocial()} - {$sucursal->getNombre()}"; ?>" />
			</div>
			<div class="form-group col">
			<label for="empresatransportista">Transportista</label>
				<?php
				$sucursal->setIdsucursal($objeto->getEmpresatransportista());
				$sucursal->getFromDatabase();
				$empresa->setIdempresa($sucursal->getIdempresa());
				$empresa->getFromDatabase();
				?>
				<input class="form-control" disabled="disabled" value="<?= "{$empresa->getRazonsocial()} - {$sucursal->getNombre()}"; ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group col">
			<label for="frm_ruta_descripcion">Descripción de la Ruta</label>
				<p class="form-control" id="frm_ruta_descripcion" name="frm_ruta_descripcion"><?= $objeto->getDescripcion(); ?></p>
			</div>
		</div>
		<div class="form-row"><div class="form-group col">
			<label for="frm_ruta_idoperador">Operador</label>
				<input class="form-control" disabled="disabled" value="<?= "{$operador->getNombre()} {$operador->getApaterno()} {$operador->getAmaterno()}"; ?>" />
			</div>
			<div class="form-group col">
			<label for="frm_ruta_idvehiculo">Vehiculo</label>
				<input class="form-control" disabled="disabled" value="<?= "{$vehiculo->getPlaca()} ({$vehiculo->getTipo()})"; ?>" />
			</div>
		</div>
		<div class="form-row">
			<div class="col">
				<div class="checkbox">
					<label>
						<input disabled="disabled" type="checkbox" value="1" id="frm_ruta_serviciolunes" name="frm_ruta_serviciolunes" <?= ($objeto->getServiciolunes()==1?'checked="checked"':''); ?> />
						Lunes
					</label>
				</div>
			</div>
			<div class="col">
				<div class="checkbox">
					<label>
						<input disabled="disabled" type="checkbox" value="1" id="frm_ruta_serviciomartes" name="frm_ruta_serviciomartes" <?= ($objeto->getServiciomartes()==1?'checked="checked"':''); ?> />
						Martes
					</label>
				</div>
			</div>
			<div class="col">
				<div class="checkbox">
					<label>
						<input disabled="disabled" type="checkbox" value="1" id="frm_ruta_serviciomiercoles" name="frm_ruta_serviciomiercoles" <?= ($objeto->getServiciomiercoles()==1?'checked="checked"':''); ?> />
						Miércoles
					</label>
				</div>
			</div>
			<div class="col">
				<div class="checkbox">
					<label>
						<input disabled="disabled" type="checkbox" value="1" id="frm_ruta_serviciojueves" name="frm_ruta_serviciojueves" <?= ($objeto->getServiciojueves()==1?'checked="checked"':''); ?> />
						Jueves
					</label>
				</div>
			</div>
			<div class="col">
				<div class="checkbox">
					<label>
						<input disabled="disabled" type="checkbox" value="1" id="frm_ruta_servicioviernes" name="frm_ruta_servicioviernes" <?= ($objeto->getServicioviernes()==1?'checked="checked"':''); ?> />
						Viernes
					</label>
				</div>
			</div>
			<div class="col">
				<div class="checkbox">
					<label>
						<input disabled="disabled" type="checkbox" value="1" id="frm_ruta_serviciosabado" name="frm_ruta_serviciosabado" <?= ($objeto->getServiciosabado()==1?'checked="checked"':''); ?> />
						Sabado
					</label>
				</div>
			</div>
			<div class="col">
				<div class="checkbox">
					<label>
						<input disabled="disabled" type="checkbox" value="1" id="frm_ruta_serviciodomingo" name="frm_ruta_serviciodomingo" <?= ($objeto->getServiciodomingo()==1?'checked="checked"':''); ?> />
						Domingo
					</label>
				</div>
			</div>
		</div>
	</form>
	<h5>
		Generadores Asociados
		<?php if($this->modsesion->hasPermisoHijo(80)): ?>
	    <button type="button" class="btn btn-outline-secondary btn-sm" title="Asociar Generadores" onclick="location.href='<?= base_url("rutas/agregargeneradores/".$objeto->getIdruta()); ?>'">
			<i class="fas fa-plus"></i>
		</button>
	    <button type="button" class="btn btn-outline-secondary btn-sm" title="Desasociador Generadores" onclick="location.href='<?= base_url("rutas/eliminargeneradores/".$objeto->getIdruta()); ?>'">
			<i class="fas fa-minus"></i>
		</button>
		<?php endif; ?>
	</h5>
		<table class="table table-hover table-sm table-responsive">
			<thead>
				<tr>
					<th class="sortable" onclick="TableSortByColumn( 'data-table', 1, 'asc' )">No. Cliente</th>
					<th class="sortable" onclick="TableSortByColumn( 'data-table', 2, 'asc' )">Cliente</th>
					<th class="sortable" onclick="TableSortByColumn( 'data-table', 3, 'asc' )">No. Generador</th>
					<th class="sortable" onclick="TableSortByColumn( 'data-table', 4, 'asc' )">Generador</th>
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
			<tbody id="data-table">
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
						<td>
							<?php if($this->modsesion->hasPermisoHijo( 55 ) ): ?>
								<a href="<?php echo base_url( '/clientes/ver/' . $cliente->getIdcliente() ); ?>">
									<?= $cliente->getIdentificador(); ?>
								</a>
							<?php else: ?>
								<?= $cliente->getIdentificador(); ?>
							<?php endif; ?>
						</td>
						<td>
							<?php if($this->modsesion->hasPermisoHijo( 55 ) ): ?>
								<a href="<?php echo base_url( '/clientes/ver/' . $cliente->getIdcliente() ); ?>">
									<?= $cliente->getRazonsocial(); ?>
								</a>
							<?php else: ?>
								<?= $cliente->getRazonsocial(); ?>
							<?php endif; ?>
						</td>
						<td>
							<?php if($this->modsesion->hasPermisoHijo( 66 ) ): ?>
								<a href="<?php echo base_url( '/generadores/ver/' . $generador->getIdgenerador() ); ?>">
									<?= $generador->getIdentificador(); ?>
								</a>
							<?php else: ?>
								<?= $generador->getIdentificador(); ?>
							<?php endif; ?>
						</td>
						<td>
							<?php if($this->modsesion->hasPermisoHijo( 66 ) ): ?>
								<a href="<?php echo base_url( '/generadores/ver/' . $generador->getIdgenerador() ); ?>">
									<?= $generador->getRazonsocial(); ?>
								</a>
							<?php else: ?>
								<?= $generador->getRazonsocial(); ?>
							<?php endif; ?>
						</td>
					</tr>
					<?php
				}
				?>
			</tbody>
		</table>
</div>