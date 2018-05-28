<!-- Vista manifiestos/formulariocrearctegen -->
<?= $menumain; ?>
<div class="container">
	<h3>Manifiestos <small class="text-muted">Creación por Cliente / Generador</small></h3>
	<form autocomplete="off" method="post" id="frm_nuevo">
		<input type="hidden" id="frm_nuevo_empresa" name="frm_nuevo_empresa" value="<?= $idempresa; ?>" />
		<input type="hidden" id="frm_nuevo_sucursal" name="frm_nuevo_sucursal" value="<?= $idsucursal; ?>" />
		<div class="form-row"><div class="form-group col">
			<label for="frm_nuevo_cliente">No. de Cliente</label>
				<input type="text" class="form-control" id="frm_nuevo_cliente" name="frm_nuevo_cliente" value="" />
			</div>
			<div class="form-group col">
			<label for="frm_nuevo_generador">No. de Generador</label>
				<input type="text" class="form-control" id="frm_nuevo_generador" name="frm_nuevo_generador" value="" />
			</div>
		</div>
		<div class="form-row"><div class="form-group col">
			<label for="frm_nuevo_ruta">Ruta</label>
				<select class="form-control" id="frm_nuevo_ruta" name="frm_nuevo_ruta">
					<?php
					foreach($rutas as $emp)
						foreach($emp["sucursales"] as $suc)
						{
							?>
							<optgroup label="<?= $emp["razonsocial"]." - ".$suc["nombre"] ?>">
							<?php
							foreach($suc["rutas"] as $ruta)
							{
								?>
								<option value="<?= $ruta["id"]?>"><?= $ruta["identificador"]." - ".$ruta["nombre"]; ?></option>
								<?php
							}
							?>
							</optgroup>
							<?php
						}
					?>
				</select>
			</div>
		</div>
		<button type="button" class="btn btn-outline-primary" onclick="Manifiesto.ValidaCreacionCteGen()" >Validar</button>
		<button type="button" class="btn btn-outline-secondary" onclick="location.href='<?= base_url("manifiestos/index/$idempresa/$idsucursal"); ?>'">Cancelar</button>
	</form>
	<div id="prevalidacion"></div>
</div>
<!-- Vista manifiestos/formulariocrearctegen End -->