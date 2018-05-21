<!-- Vista cliente/vista -->
<?= $menumain; ?>
<div class="container">
	<div class="btn-toolbar float-right" role="toolbar">
		<div class="btn-group" role="group">
			<?php if($this->modsesion->hasPermisoHijo(5)): ?>
			<button type="button" class="btn btn-outline-secondary" title="Ver todos los Clientes" onclick="location.href='<?= base_url('clientes/index/'.$sucursal->getIdempresa().'/'.$sucursal->getIdsucursal()); ?>';">
				<i class="fas fa-th-list"></i>
			</button>
			<?php endif;
			if($this->modsesion->hasPermisoHijo(25)):?>
			<button type="button" class="btn btn-outline-secondary" title="Ver la Sucursal Asociada" onclick="location.href='<?= base_url('sucursales/ver/'.$sucursal->getIdsucursal()); ?>';">
				<i class="fas fa-eye"></i>
			</button>
			<?php endif;
			if($this->modsesion->hasPermisoHijo(66)):?>
			<button type="button" class="btn btn-outline-secondary" title="Ver Generadores del Cliente" onclick="location.href=location.href.replace('#dataGeneradores','')+'#dataGeneradores';">
				<i class="fas fa-tags"></i>
			</button>
			<?php endif;
			if($this->modsesion->hasPermisoHijo(67)):?>
			<button type="button" class="btn btn-outline-secondary" title="Actualizar Cliente" onclick="location.href='<?= base_url('clientes/actualizar/'.$objeto->getIdcliente()); ?>';">
				<i class="far fa-edit"></i>
			</button>
			<?php endif;
			if($this->modsesion->hasPermisoHijo(68)):?>
			<button type="button" class="btn btn-outline-secondary" title="Borrar Cliente	" onclick="Cliente.Eliminar(<?= $sucursal->getIdempresa(); ?>,<?= $sucursal->getIdsucursal(); ?>,<?= $objeto->getIdcliente(); ?>)">
				<i class="far fa-trash-alt"></i>
			</button>
			<?php endif; ?>
		</div>
	</div>
	<h3>Clientes</h3>
	<form autocomplete="off" id="frm_clientes">
		<div class="form-row"><div class="form-group">
			<label for="frm_cliente_razonsocial">Razón Social</label>
			<div class="col-sm-10">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getRazonsocial(); ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group">
			<label for="frm_cliente_nombrecorto">Nombre Corto</label>
			<div class="col-sm-10">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getNombreCorto(); ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group">
			<label for="frm_cliente_identificador">Número de Cliente</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getIdentificador(); ?>" />
			</div>
			<label for="frm_cliente_rfc">Registro Federal de Contribuyentes</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getRfc(); ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group">
			<label for="frm_cliente_vendedor">Vendedor</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?php 
						if($vendedor!==false) 
							foreach($vendedor["opciones"] as $opc) 
								if($opc["idcatalogodet"]==$objeto->getVendedor()) 
								{ 
									echo $opc["descripcion"]; 
									break; 
								} 
					?>" />
			</div>
			<label for="frm_cliente_afiliacion">Afiliación</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getAfiliacion(); ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group">
			<label for="frm_cliente_giro">Giro</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getGiro(); ?>" />
			</div>
			<label for="frm_cliente_fechaalta">Fecha de Alta en Sistema</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= DateToMx($objeto->getFechaalta()); ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group">
			<label for="frm_cliente_status">Estatus</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?php 
						if($estatuscliente!==false) 
							foreach($estatuscliente["opciones"] as $opc) 
								if($opc["idcatalogodet"]==$objeto->getStatus()) 
								{ 
									echo $opc["descripcion"]; 
									break; 
								} 
					?>" />
			</div>
			<label for="frm_cliente_fechastatus">Fecha Cambio Status</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= DateToMx($objeto->getFechastatus()); ?>" />
			</div>
		</div>
		<h5>Contrato</h5>
		<div class="form-row"><div class="form-group">
			<label for="frm_cliente_fechacontratoinicio">Fecha de Inicio</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= DateToMx($objeto->getFechacontratoinicio()); ?>" />
			</div>
			<label for="frm_cliente_fechacontratofin">Fecha de Termino</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= DateToMx($objeto->getFechacontratofin()); ?>" />
			</div>
		</div>
		<h5>Servicios</h5>
		<div class="form-row"><div class="form-group">
			<label for="frm_cliente_fechaserviciosinicio">Fecha de Inicio</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= DateToMx($objeto->getFechaserviciosinicio()); ?>" />
			</div>
			<label for="frm_cliente_fechaserviciosfin">Fecha de Termino</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= DateToMx($objeto->getFechaserviciosfin()); ?>" />
			</div>
		</div>
		<h5>Dirección</h5>
		<div class="form-row"><div class="form-group">
			<label for="frm_cliente_calle">Calle</label>
			<div class="col-sm-10">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getCalle(); ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group">
			<label for="frm_cliente_numexterior">Número Exterior</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getNumexterior(); ?>" />
			</div>
			<label for="frm_cliente_numinterior">Número Interior</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getNuminterior(); ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group">
		    <label for="frm_cliente_cp">Código Postal</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getCp(); ?>" />
			</div>
			<label for="frm_cliente_colonia">Colonia</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getColonia(); ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group">
			<label for="frm_cliente_municipio">Delegación o Municipio</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getMunicipio(); ?>" />
			</div>
			<label for="frm_cliente_estado">Estado</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getEstado(); ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group">
			<label for="frm_cliente_referencias">Referencias</label>
			<div class="col-sm-10">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getReferencias(); ?>" />
			</div>
		</div>
		<h5>Contacto</h5>
		<div class="form-row"><div class="form-group">
			<label for="frm_cliente_representante">Representante</label>
			<div class="col-sm-10">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getRepresentante(); ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group">
			<label for="frm_cliente_representantecargo">Cargo</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getRepresentantecargo(); ?>" />
			</div>
			<label for="frm_cliente_representanteemail">Correo Electrónico</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getRepresentanteemail(); ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group">
			<label for="frm_cliente_representantetelefono">Teléfono</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getRepresentantetelefono(); ?>" />
			</div>
			<label for="frm_cliente_representanextension">Extensión</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getRepresentanteextencion(); ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group">
			<label for="frm_cliente_representantetelefono2">Teléfono 2</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getRepresentantetelefono2(); ?>" />
			</div>
			<label for="frm_cliente_representanextension2">Extensión 2</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getRepresentanteextension2(); ?>" />
			</div>
		</div>
		<h5>Notas y Observaciones</h5>
		<div class="form-row"><div class="form-group">
			<div class="col-sm-12">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getObservaciones(); ?>" />
			</div>
		</div>
		<h5>Facturación</h5>
		<div id="facturacion"><?= $facturaciones; ?></div>
		<div class="form-row"><div class="form-group">
			<div class="col-sm-3">
				<div class="checkbox">
					<label>
						<input disabled="disabled" type="checkbox" id="frm_cliente_facturaxgenerador" name="frm_cliente_facturaxgenerador" value="1" <?= ($objeto->getFacturaxgenerador()==1?'checked="checked"':''); ?> />
						Factura por generador
					</label>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="checkbox">
					<label>
						<input disabled="disabled" type="checkbox" id="frm_cliente_ordencompra" name="frm_cliente_ordencompra" value="1" <?= ($objeto->getOrdencompra()==1?'checked="checked"':''); ?> />
						Orden de Compra
					</label>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="checkbox">
					<label>
						<input disabled="disabled" type="checkbox" id="frm_cliente_desglosemanifiestos" name="frm_cliente_desglosemanifiestos" value="1" <?= ($objeto->getDesglosemanifiestos()==1?'checked="checked"':''); ?> />
						Desglosar Manifiestos
					</label>
				</div>
			</div>
		</div>
		<div class="form-row"><div class="form-group">
			<label for="frm_cliente_leyendas">Leyendas</label>
			<div class="col-sm-10">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getLeyendas(); ?>" />
			</div>
		</div>
		<h5>Cobranza</h5>
		<div class="form-row"><div class="form-group">
			<label for="frm_cliente_diascredito">Días de Crédito</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?php 
						if($diascredito!==false) 
							foreach($diascredito["opciones"] as $opc) 
								if($opc["idcatalogodet"]==$objeto->getDiascredito()) 
								{ 
									echo $opc["descripcion"]; 
									break; 
								} 
					?>" />
			</div>
			<label for="frm_cliente_referenciabancaria">Referencia Bancaria</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getReferenciabancaria(); ?>" />
			</div>
		</div>		
		<div class="form-row"><div class="form-group">
			<label for="frm_cliente_metodopago">Método de Pago</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getMetodoPago(); ?>" />
			</div>
			<label for="frm_cliente_referenciapago">Referencia de Pago</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getReferenciaPago(); ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group">
			<label for="frm_cliente_cobranzacontacto">Contacto</label>
			<div class="col-sm-10">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getCobranzacontacto(); ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group">
			<label for="frm_cliente_cobranzaemail">Correo Electrónico</label>
			<div class="col-sm-10">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getCobranzaemail(); ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group">
			<label for="frm_cliente_cobranzatelefono">Teléfono</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getCobranzatelefono(); ?>" />
			</div>
			<label for="frm_cliente_cobranzaextension">Extensión</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getCobranzaextension(); ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group">
			<label for="frm_cliente_cobranzatelefono2">Teléfono 2</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getCobranzatelefono2(); ?>" />
			</div>
			<label for="frm_cliente_cobranzaextension2">Extensión 2</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getCobranzaextension2(); ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group">
			<label for="frm_cliente_cobranzaobservaciones">Observaciones</label>
			<div class="col-sm-10">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getCobranzaobservaciones(); ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group">
			<label for="frm_cliente_cobranzacalle">Calle</label>
			<div class="col-sm-10">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getCobranzacalle(); ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group">
			<label for="frm_cliente_cobranzanumexterior">Número Exterior</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getCobranzanumexterior(); ?>" />
			</div>
			<label for="frm_cliente_cobranzanuminterior">Número Interior</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getCobranzanuminterior(); ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group">
		    <label for="frm_cliente_cobranzacp">Código Postal</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getCobranzacp(); ?>" />
			</div>
			<label for="frm_cliente_cobranzacolonia">Colonia</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getCobranzacolonia(); ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group">
			<label for="frm_cliente_cobranzamunicipio">Delegación o Municipio</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getCobranzamunicipio(); ?>" />
			</div>
			<label for="frm_cliente_cobranzaestado">Estado</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getCobranzaestado(); ?>" />
			</div>
		</div>
		<h5>Facturación Electrónica</h5>
		<div class="form-row"><div class="form-group">
			<label for="frm_cliente_categoria">Categoria</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?php if( $categorias !== false ) foreach( $categorias[ "opciones" ] as $opc): ?>
						<?= ( $opc[ "idcatalogodet" ] == $objeto->getCategoria() ? $opc[ "descripcion" ] : '' ); ?>
					<?php endforeach; ?>" />
			</div>
			<label for="frm_cliente_cfdi_moneda">Moneda</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?php if( $monedas !== false ) foreach( $monedas[ "opciones" ] as $opc): ?>
						<?= ( $opc[ "idcatalogodet" ] == $objeto->getCfdi_moneda() ? $opc[ "descripcion" ] : '' ); ?>
					<?php endforeach; ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group">
			<label for="frm_cliente_cfdi_formapago">Forma de Pago</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="
					<?php if( $formaspago !== false ) foreach( $formaspago[ "opciones" ] as $opc): ?>
						<?= ( $opc[ "idcatalogodet" ] == $objeto->getcfdi_formapago() ? $opc[ "descripcion" ] : '' ); ?>
					<?php endforeach; ?>
				</p>
			</div>
			<label for="frm_cliente_cfdi_metodopago">Método de Pago</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?php if( $metodospago !== false ) foreach( $metodospago[ "opciones" ] as $opc): ?>
						<?= ( $opc[ "idcatalogodet" ] == $objeto->getcfdi_metodopago() ? $opc[ "descripcion" ] : '' ); ?>
					<?php endforeach; ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group">
			<label for="frm_cliente_cfdi_usocfdi">Uso del CFDi</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?php if( $usoscfdi !== false ) foreach( $usoscfdi[ "opciones" ] as $opc): ?>
						<?= ( $opc[ "idcatalogodet" ] == $objeto->getCfdi_usocfdi() ? $opc[ "descripcion" ] : '' ); ?>
					<?php endforeach; ?>" />
			</div>
			<label for="frm_cliente_cfdi_claveprodserv">Producto</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?php if( $clavesproducto !== false ) foreach( $clavesproducto[ "opciones" ] as $opc): ?>
						<?= ( $opc[ "idcatalogodet" ] == $objeto->getCfdi_claveprodserv() ? $opc[ "descripcion" ] : '' ); ?>
					<?php endforeach; ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group">
			<label for="frm_cliente_cfdi_claveunidad">Clave Unidad</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?php if( $clavesunidad !== false ) foreach( $clavesunidad[ "opciones" ] as $opc): ?>
						<?= ( $opc[ "idcatalogodet" ] == $objeto->getCfdi_claveunidad() ? $opc[ "descripcion" ] : '' ); ?>
					<?php endforeach; ?>" />
			</div>
			<label for="frm_cliente_cfdi_unidad">Unidad</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getCfdi_unidad(); ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group">
			<label for="frm_cliente_cfdi_impuesto">Impuesto</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?php if( $impuestos !== false ) foreach( $impuestos[ "opciones" ] as $opc): ?>
						<?= ( $opc[ "idcatalogodet" ] == $objeto->getCfdi_Impuesto() ? $opc[ "descripcion" ] : '' ); ?>
					<?php endforeach; ?>" />
			</div>
			<label for="frm_cliente_cfdi_tipofactor">Tipo Factor</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?php if( $tiposfactor !== false ) foreach( $tiposfactor[ "opciones" ] as $opc): ?>
						<?= ( $opc[ "idcatalogodet" ] == $objeto->getCfdi_tipofactor() ? $opc[ "descripcion" ] : '' ); ?>
					<?php endforeach; ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group">
			<label for="frm_cliente_cfdi_tasaocuota">Impuesto Tasa o Cuota</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?php if( $tasas !== false ) foreach( $tasas[ "opciones" ] as $opc): ?>
						<?= ( $opc[ "idcatalogodet" ] == $objeto->getCfdi_tasaocuota() ? $opc[ "descripcion" ] : '' ); ?>
					<?php endforeach; ?>" />
			</div>
			<label for="frm_cliente_cfdi_base">Impuesto Base</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getCfdi_base(); ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group">
			<label for="frm_cliente_banco">Banco</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getBanco(); ?>" />
			</div>
			<label for="frm_cliente_rfcbanco">RFC</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getRfcbanco(); ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group">
			<label for="frm_cliente_cuenta">Cuenta</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getCuenta(); ?>" />
			</div>
			<label for="frm_cliente_clabe">CLABE</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getClabe(); ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group">
			<label for="frm_cliente_correo">Correo</label>
			<div class="col-sm-10">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getCorreo(); ?>" />
			</div>
		</div>
	</form>
	<?php if($this->modsesion->hasPermisoHijo(66)):?>
	<hr />
	<div id="dataGeneradores">
		<div class="btn-toolbar float-right" role="toolbar">
			<div class="btn-group" role="group">
				<?php if($this->modsesion->hasPermisoHijo(75)):?>
				<button type="button" class="btn btn-outline-secondary" title="Nuevo Generador" onclick="location.href='<?= base_url('generadores/nuevo/'.$objeto->getIdcliente());?>';">
					<i class="far fa-file-alt"></i>
				</button>
				<?php endif;?>
			</div>
		</div>
		<h4>Generadores</h4>
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Número de Generador</th>
						<th>Nombre</th>
						<th>Ubicación</th>
						<th>Número de Registro Ambiental</th>
						<!--<th>Número de Registro como Generador</th>
						<th>Servicios</th>-->
						<th>Horario</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>Número de Generador</th>
						<th>Nombre</th>
						<th>Ubicación</th>
						<th>Número de Registro Ambiental</th>
						<!--<th>Número de Registro como Generador</th>
						<th>Servicios</th>-->
						<th>Horario</th>
					</tr>
				</tfoot>
				<tbody>
					<?php if($generadores!==false) foreach($generadores as $generador): ?>
						<tr>
							<td data-order="<?= Refill($generador["identificador"],10,"0"); ?>">
								<a href="<?= base_url('generadores/ver/'.$generador["idgenerador"]); ?>">
									<?= $generador["identificador"]; ?>
								</a>
							</td>
							<td><?= $generador["razonsocial"]; ?></td>
							<td><?= "{$generador["municipio"]}, {$generador["estado"]}"; ?></td>
							<td><?= $generador["numregamb"]; ?></td>
							<!--<td><?= $generador["numreggen"]; ?></td>
							<td>
								<?= $generador["serviciolunes"]==1?" Lunes, ":""; ?>
								<?= $generador["serviciomartes"]==1?" Martes, ":""; ?>
								<?= $generador["serviciomiercoles"]==1?" Miércoles, ":""; ?>
								<?= $generador["serviciojueves"]==1?" Jueves, ":""; ?>
								<?= $generador["servicioviernes"]==1?" Viernes, ":""; ?>
								<?= $generador["serviciosabado"]==1?" Sábado, ":""; ?>
								<?= $generador["serviciodomingo"]==1?" Domingo ":""; ?>
							</td>-->
							<td><?= "{$generador["horarioinicio"]} a {$generador["horariofin"]} y {$generador["horarioinicio2"]} a {$generador["horariofin2"]}"; ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
	<?php endif;?>
</div>
<!-- Vista cliente/vista End -->