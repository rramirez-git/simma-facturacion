<?= $menumain; ?>
<div class="container">
	<div class="btn-toolbar float-right" role="toolbar">
		<div class="btn-group" role="group">
			<?php if($this->modsesion->hasPermisoHijo(53)): ?>
			<button type="button" class="btn btn-outline-secondary" title="Ver todos los Residuos" onclick="location.href='<?= base_url('residuos/index/'.$sucursal->getIdempresa().'/'.$sucursal->getIdsucursal()); ?>';">
				<i class="fas fa-th-list"></i>
			</button>
			<?php endif;
			if($this->modsesion->hasPermisoHijo(25)):?>
			<button type="button" class="btn btn-outline-secondary" title="Ver la Sucursal Asociada" onclick="location.href='<?= base_url('sucursales/ver/'.$sucursal->getIdsucursal()); ?>';">
				<i class="fas fa-eye"></i>
			</button>
			<?php endif;
			if($this->modsesion->hasPermisoHijo(71)):?>
			<button type="button" class="btn btn-outline-secondary" title="Actualizar Residuo" onclick="location.href='<?= base_url('residuos/actualizar/'.$objeto->getIdresiduo()); ?>';">
				<i class="far fa-edit"></i>
			</button>
			<?php endif;
			if($this->modsesion->hasPermisoHijo(72)):?>
			<button type="button" class="btn btn-outline-secondary" title="Borrar Residuo" onclick="Residuo.Eliminar(<?= $sucursal->getIdempresa(); ?>,<?= $sucursal->getIdsucursal(); ?>,<?= $objeto->getIdresiduo(); ?>)">
				<i class="far fa-trash-alt"></i>
			</button>
			<?php endif; ?>
		</div>
	</div>
	<h3>Residuos</h3>
	<form autocomplete="off" id="frm_residuos">
		<div class="form-row"><div class="form-group col">
            <label for="frm_residuo_nombre">Residuo</label>
				<input disabled="disabled" type="text" class="form-control" id="frm_residuo_nombre" name="frm_residuo_nombre" value="<?= $objeto->getNombre(); ?>" placeholder="Nombre del Residuo" />
			</div>
			<div class="form-group col">
			<label for="frm_residuo_nom052">Residuo Norma-052</label>
				<input disabled="disabled" type="text" class="form-control" id="frm_residuo_nom052" name="frm_residuo_nom052" value="<?= $objeto->getNom052(); ?>" placeholder="Residuo Norma-052" />
			</div>
			<div class="form-group col">
			<label for="frm_residuo_tiporesiduo">Tipo de Residuo</label>
				<input class="form-control" disabled="disabled" value="<?php 
						if($tiporesiduo["opciones"]!==false) 
							foreach($tiporesiduo["opciones"] as $opc)
								if($opc["idcatalogodet"]==$objeto->getTiporesiduo())
									echo $opc["descripcion"];
					?>" />
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col">
					<label>
						<input disabled="disabled" type="checkbox" value="1" id="frm_residuo_c" name="frm_residuo_c" <?= ($objeto->getC()==1?'checked="checked"':''); ?> />
						C
					</label>
			</div>
			<div class="form-group col">
					<label>
						<input disabled="disabled" type="checkbox" value="1" id="frm_residuo_r" name="frm_residuo_r" <?= ($objeto->getR()==1?'checked="checked"':''); ?> />
						R
					</label>
			</div>
			<div class="form-group col">
					<label>
						<input disabled="disabled" type="checkbox" value="1" id="frm_residuo_e" name="frm_residuo_e" <?= ($objeto->getE()==1?'checked="checked"':''); ?> />
						E
					</label>
			</div>
			<div class="form-group col">
					<label>
						<input disabled="disabled" type="checkbox" value="1" id="frm_residuo_t" name="frm_residuo_t" <?= ($objeto->getT()==1?'checked="checked"':''); ?> />
						T
					</label>
			</div>
			<div class="form-group col">
					<label>
						<input disabled="disabled" type="checkbox" value="1" id="frm_residuo_i" name="frm_residuo_i" <?= ($objeto->getI()==1?'checked="checked"':''); ?> />
						I
					</label>
			</div>
			<div class="form-group col">
					<label>
						<input disabled="disabled" type="checkbox" value="1" id="frm_residuo_b" name="frm_residuo_b" <?= ($objeto->getB()==1?'checked="checked"':''); ?> />
						B
					</label>
			</div>
		</div>
		<div class="form-row"><div class="form-group col">
					<label>
						<input disabled="disabled" type="checkbox" value="1" id="frm_residuo_reportecoa" name="frm_residuo_reportecoa" <?= ($objeto->getReportecoa()==1?'checked="checked"':''); ?> />
						Este residuo se reporta en COA
					</label>
			</div>
			<div class="form-group col">
					<label>
						<input disabled="disabled" type="checkbox" value="1" id="frm_residuo_mostrar_default" name="frm_residuo_mostrar_default" <?= ($objeto->getMostrar_default()==1?'checked="checked"':''); ?> />
						Mostrar para Captura Default
					</label>
			</div>
		</div>
	</form>
</div>