<?= $menumain; ?>
<div class="container">
	<div class="btn-toolbar float-right" role="toolbar">
		<div class="btn-group" role="group">
		</div>
	</div>
	<h3>Bitácoras</h3>
	<form autocomplete="off" method="post" id="frm_prefer">
		<div class="form-row"><div class="form-group col-sm-12">
			<label for="frm_prefer_empresa">Empresa</label>
				<select class="form-control" id="frm_prefer_empresa" name="frm_prefer_empresa" onchange="location.href=baseURL+'bitacoras/index/'+$('#frm_prefer_empresa').val();">
					<?php foreach($empresas as $empresa): ?>
						<option value="<?= $empresa["idempresa"]; ?>" <?= ($empresa["idempresa"]==$idempresa?'selected="selected"':''); ?>><?= $empresa["razonsocial"]; ?></option>
					<?php endforeach; ?>
				</select>
		</div></div>
		<div class="form-row"><div class="form-group col-sm-12">
			<label for="frm_prefer_empresa">Sucursal</label>
				<select class="form-control" id="frm_prefer_sucursal" name="frm_prefer_sucursal" onchange="location.href=baseURL+'bitacoras/index/'+$('#frm_prefer_empresa').val()+'/'+$('#frm_prefer_sucursal').val();">
					<?php foreach($sucursales as $sucursal): ?>
						<option value="<?= $sucursal["idsucursal"]; ?>" <?= ($sucursal["idsucursal"]==$idsucursal?'selected="selected"':''); ?>><?= $sucursal["nombre"]; ?></option>
					<?php endforeach; ?>
				</select>
		</div></div>
	</form>
	<div class="table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>Folio</th>
					<th>Nombre</th>
					<th>Fecha</th>
					<th>Ruta</th>
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
			<tbody>
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
							<?= $bitacora["nombre"]; ?>
						</td>
						<td><?= DateToMx($bitacora["fecha"]); ?></td>
						<td>
							<?php
								$objbitacora->setIdbitacora($bitacora["idbitacora"]);
								$objbitacora->getFromDatabase();
								$objruta->setIdruta($objbitacora->getIdruta());
								$objruta->getFromDatabase();
								echo "{$objruta->getIdentificador()} - {$objruta->getNombre()}";
							?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>