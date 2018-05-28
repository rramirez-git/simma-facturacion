<!-- Vista manifiestos/validacreacionctegen -->
<?php
/*$cliente=new Modcliente();
$generador=new Modgenerador();
$ruta=new Modruta();*/
?>
<form autocomplete="off" method="post" id="frm_validacion">
	<input type="hidden" id="frm_validacion_idcliente" name="frm_validacion_idcliente" value="<?= $cliente->getIdcliente(); ?>" />
	<input type="hidden" id="frm_validacion_idgenerador" name="frm_validacion_idgenerador" value="<?= $generador->getIdgenerador()?>" />
	<input type="hidden" id="frm_validacion_idruta" name="frm_validacion_idruta" value="<?= $ruta->getIdruta() ?>" />
	<div class="form-row"><div class="form-group col">
		<label for="frm_validacion_cliente">Cliente</label>
			<input class="form-control" disabled="disabled" value="<?= $cliente->getIdentificador()." - ".$cliente->getRazonsocial(); ?>" />
		</div>
		<div class="form-group col">
		<label for="frm_validacion_generador">Generador</label>
			<input class="form-control" disabled="disabled" value="<?= $generador->getIdentificador()." - ".$generador->getRazonsocial(); ?>" />
		</div>
	</div>
	<div class="form-row"><div class="form-group col">
		<label for="frm_validacion_ruta">Ruta</label>
			<input class="form-control" disabled="disabled" value="<?= $ruta->getIdentificador()." - ".$ruta->getNombre(); ?>" />
		</div>
		<div class="form-group col">
		<label for="frm_validacion_identificador">No. de Manifiesto</label>
			<input type="text" class="form-control" id="frm_validacion_identificador" name="frm_validacion_identificador" value="<?= $identificador; ?>" maxlength="19" />
		</div>
	</div>
	<button type="button" class="btn btn-outline-primary" onclick="Manifiesto.CrearManifiestoCteGen_Exec()" >Crear</button>
	<button type="button" class="btn btn-outline-secondary" onclick="location.href='<?= base_url("manifiestos/index/$idempresa/$idsucursal"); ?>'">Cancelar</button>
</form>
<!-- Vista manifiestos/validacreacionctegen End -->