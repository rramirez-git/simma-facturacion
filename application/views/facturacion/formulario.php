<!-- Vista facturacion/formulario -->
<form autocomplete="off" id="frm_facturacion">
	<div class="form-row"><div class="form-group col">
		<label for="frm_facturacion_tiposervicio">Tipo de Servicio</label>
			<select id="frm_facturacion_tiposervicio" name="frm_facturacion_tiposervicio" class="form-control">
				<?php if($tiposervicio!==false) foreach($tiposervicio["opciones"] as $opc): ?>
					<option value="<?= $opc["idcatalogodet"]; ?>" <?= ($opc["idcatalogodet"]==$objeto->getTiposervicio()?'selected="selected"':''); ?> >
						<?= $opc["descripcion"]; ?>
					</option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="form-group col">
		<label for="frm_facturacion_tipocobro">Tipo de Cobro</label>
			<select id="frm_facturacion_tipocobro" name="frm_facturacion_tipocobro" class="form-control">
				<?php if($tipocobro!==false) foreach($tipocobro["opciones"] as $opc): ?>
					<option value="<?= $opc["idcatalogodet"]; ?>" <?= ($opc["idcatalogodet"]==$objeto->getTipocobro()?'selected="selected"':''); ?> >
						<?= $opc["descripcion"]; ?>
					</option>
				<?php endforeach; ?>
			</select>
		</div>
	</div>
	<div class="form-row"><div class="form-group col">
		<label for="frm_facturacion_precio">Precio</label>
			<input type="text" class="form-control" id="frm_facturacion_precio" name="frm_facturacion_precio" value="<?= $objeto->getPrecio(); ?>" placeholder="Precio" />
		</div>
		<div class="form-group col">
		<label for="frm_facturacion_kilosintegrados">Unidades Integradas</label>
			<input type="text" class="form-control" id="frm_facturacion_kilosintegrados" name="frm_facturacion_kilosintegrados" value="<?= $objeto->getKilosintegrados(); ?>" placeholder="Unidades Integrades" />
		</div>
	</div>
	<div class="form-row"><div class="form-group col">
		<label for="frm_facturacion_kiloexcedido">Precio Unidades Excedidas</label>
			<input type="text" class="form-control" id="frm_facturacion_kiloexcedido" name="frm_facturacion_kiloexcedido" value="<?= $objeto->getKiloexcedido(); ?>" placeholder="Precio Unidad Excedida" />
		</div>
		<div class="form-group col">
		<label for="frm_facturacion_unidad">Unidad</label>
			<select id="frm_facturacion_unidad" name="frm_facturacion_unidad" class="form-control">
				<?php if($unidad!==false) foreach($unidad["opciones"] as $opc): ?>
					<option value="<?= $opc["idcatalogodet"]; ?>" <?= ($opc["idcatalogodet"]==$objeto->getUnidad()?'selected="selected"':''); ?> >
						<?= $opc["descripcion"]; ?>
					</option>
				<?php endforeach; ?>
			</select>
		</div>
	</div>
</form>
<!-- Vista facturacion/formulario End -->