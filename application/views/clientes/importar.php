<!-- Vista cliente/importar -->
<?= $menumain; ?>
<div class="container">
	<h3>Importar Clientes <small class="text-muted">Desde Excel</small></h3>
	<form autocomplete="off" id="frm_clientes" method="post" action="<?= base_url("clientes/importar_exec/$idempresa/$idsucursal"); ?>" enctype="multipart/form-data" onsubmit="Mensaje('Cargando Información')">
		<div class="form-row"><div class="form-group col">
			<label for="frm_cliente_archivo">Archivo a importar</label>
				<input type="file" class="form-control" id="frm_cliente_archivo" name="frm_cliente_archivo" />
			</div>
		</div>
		<button type="submit" class="btn btn-outline-primary">Importar</button>
		<button type="button" class="btn btn-outline-secondary" onclick="location.href='<?= base_url("clientes/index/$idempresa/$idsucursal"); ?>'">Cancelar</button>
	</form>
	<div class="alert alert-info">
		El archivo a cargar requiere un formato especifico el cual puedes descargar haciendo clic
		<a href="<?= base_url("project_files/files/templates/clientes.xlsx?date=".time())?>"> aquí</a>.
	</div>
</div>
<!-- Vista cliente/importar End -->