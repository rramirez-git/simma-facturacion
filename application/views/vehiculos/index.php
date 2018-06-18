<!-- Vista vehiculos/index -->
<?= $menumain; ?>
<div class="container">
	<div class="btn-toolbar float-right" role="toolbar">
		<div class="btn-group" role="group">
			<?php if($this->modsesion->hasPermisoHijo(20)): ?>
			<button type="button" class="btn btn-outline-secondary" title="Nuevo Vehiculo" onclick="location.href='<?= base_url('vehiculos/nuevo/'.$idempresa.'/'.$idsucursal);?>';">
				<i class="far fa-file-alt"></i>
			</button>
			<?php endif; ?>
		</div>
	</div>
	<h3>Vehiculos</h3>
	<form autocomplete="off" method="post" id="frm_prefer">
		<div class="form-row"><div class="form-group col">
			<label for="frm_prefer_empresa">Empresa</label>
				<select class="form-control" id="frm_prefer_empresa" name="frm_prefer_empresa" onchange="location.href=baseURL+'vehiculos/index/'+$('#frm_prefer_empresa').val();">
					<?php foreach($empresas as $empresa): ?>
						<option value="<?= $empresa["idempresa"]; ?>" <?= ($empresa["idempresa"]==$idempresa?'selected="selected"':''); ?>><?= $empresa["razonsocial"]; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group col">
			<label for="frm_prefer_empresa">Sucursal</label>
				<select class="form-control" id="frm_prefer_sucursal" name="frm_prefer_sucursal" onchange="location.href=baseURL+'vehiculos/index/'+$('#frm_prefer_empresa').val()+'/'+$('#frm_prefer_sucursal').val();">
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
					<th class="sortable" onclick="TableSortByColumn( 'data-table', 1, 'asc' )">Placa</th>
					<th class="sortable" onclick="TableSortByColumn( 'data-table', 2, 'asc' )">Número de Autorizacion SCT</th>
					<th class="sortable" onclick="TableSortByColumn( 'data-table', 3, 'asc' )">Número de Autorizacion SEMARNAT</th>
					<th class="sortable" onclick="TableSortByColumn( 'data-table', 4, 'asc' )">Tipo de Vehículo</th>
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
			<tbody id="data-table">
				<?php if($vehiculos!==false) foreach($vehiculos as $vehiculo): ?>
					<tr>
						<td>
							<?php if($this->modsesion->hasPermisoHijo(21)): ?>
							<a href="<?= base_url('vehiculos/ver/'.$vehiculo["idvehiculo"]); ?>">
							<?php endif; ?>
								<?= $vehiculo["placa"]; ?>
							<?php if($this->modsesion->hasPermisoHijo(21)): ?>
							</a>
							<?php endif; ?>
						</td>
						<td><?= $vehiculo["numautsct"]?></td>
						<td><?= $vehiculo["autsemarnat"]?></td>
						<td><?= $vehiculo["tipo"]?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
</div>
<!-- Vista vehiculos/index End -->