<?= $menumain; ?>
<div class="container">
	<div class="btn-toolbar float-right" role="toolbar">
		<div class="btn-group" role="group">
			<?php if($this->modsesion->hasPermisoHijo(64)): ?>
			<button type="button" class="btn btn-outline-secondary" title="Nueva Ruta" onclick="location.href='<?= base_url('rutas/nuevo/'.$idempresa.'/'.$idsucursal);?>';">
				<i class="far fa-file-alt"></i>
			</button>
			<?php endif; 
			if($this->modsesion->hasPermisoHijo(102)): ?>
			<button type="button" class="btn btn-outline-secondary" title="Generar Reportes" onclick="Ruta.FrmReporte()">
				<i class="fas fa-book"></i>
			</button>
			<?php endif; ?>
		</div>
	</div>
	<h3>Rutas</h3>
	<form autocomplete="off" method="post" id="frm_prefer">
		<div class="form-row"><div class="form-group col">
			<label for="frm_prefer_empresa">Empresa</label>
				<select class="form-control" id="frm_prefer_empresa" name="frm_prefer_empresa" onchange="location.href=baseURL+'rutas/index/'+$('#frm_prefer_empresa').val();">
					<?php foreach($empresas as $empresa): ?>
						<option value="<?= $empresa["idempresa"]; ?>" <?= ($empresa["idempresa"]==$idempresa?'selected="selected"':''); ?>><?= $empresa["razonsocial"]; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group col">
			<label for="frm_prefer_empresa">Sucursal</label>
				<select class="form-control" id="frm_prefer_sucursal" name="frm_prefer_sucursal" onchange="location.href=baseURL+'rutas/index/'+$('#frm_prefer_empresa').val()+'/'+$('#frm_prefer_sucursal').val();">
					<?php foreach($sucursales as $sucursal): ?>
						<option value="<?= $sucursal["idsucursal"]; ?>" <?= ($sucursal["idsucursal"]==$idsucursal?'selected="selected"':''); ?>><?= $sucursal["nombre"]; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
	</form>
		<table class="table table-hover table-sm table-responsive-sm">
			<thead>
				<tr>
					<th class="sortable" onclick="TableSortByColumn( 'data-table', 1, 'asc' )">Número de Ruta</th>
					<th class="sortable" onclick="TableSortByColumn( 'data-table', 2, 'asc' )">Nombre</th>
					<th>Descripcion</th>
					<th class="sortable" onclick="TableSortByColumn( 'data-table', 4, 'asc' )">Planta de Tratamiento</th>
					<th class="sortable" onclick="TableSortByColumn( 'data-table', 5, 'asc' )">Transportista</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>Número de Ruta</th>
					<th>Nombre</th>
					<th>Descripcion</th>
					<th>Planta de Tratamiento</th>
					<th>Transportista</th>
				</tr>
			</tfoot>
			<tbody id="data-table">
				<?php if($rutas!==false) foreach($rutas as $ruta): ?>
					<tr>
						<td>
							<?php if($this->modsesion->hasPermisoHijo(65)): ?>
							<a href="<?= base_url('rutas/ver/'.$ruta["idruta"]); ?>">
							<?php endif; ?>
								<?= $ruta["identificador"]; ?>
							<?php if($this->modsesion->hasPermisoHijo(65)): ?>
							</a>
							<?php endif; ?>
						</td>
						<td>
							<?php if($this->modsesion->hasPermisoHijo(65)): ?>
							<a href="<?= base_url('rutas/ver/'.$ruta["idruta"]); ?>">
							<?php endif; ?>
							<?= $ruta["nombre"]; ?>
							<?php if($this->modsesion->hasPermisoHijo(65)): ?>
							</a>
							<?php endif; ?>
						</td>
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