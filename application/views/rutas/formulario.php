<?= $menumain; ?>
<div class="container">
	<h3>Rutas</h3>
	<form autocomplete="off" id="frm_rutas">
		<input type="hidden" id="frm_ruta_idruta" name="frm_ruta_idruta" value="<?= $objeto->getIdruta(); ?>" />
		<input type="hidden" id="frm_ruta_idsucursal" name="frm_ruta_idsucursal" value="<?= $idsucursal; ?>" />
		<div class="form-row"><div class="form-group col">
			<label for="frm_ruta_nombre">Nombre de la Ruta <abbr class="text-danger" title="Campo Obligatorio">(obligatorio)</abbr></label>
				<input type="text" class="form-control" id="frm_ruta_nombre" name="frm_ruta_nombre" value="<?= $objeto->getNombre(); ?>" placeholder="Nombre de la Ruta" />
			</div>
			<div class="form-group col">
			<label for="frm_ruta_identificador">Número de Ruta <abbr class="text-danger" title="Campo Obligatorio">(obligatorio)</abbr></label>
				<input type="text" class="form-control" id="frm_ruta_identificador" name="frm_ruta_identificador" value="<?= $objeto->getIdentificador(); ?>" placeholder="Número de Ruta" />
			</div>
		</div>
		<div class="form-row"><div class="form-group col">
			<label for="empresadestinofinal">Planta de Tratamiento <abbr class="text-danger" title="Campo Obligatorio">(obligatorio)</abbr></label>
				<select class="form-control" id="frm_ruta_empresadestinofinal" name="frm_ruta_empresadestinofinal">
					<?php if($destinosfinales!==false) foreach($destinosfinales as $emp): ?>
						<optgroup label="<?= $emp["nombre"]; ?>">
							<?php foreach($emp["sucursales"] as $suc): ?>
								<option value="<?= $suc["idsucursal"]; ?>" <?= ($suc["idsucursal"]==$objeto->getEmpresadestinofinal()?'selected="selected"':''); ?>>
									<?= $suc["nombre"]; ?>
								</option>
							<?php endforeach; ?>
						</optgroup>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group col">
			<label for="empresatransportista">Transportista <abbr class="text-danger" title="Campo Obligatorio">(obligatorio)</abbr></label>
				<select class="form-control" id="frm_ruta_empresatransportista" name="frm_ruta_empresatransportista" onchange="Ruta.ObtieneOperadoresVehiculos()">
					<?php if($transportistas!==false) foreach($transportistas as $emp): ?>
						<optgroup label="<?= $emp["nombre"]; ?>">
							<?php foreach($emp["sucursales"] as $suc): ?>
								<option value="<?= $suc["idsucursal"]; ?>" <?= ($suc["idsucursal"]==$objeto->getEmpresatransportista()?'selected="selected"':''); ?>>
									<?= $suc["nombre"]; ?>
								</option>
							<?php endforeach; ?>
						</optgroup>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<div class="form-row"><div class="form-group col">
			<label for="frm_ruta_descripcion">Descripción de la Ruta</label>
				<textarea rows="3" class="form-control" id="frm_ruta_descripcion" name="frm_ruta_descripcion"><?= $objeto->getDescripcion(); ?></textarea>
			</div>
		</div>
		<div class="form-row"><div class="form-group col">
			<label for="frm_ruta_idoperador">Operador <abbr class="text-danger" title="Campo Obligatorio">(obligatorio)</abbr></label>
				<select class="form-control" id="frm_ruta_idoperador" name="frm_ruta_idoperador">
					<?php if($transportistas!==false) 
						foreach($transportistas as $emp) 
							foreach($emp["sucursales"] as $suc) 
								if($suc["idsucursal"]==$idtransportista && $suc["operadores"]!==false) 
									foreach($suc["operadores"] as $reg): ?>
										<option value="<?= $reg["idoperador"]; ?>" <?= ($reg["idoperador"]==$objeto->getIdoperador()?'selected="selected"':'');?>>
											<?= "{$reg["nombre"]} {$reg["apaterno"]} {$reg["amaterno"]}"; ?>
										</option>
									<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group col">
			<label for="frm_ruta_idvehiculo">Vehiculo <abbr class="text-danger" title="Campo Obligatorio">(obligatorio)</abbr></label>
				<select class="form-control" id="frm_ruta_idvehiculo" name="frm_ruta_idvehiculo">
					<?php if($transportistas!==false) 
						foreach($transportistas as $emp) 
							foreach($emp["sucursales"] as $suc) 
								if($suc["idsucursal"]==$idtransportista && $suc["vehiculos"]!==false) 
									foreach($suc["vehiculos"] as $reg): ?>
										<option value="<?= $reg["idvehiculo"]; ?>" <?= ($reg["idvehiculo"]==$objeto->getIdvehiculo()?'selected="selected"':'');?>>
											<?= $reg["placa"]; ?>
										</option>
									<?php endforeach; ?>
				</select>
			</div>
		</div>
		<div class="form-row">
			<div class="col">
				<div class="checkbox">
					<label>
						<input type="checkbox" value="1" id="frm_ruta_serviciolunes" name="frm_ruta_serviciolunes" <?= ($objeto->getServiciolunes()==1?'checked="checked"':''); ?> />
						Lunes
					</label>
				</div>
			</div>
			<div class="col">
				<div class="checkbox">
					<label>
						<input type="checkbox" value="1" id="frm_ruta_serviciomartes" name="frm_ruta_serviciomartes" <?= ($objeto->getServiciomartes()==1?'checked="checked"':''); ?> />
						Martes
					</label>
				</div>
			</div>
			<div class="col">
				<div class="checkbox">
					<label>
						<input type="checkbox" value="1" id="frm_ruta_serviciomiercoles" name="frm_ruta_serviciomiercoles" <?= ($objeto->getServiciomiercoles()==1?'checked="checked"':''); ?> />
						Miércoles
					</label>
				</div>
			</div>
			<div class="col">
				<div class="checkbox">
					<label>
						<input type="checkbox" value="1" id="frm_ruta_serviciojueves" name="frm_ruta_serviciojueves" <?= ($objeto->getServiciojueves()==1?'checked="checked"':''); ?> />
						Jueves
					</label>
				</div>
			</div>
			<div class="col">
				<div class="checkbox">
					<label>
						<input type="checkbox" value="1" id="frm_ruta_servicioviernes" name="frm_ruta_servicioviernes" <?= ($objeto->getServicioviernes()==1?'checked="checked"':''); ?> />
						Viernes
					</label>
				</div>
			</div>
			<div class="col">
				<div class="checkbox">
					<label>
						<input type="checkbox" value="1" id="frm_ruta_serviciosabado" name="frm_ruta_serviciosabado" <?= ($objeto->getServiciosabado()==1?'checked="checked"':''); ?> />
						Sabado
					</label>
				</div>
			</div>
			<div class="col">
				<div class="checkbox">
					<label>
						<input type="checkbox" value="1" id="frm_ruta_serviciodomingo" name="frm_ruta_serviciodomingo" <?= ($objeto->getServiciodomingo()==1?'checked="checked"':''); ?> />
						Domingo
					</label>
				</div>
			</div>
		</div>
		<button type="button" class="btn btn-outline-primary" onclick="Ruta.Enviar(<?= ($objeto->getIdruta()!="" && $objeto->getIdruta()!=0?'false':'true'); ?>)" >Guardar</button>
		<button type="button" class="btn btn-outline-secondary" onclick="location.href='<?= base_url('rutas'); ?>'">Cancelar</button>
	</form>
</div>
<script type="text/javascript">
	var tmpSucursalesOperadoresVehiculos=new Array();
	<?php 
		if($transportistas!==false) 
			foreach($transportistas as $trans) 
				foreach($trans["sucursales"] as $suc)
				{
					$cad="tmpSucursalesOperadoresVehiculos[{$suc["idsucursal"]}]={";
					$cad.="operadores:[";
					if($suc["operadores"]!==false && count($suc["operadores"])>0)
					{
						foreach($suc["operadores"] as $reg)
							$cad.="{idoperador:{$reg["idoperador"]},nombre:'{$reg["nombre"]} {$reg["apaterno"]} {$reg["amaterno"]}'},";
						$cad=substr($cad,0,strlen($cad)-1);
					}
					$cad.="]";
					$cad.=",vehiculos:[";
					if($suc["vehiculos"]!==false && count($suc["vehiculos"])>0)
					{
						foreach($suc["vehiculos"] as $reg)
							$cad.="{idvehiculo:{$reg["idvehiculo"]},placa:'{$reg["placa"]}'},";
						$cad=substr($cad,0,strlen($cad)-1);
					}
					$cad.="]";
					$cad.="};";
					echo "\r\n".$cad;
				}
	?>
</script>