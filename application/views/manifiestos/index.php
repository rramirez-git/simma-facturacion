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
				<button id="btnSubmenuManifiestos" type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown" title="Importar manifiestos">
					Importar
					<span class="caret"></span>
				</button>
				<div class="dropdown-menu" aria-labelledby="btnSubmenuManifiestos">
					<?php if($this->modsesion->hasPermisoHijo(117)): ?>
						<a class="dropdown-item" href="<?= base_url("manifiestos/importar/excel/$idempresa/$idsucursal")?>" title="Importar Manifiestos desde Excel">Excel</a>
					<?php endif;
					if($this->modsesion->hasPermisoHijo(118)): ?>
						<a class="dropdown-item" href="<?= base_url("manifiestos/importar/formiik/$idempresa/$idsucursal")?>" title="Importar Manifiestos desde Formiik">Formiik</a>
					<?php endif;
					if($this->modsesion->hasPermisoHijo(119)): ?>
						<a class="dropdown-item" href="<?= base_url("manifiestos/importar/simmagdl/$idempresa/$idsucursal")?>" title="Importar Manifiestos desde Excel. SIMMA Guadalajara">SIMMA Guadalajara</a>
					<?php endif;
					if($this->modsesion->hasPermisoHijo(120)): ?>
						<a class="dropdown-item" href="<?= base_url("manifiestos/importar/simmadf/$idempresa/$idsucursal")?>" title="Importar Manifiestos desde Excel. SIMMA Polanco">SIMMA Polanco</a>
					<?php endif; ?>
				</div>
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
		<div class="form-row"><div class="form-group col">
			<label for="frm_prefer_empresa">Empresa</label>
				<select class="form-control" id="frm_prefer_empresa" name="frm_prefer_empresa" onchange="location.href=baseURL+'manifiestos/index/'+$('#frm_prefer_empresa').val();">
					<?php foreach($empresas as $empresa): ?>
						<option value="<?= $empresa["idempresa"]; ?>" <?= ($empresa["idempresa"]==$idempresa?'selected="selected"':''); ?>><?= $empresa["razonsocial"]; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group col">
			<label for="frm_prefer_sucursal">Sucursal</label>
				<select class="form-control" id="frm_prefer_sucursal" name="frm_prefer_sucursal" onchange="location.href=baseURL+'manifiestos/index/'+$('#frm_prefer_empresa').val()+'/'+$('#frm_prefer_sucursal').val();">
					<?php foreach($sucursales as $sucursal): ?>
						<option value="<?= $sucursal["idsucursal"]; ?>" <?= ($sucursal["idsucursal"]==$idsucursal?'selected="selected"':''); ?>><?= $sucursal["nombre"]; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<h5>Búscar Manifiesto:</h5>
		<div class="form-row"><div class="form-group col">
			<label for="frm_prefer_identificador_bitacora">No. de Bitácora</label>
				<input type="text" class="form-control" id="frm_prefer_identificador_bitacora" name="frm_prefer_identificador_bitacora" value="<?= $filtros["identificador_bitacora"]; ?>" />
			</div><div class="form-group col">
			<label for="frm_prefer_identificador">No. de Manifiesto</label>
				<input type="text" class="form-control" id="frm_prefer_identificador" name="frm_prefer_identificador" value="<?= $filtros["identificador"]; ?>" />
			</div>
			<div class="form-group col">
			<label for="frm_prefer_numruta">No. de Ruta</label>
				<input type="text" class="form-control" id="frm_prefer_numruta" name="frm_prefer_numruta" value="<?= $filtros["numruta"]; ?>" />
			</div>
			<div class="form-group col">
			<label for="frm_prefer_nombreruta">Ruta</label>
				<input type="text" class="form-control" id="frm_prefer_nombreruta" name="frm_prefer_nombreruta" value="<?= $filtros["nombreruta"]; ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group col">
			<label for="frm_prefer_fecha_inicio">Fecha Inicial</label>
				<input type="date" class="form-control" id="frm_prefer_fecha_inicio" name="frm_prefer_fecha_inicio" value="<?= $filtros["fecha_inicio"]; ?>" />
			</div>
			<div class="form-group col">
			<label for="frm_prefer_fecha_fin">Fecha Final</label>
				<input type="date" class="form-control" id="frm_prefer_fecha_fin" name="frm_prefer_fecha_fin" value="<?= $filtros["fecha_fin"]; ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group col">
			<label for="frm_prefer_identificadorcliente">No. Cliente</label>
				<input type="text" class="form-control" id="frm_prefer_identificadorcliente" name="frm_prefer_identificadorcliente" value="<?= $filtros["identificadorcliente"]; ?>" />
			</div>
			<div class="form-group col">
			<label for="frm_prefer_identificadorgenerador">No. Generador</label>
				<input type="text" class="form-control" id="frm_prefer_identificadorgenerador" name="frm_prefer_identificadorgenerador" value="<?= $filtros["identificadorgenerador"]; ?>" />
			</div>
			<div class="form-group col">
			<label for="frm_prefer_razonsocial">Razón Social</label>
				<input type="text" class="form-control" id="frm_prefer_razonsocial" name="frm_prefer_razonsocial" value="<?= $filtros["razonsocial"]; ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group col">
			<label for="frm_prefer_rfc">RFC</label>
				<input type="text" class="form-control" id="frm_prefer_rfc" name="frm_prefer_rfc" value="<?= $filtros["rfc"]; ?>" />
			</div>
			<div class="form-group col">
			<label for="frm_prefer_nra">No. Registro Ambiental</label>
				<input type="text" class="form-control" id="frm_prefer_nra" name="frm_prefer_nra" value="<?= $filtros["nra"]; ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group col">
			<label for="frm_prefer_destinofinal">Destino Final</label>
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
			<div class="form-group col">
			<label for="frm_prefer_transportista">Transportista</label>
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
		<div class="form-row"><div class="form-group col">
			<label for="frm_prefer_fechaembarque_inicio">Fecha Inicial de Embarque</label>
				<input type="date" class="form-control" id="frm_prefer_fechaembarque_inicio" name="frm_prefer_fechaembarque_inicio" value="<?= $filtros["fechaembarque_inicio"]; ?>" />
			</div>
			<div class="form-group col">
			<label for="frm_prefer_fechaembarque_fin">Fecha Final de Embarque</label>
				<input type="date" class="form-control" id="frm_prefer_fechaembarque_fin" name="frm_prefer_fechaembarque_fin" value="<?= $filtros["fechaembarque_fin"]; ?>" />
			</div>
			<div class="form-group col">
			<label for="frm_prefer_fecharecepcion_inicio">Fecha Inicial de Recepción</label>
				<input type="date" class="form-control" id="frm_prefer_fecharecepcion_inicio" name="frm_prefer_fecharecepcion_inicio" value="<?= $filtros["fecharecepcion_inicio"]; ?>" />
			</div>
			<div class="form-group col">
			<label for="frm_prefer_fecharecepcion_fin">Fecha Final de Recepción</label>
				<input type="date" class="form-control" id="frm_prefer_fecharecepcion_fin" name="frm_prefer_fecharecepcion_fin" value="<?= $filtros["fecharecepcion_fin"]; ?>" />
			</div>
		</div>
		<input type="hidden" name="action" id="action" value="" />
		<button type="button" class="btn btn-outline-primary" onclick="Manifiesto.Buscar()">Buscar</button>
	</form>
		<table class="table table-hover table-sm table-responsive">
			<thead>
				<tr>
					<th class="sortable" onclick="TableSortByColumn( 'data-table', 1, 'asc' )">No. Manifiesto</th>
					<th>Fecha</th>
					<th class="sortable" onclick="TableSortByColumn( 'data-table', 3, 'asc' )">No. Cliente</th>
					<th class="sortable" onclick="TableSortByColumn( 'data-table', 4, 'asc' )">No. Generador</th>
					<th class="sortable" onclick="TableSortByColumn( 'data-table', 5, 'asc' )">Generador</th>
					<th class="sortable" onclick="TableSortByColumn( 'data-table', 6, 'asc' )">No. Ruta</th>
					<th class="sortable" onclick="TableSortByColumn( 'data-table', 7, 'asc' )">Ruta</th>
					<th class="sortable" onclick="TableSortByColumn( 'data-table', 8, 'asc' )">Transportista</th>
					<th class="sortable" onclick="TableSortByColumn( 'data-table', 9, 'asc' )">Destino Final</th>
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
			<tbody id="data-table">
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
						<td>
							<?php if($this->modsesion->hasPermisoHijo( 55 ) ): ?>
								<a href="<?= base_url( "clientes/ver/" . $manifiesto[ "idcliente" ] ); ?>">
									<?= $manifiesto["nocliente"]; ?>
								</a>
							<?php else: ?>
								<?= $manifiesto["nocliente"]; ?>
							<?php endif; ?>
						</td>
						<td>
							<?php if($this->modsesion->hasPermisoHijo( 66 ) ): ?>
								<a href="<?= base_url( "generadores/ver/" . $manifiesto[ "idgenerador" ] ); ?>">
									<?= $manifiesto["nogenerador"]; ?>
								</a>
							<?php else: ?>
								<?= $manifiesto["nogenerador"]; ?>
							<?php endif; ?>
						</td>
						<td>
							<?php if($this->modsesion->hasPermisoHijo( 66 ) ): ?>
								<a href="<?= base_url( "generadores/ver/" . $manifiesto[ "idgenerador" ] ); ?>">
									<?= $manifiesto["generador"]; ?>
								</a>
							<?php else: ?>
								<?= $manifiesto["generador"]; ?>
							<?php endif; ?>
						</td>
						<td>
							<?php if($this->modsesion->hasPermisoHijo( 65 ) ): ?>
								<a href="<?= base_url( "rutas/ver/" . $manifiesto[ "idruta" ] ); ?>">
									<?= $manifiesto["noruta"]; ?>
								</a>
							<?php else: ?>
								<?= $manifiesto["noruta"]; ?>
							<?php endif; ?>
						</td>
						<td>
							<?php if($this->modsesion->hasPermisoHijo( 65 ) ): ?>
								<a href="<?= base_url( "rutas/ver/" . $manifiesto[ "idruta" ] ); ?>">
									<?= $manifiesto["ruta"]; ?>
								</a>
							<?php else: ?>
								<?= $manifiesto["ruta"]; ?>
							<?php endif; ?>
						</td>
						<td>
							<?php if($this->modsesion->hasPermisoHijo( 25 ) ): ?>
								<a href="<?= base_url( "sucursales/ver/" . $manifiesto[ "iddestinofinal" ] ); ?>">
									<?= $manifiesto["destinofinal"]; ?>
								</a>
							<?php else: ?>
								<?= $manifiesto["destinofinal"]; ?>
							<?php endif; ?>
						</td>
						<td>
							<?php if($this->modsesion->hasPermisoHijo( 25 ) ): ?>
								<a href="<?= base_url( "sucursales/ver/" . $manifiesto[ "idtransportista" ] ); ?>">
									<?= $manifiesto["transportista"]; ?>
								</a>
							<?php else: ?>
								<?= $manifiesto["transportista"]; ?>
							<?php endif; ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
</div>
<!-- Vista manifiestos/index End -->