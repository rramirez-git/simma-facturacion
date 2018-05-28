<!-- Vista cliente/index -->
<?= $menumain; ?>
<div class="container">
	<div class="btn-toolbar float-right" role="toolbar">
		<div class="btn-group" role="group">
			<?php if($this->modsesion->hasPermisoHijo(54)): ?>
			<button type="button" class="btn btn-outline-secondary" title="Importar Clientes" onclick="location.href='<?= base_url("clientes/importar/$idempresa/$idsucursal"); ?>'">
				<i class="fas fa-upload"></i>
			</button>
			<button type="button" class="btn btn-outline-secondary" title="Nuevo Cliente" onclick="location.href='<?= base_url('clientes/nuevo/'.$idempresa.'/'.$idsucursal);?>';">
				<i class="far fa-file-alt"></i>
			</button>
			<?php endif; 
			if($this->modsesion->hasPermisoHijo(108)): ?>
			<button type="button" class="btn btn-outline-secondary" title="Ver Calendarios" onclick="window.open('<?= base_url("clientes/calendarios")?>','calendarios');">
				<i class="far fa-calendar-alt"></i>
			</button>
			<?php endif; 
			if($this->modsesion->hasPermisoHijo(100)): ?>
			<button type="button" class="btn btn-outline-secondary" title="Generar Reportes" onclick="Cliente.FrmReporte()">
				<i class="fas fa-book"></i>
			</button>
			<?php endif; ?>
		</div>
	</div>
	<h3>Clientes</h3>
	<form autocomplete="off" method="post" id="frm_prefer" action="<?= base_url("clientes/index/$idempresa/$idsucursal"); ?>">
		<div class="form-row"><div class="form-group col">
			<label for="frm_prefer_empresa">Empresa</label>
				<select class="form-control" id="frm_prefer_empresa" name="frm_prefer_empresa" onchange="location.href=baseURL+'clientes/index/'+$('#frm_prefer_empresa').val();">
					<option value="0"></option>
					<?php foreach($empresas as $empresa): ?>
						<option value="<?= $empresa["idempresa"]; ?>" <?= ($empresa["idempresa"]==$idempresa?'selected="selected"':''); ?>><?= $empresa["razonsocial"]; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group col">
			<label for="frm_prefer_empresa">Sucursal</label>
				<select class="form-control" id="frm_prefer_sucursal" name="frm_prefer_sucursal" onchange="location.href=baseURL+'clientes/index/'+$('#frm_prefer_empresa').val()+'/'+$('#frm_prefer_sucursal').val();">
					<?php if($idsucursal==0): ?>
						<option value="0"></option>
					<?php endif; ?>
					<?php foreach($sucursales as $sucursal): ?>
						<option value="<?= $sucursal["idsucursal"]; ?>" <?= ($sucursal["idsucursal"]==$idsucursal?'selected="selected"':''); ?>><?= $sucursal["nombre"]; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<h5>Búscar Cliente:</h5>
		<div class="form-row"><div class="form-group col">
			<label for="frm_prefer_identificador">Número de Cliente</label>
				<input type="text" class="form-control" id="frm_prefer_identificador" name="frm_prefer_identificador" value="<?= $filtros["identificador"]; ?>" />
			</div>
			<div class="form-group col">
			<label for="frm_prefer_rfc">RFC</label>
				<input type="text" class="form-control" id="frm_prefer_rfc" name="frm_prefer_rfc" value="<?= $filtros["rfc"]; ?>" />
			</div>
			<div class="form-group col">
			<label for="frm_prefer_razonsocial">Razon Social</label>
				<input type="text" class="form-control" id="frm_prefer_razonsocial" name="frm_prefer_razonsocial" value="<?= $filtros["razonsocial"]; ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group col">
			<label for="frm_prefer_vendedor">Vendedor</label>
				<select id="frm_prefer_vendedor" name="frm_prefer_vendedor" class="form-control">
					<option value=""></option>
					<?php if($vendedor!==false) foreach($vendedor["opciones"] as $opc): ?>
						<option value="<?= $opc["idcatalogodet"]; ?>" <?= ($opc["idcatalogodet"]==$filtros["vendedor"]?'selected="selected"':''); ?> >
							<?= $opc["descripcion"]; ?>
						</option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group col">
			<label for="frm_prefer_giro">Giro</label>
				<input type="text" class="form-control" id="frm_prefer_giro" name="frm_prefer_giro" value="<?= $filtros["giro"]; ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group col">
			<label for="frm_prefer_observaciones">Observaciones</label>
				<input type="text" class="form-control" id="frm_prefer_observaciones" name="frm_prefer_observaciones" value="<?= $filtros["observaciones"]; ?>" />
			</div>
			<div class="form-group col">
			<label for="frm_prefer_identificador">Colonia</label>
				<input type="text" class="form-control" id="frm_prefer_colonia" name="frm_prefer_colonia" value="<?= $filtros["colonia"]; ?>" />
			</div>
			<div class="form-group col">
			<label for="frm_prefer_rfc">Municipio</label>
				<input type="text" class="form-control" id="frm_prefer_municipio" name="frm_prefer_municipio" value="<?= $filtros["municipio"]; ?>" />
			</div>
		</div>
		<button type="button" class="btn btn-outline-primary" onclick="Cliente.Buscar()" >Buscar</button>
	</form>
		<table class="table table-hover table-sm table-responsive">
			<thead>
				<tr>
					<th class="sortable" onclick="TableSortByColumn( 'data-table', 1, 'asc' )">Empresa</th>
					<th class="sortable" onclick="TableSortByColumn( 'data-table', 2, 'asc' )">Sucursal</th>
					<th class="sortable" onclick="TableSortByColumn( 'data-table', 3, 'asc' )">No. Cte.</th>
					<th class="sortable" onclick="TableSortByColumn( 'data-table', 4, 'asc' )">Razon Social</th>
					<th class="sortable" onclick="TableSortByColumn( 'data-table', 5, 'asc' )">RFC</th>
					<th>Ubicación</th>
					<th class="sortable" onclick="TableSortByColumn( 'data-table', 7, 'asc' )">Venderdor</th>
					<th>Giro</th>
					<th>Contrato</th>
					<!--<th>Servicios</th>-->
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>Empresa</th>
					<th>Sucursal</th>
					<th>No. Cte.</th>
					<th>Razon Social</th>
					<th>RFC</th>
					<th>Ubicación</th>
					<th>Venderdor</th>
					<th>Giro</th>
					<th>Contrato</th>
					<!--<th>Servicios</th>-->
				</tr>
			</tfoot>
			<tbody id="data-table">
				<?php if($clientes!==false) foreach($clientes as $cliente):
					$auxCte=new Modcliente();
					$auxSuc=new Modsucursal();
					$auxEmp=new Modempresa();
					$auxCte->getFromDatabase($cliente["idcliente"]);
					$auxSuc->getFromDatabase($auxCte->getIdsucursal());
					$auxEmp->getFromDatabase($auxSuc->getIdempresa());
					?>
					<tr>
						<td>
							<?php if($this->modsesion->hasPermisoHijo(57)): ?>
								<a href="<?php echo base_url( '/empresas/ver/' . $auxEmp->getIdempresa() ); ?>">
									<?= $auxEmp->getRazonsocial(); ?>
								</a>
							<?php else: ?>
								<?= $auxEmp->getRazonsocial(); ?>
							<?php endif; ?>
						</td>
						<td>
							<?php if($this->modsesion->hasPermisoHijo(25)): ?>
								<a href="<?php echo base_url( '/sucursales/ver/' . $auxSuc->getIdsucursal() ); ?>">
									<?= $auxSuc->getNombre(); ?>
								</a>
							<?php else: ?>
								<?= $auxSuc->getNombre(); ?>
							<?php endif; ?>
						</td>
						<td data-order="<?= Refill($cliente["identificador"],10,"0"); ?>">
							<?php if($this->modsesion->hasPermisoHijo(55)): ?>
							<a href="<?= base_url('clientes/ver/'.$cliente["idcliente"]); ?>">
							<?php endif; ?>
								<?= $cliente["identificador"]; ?>
							<?php if($this->modsesion->hasPermisoHijo(55)): ?>
							</a>
							<?php endif; ?>
						</td>
						<td>
							<?php if($this->modsesion->hasPermisoHijo(55)): ?>
							<a href="<?= base_url('clientes/ver/'.$cliente["idcliente"]); ?>">
							<?php endif; ?>
								<?= $cliente["razonsocial"]; ?>
								<?= trim( $cliente[ "nombrecorto" ] ) != "" ? " ({$cliente[ "nombrecorto" ]})" : '' ; ?>
							<?php if($this->modsesion->hasPermisoHijo(55)): ?>
							</a>
							<?php endif; ?>
						</td>
						<td><?= $cliente["rfc"]; ?></td>
						<td><?= "{$cliente["municipio"]}, {$cliente["estado"]}"; ?></td>
						<td><?php 
							if($vendedor!==false) 
								foreach($vendedor["opciones"] as $opc) 
									if($opc["idcatalogodet"]==$cliente["vendedor"])
										echo $opc["descripcion"];
						?></td>
						<td><?= $cliente["giro"]; ?></td>
						<td><?= DateToMx($cliente["fechacontratoinicio"])." al ".DateToMx($cliente["fechacontratofin"]); ?></td>
						<!--<td><?= DateToMx($cliente["fechaserviciosinicio"])." al ".DateToMx($cliente["fechaserviciosfin"]); ?></td>-->
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	<h4>Generadores</h4>
		<table class="table table-hover table-sm table-responsive">
			<thead>
				<tr>
					<th class="sortable" onclick="TableSortByColumn( 'data-table-gen', 1, 'asc' )">No. Cte.</th>
					<th class="sortable" onclick="TableSortByColumn( 'data-table-gen', 2, 'asc' )">No. Gen.</th>
					<th class="sortable" onclick="TableSortByColumn( 'data-table-gen', 3, 'asc' )">Razon Social</th>
					<th class="sortable" onclick="TableSortByColumn( 'data-table-gen', 4, 'asc' )">RFC</th>
					<th>Ubicación</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>No. Cte.</th>
					<th>No. Gen.</th>
					<th>Razon Social</th>
					<th>RFC</th>
					<th>Ubicación</th>
				</tr>
			</tfoot>
			<tbody id="data-table-gen">
				<?php if($generadores!==false) foreach($generadores as $generador):
					$auxGen=new Modgenerador();
					$auxCte=new Modcliente();
					$auxGen->getFromDatabase($generador["idgenerador"]);
					$auxCte->getFromDatabase($auxGen->getIdcliente());
					?>
					<tr>
						<td data-order="<?= Refill($auxCte->getIdentificador(),10,"0"); ?>">
							<?php if($this->modsesion->hasPermisoHijo(55)): ?>
							<a href="<?= base_url('clientes/ver/'.$auxCte->getIdcliente()); ?>">
							<?php endif; ?>
								<?= $auxCte->getIdentificador(); ?>
							<?php if($this->modsesion->hasPermisoHijo(55)): ?>
							</a>
							<?php endif; ?>
						</td>
						<td data-order="<?= Refill($auxGen->getIdentificador(),10,"0"); ?>">
							<?php if($this->modsesion->hasPermisoHijo(55)): ?>
							<a href="<?= base_url('generadores/ver/'.$auxGen->getIdgenerador()); ?>">
							<?php endif; ?>
								<?= $auxGen->getIdentificador(); ?>
							<?php if($this->modsesion->hasPermisoHijo(55)): ?>
							</a>
							<?php endif; ?>
						</td>
						<td>
							<?php if($this->modsesion->hasPermisoHijo(55)): ?>
							<a href="<?= base_url('generadores/ver/'.$auxGen->getIdgenerador()); ?>">
							<?php endif; ?>
								<?= $auxGen->getRazonsocial(); ?>
							<?php if($this->modsesion->hasPermisoHijo(55)): ?>
							</a>
							<?php endif; ?>
						</td>
						<td><?= $generador["rfc"]; ?></td>
						<td><?= "{$generador["municipio"]}, {$generador["estado"]}"; ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
</div>
<!-- Vista cliente/index End -->