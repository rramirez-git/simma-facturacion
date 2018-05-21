<!-- Vista manifiestos/importarformiik -->
<?= $menumain; ?>
<div class="container">
	<h3>Importar Manifiestos <small class="text-muted">Desde Formiik</small></h3>
	<form autocomplete="off" id="frm_importar" method="post" action="<?= base_url("manifiestos/importar_exec/$tipo/$idempresa/$idsucursal"); ?>" enctype="multipart/form-data" onsubmit="Mensaje('Cargando Información')">
		<div class="form-row"><div class="form-group">
			<label for="frm_importar_archivo">Archivo a importar</label>
			<div class="col-sm-10">
				<input type="file" class="form-control" id="frm_importar_archivo" name="frm_importar_archivo" />
			</div>
		</div>
		<div class="form-row"><div class="form-group">
			<div class="col-sm-8"></div>
			<div class="col-sm-2">
                <button type="submit" class="btn btn-outline-primary">Importar</button>
            </div>
            <div class="col-sm-2">
                <button type="button" class="btn btn-outline-secondary" onclick="location.href='<?= base_url("manifiestos/index/$idempresa/$idsucursal"); ?>'">Cancelar</button>
            </div>
		</div>
	</form>
	<div class="alert alert-info">
		El archivo a cargar requiere un formato especifico del cual puedes descargar un ejemplo haciendo clic
		<a href="<?= base_url("project_files/files/templates/rep_manifiesto_formik_in.xlsx?date=".time())?>"> aquí</a>.
	</div>
</div>
<!-- Vista manifiestos/importarformiik End -->