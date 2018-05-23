<!-- Vista facturacion/vista -->
<div id="facturacion<?= $objeto->getIdfacturacion(); ?>">
	<fieldset>
		<legend>
		    <?php if(isset($modoedicion) && $modoedicion===true): ?>
				<button type="button" class="btn btn-outline-secondary btn-sm" onclick="Cliente.EliminaFacturacion(<?= $objeto->getIdfacturacion(); ?>)">
					<i class="fas fa-minus"></i>
				</button>
			<?php endif; ?>
			Esquema de Facturación
		</legend>
	<div class="form-row"><div class="form-group col">
		<input type="hidden" id="frm_cliente_facturaciones[]" name="frm_cliente_facturaciones[]" value="<?= $objeto->getIdfacturacion(); ?>" />
		<label for="frm_cliente_tiposervicio">
			Tipo de Servicio
		</label>
			<input class="form-control" disabled="disabled" value="<?php 
					if($tiposervicio!==false) 
						foreach($tiposervicio["opciones"] as $opc) 
							if($opc["idcatalogodet"]==$objeto->getTiposervicio()) 
							{ 
								echo $opc["descripcion"]; 
								break; 
							} 
				?>" />
		</div>
		<div class="form-group col">
		<label for="frm_cliente_tipocobro">Tipo de Cobro</label>
			<input class="form-control" disabled="disabled" value="<?php 
					if($tipocobro!==false) 
						foreach($tipocobro["opciones"] as $opc) 
							if($opc["idcatalogodet"]==$objeto->getTipocobro()) 
							{ 
								echo $opc["descripcion"]; 
								break; 
							} 
				?>" />
		</div>
		<div class="form-group col">
		<label for="frm_cliente_kilosintegrados">Unidades Integradas</label>
			<input class="form-control" disabled="disabled" value="<?= $objeto->getKilosintegrados(); ?>" />
		</div>
	</div>
	<div class="form-row"><div class="form-group col">
		<label for="frm_cliente_precio">Precio</label>
			<input class="form-control" disabled="disabled" value="$ <?= number_format($objeto->getPrecio(),2); ?>" />
		</div>
		<div class="form-group col">
		<label for="frm_cliente_kiloexcedido">Precio Unidades Excedidas</label>
			<input class="form-control" disabled="disabled" value="<?= $objeto->getKiloexcedido(); ?>" />
		</div>
		<div class="form-group col">
		<label for="frm_cliente_unidad">Unidad</label>
			<input class="form-control" disabled="disabled" value="<?php 
					if($unidad!==false) 
						foreach($unidad["opciones"] as $opc) 
							if($opc["idcatalogodet"]==$objeto->getUnidad()) 
							{ 
								echo $opc["descripcion"]; 
								break; 
							} 
				?>" />
		</div>
	</div>
	</fieldset>
</div>
<!-- Vista facturacion/vista End -->