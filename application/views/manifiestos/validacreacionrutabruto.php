<!-- Vista manifiestos/validacreacionrutabruto -->
<?php
$cliente=new Modcliente();
$generador=new Modgenerador();
//$ruta=new Modruta();
?>
<form autocomplete="off" method="post" id="frm_validacion">
	<input type="hidden" id="frm_validacion_idsucursal" name="frm_validacion_idsucursal" value="<?= $idsucursal; ?>" />
	<input type="hidden" id="frm_validacion_idruta" name="frm_validacion_idruta" value="<?= $ruta->getIdruta(); ?>" />
	<input type="hidden" id="frm_validacion_bitacora" name="frm_validacion_bitacora" value="<?= $bitacora; ?>" />
	<div class="form-row"><div class="form-group col">
		<label for="frm_validacion_ruta">Ruta</label>
			<input class="form-control" disabled="disabled" value="<?= $ruta->getIdentificador()." - ".$ruta->getNombre(); ?>" />
		</div>
		<div class="form-group col">
		<label for="frm_validacion_bit">Bitacora:</label>
			<input class="form-control" disabled="disabled" value="<?= $bitacora; ?>" />
		</div>
	</div>
		<table class="table table-hover table-sm table-responsive-sm">
			<thead>
				<tr>
					<th>Cliente</th>
					<th>Generador</th>
					<th>Manifiesto</th>
					<th>Generar</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>Cliente</th>
					<th>Generador</th>
					<th>Manifiesto</th>
					<th>Generar</th>
				</tr>
			</tfoot>
			<tbody>
				<?php
				$gens=$ruta->getGeneradoresAsociados($ruta->getIdruta());
				if($gens!==false) foreach($gens as $gen)
				{
					$generador->setIdgenerador($gen["idgenerador"]);
					$generador->getFromDatabase();
					if($generador->getActivo()==1)
					{
						$cliente->setIdcliente($generador->getIdcliente());
						$cliente->getFromDatabase();
						?>
						<tr>
							<td><?= $cliente->getIdentificador()." - ".$cliente->getRazonsocial(); ?></td>
							<td><?= $generador->getIdentificador()." - ".$generador->getRazonsocial(); ?></td>
							<td><?= $identificador; ?></td>
							<td><input type="checkbox" id="frm_validacion_manifiesto[]" name="frm_validacion_manifiesto[]" checked="checked" value="<?= $generador->getIdgenerador()."|".$identificador; ?>" /></td>
						</tr>
						<?php
						$sucAux=new Modsucursal();
						$sucAux->getFromDatabase($ruta->getIdsucursal());
						$identificador=str_replace($sucAux->getIniciales(),"",$identificador)+1;
						$identificador=$sucAux->getIniciales().$identificador;
					}
				}
				?>
			</tbody>
		</table>
	<button type="button" class="btn btn-outline-primary" onclick="Manifiesto.CrearManifiestoRutaBruto_Exec()" >Crear</button>
	<button type="button" class="btn btn-outline-secondary" onclick="location.href='<?= base_url("manifiestos/index/$idempresa/$idsucursal"); ?>'">Cancelar</button>
</form>
<!-- Vista manifiestos/validacreacionrutabruto End -->