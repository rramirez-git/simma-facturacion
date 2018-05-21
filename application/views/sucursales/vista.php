<!-- Vista sucursales/vista -->
<?= $menumain; ?>
<?php
$objruta=new Modruta();
$objsucursal=new Modsucursal();
$objempresa=new Modempresa();
?>
<div class="container">
	<div class="btn-toolbar float-right" role="toolbar">
		<div class="btn-group" role="group">
			<?php if($this->modsesion->hasPermisoHijo(7)): ?>
			<button type="button" class="btn btn-outline-secondary" title="Ver todas las Sucurales" onclick="location.href='<?= base_url('sucursales/index/'.$objeto->getIdEmpresa()); ?>';">
				<i class="fas fa-th-list"></i>
			</button>
			<?php endif;
			if($this->modsesion->hasPermisoHijo(57)):?>
			<button type="button" class="btn btn-outline-secondary" title="Ver la Empresa Asociada" onclick="location.href='<?= base_url('empresas/ver/'.$objeto->getIdEmpresa()); ?>';">
				<i class="fas fa-eye"></i>
			</button>
			<?php endif;
			if($this->modsesion->hasPermisoHijo(50)):?>
			<button type="button" class="btn btn-outline-secondary" title="Actualizar Sucursal" onclick="location.href='<?= base_url('sucursales/actualizar/'.$objeto->getIdsucursal()); ?>';">
				<i class="far fa-edit"></i>
			</button>
			<?php endif;
			if($this->modsesion->hasPermisoHijo(51)):?>
			<button type="button" class="btn btn-outline-secondary" title="Borrar Sucursal" onclick="Sucursal.Eliminar(<?= $objeto->getIdempresa(); ?>,<?= $objeto->getIdsucursal(); ?>)">
				<i class="far fa-trash-alt"></i>
			</button>
			<?php endif; ?>
		</div>
	</div>
	<h3>Sucursales <small class="text-muted"><?= $objeto->getNombre(); ?></small></h3>
	<form autocomplete="off" id="frm_sucursales" method="post">
		<div class="form-row"><div class="form-group">
			<label for="frm_sucursal_nombre" class="col-sm-2 control-label">Razón Social</label>
			<div class="col-sm-10">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getNombre(); ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group">
			<label for="frm_sucursal_iniales" class="col-sm-2 control-label">Iniciales</label>
			<div class="col-sm-10">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getIniciales(); ?>" />
			</div>
		</div>
		<h5>Facturación</h5>
		<div class="form-row"><div class="form-group">
			<label for="frm_sucursal_fac_serie" class="col-sm-2 control-label">Número de Serie</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getFac_serie(); ?>" />
			</div>
			<label for="frm_sucursal_fac_folio_actual" class="col-sm-2 control-label">Número de Folio Actual</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getFac_folio_actual(); ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group">
			<label for="frm_sucursal_fac_folio_incial" class="col-sm-2 control-label">Número de Folio Inicial</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getFac_folio_incial(); ?>" />
			</div>
			<label for="frm_sucursal_fac_folio_final" class="col-sm-2 control-label">Número de Folio Final</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getFac_folio_final(); ?>" />
			</div>
		</div>
		<h5>Notas de Crédito</h5>
		<div class="form-row"><div class="form-group">
			<label for="frm_sucursal_nc_serie" class="col-sm-2 control-label">Número de Serie</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getNc_serie(); ?>" />
			</div>
			<label for="frm_sucursal_nc_folio_actual" class="col-sm-2 control-label">Número de Folio Actual</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getNc_folio_actual(); ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group">
			<label for="frm_sucursal_nc_folio_incial" class="col-sm-2 control-label">Número de Folio Inicial</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getNc_folio_incial(); ?>" />
			</div>
			<label for="frm_sucursal_nc_folio_final" class="col-sm-2 control-label">Número de Folio Final</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getNc_folio_final(); ?>" />
			</div>
		</div>
		<h5>Pagos</h5>
		<div class="form-row"><div class="form-group">
			<label for="frm_sucursal_pago_serie" class="col-sm-2 control-label">Número de Serie</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getPago_serie(); ?>" />
			</div>
			<label for="frm_sucursal_pago_folio_actual" class="col-sm-2 control-label">Número de folio Actual</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getPago_folio_actual(); ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group">
			<label for="frm_sucursal_pago_folio_incial" class="col-sm-2 control-label">Número de Folio Inicial</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getPago_folio_incial(); ?>" />
			</div>
			<label for="frm_sucursal_pago_folio_final" class="col-sm-2 control-label">Número de Folio Final</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getPago_folio_final(); ?>" />
			</div>
		</div>
		<h5>Dirección</h5>
		<div class="form-row"><div class="form-group">
			<label for="frm_sucursal_calle" class="col-sm-2 control-label">Calle</label>
			<div class="col-sm-10">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getCalle(); ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group">
			<label for="frm_sucursal_numexterior" class="col-sm-2 control-label">Número Exterior</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getNumexterior(); ?>" />
			</div>
			<label for="frm_sucursal_numinterior" class="col-sm-2 control-label">Número Interior</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getNuminterior(); ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group">
		    <label for="frm_sucursal_cp" class="col-sm-2 control-label">Código Postal</label></span>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getCp(); ?>" />
			</div>
			<label for="frm_sucursal_colonia" class="col-sm-2 control-label">Colonia</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getColonia(); ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group">
			<label for="frm_sucursal_municipio" class="col-sm-2 control-label">Delegación o Municipio</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getMunicipio(); ?>" />
			</div>
			<label for="frm_sucursal_estado" class="col-sm-2 control-label">Estado</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getEstado(); ?></p>
			</div>
		</div>
		<h5>Contacto</h5>
		<div class="form-row"><div class="form-group">
			<label for="frm_sucursal_representante" class="col-sm-2 control-label">Representante</label>
			<div class="col-sm-10">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getRepresentante(); ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group">
			<label for="frm_sucursal_cargorepresentante" class="col-sm-2 control-label">Cargo</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getCargorepresentante(); ?>" />
			</div>
			<label for="frm_sucursal_telefono" class="col-sm-2 control-label">Teléfono</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getTelefono(); ?>" />
			</div>
		</div>
		<h5>Legal</h5>
		<div class="form-row"><div class="form-group">
			<label for="frm_sucursal_autsemarnat" class="col-sm-2 control-label">Número de Autorización SEMARNAT</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getAutsemarnat(); ?>" />
			</div>
			<label for="frm_sucursal_registrosct" class="col-sm-2 control-label">Número de Registro SCT</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getRegistrosct(); ?>" />
			</div>
		</div>
		<!--<div class="form-row"><div class="form-group">
			<label for="frm_sucursal_numregamb" class="col-sm-2 control-label">Número de Registro Ambiental <abbr class="text-danger" title="Campo Obligatorio">(*)</abbr></label>
			<div class="col-sm-10">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getNumregamb(); ?>" />
			</div>
		</div>-->
		<?php if($this->modsesion->hasPermisoHijo(8) && count($operadores)>0): ?>
			<h5>Operadores</h5>
			<div class="table-responsive">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Cargo</th>
							<th>Teléfono</th>
							<th>Correo Electrónico</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>Nombre</th>
							<th>Cargo</th>
							<th>Teléfono</th>
							<th>Correo Electrónico</th>
						</tr>
					</tfoot>
					<tbody>
						<?php if($operadores!==false) foreach($operadores as $operador): ?>
							<tr>
								<td>
									<a href="<?= base_url('operadores/ver/'.$operador["idoperador"]); ?>">
										<?= $operador["nombre"]; ?>
										<?= $operador["apaterno"]; ?>
										<?= $operador["amaterno"]; ?>
									</a>
								</td>
								<td><?= $operador["cargo"]; ?></td>
								<td><?= $operador["telefono"]; ?></td>
								<td><A href="mailto:<?= $operador["email"]; ?>?subject=Correo enviado desde SIMMA. "><?= $operador["email"]; ?></a></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		<?php endif; 
		if($this->modsesion->hasPermisoHijo(9) && count($vehiculos)>0): ?>
			<h5>Vehiculos</h5>
			<div class="table-responsive">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>Placa</th>
							<th>Número de Autorizacion SCT</th>
							<th>Número de Autorizacion SEMARNAT</th>
							<th>Tipo de Vehículo</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>Placa</th>
							<th>Número de Autorizacion SCT</th>
							<th>Número de Autorizacion SEMARNAT</th>
							<th>Tipo de Vehículo</th>
						</tr>
					</tfoot>
					<tbody>
						<?php if($vehiculos!==false) foreach($vehiculos as $vehiculo): ?>
							<tr>
								<td>
									<a href="<?= base_url('vehiculos/ver/'.$vehiculo["idvehiculo"]); ?>">
										<?= $vehiculo["placa"]; ?>
									</a>
								</td>
								<td><?= $vehiculo["numautsct"]; ?></td>
								<td><?= $vehiculo["autsemarnat"]; ?></td>
								<td><?= $vehiculo["tipo"]; ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		<?php endif; 
		if($this->modsesion->hasPermisoHijo(52) && count($rutas)>0):?>
			<h5>Rutas</h5>
			<div class="table-responsive">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>Número de Ruta</th>
							<th>Nombre</th>
							<th>Descripcion</th>
							<th>Destino Final</th>
							<th>Transportista</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>Número de Ruta</th>
							<th>Nombre</th>
							<th>Descripcion</th>
							<th>Destino Final</th>
							<th>Transportista</th>
						</tr>
					</tfoot>
					<tbody>
						<?php if($rutas!==false) foreach($rutas as $ruta): ?>
							<tr>
								<td>
									<a href="<?= base_url('rutas/ver/'.$ruta["idruta"]); ?>">
										<?= $ruta["identificador"]; ?>
									</a>
								</td>
								<td><?= $ruta["nombre"]; ?></td>
								<td><?= $ruta["descripcion"]; ?></td>
								<td>
									<?php 
										$objruta->setIdruta($ruta["idruta"]);
										$objruta->getFromDatabase();
										$objsucursal->setIdsucursal($objruta->getEmpresadestinofinal());
										$objsucursal->getFromDatabase();
										$objempresa->setIdempresa($objsucursal->getIdempresa());
										$objempresa->getFromDatabase();
										echo "{$objempresa->getRazonsocial()} - {$objsucursal->getNombre()}";
									?>
								</td>
								<td>
									<?php 
										$objruta->getFromDatabase();
										$objsucursal->setIdsucursal($objruta->getEmpresatransportista());
										$objsucursal->getFromDatabase();
										$objempresa->setIdempresa($objsucursal->getIdempresa());
										$objempresa->getFromDatabase();
										echo "{$objempresa->getRazonsocial()} - {$objsucursal->getNombre()}";
									?>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		<?php endif; ?>
	</form>
</div>
<!-- Vista sucursales/vista End -->