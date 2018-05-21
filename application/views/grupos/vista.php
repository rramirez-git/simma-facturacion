<?= $menumain; ?>
<div class="container">
	<div class="btn-toolbar float-right" role="toolbar">
		<div class="btn-group" role="group">
			<?php if($this->modsesion->hasPermisoHijo(109)): ?>
			<button type="button" class="btn btn-outline-secondary" title="Ver todos los Grupos" onclick="location.href='<?= base_url('grupos'); ?>';">
				<i class="fas fa-th-list"></i>
			</button>
			<?php endif;
			if($this->modsesion->hasPermisoHijo(112)):?>
			<button type="button" class="btn btn-outline-secondary" title="Actualizar Grupo" onclick="location.href='<?= base_url('grupos/actualizar/'.$objeto->getIdgrupo()); ?>';">
				<i class="far fa-edit"></i>
			</button>
			<?php endif;
			if($this->modsesion->hasPermisoHijo(113)):?>
			<button type="button" class="btn btn-outline-secondary" title="Borrar Grupo" onclick="Grupo.Eliminar(<?= $objeto->getIdgrupo(); ?>)">
				<i class="far fa-trash-alt"></i>
			</button>
			<?php endif; ?>
		</div>
	</div>
	<h3>Grupos</h3>
	<form autocomplete="off" id="frm_grupos">
        <div class="form-row"><div class="form-group">
        	<label for="frm_grupo_nombre" class="col-sm-2 control-label">Nombre</label>
        	<div class="col-sm-10">
        		<input class="form-control" disabled="disabled" value="<?= $objeto->getNombre(); ?></p>
        	</div>
        </div>
        <div class="form-row"><div class="form-group">
        	<label for="frm_grupo_descripcion" class="col-sm-2 control-label">Descripción</label>
        	<div class="col-sm-10">
        		<input class="form-control" disabled="disabled" value="<?= $objeto->getDescripcion(); ?></p>
        	</div>
        </div>
        <div class="form-row"><div class="form-group">
        	<fieldset>
        		<legend>Sucursales Asignadas</legend>
        	</fieldset>
        	<?php foreach($sucs as $e): ?>
        		<h4><?= $e["empresa"]?></h4>
        		<?php foreach($e["sucs"] as $s): ?>
        			<p><?= $s["sucursal"]; ?></p>
        		<?php endforeach; ?>
        	<?php endforeach; ?>
        </div>
        <div class="form-row"><div class="form-group">
        	<fieldset>
        		<legend>Clientes Asignados</legend>
        	</fieldset>
        	<?php foreach($ctes as $e): ?>
        		<h4><?= $e["empresa"]?></h4>
        		<?php foreach($e["sucs"] as $s): ?>
        			<h5><?= $s["sucursal"]; ?></h5>
        			<?php foreach($s["ctes"] as $c): ?>
        				<p><?= $c; ?></p>
        			<?php endforeach; ?>
        		<?php endforeach; ?>
        	<?php endforeach; ?>
        </div>
    	<div class="form-row"><div class="form-group">
        	<fieldset>
        		<legend>Generadores Asignados</legend>
        	</fieldset>
        	<?php foreach($gens as $e): ?>
        		<h4><?= $e["empresa"]?></h4>
        		<?php foreach($e["sucs"] as $s): ?>
        			<h5><?= $s["sucursal"]; ?></h5>
        			<?php foreach($s["ctes"] as $c) foreach($c["gens"] as $g): ?>
        				<p><?= $g; ?></p>
        			<?php endforeach; ?>
        		<?php endforeach; ?>
        	<?php endforeach; ?>
        </div>
	</form>
</div>