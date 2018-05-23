<!-- Vista empresas/vista -->
<?= $menumain; ?>
<div class="container">
	<div class="btn-toolbar float-right" role="toolbar">
		<div class="btn-group" role="group">
			<?php if($this->modsesion->hasPermisoHijo(6)): ?>
			<button type="button" class="btn btn-outline-secondary" title="Ver todas las Empresas" onclick="location.href='<?= base_url('empresas'); ?>';">
				<i class="fas fa-th-list"></i>
			</button>
			<?php endif;
			if($this->modsesion->hasPermisoHijo(69)):?>
			<button type="button" class="btn btn-outline-secondary" title="Actualizar Empresa" onclick="location.href='<?= base_url('empresas/actualizar/'.$objeto->getIdempresa()); ?>';">
				<i class="far fa-edit"></i>
			</button>
			<?php endif;
			if($this->modsesion->hasPermisoHijo(70)):?>
			<button type="button" class="btn btn-outline-secondary" title="Borrar Empresa" onclick="Empresa.Eliminar(<?= $objeto->getIdempresa(); ?>)">
				<i class="far fa-trash-alt"></i>
			</button>
			<?php endif; ?>
		</div>
	</div>
	<h3>Empresas <small class="text-muted"><?= $objeto->getRazonsocial(); ?></small></h3>
	<form autocomplete="off" method="post" id="frm_empresas">
		<div class="form-row"><div class="form-group col-sm-12">
			<label>Razón Social</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getRazonsocial(); ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group col-sm-6">
			<label>Registro Federal de Contribuyentes</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getRfc(); ?>" />
			</div>
			<div class="form-group col-sm-6">
			<label for="frm_empresa_regimen_fiscal">Regimen fiscal</label>
				<input class="form-control" disabled="disabled" value="<?php 
						if($regimen_fiscal["opciones"]!==false) 
							foreach($regimen_fiscal["opciones"] as $opc)
								if($opc["idcatalogodet"]==$objeto->getRegimenfiscal())
									echo $opc["descripcion"];
					?>" />
			</div>
		</div>
		<h5>Dirección</h5>
		<div class="form-row"><div class="form-group col-sm-12">
			<label>Calle</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getCalle(); ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group col-sm-6">
			<label>Número Exterior</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getNumexterior(); ?>" />
			</div>
			<div class="form-group col-sm-6">
			<label>Número Interior</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getNuminterior(); ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group col-sm-6">
		    <label>Código Postal</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getCp(); ?>" />
			</div>
			<div class="form-group col-sm-6">
			<label>Colonia</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getColonia(); ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group col-sm-6">
			<label>Delegación o Municipio</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getMunicipio(); ?>" />
			</div>
			<div class="form-group col-sm-6">
			<label>Estado</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getEstado(); ?>" />
			</div>
		</div>
		<h5>Contacto</h5>
		<div class="form-row"><div class="form-group col-sm-12">
			<label>Representante</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getRepresentante(); ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group col-sm-6">
			<label>Cargo</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getCargorepresentante(); ?>" />
			</div><div class="form-group col-sm-6">
			<label>Teléfono</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getTelefono(); ?>" />
			</div>
		</div>
		<h5>Legal</h5>
		<div class="form-row"><div class="form-group col-sm-6">
			<label>Número de Autorización SEMARNAT</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getAutsemarnat(); ?>" />
			</div>
			<div class="form-group col-sm-6">
			<label>Número de Registro SCT</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getRegistrosct(); ?>" />
			</div>
		</div>
		<h5>Otros</h5>
		<div class="form-row">
			<div class="form-group col-sm-2"></div>
			<div class="form-group col-sm-3">
					<label>
						<input type="checkbox" id="frm_empresa_coorporativo" name="frm_empresa_coorporativo" value="1" disabled="disabled" <?= ($objeto->getCoorporativo()==1?'checked="checked"':''); ?> />
						Empresa Coorporativo
					</label>
			</div>
			<div class="form-group col-sm-3">
					<label>
						<input type="checkbox" id="frm_empresa_transportista" name="frm_empresa_transportista" value="1" disabled="disabled" <?= ($objeto->getTransportista()==1?'checked="checked"':''); ?> />
						Empresa Transportista
					</label>
			</div>
			<div class="form-group col-sm-3">
					<label>
						<input type="checkbox" id="frm_empresa_destinofinal" name="frm_empresa_destinofinal" value="1" disabled="disabled" <?= ($objeto->getDestinofinal()==1?'checked="checked"':''); ?> />
						Empresa de Destino Final
					</label>
			</div>
		</div>
		<?php if($this->modsesion->hasPermisoHijo(7)): ?>
			<h5>Sucursales</h5>
			<div class="table-responsive">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>Sucursal</th>
							<th>Representante</th>
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
					<tbody>
						<?php if($sucursales!==false) foreach($sucursales as $sucursal): ?>
						<tr>
							<td><a href="<?= base_url('sucursales/ver/'.$sucursal["idsucursal"]); ?>"><?= $sucursal["nombre"]; ?></a></td>
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
		<?php endif; ?>
	</form>
</div>
<!-- Vista empresas/vista End -->