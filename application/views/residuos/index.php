<?= $menumain; ?>
<div class="container">
	<div class="btn-toolbar float-right" role="toolbar">
		<div class="btn-group" role="group">
			<?php if($this->modsesion->hasPermisoHijo(62)): ?>
			<button type="button" class="btn btn-outline-secondary" title="Nuevo Residuo" onclick="location.href='<?= base_url('residuos/nuevo/'.$idempresa.'/'.$idsucursal);?>';">
				<i class="far fa-file-alt"></i>
			</button>
			<?php endif; ?>
		</div>
	</div>
	<h3>Residuos</h3>
	<form autocomplete="off" method="post" id="frm_prefer">
		<div class="form-row"><div class="form-group col">
			<label for="frm_prefer_empresa">Empresa</label>
				<select class="form-control" id="frm_prefer_empresa" name="frm_prefer_empresa" onchange="location.href=baseURL+'residuos/index/'+$('#frm_prefer_empresa').val();">
					<?php foreach($empresas as $empresa): ?>
						<option value="<?= $empresa["idempresa"]; ?>" <?= ($empresa["idempresa"]==$idempresa?'selected="selected"':''); ?>><?= $empresa["razonsocial"]; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group col">
			<label for="frm_prefer_empresa">Sucursal</label>
				<select class="form-control" id="frm_prefer_sucursal" name="frm_prefer_sucursal" onchange="location.href=baseURL+'residuos/index/'+$('#frm_prefer_empresa').val()+'/'+$('#frm_prefer_sucursal').val();">
					<?php foreach($sucursales as $sucursal): ?>
						<option value="<?= $sucursal["idsucursal"]; ?>" <?= ($sucursal["idsucursal"]==$idsucursal?'selected="selected"':''); ?>><?= $sucursal["nombre"]; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
	</form>
		<table class="table table-hover table-sm table-responsive">
			<thead>
				<tr>
					<th class="sortable" onclick="TableSortByColumn( 'data-table', 1, 'asc' )">Nombre</th>
					<th class="sortable" onclick="TableSortByColumn( 'data-table', 2, 'asc' )">Nom-052</th>
					<th class="sortable" onclick="TableSortByColumn( 'data-table', 3, 'asc' )">Tipo</th>
					<th>C</th>
					<th>R</th>
					<th>E</th>
					<th>T</th>
					<th>I</th>
					<th>B</th>
					<th>Mostrar en Captura</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>Nombre</th>
					<th>Nom-052</th>
					<th>Tipo</th>
					<th>C</th>
					<th>R</th>
					<th>E</th>
					<th>T</th>
					<th>I</th>
					<th>B</th>
					<th>Mostrar en Captura</th>
				</tr>
			</tfoot>
			<tbody id="data-table">
				<?php if($residuos!==false) foreach($residuos as $residuo): ?>
					<tr>
						<td>
							<?php if($this->modsesion->hasPermisoHijo(63)): ?>
							<a href="<?= base_url('residuos/ver/'.$residuo["idresiduo"]); ?>">
							<?php endif; ?>
								<?= $residuo["nombre"]; ?>
							<?php if($this->modsesion->hasPermisoHijo(63)): ?>
							</a>
							<?php endif; ?>
						</td>
						<td><?= $residuo["nom052"]?></td>
						<td>
							<?php 
								if($tiporesiduo["opciones"]!==false) 
									foreach($tiporesiduo["opciones"] as $opc)
										if($opc["idcatalogodet"]==$residuo["tiporesiduo"])
											echo $opc["descripcion"];
							?>
						</td>
						<td><input type="checkbox" <?= ($residuo["C"]==1?'checked="checked"':''); ?> disabled="disabled" /></td>
						<td><input type="checkbox" <?= ($residuo["R"]==1?'checked="checked"':''); ?> disabled="disabled" /></td>
						<td><input type="checkbox" <?= ($residuo["E"]==1?'checked="checked"':''); ?> disabled="disabled" /></td>
						<td><input type="checkbox" <?= ($residuo["T"]==1?'checked="checked"':''); ?> disabled="disabled" /></td>
						<td><input type="checkbox" <?= ($residuo["I"]==1?'checked="checked"':''); ?> disabled="disabled" /></td>
						<td><input type="checkbox" <?= ($residuo["B"]==1?'checked="checked"':''); ?> disabled="disabled" /></td>
						<td><input type="checkbox" <?= ($residuo[ "mostrar_default" ]==1?'checked="checked"':''); ?> disabled="disabled" /></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
</div>