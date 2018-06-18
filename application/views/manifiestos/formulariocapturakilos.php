<!-- Vista manifiestos/formulariocapturakilos -->
<?php
//var_dump( $recoleccion );
$total=0.0;
$rows_residuo = array();
$res2show = array();
?>
<form autocomplete="off" id="frm_captura_kilos" style="max-width: 1200px; font-size: 85%; overflow: auto; max-height: 550px;">
	<div class="form-row"><div class="form-group col">
		<label for="frm_noexterno">No. Externo</label>
			<input type="text" class="form-control" id="frm_noexterno" name="frm_noexterno" value="<?= $noexterno; ?>" />
		</div>
		<div class="form-group col">
		<label for="frm_fechaembarque">Fecha de Embarque</label>
			<input type="date" class="form-control" id="frm_fechaembarque" name="frm_fechaembarque" value="<?= $fecha_embarque; ?>" />
		</div>
	</div>
	<table class="table table-hover table-sm table-responsive-sm">
		<thead>
			<tr>
				<th>Residuo</th>
				<th>Cantidad Kg</th>
				<th>Unidad</th>
				<th>Cantidad en Unidad</th>
			</tr>
		</thead>
		<tbody id="data-capture">
			<?php foreach( $recoleccion as $kr => $rec ): ?>
				<?php if( false === $rec[ "recoleccion" ] && 1 != $rec[ "residuo" ][ "mostrar_default" ] ):
					$opcs = "";
					foreach( $unidades [ "opciones" ] as $und ) {
						$opcs .= '<option value="' . $und[ "idcatalogodet" ] . '" ' . ( $und[ "idcatalogodet" ] == $rec["recoleccion"]["unidad"] ? 'selected="selected"' : '' ) . ' >' . $und[ "descripcion" ] . '</option>';
					}
					$row = '<tr><td>' . $rec[ 'residuo' ][ 'opcion' ] .' / ' . $rec[ "residuo" ][ "nombre" ] . '</td><td><input type="text" class="form-control numero kilos" id="cantidad_' . $rec["residuo"]["idresiduo"] . '" name="cantidad_' . $rec["residuo"]["idresiduo"] . '" value="' .  ($rec["recoleccion"]!==false?$rec["recoleccion"]["cantidad"]:"") . '" maxlength="8" onchange="Manifiesto.SumaCantidad()" /></td><td><select class="form-control" id="unidad_' . $rec["residuo"]["idresiduo"] . '" name="unidad_' . $rec["residuo"]["idresiduo"] . '">' . $opcs . '</select></td><td><input type="text" class="form-control numero cant_und" id="cantidad_unidad_' . $rec["residuo"]["idresiduo"] . '" name="cantidad_unidad_' . $rec["residuo"]["idresiduo"] . '" value="' . ($rec["recoleccion"]!==false?$rec["recoleccion"]["cantidad_unidad"]:"") . '" maxlength="8" /></td></tr>';
					$rows_residuo[ $rec["residuo"]["idresiduo"] ] = $row;
					$res2show[ $rec["residuo"]["idresiduo"] ] = $rec[ 'residuo' ][ 'opcion' ] .' / ' . $rec[ "residuo" ][ "nombre" ];
				else: ?>
					<tr>
						<td><?php echo $rec[ 'residuo' ][ 'opcion' ]; ?> / <?php echo $rec[ "residuo" ][ "nombre" ]; ?></td>
						<td>
							<input type="text" class="form-control numero kilos" id="cantidad_<?= $rec["residuo"]["idresiduo"]; ?>" name="cantidad_<?= $rec["residuo"]["idresiduo"]; ?>" value="<?= ($rec["recoleccion"]!==false?$rec["recoleccion"]["cantidad"]:""); ?>" maxlength="8" onchange="Manifiesto.SumaCantidad()" />
						</td>
						<td>
							<select class="form-control" id="unidad_<?= $rec["residuo"]["idresiduo"]; ?>" name="unidad_<?= $rec["residuo"]["idresiduo"]; ?>">
								<?php foreach( $unidades [ "opciones" ] as $und ): ?>
									<option value="<?php echo $und[ "idcatalogodet" ]; ?>" <?php echo ( $und[ "idcatalogodet" ] == $rec["recoleccion"]["unidad"] ? 'selected="selected"' : '' ); ?> ><?php echo $und[ "descripcion" ]; ?></option>
								<?php endforeach; ?>
							</select>
						</td>
						<td>
							<input type="text" class="form-control numero cant_und" id="cantidad_unidad_<?= $rec["residuo"]["idresiduo"]; ?>" name="cantidad_unidad_<?= $rec["residuo"]["idresiduo"]; ?>" value="<?= ($rec["recoleccion"]!==false?$rec["recoleccion"]["cantidad_unidad"]:""); ?>" maxlength="8" />
						</td>
					</tr>
				<?php endif; ?>
			<?php 
			$total += floatval( ( $rec["recoleccion"] !== false ? $rec["recoleccion"]["cantidad"] : "0" ) );
			endforeach; ?>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="3">
					<select class="form-control" id="opc_res" name="opc_res">
						<option value=""></option>
						<?php foreach( $res2show as $id => $res ): ?>
							<option value="<?php echo $id; ?>"><?php echo $res; ?></option>
						<?php endforeach; ?>
					</select>
				</td>
				<td><button onclick="Manifiesto.AddRowCapture()" title="Agregar Residuo para Capturar" class="btn btn-outline-secondary float-right" type="button"><i class="fas fa-plus"></i></button></td>
			</tr>
			<tr>
				<th>Residuo</th>
				<th>Cantidad Kg</th>
				<th>Unidad</th>
				<th>Cantidad en Unidad</th>
			</tr>
		</tfoot>
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
	<script type="text/javascript">
		var rows_residuo = <?php echo json_encode( $rows_residuo ); ?>;
		$( ".kilos" ).keydown( Manifiesto.CapturaKeyPressKilos );
		$( ".cant_und" ).keydown( Manifiesto.CapturaKeyPressCantUnd );
	</script>
</form>
<!-- Vista manifiestos/formulariocapturakilos End -->