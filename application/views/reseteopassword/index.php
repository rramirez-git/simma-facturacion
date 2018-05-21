<?= $menumain; ?>
<div class="container">
	<h3>Resetear Contraseña</h3>
	<form autocomplete="off" id="frm_data">
		<div class="form-row"><div class="form-group">
			<label class="col-sm-2 control-label" for="frm_data_usr">Usuario:</label>
			<div class="col-sm-10">
        		<input type="text" class="form-control" id="frm_data_usr" name="frm_data_usr" placeholder="Usuario" maxlength="250" />
        	</div>
		</div>
		<div class="form-row"><div class="form-group">
			<div class="col-sm-9"></div>
			<div class="col-sm-3">
			    <button type="button" class="btn btn-success" onclick="Usuario.ResetearPwr()" >Resetar Contraseña</button>
			</div>
		</div>
	</form>
</div>