<?= $menumain; ?>
<div class="container">
	<h3>Resetear Contraseña</h3>
	<form autocomplete="off" id="frm_data">
		<div class="form-row"><div class="form-group col">
			<label for="frm_data_usr">Usuario:</label>
        		<input type="text" class="form-control" id="frm_data_usr" name="frm_data_usr" placeholder="Usuario" maxlength="250" />
        	</div>
		</div>
		<button type="button" class="btn btn-outline-primary" onclick="Usuario.ResetearPwr()" >Resetar Contraseña</button>
	</form>
</div>