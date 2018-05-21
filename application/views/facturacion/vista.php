<!-- Vista facturacion/vista -->
<div id="facturacion<?= $objeto->getIdfacturacion(); ?>">
	<div class="form-row"><div class="form-group">
		<input type="hidden" id="frm_cliente_facturaciones[]" name="frm_cliente_facturaciones[]" value="<?= $objeto->getIdfacturacion(); ?>" />
		<label for="frm_cliente_tiposervicio">
			<?php if(isset($modoedicion) && $modoedicion===true): ?>
				<button type="button" class="btn btn-outline-secondary btn-xs" onclick="Cliente.EliminaFacturacion(<?= $objeto->getIdfacturacion(); ?>)">
					<i class="fas fa-minus"></i>
				</button>
			<?php endif; ?>
			Tipo de Servicio
		</label>
		<div class="col-sm-4">
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
		<label for="frm_cliente_tipocobro">Tipo de Cobro</label>
		<div class="col-sm-4">
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
	</div>
	<div class="form-row"><div class="form-group">
		<label for="frm_cliente_precio">Precio</label>
		<div class="col-sm-4">
			<input class="form-control" disabled="disabled" value="$ <?= number_format($objeto->getPrecio(),2); ?>" />
		</div>
		<label for="frm_cliente_kilosintegrados">Unidades Integradas</label>
		<div class="col-sm-4">
			<input class="form-control" disabled="disabled" value="<?= $objeto->getKilosintegrados(); ?>" />
		</div>
	</div>
	<div class="form-row"><div class="form-group">
		<label for="frm_cliente_kiloexcedido">Precio Unidades Excedidas</label>
		<div class="col-sm-4">
			<input class="form-control" disabled="disabled" value="<?= $objeto->getKiloexcedido(); ?>" />
		</div>
		<label for="frm_cliente_unidad">Unidad</label>
		<div class="col-sm-4">
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
</div>
<!-- Vista facturacion/vista End -->