<?= $menumain; ?>
<div class="container">
	<div class="btn-toolbar float-right" role="toolbar">
		<div class="btn-group" role="group">
		</div>
	</div>
	<h3>Bitácoras</h3>
	<form autocomplete="off" method="post" id="frm_prefer">
		<div class="form-row"><div class="form-group col">
			<label for="frm_prefer_empresa">Empresa</label>
				<select class="form-control" id="frm_prefer_empresa" name="frm_prefer_empresa" onchange="location.href=baseURL+'bitacoras/index/'+$('#frm_prefer_empresa').val();">
					<?php foreach($empresas as $empresa): ?>
						<option value="<?= $empresa["idempresa"]; ?>" <?= ($empresa["idempresa"]==$idempresa?'selected="selected"':''); ?>><?= $empresa["razonsocial"]; ?></option>
					<?php endforeach; ?>
				</select>
		</div>
		<div class="form-group col">
			<label for="frm_prefer_empresa">Sucursal</label>
				<select class="form-control" id="frm_prefer_sucursal" name="frm_prefer_sucursal" onchange="location.href=baseURL+'bitacoras/index/'+$('#frm_prefer_empresa').val()+'/'+$('#frm_prefer_sucursal').val();">
					<?php foreach($sucursales as $sucursal): ?>
						<option value="<?= $sucursal["idsucursal"]; ?>" <?= ($sucursal["idsucursal"]==$idsucursal?'selected="selected"':''); ?>><?= $sucursal["nombre"]; ?></option>
					<?php endforeach; ?>
				</select>
		</div></div>
		<div class="form-row">
			<div class="form-group col">
				<label for="frm_prefer_identificador">Bitácora</label>
				<input type="text" class="form-control" id="frm_prefer_identificador" name="frm_prefer_identificador" value="<?= $filtros[ "identificador" ]; ?>" />
			</div>
			<div class="form-group col">
				<label for="frm_prefer_fecha">Fecha</label>
				<input type="date" class="form-control" id="frm_prefer_fecha" name="frm_prefer_fecha" value="<?= $filtros[ "fecha" ]; ?>" />
			</div>
			<div class="form-group col">
				<label for="frm_prefer_ruta">Ruta</label>
				<input type="text" class="form-control" id="frm_prefer_ruta" name="frm_prefer_ruta" value="<?= $filtros[ "ruta" ]; ?>" />
			</div>
		</div>
		<input type="hidden" id="action" name="action" value="find" />
		<button type="button" class="btn btn-outline-primary" onclick="Cliente.Buscar()" >Buscar</button>
	</form>
		<table class="table table-hover table-sm table-responsive-sm">
			<thead>
				<tr>
					<th class="sortable" onclick="TableSortByColumn( 'data-table', 1, 'asc' )">Folio</th>
					<th class="sortable" onclick="TableSortByColumn( 'data-table', 2, 'asc' )">Nombre</th>
					<th>Fecha</th>
					<th class="sortable" onclick="TableSortByColumn( 'data-table', 4, 'asc' )">Ruta</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>Folio</th>
					<th>Nombre</th>
					<th>Fecha</th>
					<th>Ruta</th>
				</tr>
			</tfoot>
			<tbody id="data-table">
				<?php if($bitacoras!==false) foreach($bitacoras as $bitacora): ?>
					<tr>
						<td>
							<?php if($this->modsesion->hasPermisoHijo(95)): ?>
							<a href="<?= base_url('bitacoras/ver/'.$bitacora["idbitacora"]); ?>">
							<?php endif; ?>
								<?= ($bitacora["identificador"]!=""?$bitacora["identificador"]:"Id: ".$bitacora["idbitacora"]); ?>
							<?php if($this->modsesion->hasPermisoHijo(95)): ?>
							</a>
							<?php endif; ?>
						</td>
						<td>
							<?php if($this->modsesion->hasPermisoHijo(95)): ?>
								<a href="<?= base_url( 'bitacoras/ver/' . $bitacora[ "idbitacora" ] ); ?>">
									<?= $bitacora["nombre"]; ?>
								</a>
							<?php else: ?>
								<?= $bitacora["nombre"]; ?>
							<?php endif; ?>
						</td>
						<td><?= DateToMx($bitacora["fecha"]); ?></td>
						<td>
							<?php
								$objbitacora->setIdbitacora($bitacora["idbitacora"]);
								$objbitacora->getFromDatabase();
								$objruta->setIdruta($objbitacora->getIdruta());
								$objruta->getFromDatabase();
							?>
							<?php if($this->modsesion->hasPermisoHijo(95)): ?>
								<a href="<?= base_url( 'rutas/ver/' . $objruta->getIdruta() ); ?>">
									<?= $objruta->getNombre(); ?>
								</a>
							<?php else: ?>
								<?= $objruta->getNombre(); ?>
							<?php endif; ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
</div>