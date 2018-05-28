<?php
if(!isset($catalogoname)) $catalogoname="";
?>
<div class="form-row">
	<div class="form-group col">
		<label>Nombre del Catalogo:</label>
		<input class="form-control" type="text" name="catalogo_name" id="catalogo_name" value="<?= $catalogoname; ?>" />
	</div>
</div>