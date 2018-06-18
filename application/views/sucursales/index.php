<!-- Vista sucursales/index -->
<?= $menumain; ?>
<div class="container">
	<div class="btn-toolbar float-right" role="toolbar">
		<div class="btn-group" role="group">
			<?php if($this->modsesion->hasPermisoHijo(24)): ?>
			<button type="button" class="btn btn-outline-secondary" title="Nueva Sucursal" onclick="location.href='<?= base_url('sucursales/nuevo/'.$idempresa);?>';">
				<i class="far fa-file-alt"></i>
			</button>
			<?php endif; ?>
		</div>
	</div>
	<h3>Sucursales</h3>
	<form autocomplete="off" method="post" id="frm_prefer">
		<div class="form-row"><div class="form-group col">
			<label for="frm_prefer_empresa">Empresa</label>
				<select class="form-control" id="frm_prefer_empresa" name="frm_prefer_empresa" onchange="location.href=baseURL+'sucursales/index/'+$('#frm_prefer_empresa').val();">
					<?php foreach($empresas as $empresa): ?>
						<option value="<?= $empresa["idempresa"]; ?>" <?= ($empresa["idempresa"]==$idempresa?'selected="selected"':''); ?>><?= $empresa["razonsocial"]; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
	</form>
		<table class="table table-hover table-sm table-responsive-sm">
			<thead>
				<tr>
					<th class="sortable" onclick="TableSortByColumn( 'data-table', 1, 'asc' )">Sucursal</th>
					<th class="sortable" onclick="TableSortByColumn( 'data-table', 2, 'asc' )">Representante</th>
					<th>Ubicación</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>Sucursal</th>
					<th>Representante</th>
					<th>Ubicación</th>
				</tr>
			</tfoot>
			<tbody id="data-table">
				<?php if($sucursales!==false) foreach($sucursales as $sucursal): ?>
				<tr>
					<td>
						<?php if($this->modsesion->hasPermisoHijo(25)): ?>
						<a href="<?= base_url('sucursales/ver/'.$sucursal["idsucursal"]); ?>">
						<?php endif; ?>
							<?= $sucursal["nombre"]; ?>
						<?php if($this->modsesion->hasPermisoHijo(25)): ?>
						</a>
						<?php endif; ?>
					</td>
					<td><?= $sucursal["representante"]; ?></td>
					<td>
						<?= $sucursal["municipio"]; ?>,
						<?= $sucursal["estado"]; ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
</div>
<!-- Vista sucursales/index End -->