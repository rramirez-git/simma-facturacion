<!-- Vista rutas/plangeneracion -->
<?= $menumain; ?>
<div class="container">
	<h3>Plan de Recolección <small class="text-muted"><?= $ruta->getIdentificador()." - ".$ruta->getNombre(); ?></small></h3>
	<form autocomplete="off" id="frm_rutas">
		<input type="hidden" name="ruta" id="ruta" value="<?= $ruta->getIdruta(); ?>" />
		<input type="hidden" name="ruta_name" id="ruta_name" value="<?= $ruta->getIdentificador()." - ".$ruta->getNombre(); ?>" />
		<div class="form-row"><div class="form-group col">
			<label for="fecha">Fecha:</label>
				<input type="date" class="form-control" id="fecha" name="fecha" value="<?= $fecha; ?>" />
			</div>
			<div class="form-group col">
				<button type="button" class="btn btn-outline-primary" onclick="Ruta.VerPlanRecoleccion()">Mostar</button>
				<button type="button" class="btn btn-outline-secondary" onclick="location.href='<?= base_url("rutas/ver/".$ruta->getIdruta()); ?>'">Regresar</button>
			</div>
		</div>
	</form>
	<div id="prevalidacion"></div>
</div>
<!-- Vista rutas/plangeneracion End -->