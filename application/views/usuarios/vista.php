<?= $menumain; ?>
<div class="container">
	<div class="btn-toolbar float-right" role="toolbar">
		<div class="btn-group" role="group">
			<?php if($this->modsesion->hasPermisoHijo(26)): ?>
			<button type="button" class="btn btn-outline-secondary" title="Ver todos los Usuarios" onclick="location.href='<?= base_url('usuarios'); ?>';">
				<i class="fas fa-th-list"></i>
			</button>
			<?php endif;
			if($this->modsesion->hasPermisoHijo(92)):?>
			<button type="button" class="btn btn-outline-secondary" title="Actualizar Usuario" onclick="location.href='<?= base_url('usuarios/actualizar/'.$objeto->getIdusuario()); ?>';">
				<i class="far fa-edit"></i>
			</button>
			<?php endif;
			if($this->modsesion->hasPermisoHijo(93)):?>
			<button type="button" class="btn btn-outline-secondary" title="Borrar Usuario" onclick="Usuario.Eliminar(<?= $objeto->getIdusuario(); ?>)">
				<i class="far fa-trash-alt"></i>
			</button>
			<?php endif; ?>
		</div>
	</div>
	<h3>Usuarios</h3>
	<form autocomplete="off" id="frm_usuarios">
        <input type="hidden" id="frm_usuario_idusuario" name="frm_usuario_idusuario" value="<?= $objeto->getIdusuario(); ?>" />
        <div class="form-row"><div class="form-group col">
        	<label for="frm_usuario_nombre">Nombre</label>
        		<input class="form-control" disabled="disabled" value="<?= $objeto->getNombre(); ?>" />
        	</div>
        	<div class="form-group col">
        	<label for="frm_usuario_apaterno">Apellido Paterno</label>
        		<input class="form-control" disabled="disabled" value="<?= $objeto->getApaterno(); ?>" />
        	</div>
        	<div class="form-group col">
        	<label for="frm_usuario_amaterno">Apellido Materno</label>
        		<input class="form-control" disabled="disabled" value="<?= $objeto->getAmaterno(); ?>" />
        	</div>
        </div>
        <div class="form-row"><div class="form-group col">
        	<label for="frm_usuario_usuario">Usuario</label>
        		<input class="form-control" disabled="disabled" value="<?= $objeto->getUsuario(); ?>" />
        	</div>
        	<div class="form-group col">
        	<label for="frm_usuario_email">Correo Electrónico</label>
        		<input class="form-control" disabled="disabled" value="<?= $objeto->getEmail(); ?>" />
        	</div>
        </div>
        <div class="form-row">
        	<div class="form-group col">
        		<label>
        			<input type="checkbox" value="1" id="frm_usuario_activo" name="frm_usuario_activo" <?= ($objeto->getActivo()==1?'checked="checked"':''); ?> disabled="disabled" />
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
        					<input type="checkbox" value="<?= $perfil["idperfil"]; ?>" id="frm_usuario_perfiles[]" name="frm_usuario_perfiles[]" <?= (in_array($perfil["idperfil"],$objeto->getPerfiles())?' checked="checked"':''); ?> disabled="disabled" />
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
        					<input type="checkbox" value="<?= $grupo["idgrupo"]; ?>" id="frm_usuario_grupos[]" name="frm_usuario_grupos[]" <?= (in_array($grupo["idgrupo"],$objeto->getGrupos())?' checked="checked"':''); ?> disabled="disabled" />
        					<?= $grupo["nombre"]; ?>
        				</label>
        			</div>
        		<?php endforeach; ?>
        	</fieldset>
        </div>
        </div>
	</form>
</div>
