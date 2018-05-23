<?php
if(!isset($idcatalogo)) $$idcatalogo=0;
?>
<form autocomplete="off" id="opcionescatalogo" action="<?= base_url('catalogos/agregarOpciones/'.$idcatalogo); ?>" method="post">
	<div class="form-row"><div class="form-group col"><label>Opciones para agregar:</label></div></div>
	<div class="form-row"><div class="form-group col"><input type="text" name="option1" id="option1" value="" class="form-control" /></div></div>
	<div class="form-row"><div class="form-group col"><input type="text" name="option2" id="option2" value="" class="form-control" /></div></div>
	<div class="form-row"><div class="form-group col"><input type="text" name="option3" id="option3" value="" class="form-control" /></div></div>
	<div class="form-row"><div class="form-group col"><input type="text" name="option4" id="option4" value="" class="form-control" /></div></div>
	<div class="form-row"><div class="form-group col"><input type="text" name="option5" id="option5" value="" class="form-control" /></div></div>
</form>