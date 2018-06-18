<?= $menumain; ?>
<?php
$sucursal->getFromDatabase($objeto->getIdSucursal());
$operador->setIdoperador($ruta->getIdoperador());
$operador->getFromDatabase();
$vehiculo->setIdvehiculo($ruta->getIdvehiculo());
$vehiculo->getFromDatabase();
$cliente=new Modcliente();
$generador=new Modgenerador();
$manifiesto=new ModManifiesto();
?>
<div class="container">
	<div class="btn-toolbar float-right" role="toolbar">
		<div class="btn-group" role="group">
			<?php if($this->modsesion->hasPermisoHijo(19)): ?>
			<button type="button" class="btn btn-outline-secondary" title="Ver todas las bitacoras" onclick="location.href='<?= base_url('bitacoras/index/'.$sucursal->getIdempresa().'/'.$sucursal->getIdsucursal()); ?>';">
				<i class="fas fa-th-list"></i>
			</button>
			<?php endif;
			if($this->modsesion->hasPermisoHijo(25)):?>
			<button type="button" class="btn btn-outline-secondary" title="Ver la Sucursal Asociada" onclick="location.href='<?= base_url('sucursales/ver/'.$sucursal->getIdsucursal()); ?>';">
				<i class="fas fa-eye"></i>
			</button>
			<?php endif;
			if($this->modsesion->hasPermisoHijo(97)):?>
			<button type="button" class="btn btn-outline-secondary" title="Imprimir Bitácora" onclick="window.open('<?= base_url("bitacoras/imprimirbit/".$objeto->getIdbitacora()); ?>','bitacora2')">
				<i class="fas fa-print"></i>
			</button>
			<?php endif;
			if($this->modsesion->hasPermisoHijo(98)):?>
			<button type="button" class="btn btn-outline-secondary" title="Imprimir Manifiestos" onclick="window.open('<?= base_url("bitacoras/imprimir/".$objeto->getIdbitacora()); ?>','bitacora')">
				<i class="far fa-image"></i>
			</button>
			<?php endif;
			if($this->modsesion->hasPermisoHijo(96)):?>
			<button type="button" class="btn btn-outline-secondary" title="Borrar Bitacora" onclick="Bitacora.Eliminar(<?= $sucursal->getIdempresa(); ?>,<?= $sucursal->getIdsucursal(); ?>,<?= $objeto->getIdbitacora(); ?>)">
				<i class="far fa-trash-alt"></i>
			</button>
			<?php endif; ?>
		</div>
	</div>
	<h3>Bitacoras</h3>
	<form autocomplete="off" id="frm_rutas">
		<div class="form-row"><div class="form-group col">
			<label for="frm_ruta_nombre">Bitacora</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getNombre(); ?>" />
		</div>
		<div class="form-group col">
			<label for="frm_ruta_nombre">Folio</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getIdentificador(); ?>" />
			</div>
			<div class="form-group col">
			<label for="frm_ruta_identificador">Fecha de la Bitacora</label>
				<input class="form-control" disabled="disabled" value="<?= DateToMx($objeto->getFecha()); ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group col">
			<label for="frm_ruta_nombre">Nombre de la Ruta</label>
				<input class="form-control" disabled="disabled" value="<?= $ruta->getNombre(); ?>" />
			</div>
			<div class="form-group col">
			<label for="frm_ruta_identificador">Número de Ruta</label>
				<input class="form-control" disabled="disabled" value="<?= $ruta->getIdentificador(); ?>" />
			</div>
			<div class="form-group col">
			<label for="empresadestinofinal">Planta de Tratamiento</label>
				<?php
				$sucursal->setIdsucursal($ruta->getEmpresadestinofinal());
				$sucursal->getFromDatabase();
				$empresa->setIdempresa($sucursal->getIdempresa());
				$empresa->getFromDatabase();
				?>
				<input class="form-control" disabled="disabled" value="<?= "{$empresa->getRazonsocial()} - {$sucursal->getNombre()}"; ?>" />
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col">
			<label for="empresatransportista">Transportista</label>
				<?php
				$sucursal->setIdsucursal($ruta->getEmpresatransportista());
				$sucursal->getFromDatabase();
				$empresa->setIdempresa($sucursal->getIdempresa());
				$empresa->getFromDatabase();
				?>
				<input class="form-control" disabled="disabled" value="<?= "{$empresa->getRazonsocial()} - {$sucursal->getNombre()}"; ?>" />
			</div>
			<div class="form-group col">
			<label for="frm_ruta_idoperador">Operador</label>
				<input class="form-control" disabled="disabled" value="<?= "{$operador->getNombre()} {$operador->getApaterno()} {$operador->getAmaterno()}"; ?>" />
			</div>
			<div class="form-group col">
			<label for="frm_ruta_idvehiculo">Vehiculo</label>
				<input class="form-control" disabled="disabled" value="<?= "{$vehiculo->getPlaca()} ({$vehiculo->getTipo()})"; ?>" />
			</div>
		</div>
	</form>
		<table class="table table-hover table-sm table-responsive-sm">
			<thead>
				<tr>
					<th>Cliente</th>
					<th>Generador</th>
					<th>Manifiesto</th>
					<th>Ubicacion</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>Cliente</th>
					<th>Generador</th>
					<th>Manifiesto</th>
					<th>Ubicacion</th>
				</tr>
			</tfoot>
			<tbody>
				<?php if($objeto->getManifiestos()!==false) foreach($objeto->getManifiestos() as $man):
					$manifiesto->setIdmanifiesto($man);
					$manifiesto->getFromDatabase();
					$generador->setIdgenerador($manifiesto->getIdgenerador());
					$generador->getFromDatabase();
					$cliente->setIdcliente($generador->getIdcliente());
					$cliente->getFromDatabase();
				?>
				<tr>
					<td>
						<?php if($this->modsesion->hasPermisoHijo(55)): ?>
							<a href="<?php echo base_url( "/clientes/ver/{$cliente->getIdcliente()}" ); ?>" ><?= "{$cliente->getIdentificador()} - {$cliente->getRazonsocial()}"; ?></a>
						<?php else: ?>
							<?= "{$cliente->getIdentificador()} - {$cliente->getRazonsocial()}"; ?>
						<?php endif; ?>
					</td>
					<td>
						<?php if($this->modsesion->hasPermisoHijo(66)): ?>
							<a href="<?php echo base_url( "/generadores/ver/{$generador->getIdgenerador()}" ); ?>" ><?= "{$generador->getIdentificador()} - {$generador->getRazonsocial()}"; ?></a>
						<?php else: ?>
							<?= "{$generador->getIdentificador()} - {$generador->getRazonsocial()}"; ?>
						<?php endif; ?>
					</td>
					<td>
						<?php if($this->modsesion->hasPermisoHijo(32)): ?>
							<a href="<?php echo base_url( "/manifiestos/ver/{$manifiesto->getIdmanifiesto()}" ); ?>" ><?= $manifiesto->getIdentificador(); ?></a>
						<?php else: ?>	
							<?= $manifiesto->getIdentificador(); ?>
						<?php endif; ?>
					</td>
					<td>
						<?= $generador->getCalle(); ?>
						<?= ($generador->getNumexterior()!=""?" , Num. ".$generador->getNumexterior():""); ?>
						<?= ($generador->getNuminterior()!=""?" (Int.".$generador->getNuminterior().")":""); ?><br />
						<?= $generador->getColonia(); ?><br />
						<?= $generador->getMunicipio(); ?><br />
						<?= $generador->getEstado(); ?><br />
						C.P. <?= $generador->getCp(); ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
</div>