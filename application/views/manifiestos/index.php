<!-- Vista manifiestos/index -->
<?= $menumain; ?>
<div class="container">
	<div class="btn-toolbar float-right" role="toolbar">
		<div class="btn-group" role="group">
			<?php if($this->modsesion->hasPermisoHijo(30)): ?>
			<button type="button" class="btn btn-outline-secondary" title="Generacion de Manifiestos" onclick="Manifiesto.MostrarMenuCreacion()">
				<i class="far fa-file-alt"></i>
			</button>
			<?php endif;
			if($this->modsesion->hasPermisoHijo(42)): ?>
			<button type="button" class="btn btn-outline-secondary" title="Capturar Manifiestos" onclick="location.href='<?= base_url("manifiestos/capturar")?>'">
				<i class="fas fa-pencil-alt"></i>
			</button>
			<?php endif; 
			if($this->modsesion->hasPermisoHijo(116)): ?>
			<div class="btn-group" role="group">
				<button type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown" title="Importar manifiestos">
					Importar
					<span class="caret"></span>
				</button>
				<ul	class="dropdown-menu">
					<?php if($this->modsesion->hasPermisoHijo(117)): ?>
					<li title="Importar Manifiestos desde Excel"><a href="<?= base_url("manifiestos/importar/excel/$idempresa/$idsucursal")?>">Excel</a></li>
					<?php endif;
					if($this->modsesion->hasPermisoHijo(118)): ?>
					<li title="Importar Manifiestos desde formiik"><a href="<?= base_url("manifiestos/importar/formiik/$idempresa/$idsucursal")?>">Formiik</a></li>
					<?php endif;
					if($this->modsesion->hasPermisoHijo(119)): ?>
					<li title="Importar Manifiestos desde Excel. SIMMA Guadalajara"><a href="<?= base_url("manifiestos/importar/simmagdl/$idempresa/$idsucursal")?>">SIMMA Guadalajara</a></li>
					<?php endif;
					if($this->modsesion->hasPermisoHijo(120)): ?>
					<li title="Importar Manifiestos desde Excel. SIMMA Polanco"><a href="<?= base_url("manifiestos/importar/simmadf/$idempresa/$idsucursal")?>">SIMMA Polanco</a></li>
					<?php endif; ?>
				</ul>
			</div>
			<?php endif; 
			if($this->modsesion->hasPermisoHijo(101)): ?>
			<button type="button" class="btn btn-outline-secondary" title="Generar Reportes" onclick="Manifiesto.FrmReporte()">
				<i class="fas fa-book"></i>
			</button>
			<?php endif; ?>
		</div>
	</div>
	<h3>Manifiestos</h3>
	<form autocomplete="off" method="post" id="frm_prefer" action="<?= base_url("manifiestos/index/$idempresa/$idsucursal")?>">
		<div class="form-row"><div class="form-group">
			<label for="frm_prefer_empresa">Empresa</label>
			<div class="col-sm-10">
				<select class="form-control" id="frm_prefer_empresa" name="frm_prefer_empresa" onchange="location.href=baseURL+'manifiestos/index/'+$('#frm_prefer_empresa').val();">
					<?php foreach($empresas as $empresa): ?>
						<option value="<?= $empresa["idempresa"]; ?>" <?= ($empresa["idempresa"]==$idempresa?'selected="selected"':''); ?>><?= $empresa["razonsocial"]; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<div class="form-row"><div class="form-group">
			<label for="frm_prefer_sucursal">Sucursal</label>
			<div class="col-sm-10">
				<select class="form-control" id="frm_prefer_sucursal" name="frm_prefer_sucursal" onchange="location.href=baseURL+'manifiestos/index/'+$('#frm_prefer_empresa').val()+'/'+$('#frm_prefer_sucursal').val();">
					<?php foreach($sucursales as $sucursal): ?>
						<option value="<?= $sucursal["idsucursal"]; ?>" <?= ($sucursal["idsucursal"]==$idsucursal?'selected="selected"':''); ?>><?= $sucursal["nombre"]; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<h5>Búscar Manifiesto:</h5>
		<div class="form-row"><div class="form-group">
			<label for="frm_prefer_identificador">No. de Manifiesto</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="frm_prefer_identificador" name="frm_prefer_identificador" value="<?= $filtros["identificador"]; ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group">
			<label for="frm_prefer_numruta">No. de Ruta</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="frm_prefer_numruta" name="frm_prefer_numruta" value="<?= $filtros["numruta"]; ?>" />
			</div>
			<label for="frm_prefer_nombreruta">Ruta</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="frm_prefer_nombreruta" name="frm_prefer_nombreruta" value="<?= $filtros["nombreruta"]; ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group">
			<label for="frm_prefer_fecha_inicio">Fecha</label>
			<div class="col-sm-5">
				<input type="date" class="form-control" id="frm_prefer_fecha_inicio" name="frm_prefer_fecha_inicio" value="<?= $filtros["fecha_inicio"]; ?>" />
			</div>
			<div class="col-sm-5">
				<input type="date" class="form-control" id="frm_prefer_fecha_fin" name="frm_prefer_fecha_fin" value="<?= $filtros["fecha_fin"]; ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group">
			<label for="frm_prefer_identificadorcliente">No. Cliente</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="frm_prefer_identificadorcliente" name="frm_prefer_identificadorcliente" value="<?= $filtros["identificadorcliente"]; ?>" />
			</div>
			<label for="frm_prefer_identificadorgenerador">No. Generador</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="frm_prefer_identificadorgenerador" name="frm_prefer_identificadorgenerador" value="<?= $filtros["identificadorgenerador"]; ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group">
			<label for="frm_prefer_razonsocial">Razón Social</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="frm_prefer_razonsocial" name="frm_prefer_razonsocial" value="<?= $filtros["razonsocial"]; ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group">
			<label for="frm_prefer_rfc">RFC</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="frm_prefer_rfc" name="frm_prefer_rfc" value="<?= $filtros["rfc"]; ?>" />
			</div>
			<label for="frm_prefer_nra">No. Registro Ambiental</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="frm_prefer_nra" name="frm_prefer_nra" value="<?= $filtros["nra"]; ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group">
			<label for="frm_prefer_destinofinal">Destino Final</label>
			<div class="col-sm-4">
				<select class="form-control" id="frm_prefer_destinofinal" name="frm_prefer_destinofinal">
					<option value=""></option>
					<?php if($destinosfinales!==false) foreach($destinosfinales as $emp): ?>
						<optgroup label="<?= $emp["nombre"]; ?>">
							<?php foreach($emp["sucursales"] as $suc): ?>
								<option value="<?= $suc["idsucursal"]; ?>" <?= ($suc["idsucursal"]==$filtros["destinofinal"]?'selected="selected"':''); ?>>
									<?= $suc["nombre"]; ?>
								</option>
							<?php endforeach; ?>
						</optgroup>
					<?php endforeach; ?>
				</select>
			</div>
			<label for="frm_prefer_transportista">Transportista</label>
			<div class="col-sm-4">
				<select class="form-control" id="frm_prefer_transportista" name="frm_prefer_transportista">
					<option value=""></option>
					<?php if($transportistas!==false) foreach($transportistas as $emp): ?>
						<optgroup label="<?= $emp["nombre"]; ?>">
							<?php foreach($emp["sucursales"] as $suc): ?>
								<option value="<?= $suc["idsucursal"]; ?>" <?= ($suc["idsucursal"]==$filtros["transportista"]?'selected="selected"':''); ?>>
									<?= $suc["nombre"]; ?>
								</option>
							<?php endforeach; ?>
						</optgroup>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<div class="form-row"><div class="form-group">
			<label for="frm_prefer_fechaembarque_inicio">Fecha de Embarque</label>
			<div class="col-sm-5">
				<input type="date" class="form-control" id="frm_prefer_fechaembarque_inicio" name="frm_prefer_fechaembarque_inicio" value="<?= $filtros["fechaembarque_inicio"]; ?>" />
			</div>
			<div class="col-sm-5">
				<input type="date" class="form-control" id="frm_prefer_fechaembarque_fin" name="frm_prefer_fechaembarque_fin" value="<?= $filtros["fechaembarque_fin"]; ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group">
			<label for="frm_prefer_fecharecepcion_inicio">Fecha de Recepción</label>
			<div class="col-sm-5">
				<input type="date" class="form-control" id="frm_prefer_fecharecepcion_inicio" name="frm_prefer_fecharecepcion_inicio" value="<?= $filtros["fecharecepcion_inicio"]; ?>" />
			</div>
			<div class="col-sm-5">
				<input type="date" class="form-control" id="frm_prefer_fecharecepcion_fin" name="frm_prefer_fecharecepcion_fin" value="<?= $filtros["fecharecepcion_fin"]; ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group">
			<div class="col-sm-10"></div>
			<div class="col-sm-2">
				<input type="hidden" name="action" id="action" value="" />
                <button type="button" class="btn btn-outline-primary" onclick="Manifiesto.Buscar()">Buscar</button>
            </div>
		</div>
	</form>
	<div class="table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>No. Manifiesto</th>
					<th>Fecha</th>
					<th>No. Cliente</th>
					<th>No. Generador</th>
					<th>Generador</th>
					<th>No. Ruta</th>
					<th>Ruta</th>
					<th>Transportista</th>
					<th>Destino Final</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>No. Manifiesto</th>
					<th>Fecha</th>
					<th>No. Cliente</th>
					<th>No. Generador</th>
					<th>Generador</th>
					<th>No. Ruta</th>
					<th>Ruta</th>
					<th>Transportista</th>
					<th>Destino Final</th>
				</tr>
			</tfoot>
			<tbody>
				<?php if($manifiestos!==false) foreach($manifiestos as $manifiesto): ?>
					<tr>
						<td data-order="<?= Refill($manifiesto["identificador"],10,"0"); ?>">
							<?php if($this->modsesion->hasPermisoHijo(32)): ?>
							<a href="<?= base_url("manifiestos/ver/".$manifiesto["idmanifiesto"]); ?>">
							<?php endif; ?>
								<?= $manifiesto["identificador"]; ?>
							<?php if($this->modsesion->hasPermisoHijo(32)): ?>
							</a>
							<?php endif; ?>
						</td>
						<td><?= DateToMx($manifiesto["fecha"]); ?></td>
						<td><?= $manifiesto["nocliente"]; ?></td>
						<td><?= $manifiesto["nogenerador"]; ?></td>
						<td><?= $manifiesto["generador"]; ?></td>
						<td><?= $manifiesto["noruta"]; ?></td>
						<td><?= $manifiesto["ruta"]; ?></td>
						<td><?= $manifiesto["destinofinal"]; ?></td>
						<td><?= $manifiesto["transportista"]; ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
<!-- Vista manifiestos/index End -->