<h3>Nueva Pre-Factura Libre</h3>

<div class="clearfix"></div>

<?php if( null != $message ): ?>
<div class="alert alert-<?= $message[ "type" ]?>" role="alert"><?= $message[ "txt" ]; ?></div>
<?php endif; ?>

<?php if( count( $fiscales ) == 2 ): ?>

<form autocomplete="off" method="post">
	<input type="hidden" name="action" value="nuevo" />
	<div class="form-row">
		<div class="col form-group">
			<label for="no_cte">No. Cliente</label>
			<input class="form-control" type="number" id="no_cte" name="no_cte" required="required" value="<?= $no_cte; ?>" />
		</div>
		<div class="col form-group">
			<label for="no_gen">No. Generador</label>
			<input class="form-control" type="number" id="no_gen" name="no_gen" value="<?= $no_gen; ?>" />
		</div>
	</div>
	<button type="submit" class="btn btn-outline-primary" ><i class="fas fa-angle-right"></i> Continuar</button>
</form>

<?php else: ?>

<form autocomplete="off" method="post">
	<input type="hidden" name="action" value="crear" />
	<input type="hidden" name="modcfdi_comprobante_idcliente" value="<?= $fiscales[ "idcliente" ]; ?>" />
	<input type="hidden" name="idsucursal" value="<?= $fiscales[ "idsucursal"]; ?>" />
	<input type="hidden" name="idempresa" value="<?= $fiscales[ "idempresa"]; ?>" />
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
			<label for="modcfdi_comprobante_tipodecomprobante">Tipo de Comprobante</label>
			<select id="modcfdi_comprobante_tipodecomprobante" name="modcfdi_comprobante_tipodecomprobante" class="form-control">
				<?php foreach( $opciones[ "tipodecomprobante" ] as $id => $opc ): ?>
					<option value="<?= $id; ?>" <?= ( $id == $fiscales[ "tipodecomprobante" ] ? 'selected="selected"' : '' ); ?>><?= $opc; ?></option>
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
	<button type="submit" class="btn btn-outline-primary" ><i class="fas fa-angle-double-right"></i> Crear</button>
</form>
<?php endif; ?>