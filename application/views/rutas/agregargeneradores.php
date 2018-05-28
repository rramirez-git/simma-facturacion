<?= $menumain; ?>
<div class="container">
	<h3>Asociar Generadores <small class="text-muted"><?= $ruta->getIdentificador()." - ".$ruta->getNombre(); ?></small></h3>
	<form autocomplete="off" id="frm_rutas">
		<div class="form-row"><div class="form-group col">
			<label for="cliente">No. Cliente:</label>
				<input type="text" class="form-control" id="cliente" name="cliente" />
			</div>
			<div class="form-group col">
			<label for="generador">No. Generador</label>
				<input type="text" class="form-control" id="generador" name="generador" />
			</div>
			<div class="form-group col">
            	<button type="button" class="btn btn-outline-secondary align-bottom" onclick="Ruta.BuscarCteGen()">
            		<i class="fas fa-search"></i>
            	</button>
        	</div>
		</div>
	</form>
		<table class="table table-hover table-sm table-responsive">
			<thead>
				<tr>
					<th></th>
					<th>No. Cliente</th>
					<th>Cliente</th>
					<th>No. Generador</th>
					<th>Generador</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th></th>
					<th>No. Cliente</th>
					<th>Cliente</th>
					<th>No. Generador</th>
					<th>Generador</th>
				</tr>
			</tfoot>
			<tbody id="generadores"></tbody>
		</table>
	<input type="hidden" id="idruta" name="idruta" value="<?= $ruta->getIdruta(); ?>" />
	<button type="button" class="btn btn-outline-primary" onclick="Ruta.AddGeneradores()">Asociar</button>
	<button type="button" class="btn btn-outline-secondary" onclick="location.href='<?= base_url("rutas/ver/".$ruta->getIdruta()); ?>'">Cancelar</button>
</div>