<?= $menumain; ?>
<div class="container">
	<h3>Usuarios</h3>
	<form autocomplete="off" id="frm_usuarios">
        <input type="hidden" id="frm_usuario_idusuario" name="frm_usuario_idusuario" value="<?= $objeto->getIdusuario(); ?>" />
        <div class="form-row"><div class="form-group col">
        	<label for="frm_usuario_nombre">Nombre <abbr class="text-danger" title="Campo Obligatorio">(obligatorio)</abbr></label>
        		<input type="text" class="form-control" id="frm_usuario_nombre" name="frm_usuario_nombre" value="<?= $objeto->getNombre(); ?>" placeholder="Nombre del usuario" maxlength="250" />
        	</div>
        </div>
        <div class="form-row"><div class="form-group col">
        	<label for="frm_usuario_apaterno">Apellido Paterno</label>
        		<input type="text" class="form-control" id="frm_usuario_apaterno" name="frm_usuario_apaterno" value="<?= $objeto->getApaterno(); ?>" placeholder="Apellido Paterno" maxlength="250" />
        	</div>
        	<div class="form-group col">
        	<label for="frm_usuario_amaterno">Apellido Materno</label>
        		<input type="text" class="form-control" id="frm_usuario_amaterno" name="frm_usuario_amaterno" value="<?= $objeto->getAmaterno(); ?>" placeholder="Apellido Materno" maxlength="250" />
        	</div>
        	<div class="form-group col">
        	<label for="frm_usuario_usuario">Usuario <abbr class="text-danger" title="Campo Obligatorio">(obligatorio)</abbr></label>
        		<input type="text" class="form-control" id="frm_usuario_usuario" name="frm_usuario_usuario" value="<?= $objeto->getUsuario(); ?>" placeholder="Usuario" maxlength="250" />
        	</div>
        	<div class="form-group col">
        	<label for="frm_usuario_email">Correo Electrónico <abbr class="text-danger" title="Campo Obligatorio">(obligatorio)</abbr></label>
        		<input type="email" class="form-control" id="frm_usuario_email" name="frm_usuario_email" value="<?= $objeto->getEmail(); ?>" placeholder="Correo Electrónico" maxlength="250" />
        	</div>
        </div>
        <div class="form-row">
        	<div class="form-group col">
        		<label>
        			<input type="checkbox" value="1" id="frm_usuario_activo" name="frm_usuario_activo" <?= ($objeto->getActivo()==1?'checked="checked"':''); ?> />
        			Activo
        		</label>
        	</div>
        </div>
        <div class="form-row">
        <div class="col">
        	<fieldset>
        		<legend>Perfiles</legend>
        		<?php if($perfiles!==false) foreach($perfiles as $perfil): ?>
        			<div class="checkbox">
        				<label>
        					<input type="checkbox" value="<?= $perfil["idperfil"]; ?>" id="frm_usuario_perfiles[]" name="frm_usuario_perfiles[]" <?= (in_array($perfil["idperfil"],$objeto->getPerfiles())?' checked="checked"':''); ?> />
        					<?= $perfil["nombre"]; ?>
        				</label>
        			</div>
        		<?php endforeach; ?>
        	</fieldset>
        </div>
		<div class="col">
        	<fieldset>
        		<legend>Grupos</legend>
        		<?php if($grupos!==false) foreach($grupos as $grupo): ?>
        			<div class="checkbox">
        				<label>
        					<input type="checkbox" value="<?= $grupo["idgrupo"]; ?>" id="frm_usuario_grupos[]" name="frm_usuario_grupos[]" <?= (in_array($grupo["idgrupo"],$objeto->getGrupos())?' checked="checked"':''); ?> />
        					<?= $grupo["nombre"]; ?>
        				</label>
        			</div>
        		<?php endforeach; ?>
        	</fieldset>
        </div>
        </div>
		<button type="button" class="btn btn-outline-primary" onclick="Usuario.Enviar(<?= ($objeto->getIdusuario()!="" && $objeto->getIdusuario()!=0?'false':'true'); ?>)" >Guardar</button>
		<button type="button" class="btn btn-outline-secondary" onclick="location.href='<?= base_url('usuarios'); ?>'">Cancelar</button>
	</form>
</div>
