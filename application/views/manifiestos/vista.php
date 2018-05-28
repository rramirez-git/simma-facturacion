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
		<div class="form-row"><div class="form-group col">
			<label>Cliente</label>
				<input class="form-control" disabled="disabled" value="<?= $cliente->getIdentificador()." - ".$cliente->getRazonsocial(); ?>" />
			</div>
			<div class="form-group col">
			<label>Generador</label>
				<input class="form-control" disabled="disabled" value="<?= $generador->getIdentificador()." - ".$generador->getRazonsocial(); ?>" />
			</div>
			<div class="form-group col">
			<label>Responsable</label>
				<input class="form-control" disabled="disabled" value="<?= $generador->getRepresentante()." - ".$generador->getRepresentantetelefono().($generador->getRepresentanteextension()!=""?" (Ext. ".$generador->getRepresentanteextension().")":""); ?>" />
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col">
			<label id="captura_fec">Fecha Programada:</label>
				<input class="form-control" disabled="disabled" value="<?= DateToMx( substr($manifiesto->getFecha(), 0, 10) ); ?>" />
			</div>
			<div class="form-group col">
			<label id="captura_fec">Fecha de Ebarque:</label>
				<input class="form-control" disabled="disabled" value="<?= DateToMx( substr($manifiesto->getFechaEmbarque(), 0, 10) ); ?>" />
			</div>
			<div class="form-group col">
			<label id="captura_fec">Fecha de Captura:</label>
				<input class="form-control" disabled="disabled" value="<?= DateToMx( substr($manifiesto->getFecha_captura(), 0, 10) ).substr($manifiesto->getFecha_captura(), 10); ?>" />
			</div>
			<div class="form-group col">
			<label>Capturista:</label>
				<input class="form-control" disabled="disabled" value="<?= $manifiesto->getCapturista( ); ?>" />
			</div>
		</div>
		<h5>Facturacion</h5>
		<div class="form-row"><div class="form-group col">
			<label>Esquema de Facturación</label>
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
			<div class="form-group col">
			<label>Factura Asociada</label>
				<input class="form-control" disabled="disabled" value="<?= $manifiesto->getUuid() . ( $manifiesto->getUuid_excedente() != "" ? '<br />' : '' ) . $manifiesto->getUuid_excedente(); ?>" />
			</div>
		</div>
		<div class="form-group col">
			<div class="form-group col">
					<label>
						<input type="checkbox" value="1" id="frm_manifiesto_facturable" name="frm_manifiesto_facturable" <?= ($manifiesto->getFacturable()==1?'checked="checked"':''); ?> disabled="disabled" />
						Facturable
					</label>
			</div>
		</div>
		<h5>Transportista</h5>
		<?php
		$sucursal->setIdsucursal($ruta->getEmpresatransportista());
		$sucursal->getFromDatabase();
		$empresa->setIdempresa($sucursal->getIdempresa());
		$empresa->getFromDatabase();
		?>
		<div class="form-row"><div class="form-group col">
			<label>Razon Social</label>
				<input class="form-control" disabled="disabled" value="<?= $empresa->getRazonsocial()." (".$sucursal->getNombre().")"; ?>" />
			</div>
			<div class="form-group col">
			<label>Ruta</label>
				<input class="form-control" disabled="disabled" value="<?= $ruta->getIdentificador()." - ".$ruta->getNombre(); ?>" />
			</div>			
		</div>
		<div class="form-row"><div class="form-group col">
			<label>Operador</label>
				<input class="form-control" disabled="disabled" value="<?= $operador->getNombre()." ".$operador->getApaterno()." ".$operador->getAmaterno(); ?>" />
			</div>
			<div class="form-group col">
			<label>Vehiculo</label>
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
		<div class="form-row"><div class="form-group col">
			<label>Razon Social</label>
				<input class="form-control" disabled="disabled" value="<?= $empresa->getRazonsocial()." (".$sucursal->getNombre().")"; ?>" />
			</div>
			<div class="form-group col">
			<label>Representante</label>
				<input class="form-control" disabled="disabled" value="<?= $sucursal->getRepresentante(); ?>" />
			</div>			
		</div>
		<h5>Recolección</h5>
		<?php if($motivo!="" && $motivo>0) foreach($motivos as $cat) foreach($cat["opciones"] as $opc) if($motivo==$opc["idcatalogodet"]): ?>
			<?= $opc["descripcion"]; ?> (<?= $cat["descripcion"]; ?>)
		<?php endif; ?>
			<table class="table table-hover table-sm table-responsive">
				<thead>
					<tr>
						<th>Residuo</th>
						<th>Tipo</th>
						<!--<th>Capacidad del Contenedor</th>
						<th>Tipo de Contenedor</th>-->
						<th>Cantidad (kg)</th>
						<th>Unidad</th>
						<th>Cantidad en Unidad</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>Residuo</th>
						<th>Tipo</th>
						<!--<th>Capacidad del Contenedor</th>
						<th>Tipo de Contenedor</th>-->
						<th>Cantidad (kg)</th>
						<th>Unidad</th>
						<th>Cantidad en Unidad</th>
					</tr>
				</tfoot>
				<tbody>
					<?php foreach($recoleccion as $r) if($r["recoleccion"]!==false ):?>
						<tr>
							<td><?= $r["residuo"]["nombre"]; ?></td>
							<td><?php echo $r[ 'residuo' ][ 'opcion' ]; ?></td>
							<!--<td><?= ($r["recoleccion"]!==false?$r["recoleccion"]["contenedorcapacidad"]:""); ?></td>
							<td><?= ($r["recoleccion"]!==false?$r["recoleccion"]["contenedortipo"]:""); ?></td>-->
							<td class="numero kilos"><?= ($r["recoleccion"]!==false?$r["recoleccion"]["cantidad"]:""); ?></td>
							<td>
								<?php if( false != $r["recoleccion"] ) foreach( $unidades[ "opciones" ] as $und ) if( $und[ "idcatalogodet" ] == $r["recoleccion"]["unidad"] ) :?>
									<?php echo $und[ "descripcion" ]; ?>
								<?php endif; ?>
							</td>
							<td class="numero"><?= ($r["recoleccion"]!==false?$r["recoleccion"]["cantidad_unidad"]:""); ?></td>
						</tr>
					<?php 
					$total+=floatval(($r["recoleccion"]!==false?$r["recoleccion"]["cantidad"]:"0"));
					endif; ?>
					<tr>
						<td><strong>Total</strong></td>
						<td></td>
						<td class="numero"><strong><?= number_format($total,3); ?></strong></td>
						<td></td>
						<td></td>
					</tr>
				</tbody>
			</table>
	</form>
</div>
<script type="text/javascript">
	var idManifiesto=<?= $manifiesto->getIdmanifiesto(); ?>;
</script>
<!-- Vista manifiestos/vista End -->