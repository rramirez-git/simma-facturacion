<?= $menumain; ?>
<div class="container">
	<h3>Residuos</h3>
	<form autocomplete="off" id="frm_residuos">
		<input type="hidden" id="frm_residuo_idresiduo" name="frm_residuo_idresiduo" value="<?= $objeto->getIdresiduo(); ?>" />
		<input type="hidden" id="frm_residuo_idsucursal" name="frm_residuo_idsucursal" value="<?= $idsucursal; ?>" />
		<div class="form-row"><div class="form-group col">
            <label for="frm_residuo_nombre">Residuo <abbr class="text-danger" title="Campo Obligatorio">(obligatorio)</abbr></label>
				<input type="text" class="form-control" id="frm_residuo_nombre" name="frm_residuo_nombre" value="<?= $objeto->getNombre(); ?>" placeholder="Nombre del Residuo" />
			</div>
			<div class="form-group col">
			<label for="frm_residuo_nom052">Residuo Norma-052 <abbr class="text-danger" title="Campo Obligatorio">(obligatorio)</abbr></label>
				<input type="text" class="form-control" id="frm_residuo_nom052" name="frm_residuo_nom052" value="<?= $objeto->getNom052(); ?>" placeholder="Residuo Norma-052" />
			</div>
			<div class="form-group col">
			<label for="frm_residuo_tiporesiduo">Tipo de Residuo</label>
				<select class="form-control" id="frm_residuo_tiporesiduo" name="frm_residuo_tiporesiduo">
					<?php 
						if($tiporesiduo["opciones"]!==false) 
							foreach($tiporesiduo["opciones"] as $opc)
							{
								?>
								<option value="<?= $opc["idcatalogodet"]; ?>" <?= ($opc["idcatalogodet"]==$objeto->getTiporesiduo()?'selected="selected"':'')?>><?= $opc["descripcion"]; ?></option>
								<?php
							}
					?>
				</select>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col">
					<label>
						<input type="checkbox" value="1" id="frm_residuo_c" name="frm_residuo_c" <?= ($objeto->getC()==1?'checked="checked"':''); ?> />
						C
					</label>
			</div>
			<div class="form-group col">
					<label>
						<input type="checkbox" value="1" id="frm_residuo_r" name="frm_residuo_r" <?= ($objeto->getR()==1?'checked="checked"':''); ?> />
						R
					</label>
			</div>
			<div class="form-group col">
					<label>
						<input type="checkbox" value="1" id="frm_residuo_e" name="frm_residuo_e" <?= ($objeto->getE()==1?'checked="checked"':''); ?> />
						E
					</label>
			</div>
			<div class="form-group col">
					<label>
						<input type="checkbox" value="1" id="frm_residuo_t" name="frm_residuo_t" <?= ($objeto->getT()==1?'checked="checked"':''); ?> />
						T
					</label>
			</div>
			<div class="form-group col">
					<label>
						<input type="checkbox" value="1" id="frm_residuo_i" name="frm_residuo_i" <?= ($objeto->getI()==1?'checked="checked"':''); ?> />
						I
					</label>
			</div>
			<div class="form-group col">
					<label>
						<input type="checkbox" value="1" id="frm_residuo_b" name="frm_residuo_b" <?= ($objeto->getB()==1?'checked="checked"':''); ?> />
						B
					</label>
			</div>
		</div>
		<div class="form-row"><div class="form-group col">
					<label>
						<input type="checkbox" value="1" id="frm_residuo_reportecoa" name="frm_residuo_reportecoa" <?= ($objeto->getReportecoa()==1?'checked="checked"':''); ?> />
						Este residuo se reporta en COA
					</label>
			</div>
			<div class="form-group col">
					<label>
						<input type="checkbox" value="1" id="frm_residuo_mostrar_default" name="frm_residuo_mostrar_default" <?= ($objeto->getMostrar_default()==1?'checked="checked"':''); ?> />
						Mostrar para Captura Default
					</label>
			</div>
		</div>
		<button type="button" class="btn btn-outline-primary" onclick="Residuo.Enviar(<?= ($objeto->getIdresiduo()!="" && $objeto->getIdresiduo()!=0?'false':'true'); ?>)" >Guardar</button>
		<button type="button" class="btn btn-outline-secondary" onclick="location.href='<?= base_url('residuos'); ?>'">Cancelar</button>
	</form>
</div>