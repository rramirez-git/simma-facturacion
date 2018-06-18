<!-- Vista operadores/index -->
<?= $menumain; ?>
<div class="container">
	<div class="btn-toolbar float-right" role="toolbar">
		<div class="btn-group" role="group">
			<?php if($this->modsesion->hasPermisoHijo(58)): ?>
			<button type="button" class="btn btn-outline-secondary" title="Nuevo Operador" onclick="location.href='<?= base_url('operadores/nuevo/'.$idempresa.'/'.$idsucursal);?>';">
				<i class="far fa-file-alt"></i>
			</button>
			<?php endif; ?>
		</div>
	</div>
	<h3>Operadores</h3>
	<form autocomplete="off" method="post" id="frm_prefer">
		<div class="form-row"><div class="form-group col">
			<label for="frm_prefer_empresa">Empresa</label>
				<select class="form-control" id="frm_prefer_empresa" name="frm_prefer_empresa" onchange="location.href=baseURL+'operadores/index/'+$('#frm_prefer_empresa').val();">
					<?php foreach($empresas as $empresa): ?>
						<option value="<?= $empresa["idempresa"]; ?>" <?= ($empresa["idempresa"]==$idempresa?'selected="selected"':''); ?>><?= $empresa["razonsocial"]; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group col">
			<label for="frm_prefer_empresa">Sucursal</label>
				<select class="form-control" id="frm_prefer_sucursal" name="frm_prefer_sucursal" onchange="location.href=baseURL+'operadores/index/'+$('#frm_prefer_empresa').val()+'/'+$('#frm_prefer_sucursal').val();">
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
					<th class="sortable" onclick="TableSortByColumn( 'data-table', 1, 'asc' )">Nombre</th>
					<th class="sortable" onclick="TableSortByColumn( 'data-table', 2, 'asc' )">Cargo</th>
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
			<tbody id="data-table">
				<?php if($operadores!==false) foreach($operadores as $operador): ?>
					<tr>
						<td>
							<?php if($this->modsesion->hasPermisoHijo(59)): ?>
							<a href="<?= base_url('operadores/ver/'.$operador["idoperador"]); ?>">
							<?php endif; ?>
								<?= $operador["nombre"]; ?>
								<?= $operador["apaterno"]; ?>
								<?= $operador["amaterno"]; ?>
							<?php if($this->modsesion->hasPermisoHijo(59)): ?>
							</a>
							<?php endif; ?>
						</td>
						<td><?= $operador["cargo"]?></td>
						<td><?= $operador["telefono"]?></td>
						<td><?= $operador["email"]?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
</div>
<!-- Vista operadores/index End -->