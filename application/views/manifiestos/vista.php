<!-- Vista manifiestos/vista -->
<?= $menumain; ?>
<?php
/*$manifiesto=new ModManifiesto();
$generador=new Modgenerador();
$cliente=new Modcliente();
$empresa=new Modempresa();
$sucursal=new Modsucursal();
$ruta=new Modruta();
$operador=new Modoperador();
$vehiculo=new Modvehiculo();*/

$sucursal->setIdsucursal($cliente->getIdsucursal());
$sucursal->getFromDatabase();

$total=0.0;
?>
<div class="container">
	<div class="btn-toolbar float-right" role="toolbar">
		<div class="btn-group" role="group">
			<?php if($this->modsesion->hasPermisoHijo(18)): ?>
			<button type="button" class="btn btn-outline-secondary" title="Ver todos los Manifiestos" onclick="location.href='<?= base_url('manifiestos/index/'.$sucursal->getIdempresa().'/'.$sucursal->getIdsucursal()); ?>';">
				<i class="fas fa-th-list"></i>
			</button>
			<?php endif;
			if($this->modsesion->hasPermisoHijo(25)): ?>
			<button type="button" class="btn btn-outline-secondary" title="Ver la Sucursal Asociada" onclick="location.href='<?= base_url('sucursales/ver/'.$sucursal->getIdsucursal()); ?>';">
				<i class="fas fa-eye"></i>
			</button>
			<?php endif;
			if($this->modsesion->hasPermisoHijo(42)): ?>
			<button type="button" class="btn btn-outline-secondary" title="Capturar Kilos" onclick="Manifiesto.FrmCapturaKilos(<?= $manifiesto->getIdmanifiesto(); ?>)">
				<i class="fas fa-pencil-alt"></i>
			</button>
			<?php endif;
			if($this->modsesion->hasPermisoHijo(43)): ?>
			<button type="button" class="btn btn-outline-secondary" title="Imprimir Manifiesto" onclick="Manifiesto.Imprimir(<?= $manifiesto->getIdmanifiesto(); ?>)">
				<i class="fas fa-print"></i>
			</button>
			<?php endif;
			if($this->modsesion->hasPermisoHijo(44)): ?>
			<button type="button" class="btn btn-outline-secondary" title="Borrar Manifiesto" onclick="Manifiesto.Eliminar(<?= $sucursal->getIdempresa(); ?>,<?= $sucursal->getIdsucursal(); ?>,<?= $manifiesto->getIdmanifiesto(); ?>)">
				<i class="far fa-trash-alt"></i>
			</button>
			<?php endif; ?>
		</div>
	</div>
	<h3>Manifiesto <small class="text-muted"><?= $manifiesto->getIdentificador().($manifiesto->getNoexterno()!=""?" (No. Externo: {$manifiesto->getNoexterno()})":""); ?></small></h3>
	<form autocomplete="off" id="frm_manifiesto">
		<h5>Generador</h5>
		<div class="form-row"><div class="form-group">
			<label>Cliente</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $cliente->getIdentificador()." - ".$cliente->getRazonsocial(); ?>" />
			</div>
			<?php if ($manifiesto->getFecha_captura() != "" && $manifiesto->getFecha_captura() != "0000-00-00 00:00:00" ) { ?>
			<label id="captura_fec">Fecha de Captura:</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= DateToMx( substr($manifiesto->getFecha_captura(), 0, 10) ).substr($manifiesto->getFecha_captura(), 10); ?>" />
			</div>
			<?php } ?>
		</div>
		<div class="form-row"><div class="form-group">
			<label>Generador</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $generador->getIdentificador()." - ".$generador->getRazonsocial(); ?>" />
			</div>
			<?php if ($manifiesto->getCapturista() != "") { ?>
			<label>Capturista:</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $manifiesto->getCapturista( ); ?>" />
			</div>
			<?php } ?>
		</div>
		<div class="form-row"><div class="form-group">
			<label>Responsable</label>
			<div class="col-sm-10">
				<input class="form-control" disabled="disabled" value="<?= $generador->getRepresentante()." - ".$generador->getRepresentantetelefono().($generador->getRepresentanteextension()!=""?" (Ext. ".$generador->getRepresentanteextension().")":""); ?>" />
			</div>
		</div>
		<h5>Facturacion</h5>
		<div class="form-row"><div class="form-group">
			<label>Esquema de Facturación</label>
			<div class="col-sm-8">
				<input class="form-control" disabled="disabled" value="<?php
				foreach( $tipos_cobro[ 'opciones' ] as $opc ) {
					if( $opc[ 'idcatalogodet' ] == $tipo_cobro->getTipocobro() ) {
						echo $opc[ 'descripcion'] . " / ";
					}
				}
				?><?php
				foreach( $tipos_servicio[ 'opciones' ] as $opc ) {
					if( $opc[ 'idcatalogodet' ] == $tipo_cobro->getTiposervicio() ) {
						echo $opc[ 'descripcion'];
					}
				}
				?><?php
				foreach( $unidades[ 'opciones' ] as $opc ) {
					if( $opc[ 'idcatalogodet' ] == $tipo_cobro->getUnidad() ) {
						echo " (" . $opc[ 'descripcion'] . ")";
					}
				}
				?>" />
			</div>
			<div class="col-sm-2">
				<div class="checkbox">
					<label>
						<input type="checkbox" value="1" id="frm_manifiesto_facturable" name="frm_manifiesto_facturable" <?= ($manifiesto->getFacturable()==1?'checked="checked"':''); ?> disabled="disabled" />
						Facturable
					</label>
				</div>
			</div>
		</div>
		<div class="form-row"><div class="form-group">
			<label>Factura Asociada</label>
			<div class="col-sm-10">
				<input class="form-control" disabled="disabled" value="<?= $manifiesto->getUuid() . ( $manifiesto->getUuid_excedente() != "" ? '<br />' : '' ) . $manifiesto->getUuid_excedente(); ?>" />
			</div>
		</div>
		<h5>Transportista</h5>
		<?php
		$sucursal->setIdsucursal($ruta->getEmpresatransportista());
		$sucursal->getFromDatabase();
		$empresa->setIdempresa($sucursal->getIdempresa());
		$empresa->getFromDatabase();
		?>
		<div class="form-row"><div class="form-group">
			<label>Razon Social</label>
			<div class="col-sm-10">
				<input class="form-control" disabled="disabled" value="<?= $empresa->getRazonsocial()." (".$sucursal->getNombre().")"; ?>" />
			</div>			
		</div>
		<div class="form-row"><div class="form-group">
			<label>Ruta</label>
			<div class="col-sm-10">
				<input class="form-control" disabled="disabled" value="<?= $ruta->getIdentificador()." - ".$ruta->getNombre(); ?>" />
			</div>			
		</div>
		<div class="form-row"><div class="form-group">
			<label>Operador</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $operador->getNombre()." ".$operador->getApaterno()." ".$operador->getAmaterno(); ?>" />
			</div>
			<label>Vehiculo</label>
			<div class="col-sm-4">
				<input class="form-control" disabled="disabled" value="<?= $vehiculo->getPlaca()." (".$vehiculo->getTipo().")"; ?>" />
			</div>
		</div>
		<h5>Planta de Tratamiento</h5>
		<?php
		$sucursal->setIdsucursal($ruta->getEmpresadestinofinal());
		$sucursal->getFromDatabase();
		$empresa->setIdempresa($sucursal->getIdempresa());
		$empresa->getFromDatabase();
		?>
		<div class="form-row"><div class="form-group">
			<label>Razon Social</label>
			<div class="col-sm-10">
				<input class="form-control" disabled="disabled" value="<?= $empresa->getRazonsocial()." (".$sucursal->getNombre().")"; ?>" />
			</div>			
		</div>
		<div class="form-row"><div class="form-group">
			<label>Representante</label>
			<div class="col-sm-10">
				<input class="form-control" disabled="disabled" value="<?= $sucursal->getRepresentante(); ?>" />
			</div>			
		</div>
		<h5>Recolección</h5>
		<?php if($motivo!="" && $motivo>0) foreach($motivos as $cat) foreach($cat["opciones"] as $opc) if($motivo==$opc["idcatalogodet"]): ?>
			<?= $opc["descripcion"]; ?> (<?= $cat["descripcion"]; ?>)
		<?php endif; ?>
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Residuo</th>
						<th>Tipo</th>
						<!--<th>Capacidad del Contenedor</th>
						<th>Tipo de Contenedor</th>-->
						<th>Cantidad Total</th>
						<!--<th>Unidad de Volumen</th>-->
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>Residuo</th>
						<th>Tipo</th>
						<!--<th>Capacidad del Contenedor</th>
						<th>Tipo de Contenedor</th>-->
						<th>Cantidad Total</th>
						<!--<th>Unidad de Volumen</th>-->
					</tr>
				</tfoot>
				<tbody>
					<?php foreach($recoleccion as $r) if($r["recoleccion"]!==false ):?>
						<tr>
							<td><?= $r["residuo"]["nombre"]; ?></td>
							<td><?php echo $r[ 'residuo' ][ 'opcion' ]; ?></td>
							<!--<td><?= ($r["recoleccion"]!==false?$r["recoleccion"]["contenedorcapacidad"]:""); ?></td>
							<td><?= ($r["recoleccion"]!==false?$r["recoleccion"]["contenedortipo"]:""); ?></td>-->
							<td class="numero"><?= ($r["recoleccion"]!==false?$r["recoleccion"]["cantidad"]:""); ?></td>
							<!--<td><?= ($r["recoleccion"]!==false?$r["recoleccion"]["unidad"]:""); ?></td>-->
						</tr>
					<?php 
					$total+=floatval(($r["recoleccion"]!==false?$r["recoleccion"]["cantidad"]:"0"));
					endif; ?>
					<tr>
						<td><strong>Total</strong></td>
						<td></td>
						<td class="numero"><strong><?= number_format($total,3); ?></strong></td>
					</tr>
				</tbody>
			</table>
		</div>
	</form>
</div>
<script type="text/javascript">
	var idManifiesto=<?= $manifiesto->getIdmanifiesto(); ?>;
</script>
<!-- Vista manifiestos/vista End -->