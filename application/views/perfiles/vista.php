<?= $menumain; ?>
<div class="container">
	<div class="btn-toolbar float-right" role="toolbar">
		<div class="btn-group" role="group">
			<?php if($this->modsesion->hasPermisoHijo(28)): ?>
			<button type="button" class="btn btn-outline-secondary" title="Ver todos los Perfiles" onclick="location.href='<?= base_url('perfiles'); ?>';">
				<i class="fas fa-th-list"></i>
			</button>
			<?php endif;
			if($this->modsesion->hasPermisoHijo(90)):?>
			<button type="button" class="btn btn-outline-secondary" title="Actualizar Perfil" onclick="location.href='<?= base_url('perfiles/actualizar/'.$objeto->getIdperfil()); ?>';">
				<i class="far fa-edit"></i>
			</button>
			<?php endif;
			if($this->modsesion->hasPermisoHijo(91)):?>
			<button type="button" class="btn btn-outline-secondary" title="Borrar Perfil" onclick="Perfil.Eliminar(<?= $objeto->getIdperfil(); ?>)">
				<i class="far fa-trash-alt"></i>
			</button>
			<?php endif; ?>
		</div>
	</div>
	<h3>Perfiles</h3>
	<form autocomplete="off" id="frm_perfiles">
        <input type="hidden" id="frm_perfil_idperfil" name="frm_perfil_idperfil" value="<?= $objeto->getIdperfil(); ?>" />
        <div class="form-row"><div class="form-group col">
        	<label for="frm_perfil_nombre">Nombre</label>
        	    <input class="form-control" disabled="disabled" value="<?= $objeto->getNombre(); ?>" />
        	</div>
        </div>
        <div class="form-row"><div class="form-group col">
        	<label for="frm_perfil_observaciones">Observaciones</label>
        	    <input class="form-control" disabled="disabled" value="<?= $objeto->getObservaciones(); ?>" />
        	</div>
        </div>
        <div class="form-row">
        	<div class="col">
        		<fieldset>
        			<legend>Permisos</legend>
        			<?php if($permisos!==false) foreach($permisos as $permiso) PrintPermiso($objeto, $permiso); ?>
        		</fieldset>
        	</div>
        	<!--<div class="">
        		<fieldset>
        			<legend>Sucursales</legend>
        			<?php if($sucursales!==false) foreach($sucursales as $emp): ?>
        				<div><strong><?= $emp["razonsocial"] ?></strong></div>
        				<?php if($emp["sucursales"]!==false) foreach($emp["sucursales"] as $suc): ?>
        					<div class="checkbox">
        						<label>
        							<input type="checkbox" id="frm_perfil_sucursales[]" name="frm_perfil_sucursales[]" value="<?= $suc["idsucursal"]; ?>" <?= (in_array($suc["idsucursal"],$objeto->getSucursales())?'checked="checked"':''); ?> disabled="disabled" />
        							<?= $suc["nombre"]; ?>
        						</label>
        					</div>
        				<?php endforeach; ?>
        			<?php endforeach; ?>
        		</fieldset>
        	</div>-->
        </div>
	</form>
</div>
<?php
function PrintPermiso($objeto, $permiso,$level=0)
{
	$levelStr="";
	for($x=1;$x<=$level;$x++)
		$levelStr.="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	?>
	<div class="checkbox">
		<?= $levelStr; ?>
		<label>
			<input type="checkbox" id="frm_perfil_permisos[]" name="frm_perfil_permisos" value="<?= $permiso["idpermiso"]; ?>" <?= (in_array($permiso["idpermiso"],$objeto->getPermisos())?'checked="checked"':''); ?> disabled="disabled" />
			(<?= $permiso["idpermiso"]; ?>) <?= $permiso["nombre"]; ?>
		</label>
	</div>
	<?php
	if($permiso["hijos"]!==false)
		foreach($permiso["hijos"] as $p)
			PrintPermiso($objeto,$p,$level+1);
}
?>