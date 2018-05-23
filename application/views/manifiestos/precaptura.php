<!-- Vista manifiestos/precaptura -->
<?= $menumain; ?>
<div class="container">
	<h3>Captura de Manifiestos</h3>
	<form autocomplete="off" method="post" id="frm_manifiesto">
		<div class="form-row"><div class="form-group col">
			<label for="frm_manifiesto_identificador">No. Manifiesto:</label>
			    <input type="hidden" class="form-control" id="frm_manifiesto_idmanifiesto" name="frm_manifiesto_idmanifiesto"/>
			    <div class="input-group">
			    	<input type="text" class="form-control" id="frm_manifiesto_identificador" name="frm_manifiesto_identificador" value="" />
			    	<div class="input-group-append">
			    		<button type="button" class="btn btn-outline-secondary" onclick="Manifiesto.GetManifiestoPrecaptura()">
							<i class="fas fa-search"></i>
						</button>
			    	</div>
			    </div>
			</div>
		</div>
		<div class="form-row"><div class="form-group col">
			<label for="frm_manifiesto_cliente">No. Cliente:</label>
				<p class="form-control" id="frm_manifiesto_cliente_static"></p>
				<input type="hidden" id="frm_manifiesto_cliente" name="frm_manifiesto_cliente" value="" />
			</div>
			<div class="form-group col">
				<label>Cliente</label>
				<p class="form-control" id="frm_manifiesto_cliente_nombre_static"></p>
			</div>
			<div class="form-group col">
			<label for="frm_manifiesto_generador">No. Generador</label>
				<p class="form-control" id="frm_manifiesto_generador_static"></p>
				<input type="hidden" id="frm_manifiesto_generador" name="frm_manifiesto_generador" value="" />
			</div>
			<div class="form-group col">
			<label for="frm_manifiesto_generador">Generador</label>
				<p class="form-control" id="frm_manifiesto_generador_nombre_static"></p>
			</div>
		</div>
	
	</form>
	<hr />
	<div id="frmCapturaContainer"></div>
	<form autocomplete="off" id="frmConfirmButtons" style="display: none;" >
		<button type="button" class="btn btn-outline-primary" onclick="Manifiesto.EjecutaPrecaptura()" >Guardar</button>
		<button type="button" class="btn btn-outline-secondary" onclick="Manifiesto.LimpiaFormPrecaptura()">Cancelar</button>
    </form>
</div>
<!-- Vista manifiestos/precaptura End -->