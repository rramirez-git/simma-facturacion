<?php //$cte=new Modcliente(); ?>
<h3>Pre-Factura Libre</h3>

<div class="clearfix"></div>

<form autocomplete="off" method="post">
	<input type="hidden" name="action" value="update" />
	<input type="hidden" name="modcfdi_comprobante_idcliente" value="<?= $fiscales[ "idcliente" ]; ?>" />
	<input type="hidden" name="idsucursal" value="<?= $fiscales[ "idsucursal"]; ?>" />
	<input type="hidden" name="idempresa" value="<?= $fiscales[ "idempresa"]; ?>" />
	<div class="form-row">
		<div class="col form-group">
			<label>Cliente</label>
			<input class="form-control" type="text" readonly="readonly" value="<?= $cte->getIdentificador(). " - " . $cte->getRazonsocial(); ?>" />
		</div>
		<div class="col form-group">
			<label>Tipo de Comprobante</label>
			<input class="form-control" type="text" readonly="readonly" value="<?= $opciones[ "tipodecomprobante" ][ $fiscales[ "tipodecomprobante" ] ] ?>" />
		</div>
	</div>
	<div class="form-row">
		<div class="col form-group">
			<label for="modcfdi_comprobante_fecha">Fecha</label>
			<input class="form-control" type="datetime-local" id="modcfdi_comprobante_fecha" name="modcfdi_comprobante_fecha" value="<?= $fiscales[ "fecha" ]; ?>" />
		</div>
		<div class="col form-group">
			<label for="modcfdi_comprobante_moneda">Moneda</label>
			<select id="modcfdi_comprobante_moneda" name="modcfdi_comprobante_moneda" class="form-control">
				<?php foreach( $opciones[ "moneda" ] as $id => $opc ): ?>
					<option value="<?= $id; ?>" <?= ( $id == $fiscales[ "moneda" ] ? 'selected="selected"' : '' ); ?>><?= $opc; ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="col form-group">
			<label for="modcfdi_comprobante_lugarexpedicion">Lugar de Expedición</label>
			<input class="form-control" type="number" min="1" max="99999" value="<?= $fiscales[ "lugarexpedicion" ]; ?>" id="modcfdi_comprobante_lugarexpedicion" name="modcfdi_comprobante_lugarexpedicion" />
		</div>
	</div>
	<h5>Emisor</h5>
	<div class="form-row">
		<div class="col form-group">
			<label for="modcfdi_comprobante_emisor_rfc">RFC</label>
			<input required="required" class="form-control" type="text" maxlength="13" id="modcfdi_comprobante_emisor_rfc" name="modcfdi_comprobante_emisor_rfc" value="<?= $fiscales[ "emisor_rfc" ]; ?>" >
		</div>
		<div class="col form-group">
			<label for="modcfdi_comprobante_emisor_nombre">Razón Social</label>
			<input required="required" class="form-control" type="text" maxlength="250" id="modcfdi_comprobante_emisor_nombre" name="modcfdi_comprobante_emisor_nombre" value="<?= $fiscales[ "emisor_nombre" ]; ?>" >
		</div>
		<div class="col form-group">
			<label for="modcfdi_comprobante_emisor_regimenfiscal">Regimen Fiscal</label>
			<select id="modcfdi_comprobante_emisor_regimenfiscal" name="modcfdi_comprobante_emisor_regimenfiscal" class="form-control">
				<?php foreach( $opciones[ "regimenfiscal" ] as $id => $opc ): ?>
					<option value="<?= $id; ?>" <?= ( $id == $fiscales[ "emisor_regimenfiscal" ] ? 'selected="selected"' : '' ); ?>><?= $opc; ?></option>
				<?php endforeach; ?>
			</select>
		</div>
	</div>
	<h5>Receptor</h5>
	<div class="form-row">
		<div class="col form-group">
			<label for="modcfdi_comprobante_receptor_rfc">RFC</label>
			<input required="required" class="form-control" type="text" maxlength="13" id="modcfdi_comprobante_receptor_rfc" name="modcfdi_comprobante_receptor_rfc" value="<?= $fiscales[ "receptor_rfc" ]; ?>" >
		</div>
		<div class="col form-group">
			<label for="modcfdi_comprobante_receptor_nombre">Razón Social</label>
			<input required="required" class="form-control" type="text" maxlength="250" id="modcfdi_comprobante_receptor_nombre" name="modcfdi_comprobante_receptor_nombre" value="<?= $fiscales[ "receptor_nombre" ]; ?>" >
		</div>
		<div class="col form-group">
			<label for="modcfdi_comprobante_receptor_residenciafiscal">Residencia Fiscal</label>
			<input required="required" class="form-control" type="number" min="1" max="99999" id="modcfdi_comprobante_receptor_residenciafiscal" name="modcfdi_comprobante_receptor_residenciafiscal" value="<?= $fiscales[ "receptor_residenciafiscal" ]; ?>" >
		</div>
	</div>
	<div class="form-row">
		<div class="col form-group">
			<label for="modcfdi_comprobante_formapago">Forma de Pago</label>
			<select id="modcfdi_comprobante_formapago" name="modcfdi_comprobante_formapago" class="form-control">
				<?php foreach( $opciones[ "formapago" ] as $id => $opc ): ?>
					<option value="<?= $id; ?>" <?= ( $id == $fiscales[ "formapago" ] ? 'selected="selected"' : '' ); ?>><?= $opc; ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="col form-group">
			<label for="modcfdi_comprobante_metodopago">Método de Pago</label>
			<select id="modcfdi_comprobante_metodopago" name="modcfdi_comprobante_metodopago" class="form-control">
				<?php foreach( $opciones[ "metodopago" ] as $id => $opc ): ?>
					<option value="<?= $id; ?>" <?= ( $id == $fiscales[ "metodopago" ] ? 'selected="selected"' : '' ); ?>><?= $opc; ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="col form-group">
			<label for="modcfdi_comprobante_receptor_usocfdi">Uso del CFDi</label>
			<select id="modcfdi_comprobante_receptor_usocfdi" name="modcfdi_comprobante_receptor_usocfdi" class="form-control">
				<?php foreach( $opciones[ "usocfdi" ] as $id => $opc ): ?>
					<option value="<?= $id; ?>" <?= ( $id == $fiscales[ "receptor_usocfdi" ] ? 'selected="selected"' : '' ); ?>><?= $opc; ?></option>
				<?php endforeach; ?>
			</select>
		</div>
	</div>
	<button type="submit" class="btn btn-outline-primary" ><i class="far fa-save"></i> Guardar</button>
	<button type="button" class="btn btn-outline-danger" ><i class="far fa-trash-alt"></i> Eliminar</button>
</form>

<hr />

<?php //$pf=new Modcfdi_comprobante(); ?>
<?php if( $pf->get_field( 'tipodecomprobante_sat_id' ) == "P" ): ?>
	<h5>Pagos <button type="submit" class="btn btn-outline-secondary" title="Agregar"><i class="fas fa-plus"></i></button></h5>
<?php else: ?>
	<h5>Conceptos <a href="<?= base_url( 'prefacturas/agregar-concepto/' . $pf->get_field( $pf->get_pk() ) ) ?>" class="btn btn-outline-secondary" title="Agregar"><i class="fas fa-plus"></i></a></h5>
<?php endif; ?>
