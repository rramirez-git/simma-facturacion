<!-- Vista empresas/formulario -->
<?= $menumain; ?>
<div class="container">
	<h3>Empresas <small class="text-muted"><?= $objeto->getIdempresa()!="" && $objeto->getIdempresa()!=0?"Actualizar":"Nueva"; ?> empresa</small></h3>
	<form autocomplete="off" method="post" id="frm_empresas">
		<input type="hidden" id="frm_empresa_idempresa" name="frm_empresa_idempresa" value="<?= $objeto->getIdempresa(); ?>" />
		<div class="form-row"><div class="form-group col">
			<label for="frm_empresa_razonsocial">Razón Social <abbr class="text-danger" title="Campo Obligatorio">(obligatorio)</abbr></label>
				<input type="text" class="form-control" id="frm_empresa_razonsocial" name="frm_empresa_razonsocial" value="<?= $objeto->getRazonsocial(); ?>" placeholder="Nombre o Razón Social de la Empresa" maxlength="62" />
			</div>
		</div>
		<div class="form-row"><div class="form-group col">
			<label for="frm_empresa_rfc">Registro Federal de Contribuyentes <abbr class="text-danger" title="Campo Obligatorio">(obligatorio)</abbr></label>
				<input type="text" class="form-control" id="frm_empresa_rfc" name="frm_empresa_rfc" value="<?= $objeto->getRfc(); ?>" placeholder="Registro Federal de Contribuyentes de la Empresa" />
			</div>
			<div class="form-group col">
			<label for="frm_empresa_regimen_fiscal">Regimen Fiscal</label>
				<select class="form-control" id="frm_empresa_regimen_fiscal" name="frm_empresa_regimen_fiscal">
					<?php 
						if($regimen_fiscal["opciones"]!==false) 
							foreach($regimen_fiscal["opciones"] as $opc)
							{
								?>
								<option value="<?= $opc["idcatalogodet"]; ?>" <?= ($opc["idcatalogodet"]==$objeto->getRegimenfiscal()?'selected="selected"':'')?>><?= $opc["descripcion"]; ?></option>
								<?php
							}
					?>
				</select>
			</div>
		</div>
		<h5>Dirección</h5>
		<div class="form-row"><div class="form-group col">
			<label for="frm_empresa_calle">Calle</label>
				<input type="text" class="form-control" id="frm_empresa_calle" name="frm_empresa_calle" value="<?= $objeto->getCalle(); ?>" placeholder="Calle" />
			</div>
			<div class="form-group col">
		    <label for="frm_empresa_cp">Código Postal</label>
		    	<div class="input-group">
		    		<input type="number" class="form-control" id="frm_empresa_cp" name="frm_empresa_cp" value="<?= $objeto->getCp(); ?>" placeholder="C. P." min="0" max="99999" />
		    		<div class="input-group-append">
		    			<button type="button" class="btn btn-outline-secondary" onclick="Empresa.DisplayFrmCP()">
							<i class="fas fa-search"></i>
						</button>
		    		</div>
		    	</div>
			</div>
		</div>
		<div class="form-row"><div class="form-group col">
			<label for="frm_empresa_numexterior">Número Exterior</label>
				<input type="text" class="form-control" id="frm_empresa_numexterior" name="frm_empresa_numexterior" value="<?= $objeto->getNumexterior(); ?>" placeholder="Número Exterior de la Empresa" />
			</div>
			<div class="form-group col">
			<label for="frm_empresa_numinterior">Número Interior</label>
				<input type="text" class="form-control" id="frm_empresa_numinterior" name="frm_empresa_numinterior" value="<?= $objeto->getNuminterior(); ?>" placeholder="Número Interior de la Empresa" />
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col">
			<label for="frm_empresa_colonia">Colonia</label>
				<input type="text" class="form-control" id="frm_empresa_colonia" name="frm_empresa_colonia" value="<?= $objeto->getColonia(); ?>" placeholder="colonia" />
			</div>
			<div class="form-group col">
			<label for="frm_empresa_municipio">Delegación o Municipio</label>
				<input type="text" class="form-control" id="frm_empresa_municipio" name="frm_empresa_municipio" value="<?= $objeto->getMunicipio(); ?>" placeholder="Delegación o Municipio" />
			</div>
			<div class="form-group col">
			<label for="frm_empresa_estado">Estado</label>
				<input type="text" class="form-control" id="frm_empresa_estado" name="frm_empresa_estado" value="<?= $objeto->getEstado(); ?>" placeholder="Estado" />
			</div>
		</div>
		<h5>Contacto</h5>
		<div class="form-row"><div class="form-group col">
			<label for="frm_empresa_representante">Representante <abbr class="text-danger" title="Campo Obligatorio">(obligatorio)</abbr></label>
				<input type="text" class="form-control" id="frm_empresa_representante" name="frm_empresa_representante" value="<?= $objeto->getRepresentante(); ?>" placeholder="Representante" />
			</div>
			<div class="form-group col">
			<label for="frm_empresa_cargorepresentante">Cargo</label>
				<input type="text" class="form-control" id="frm_empresa_cargorepresentante" name="frm_empresa_cargorepresentante" value="<?= $objeto->getCargorepresentante(); ?>" placeholder="Representante" />
			</div>
			<div class="form-group col">
			<label for="frm_empresa_telefono">Teléfono</label>
				<input type="tel" class="form-control" id="frm_empresa_telefono" name="frm_empresa_telefono" value="<?= $objeto->getTelefono(); ?>" placeholder="Teléfono" maxlength="13" />
			</div>
		</div>
		<h5>Legal</h5>
		<div class="form-row"><div class="form-group col">
			<label for="frm_empresa_autsemarnat">Número de Autorización SEMARNAT <abbr class="text-danger" title="Campo Obligatorio">(obligatorio)</abbr></label>
				<input type="text" class="form-control" id="frm_empresa_autsemarnat" name="frm_empresa_autsemarnat" value="<?= $objeto->getAutsemarnat(); ?>" placeholder="Número de Autorización SEMARNAT" />
			</div>
			<div class="form-group col">
			<label for="frm_empresa_registrosct">Número de Registro SCT <abbr class="text-danger" title="Campo Obligatorio">(obligatorio)</abbr></label>
				<input type="text" class="form-control" id="frm_empresa_registrosct" name="frm_empresa_registrosct" value="<?= $objeto->getRegistrosct(); ?>" placeholder="Número de Registro SCT" />
			</div>
		</div>
		<h5>Otros</h5>
		<div class="form-row">
			<div class="form-group col">
					<label>
						<input type="checkbox" id="frm_empresa_coorporativo" name="frm_empresa_coorporativo" value="1" <?= ($objeto->getCoorporativo()==1?'checked="checked"':''); ?> />
						Empresa Coorporativo
					</label>
			</div>
			<div class="form-group col">
				<div class="checkbox">
					<label>
						<input type="checkbox" id="frm_empresa_transportista" name="frm_empresa_transportista" value="1" <?= ($objeto->getTransportista()==1?'checked="checked"':''); ?> />
						Empresa Transportista
					</label>
				</div>
			</div>
			<div class="form-group col">
					<label>
						<input type="checkbox" id="frm_empresa_destinofinal" name="frm_empresa_destinofinal" value="1" <?= ($objeto->getDestinofinal()==1?'checked="checked"':''); ?> />
						Empresa de Destino Final
					</label>
			</div>
		</div>
		<button type="button" class="btn btn-outline-primary" onclick="Empresa.Enviar(<?= ($objeto->getIdempresa()!="" && $objeto->getIdempresa()!=0?'false':'true'); ?>)" >Guardar</button>
		<button type="button" class="btn btn-outline-secondary" onclick="location.href='<?= base_url('empresas'); ?>'">Cancelar</button>
	</form>
</div>
<!-- Vista empresas/formulario End -->