<!-- Vista sucursales/formulario -->
<?= $menumain; ?>
<div class="container">
	<h3>Sucursales <small class="text-muted"><?= $objeto->getIdsucursal()!="" && $objeto->getIdsucursal()!=0?"Actualizar":"Nueva" ; ?> sucursal</small></h3>
	<form autocomplete="off" id="frm_sucursales" method="post">
		<input type="hidden" id="frm_sucursal_idempresa" name="frm_sucursal_idempresa" value="<?= $empresa->getIdempresa(); ?>" />
		<input type="hidden" id="frm_sucursal_idsucursal" name="frm_sucursal_idsucursal" value="<?= $objeto->getIdsucursal(); ?>" />
		<div class="form-row"><div class="form-group col">
			<label for="frm_sucursal_nombre">Razón Social <abbr class="text-danger" title="Campo Obligatorio">(obligatorio)</abbr></label>
				<input type="text" class="form-control" id="frm_sucursal_nombre" name="frm_sucursal_nombre" value="<?= $objeto->getNombre(); ?>" placeholder="Nombre o Razón Social de la Sucursal" maxlength="62" />
			</div>
			<div class="form-group col">
			<label for="frm_sucursal_iniciales">Iniciales</label>
				<input type="text" class="form-control" id="frm_sucursal_iniciales" name="frm_sucursal_iniciales" value="<?= $objeto->getIniciales(); ?>" placeholder="Iniciales para manifiestos" maxlength="20" />
			</div>
		</div>
		<h5>
			Facturación
		</h5>
		<div class="form-row"><div class="form-group col">
			<label for="frm_sucursal_fac_serie">Número de serie</label>
				<input type="text" class="form-control" id="frm_sucursal_fac_serie" name="frm_sucursal_fac_serie" value="<?= $objeto->getFac_serie(); ?>" placeholder="Número de serie Facturación" maxlength="25" />
			</div>
			<div class="form-group col">
			<label for="frm_sucursal_fac_folio_actual">Número de Folio Actual</label>
				<input type="number" class="form-control" id="frm_sucursal_fac_folio_actual" name="frm_sucursal_fac_folio_actual" value="<?= $objeto->getFac_folio_actual(); ?>"  min="0" max="999999999" />
			</div>
			<div class="form-group col">
			<label for="frm_sucursal_fac_folio_incial">Número de Folio Inicial</label>
				<input type="number" class="form-control" id="frm_sucursal_fac_folio_incial" name="frm_sucursal_fac_folio_incial" value="<?= $objeto->getFac_folio_incial(); ?>"  min="0" max="999999999" />
			</div>
			<div class="form-group col">
			<label for="frm_sucursal_fac_folio_final">Número de Folio Final</label>
				<input type="number" class="form-control" id="frm_sucursal_fac_folio_final" name="frm_sucursal_fac_folio_final" value="<?= $objeto->getFac_folio_final(); ?>"  min="0" max="999999999" />
			</div>
		</div>
		<h5>
			Notas de credito
		</h5>
		<div class="form-row"><div class="form-group col">
			<label for="frm_sucursal_nc_serie">Número de Serie</label>
				<input type="text" class="form-control" id="frm_sucursal_nc_serie" name="frm_sucursal_nc_serie" value="<?= $objeto->getNc_serie(); ?>" placeholder="Número de Serie Notas de credito" maxlength="25" />
			</div>
			<div class="form-group col">
			<label for="frm_sucursal_nc_folio_actual">Número de Folio Actual</label>
				<input type="number" class="form-control" id="frm_sucursal_nc_folio_actual" name="frm_sucursal_nc_folio_actual" value="<?= $objeto->getNc_folio_actual(); ?>"  min="0" max="999999999" />
			</div>
			<div class="form-group col">
			<label for="frm_sucursal_nc_folio_incial">Número de Folio Inicial</label>
				<input type="number" class="form-control" id="frm_sucursal_nc_folio_incial" name="frm_sucursal_nc_folio_incial" value="<?= $objeto->getNc_folio_incial(); ?>"  min="0" max="999999999" />
			</div>
			<div class="form-group col">
			<label for="frm_sucursal_nc_folio_final">Número de Folio Final</label>
				<input type="number" class="form-control" id="frm_sucursal_nc_folio_final" name="frm_sucursal_nc_folio_final" value="<?= $objeto->getNc_folio_final(); ?>"  min="0" max="999999999" />
			</div>
		</div>
		<h5>
			Pagos
		</h5>
		<div class="form-row"><div class="form-group col">
			<label for="frm_sucursal_pago_serie">Número de Serie</label>
				<input type="text" class="form-control" id="frm_sucursal_pago_serie" name="frm_sucursal_pago_serie" value="<?= $objeto->getPago_serie(); ?>" placeholder="Número de Serie Pagos" maxlength="25" />
			</div>
			<div class="form-group col">
			<label for="frm_sucursal_pago_folio_actual">Número de Folio Actual</label>
				<input type="number" class="form-control" id="frm_sucursal_pago_folio_actual" name="frm_sucursal_pago_folio_actual" value="<?= $objeto->getPago_folio_actual(); ?>"  min="0" max="999999999" />
			</div>
			<div class="form-group col">
			<label for="frm_sucursal_pago_folio_incial">Número de Folio Inicial</label>
				<input type="number" class="form-control" id="frm_sucursal_pago_folio_incial" name="frm_sucursal_pago_folio_incial" value="<?= $objeto->getPago_folio_incial(); ?>"  min="0" max="999999999" />
			</div>
			<div class="form-group col">
			<label for="frm_sucursal_pago_folio_final">Número de Folio Final</label>
				<input type="number" class="form-control" id="frm_sucursal_pago_folio_final" name="frm_sucursal_pago_folio_final" value="<?= $objeto->getPago_folio_final(); ?>"  min="0" max="999999999" />
			</div>
		</div>
		<h5>
			Dirección
			<button type="button" class="btn btn-outline-secondary btn-sm" title="Copiar datos desde la empresa" onclick="Sucursal.CopiaDireccion()">
				<i class="far fa-copy"></i>
			</button>
		</h5>
		<div class="form-row"><div class="form-group col">
			<label for="frm_sucursal_calle">Calle</label>
				<input type="text" class="form-control" id="frm_sucursal_calle" name="frm_sucursal_calle" value="<?= $objeto->getCalle(); ?>" placeholder="Calle" />
			</div>
			<div class="form-group col">
		    <label for="frm_sucursal_cp">Código Postal</label>
			<div class="input-group">
				<input type="number" class="form-control" id="frm_sucursal_cp" name="frm_sucursal_cp" value="<?= $objeto->getCp(); ?>" placeholder="C. P." min="0" max="99999" />
				<div class="input-group-append">
					<button type="button" class="btn btn-outline-secondary" onclick="Sucursal.DisplayFrmCP()">
						<i class="fas fa-search"></i>
					</button>
				</div>
			</div>
			</div>
		</div>
		<div class="form-row"><div class="form-group col">
			<label for="frm_sucursal_numexterior">Número Exterior</label>
				<input type="text" class="form-control" id="frm_sucursal_numexterior" name="frm_sucursal_numexterior" value="<?= $objeto->getNumexterior(); ?>" placeholder="Número Exterior de la Sucursal" />
			</div>
			<div class="form-group col">
			<label for="frm_sucursal_numinterior">Número Interior</label>
				<input type="text" class="form-control" id="frm_sucursal_numinterior" name="frm_sucursal_numinterior" value="<?= $objeto->getNuminterior(); ?>" placeholder="Número Interior de la Sucursal" />
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col">
			<label for="frm_sucursal_colonia">Colonia</label>
				<input type="text" class="form-control" id="frm_sucursal_colonia" name="frm_sucursal_colonia" value="<?= $objeto->getColonia(); ?>" placeholder="colonia" />
			</div><div class="form-group col">
			<label for="frm_sucursal_municipio">Delegación o Municipio</label>
				<input type="text" class="form-control" id="frm_sucursal_municipio" name="frm_sucursal_municipio" value="<?= $objeto->getMunicipio(); ?>" placeholder="Delegación o Municipio" />
			</div>
			<div class="form-group col">
			<label for="frm_sucursal_estado">Estado</label>
				<input type="text" class="form-control" id="frm_sucursal_estado" name="frm_sucursal_estado" value="<?= $objeto->getEstado(); ?>" placeholder="Estado" />
			</div>
		</div>
		<h5>
			Contacto
			<button type="button" class="btn btn-outline-secondary btn-sm" title="Copiar datos desde la empresa" onclick="Sucursal.CopiaContacto()">
				<i class="far fa-copy"></i>
			</button>
		</h5>
		<div class="form-row"><div class="form-group col">
			<label for="frm_sucursal_representante">Representante <abbr class="text-danger" title="Campo Obligatorio">(obligatorio)</abbr></label>
				<input type="text" class="form-control" id="frm_sucursal_representante" name="frm_sucursal_representante" value="<?= $objeto->getRepresentante(); ?>" placeholder="Representante" maxlength="50" />
			</div>
			<div class="form-group col">
			<label for="frm_sucursal_cargorepresentante">Cargo</label>
				<input type="text" class="form-control" id="frm_sucursal_cargorepresentante" name="frm_sucursal_cargorepresentante" value="<?= $objeto->getCargorepresentante(); ?>" placeholder="Representante" maxlength="30" />
			</div>
			<div class="form-group col">
			<label for="frm_sucursal_telefono">Teléfono</label>
				<input type="tel" class="form-control" id="frm_sucursal_telefono" name="frm_sucursal_telefono" value="<?= $objeto->getTelefono(); ?>" placeholder="Teléfono" maxlength="13" />
			</div>
		</div>
		<h5>
			Legal
			<button type="button" class="btn btn-outline-secondary btn-sm" title="Copiar datos desde la empresa" onclick="Sucursal.CopiaLegal()">
				<i class="far fa-copy"></i>
			</button>
		</h5>
		<div class="form-row"><div class="form-group col">
			<label for="frm_sucursal_autsemarnat">Número de Autorización SEMARNAT</label>
				<input type="text" class="form-control" id="frm_sucursal_autsemarnat" name="frm_sucursal_autsemarnat" value="<?= $objeto->getAutsemarnat(); ?>" placeholder="Número de Autorización SEMARNAT" maxlength="25" />
			</div>
			<div class="form-group col">
			<label for="frm_sucursal_registrosct">Número de Registro SCT</label>
				<input type="text" class="form-control" id="frm_sucursal_registrosct" name="frm_sucursal_registrosct" value="<?= $objeto->getRegistrosct(); ?>" placeholder="Número de Registro SCT" maxlength="23" />
			</div>
		</div>
		<!--<div class="form-row"><div class="form-group col">
			<label for="frm_sucursal_numregamb">Número de Registro Ambiental <abbr class="text-danger" title="Campo Obligatorio">(obligatorio)</abbr></label>
				<input type="text" class="form-control" id="frm_sucursal_numregamb" name="frm_sucursal_numregamb" value="<?= $objeto->getNumregamb(); ?>" placeholder="Número de Registro Ambiental" />
			</div>
		</div>-->
		<button type="button" class="btn btn-outline-primary" onclick="Sucursal.Enviar(<?= ($objeto->getIdSucursal()!="" && $objeto->getIdSucursal()!=0?'false':'true'); ?>)" >Guardar</button>
		<button type="button" class="btn btn-outline-secondary" onclick="location.href='<?= base_url('sucursales'); ?>'">Cancelar</button>
	</form>
</div>
<script type="text/javascript">
	var dataEmpresa={
		direccion:{
			calle:'<?= $empresa->getCalle(); ?>',
			numexterior:'<?= $empresa->getNumexterior(); ?>',
			numinterior:'<?= $empresa->getNuminterior(); ?>',
			cp:'<?= $empresa->getCp(); ?>',
			colonia:'<?= $empresa->getColonia(); ?>',
			municipio:'<?= $empresa->getMunicipio(); ?>',
			estado:'<?= $empresa->getEstado(); ?>'
		},
		contacto:{
			representante:'<?= $empresa->getRepresentante(); ?>',
			cargorepresentante:'<?= $empresa->getCargorepresentante(); ?>',
			telefono:'<?= $empresa->getTelefono(); ?>'
		},
		legal:{
			autsemarnat:'<?= $empresa->getAutsemarnat(); ?>',
			registrosct:'<?= $empresa->getRegistrosct(); ?>'
		},
	};
</script>
<!-- Vista sucursales/formulario End -->