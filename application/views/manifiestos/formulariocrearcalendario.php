<!-- Vista manifiestos/formulariocrearcalendario -->
<?= $menumain; ?>
<?php
$nombreBitacora="Bitácora (".Today().")";
?>
<div class="container">
	<h3>Manifiestos <small class="text-muted">Creación por Calendario (Todos los Generadores con fecha programada)</small></h3>
	<form autocomplete="off" method="post" id="frm_nuevo">
		<input type="hidden" id="frm_nuevo_empresa" name="frm_nuevo_empresa" value="<?= $idempresa; ?>" />
		<input type="hidden" id="frm_nuevo_sucursal" name="frm_nuevo_sucursal" value="<?= $idsucursal; ?>" />
		<div class="form-row"><div class="form-group col">
			<label for="frm_nuevo_ruta">Ruta</label>
				<select class="form-control" id="frm_nuevo_ruta" name="frm_nuevo_ruta" onchange="$('#frm_nuevo_bitacora')[0].value='Bitácora '+this.options[this.selectedIndex].text+' ('+$('#frm_nuevo_fecha').val()+')'">
					<?php
					$nombreBitacora="";
					foreach($rutas as $emp)
						foreach($emp["sucursales"] as $suc)
						{
							?>
							<optgroup label="<?= $emp["razonsocial"]." - ".$suc["nombre"] ?>">
							<?php
							foreach($suc["rutas"] as $ruta)
							{
								if($nombreBitacora=="")
									$nombreBitacora="Bitácora ".$ruta["identificador"]." - ".$ruta["nombre"]." (".Today().")";
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
		<div class="form-row"><div class="form-group col">
			<label for="frm_nuevo_fecha">Fecha Programada</label>
				<input type="date" class="form-control" id="frm_nuevo_fecha" name="frm_nuevo_fecha" value="<?= Today(); ?>" onchange="$('#frm_nuevo_bitacora')[0].value='Bitácora '+$('#frm_nuevo_ruta')[0].options[$('#frm_nuevo_ruta')[0].selectedIndex].text+' ('+this.value+')'" />
			</div>
		</div>
		<div class="form-row"><div class="form-group col">
			<label for="frm_nuevo_bitacora">Bitácora</label>
				<input type="text" class="form-control" id="frm_nuevo_bitacora" name="frm_nuevo_bitacora" value="<?= $nombreBitacora; ?>" />
			</div>
		</div>
		<button type="button" class="btn btn-outline-primary" onclick="Manifiesto.ValidaCreacionCalendario()" >Validar</button>
		<button type="button" class="btn btn-outline-secondary" onclick="location.href='<?= base_url("manifiestos/index/$idempresa/$idsucursal"); ?>'">Cancelar</button>
	</form>
	<div id="prevalidacion"></div>
</div>
<script type="text/javascript">
	var hoy="<?= Hoy(); ?>";
</script>
<!-- Vista manifiestos/formulariocrearcalendario End -->