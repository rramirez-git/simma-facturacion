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
        <div class="form-row"><div class="form-group">
        	<label for="frm_usuario_nombre" class="col-sm-2 control-label">Nombre</label>
        	<div class="col-sm-10">
        		<input class="form-control" disabled="disabled" value="<?= $objeto->getNombre(); ?>" />
        	</div>
        </div>
        <div class="form-row"><div class="form-group">
        	<label for="frm_usuario_apaterno" class="col-sm-2 control-label">Apellido Paterno</label>
        	<div class="col-sm-4">
        		<input class="form-control" disabled="disabled" value="<?= $objeto->getApaterno(); ?>" />
        	</div>
        	<label for="frm_usuario_amaterno" class="col-sm-2 control-label">Apellido Materno</label>
        	<div class="col-sm-4">
        		<input class="form-control" disabled="disabled" value="<?= $objeto->getAmaterno(); ?>" />
        	</div>
        </div>
        <div class="form-row"><div class="form-group">
        	<label for="frm_usuario_usuario" class="col-sm-2 control-label">Usuario</label>
        	<div class="col-sm-4">
        		<input class="form-control" disabled="disabled" value="<?= $objeto->getUsuario(); ?>" />
        	</div>
        	<label for="frm_usuario_email" class="col-sm-2 control-label">Correo Electrónico</label>
        	<div class="col-sm-4">
        		<input class="form-control" disabled="disabled" value="<?= $objeto->getEmail(); ?>" />
        	</div>
        </div>
        <div class="col-sm-12">
        	<div class="checkbox">
        		<label>
        			<input type="checkbox" value="1" id="frm_usuario_activo" name="frm_usuario_activo" <?= ($objeto->getActivo()==1?'checked="checked"':''); ?> disabled="disabled" />
        			Activo
        		</label>
        	</div>
        </div>
        <div class="col-sm-6">
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
        <div class="col-sm-6">
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
	</form>
</div>
