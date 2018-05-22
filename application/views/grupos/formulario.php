<?= $menumain; ?>
<div class="container">
	<h3>Grupos</h3>
	<form autocomplete="off" id="frm_grupos">
        <input type="hidden" id="frm_grupo_idgrupo" name="frm_grupo_idgrupo" value="<?= $objeto->getIdgrupo(); ?>" />
        <input type="hidden" id="frm_grupo_usuarios" name="frm_grupo_usuarios" value="<?= implode(",",$objeto->getUsuarios()); ?>" />
        <input type="hidden" id="frm_grupo_generadores" name="frm_grupo_generadores" value="<?= implode(",",$objeto->getGeneradores()); ?>" />
        <input type="hidden" id="frm_grupo_clientes" name="frm_grupo_clientes" value="<?= implode(",",$objeto->getClientes()); ?>" />
        <input type="hidden" id="frm_grupo_sucursales" name="frm_grupo_sucursales" value="<?= implode(",",$objeto->getSucursales()); ?>" />
        <div class="form-row"><div class="form-group col">
        	<label for="frm_grupo_nombre">Nombre <abbr class="text-danger" title="Campo Obligatorio">(obligatorio)</abbr></label>
        		<input type="text" class="form-control" id="frm_grupo_nombre" name="frm_grupo_nombre" value="<?= $objeto->getNombre(); ?>" placeholder="Nombre del grupo" maxlength="250" />
        	</div>
        </div>
        <div class="form-row"><div class="form-group col">
        	<label for="frm_grupo_descripcion">Descripción</label>
        		<textarea rows="3" class="form-control" id="frm_grupo_descripcion" name="frm_grupo_descripcion"><?= $objeto->getDescripcion(); ?></textarea>
        	</div>
        </div>
        	<fieldset>
        		<legend>
        			<button type="button" class="btn btn-outline-secondary btn-sm" onclick="Grupo.FrmUpdSucursales()">
        				<i class="fas fa-sync-alt"></i>
        				Actualizar
        			</button>
        			Sucursales Asignadas
        		</legend>
        		<div id="messageSuc" class="alert alert-warning">
        			<i class="fas fa-exclamation-triangle"></i>
        			Es necesario guardar el grupo para visualizar los elementos del grupo actualizados.
        		</div>
        		<?php foreach($sucs as $e): ?>
        			<h4><?= $e["empresa"]?></h4>
        			<?php foreach($e["sucs"] as $s): ?>
        				<p><?= $s["sucursal"]; ?></p>
        			<?php endforeach; ?>
        		<?php endforeach; ?>
        	</fieldset>
        	<fieldset>
        		<legend>
        			<button type="button" class="btn btn-outline-secondary btn-sm" onclick="Grupo.FrmUpdClientes()">
        				<i class="fas fa-sync-alt"></i>
        				Actualizar
        			</button>
        			Clientes Asignados
        		</legend>
        		<div id="messageCte" class="alert alert-warning">
        			<i class="fas fa-exclamation-triangle"></i>
        			Es necesario guardar el grupo para visualizar los elementos del grupo actualizados.
        		</div>
        		<?php foreach($ctes as $e): ?>
        			<h4><?= $e["empresa"]?></h4>
        			<?php foreach($e["sucs"] as $s): ?>
        				<h5><?= $s["sucursal"]; ?></h5>
        				<?php foreach($s["ctes"] as $c): ?>
        					<p><?= $c; ?></p>
        				<?php endforeach; ?>
        			<?php endforeach; ?>
        		<?php endforeach; ?>
        	</fieldset>
        	<fieldset>
        		<legend>
        			<button type="button" class="btn btn-outline-secondary btn-sm" onclick="Grupo.FrmUpdGeneradores()">
        				<i class="fas fa-sync-alt"></i>
        				Actualizar
        			</button>
        			Generadores Asignados
        		</legend>
        		<div id="messageGen" class="alert alert-warning">
        			<i class="fas fa-exclamation-triangle"></i>
        			Es necesario guardar el grupo para visualizar los elementos del grupo actualizados.
        		</div>
        		<?php foreach($gens as $e): ?>
        			<h4><?= $e["empresa"]?></h4>
        			<?php foreach($e["sucs"] as $s): ?>
        				<h5><?= $s["sucursal"]; ?></h5>
        				<?php foreach($s["ctes"] as $c) foreach($c["gens"] as $g): ?>
        					<p><?= $g; ?></p>
        				<?php endforeach; ?>
        			<?php endforeach; ?>
        		<?php endforeach; ?>
        	</fieldset>
        <button type="button" class="btn btn-outline-primary" onclick="Grupo.Enviar(<?= ($objeto->getIdgrupo()!="" && $objeto->getIdgrupo()!=0?'false':'true'); ?>)" >Guardar</button>
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='<?= base_url('grupos'); ?>'">Cancelar</button>
	</form>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#messageSuc").hide();
		$("#messageCte").hide();
		$("#messageGen").hide();
	});
</script>