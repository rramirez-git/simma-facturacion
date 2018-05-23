<?= $menumain; ?>
<div class="container">
	<h3>Cambiar Contraseña</h3>
	<form autocomplete="off" id="frm_data">
		<div class="form-row"><div class="form-group col">
			<label for="frm_data_actual">Contraseña Actual:</label>			
        		<input type="password" class="form-control" id="frm_data_actual" name="frm_data_actual" maxlength="250" />
        	</div>
		</div>
		<div class="form-row"><div class="form-group col">
			<label for="frm_data_nueva">Contraseña Nueva:</label>			
        		<input type="password" class="form-control" id="frm_data_nueva" name="frm_data_nueva" maxlength="250" />
        	</div>
		</div>
		<div class="form-row"><div class="form-group col">
			<label for="frm_data_confirmacion">Confirmar Contraseña Nueva:</label>			
        		<input type="password" class="form-control" id="frm_data_confirmacion" name="frm_data_confirmacion" maxlength="250" />
        	</div>
		</div>
		<button type="button" class="btn btn-outline-primary" onclick="Usuario.CambiarPwd()" >Cambiar Contraseña</button>
	</form>
</div>