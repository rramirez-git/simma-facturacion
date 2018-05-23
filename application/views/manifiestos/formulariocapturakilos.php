<!-- Vista manifiestos/formulariocapturakilos -->
<?php
//var_dump( $recoleccion );
$total=0.0;
?>
<form autocomplete="off" id="frm_captura_kilos" style="max-width: 1200px; font-size: 85%; overflow: auto; max-height: 550px;">
	<div class="form-row"><div class="form-group col">
		<label for="frm_noexterno" class="col-sm-4 control-label">No. Externo</label>
			<input type="text" class="form-control" id="frm_noexterno" name="frm_noexterno" value="<?= $noexterno; ?>" />
		</div>
	</div>
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>Residuo</th>
				<th>Cantidad Kg</th>
				<th>Unidad</th>
				<th>Cantidad en Unidad</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th>Residuo</th>
				<th>Cantidad Kg</th>
				<th>Unidad</th>
				<th>Cantidad en Unidad</th>
			</tr>
		</tfoot>
		<tbody>
			<?php foreach( $recoleccion as $kr => $rec ): ?>
				<tr>
					<td><?php echo $rec[ 'residuo' ][ 'opcion' ]; ?> / <?php echo $rec[ "residuo" ][ "nombre" ]; ?></td>
					<td>
						<input type="text" class="form-control numero" id="cantidad_<?= $rec["residuo"]["idresiduo"]; ?>" name="cantidad_<?= $rec["residuo"]["idresiduo"]; ?>" value="<?= ($rec["recoleccion"]!==false?$rec["recoleccion"]["cantidad"]:""); ?>" maxlength="8" onchange="Manifiesto.SumaCantidad()" />
					</td>
					<td>
						<input type="text" class="form-control" id="unidad_<?= $rec["residuo"]["idresiduo"]; ?>" name="unidad_<?= $rec["residuo"]["idresiduo"]; ?>" value="<?= ($rec["recoleccion"]!==false?$rec["recoleccion"]["unidad"]:""); ?>" />
					</td>
					<td>
						<input type="text" class="form-control numero" id="XX_cantidad_<?= $rec["residuo"]["idresiduo"]; ?>" name="XX_cantidad_<?= $rec["residuo"]["idresiduo"]; ?>" value="" maxlength="8" />
					</td>
				</tr>
			<?php 
			$total += floatval( ( $rec["recoleccion"] !== false ? $rec["recoleccion"]["cantidad"] : "0" ) );
			endforeach; ?>
		</tbody>
	</table>
	<div class="form-row">
		<div class="form-group col">
			<label><i>Si el servicio no se realizó:</i></label>
			<select id="frm_motivo" name="frm_motivo" class="form-control">
				<option value=""></option>
				<?php foreach($motivos as $cat): ?>
					<optgroup label="<?= $cat["descripcion"]; ?>"></optgroup>
					<?php foreach($cat["opciones"] as $opc): ?>
						<option value="<?= $opc["idcatalogodet"]; ?>" <?= ($motivo==$opc["idcatalogodet"]?'selected="selected"':""); ?>><?= $opc["descripcion"]; ?></option>
					<?php endforeach; ?>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="form-group col">
			<label>Total</label>
			<input type="text" class="form-control numero" id="total" name="total" readonly="readonly" value="<?= number_format($total,3); ?>" />
		</div>
	</div>
	<input type="hidden" class="form-control" id="frm_manifiesto_fecha_captura" name="frm_manifiesto_fecha_captura" value="<?php $fecha_captura; ?>"/>
	<input type="hidden" class="form-control" id="frm_manifiesto_capturista" name="frm_manifiesto_capturista" value="<?php $capturista; ?>"/>
</form>
<!-- Vista manifiestos/formulariocapturakilos End -->