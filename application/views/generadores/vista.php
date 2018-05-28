<?= $menumain; ?>
<div class="container">
	<div class="btn-toolbar float-right" role="toolbar">
		<div class="btn-group" role="group">
			<?php if($this->modsesion->hasPermisoHijo(55)): ?>
			<button type="button" class="btn btn-outline-secondary" title="Ver el Cliente Asociado" onclick="location.href='<?= base_url('clientes/ver/'.$objeto->getIdcliente()); ?>';">
				<i class="fas fa-eye"></i>
			</button>
			<?php endif;
			if($this->modsesion->hasPermisoHijo(79)):?>
			<button type="button" class="btn btn-outline-secondary" title="Calendarizar Generador" onclick="location.href='<?= base_url('generadores/calendarizar/'.$objeto->getIdgenerador()) ?>'">
				<i class="far fa-calendar-alt"></i>
			</button>
			<?php endif;
			if($this->modsesion->hasPermisoHijo(76)):?>
			<button type="button" class="btn btn-outline-secondary" title="Actualizar Generador" onclick="location.href='<?= base_url('generadores/actualizar/'.$objeto->getIdgenerador()); ?>';">
				<i class="far fa-edit"></i>
			</button>
			<?php endif;
			if($this->modsesion->hasPermisoHijo(77)):?>
			<button type="button" class="btn btn-outline-secondary" title="Borrar Generador	" onclick="Generador.Eliminar(<?= $objeto->getIdcliente(); ?>,<?= $objeto->getIdgenerador(); ?>)">
				<i class="far fa-trash-alt"></i>
			</button>
			<?php endif; ?>
		</div>
	</div>
	<h3>Generadores</h3>
	<form autocomplete="off" id="frm_generadores">
		<div class="form-row"><div class="form-group col">
			<label for="frm_generador_razonsocial">Razón Social</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getRazonsocial(); ?>" />
			</div>
			<div class="form-group col">
			<label for="frm_generador_rfc">Registro Federal de Contribuyentes</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getRfc(); ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group col">
			<label for="frm_generador_nombrecorto">Nombre Corto</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getNombrecorto(); ?>" />
			</div>
			<div class="form-group col">
			<label for="frm_generador_identificador">Número de Generador</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getIdentificador(); ?>" />
			</div><div class="form-group col">
			<label for="frm_generador_numregamb">Número de Registro Ambiental</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getNumregamb(); ?>" />
			</div>
			<!--<div class="form-group col">
			<label for="frm_generador_numreggen">Número de Registro como Generador</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getNumreggen(); ?>" />
			</div>-->
		</div>
		<div class="form-row"><div class="form-group col">
			<label for="frm_generador_frecuencia">Frecuencia de Recolección</label>
				<input class="form-control" disabled="disabled" value="<?php 
						if($frecuencia!==false) 
							foreach($frecuencia["opciones"] as $opc) 
								if($opc["idcatalogodet"]==$objeto->getFrecuencia()) 
								{ 
									echo $opc["descripcion"]; 
									break; 
								} 
					?>" />
			</div>
			<!--<div class="form-group col">
			<label for="frm_generador_servicio">Tipo de Servicio</label>
			
				<input class="form-control" disabled="disabled" value="<?= $objeto->getServicio(); ?>" />
			</div>-->
			<div class="form-group col">
				<label for="frm_generador_giro">Giro</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getGiro(); ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group col">
			<label>
				<input type="checkbox" value="1" id="frm_generador_activo" name="frm_generador_activo" <?= ($objeto->getActivo()==1?'checked="checked"':''); ?> disabled="disabled" />
				Activo (<?= DateToMx($objeto->getFechaactivo()); ?>)
			</label>
			</div>
		</div>
		<h5>Servicios</h5>
		<div class="form-row">
			<div class="form-group col">
					<label>
						<input disabled="disabled" type="checkbox" value="1" id="frm_generador_serviciolunes" name="frm_generador_serviciolunes" <?= ($objeto->getServiciolunes()==1?'checked="checked"':''); ?> />
						Lunes
					</label>
			</div>
			<div class="form-group col">
					<label>
						<input disabled="disabled" type="checkbox" value="1" id="frm_generador_serviciomartes" name="frm_generador_serviciomartes" <?= ($objeto->getServiciomartes()==1?'checked="checked"':''); ?> />
						Martes
					</label>
			</div>
			<div class="form-group col">
					<label>
						<input disabled="disabled" type="checkbox" value="1" id="frm_generador_serviciomiercoles" name="frm_generador_serviciomiercoles" <?= ($objeto->getServiciomiercoles()==1?'checked="checked"':''); ?> />
						Miércoles
					</label>
			</div>
			<div class="form-group col">
					<label>
						<input disabled="disabled" type="checkbox" value="1" id="frm_generador_serviciojueves" name="frm_generador_serviciojueves" <?= ($objeto->getServiciojueves()==1?'checked="checked"':''); ?> />
						Jueves
					</label>
			</div>
			<div class="form-group col">
					<label>
						<input disabled="disabled" type="checkbox" value="1" id="frm_generador_servicioviernes" name="frm_generador_servicioviernes" <?= ($objeto->getServicioviernes()==1?'checked="checked"':''); ?> />
						Viernes
					</label>
			</div>
			<div class="form-group col">
					<label>
						<input disabled="disabled" type="checkbox" value="1" id="frm_generador_serviciosabado" name="frm_generador_serviciosabado" <?= ($objeto->getServiciosabado()==1?'checked="checked"':''); ?> />
						Sabado
					</label>
			</div>
			<div class="form-group col">
					<label>
						<input disabled="disabled" type="checkbox" value="1" id="frm_generador_serviciodomingo" name="frm_generador_serviciodomingo" <?= ($objeto->getServiciodomingo()==1?'checked="checked"':''); ?> />
						Domingo
					</label>
			</div>
		</div>
		<div class="form-row"><div class="form-group col">
			<label for="frm_generador_horarioinicio">Hora Inicio (Mat.)</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getHorarioinicio(); ?>" />
			</div>
			<div class="form-group col">
			<label for="frm_generador_horariofin">Hora Fin (Mat.)</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getHorariofin(); ?>" />
			</div>
			<div class="form-group col">
			<label for="frm_generador_horarioinicio2">Hora Inicio (Vesp.)</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getHorarioinicio2(); ?>" />
			</div>
			<div class="form-group col">
			<label for="frm_generador_horariofin2">Hora Fin (Vesp.)</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getHorariofin2(); ?>" />
			</div>
		</div>
		<h5>Dirección</h5>
		<div class="form-row"><div class="form-group col">
			<label for="frm_generador_calle">Calle</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getCalle(); ?>" />
			</div>
			<div class="form-group col">
		    <label for="frm_generador_cp">Código Postal</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getCp(); ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group col">
			<label for="frm_generador_numexterior">Número Exterior</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getNumexterior(); ?>" />
			</div>
			<div class="form-group col">
			<label for="frm_generador_numinterior">Número Interior</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getNuminterior(); ?>" />
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col">
			<label for="frm_generador_colonia">Colonia</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getColonia(); ?>" />
			</div>
			<div class="form-group col">
			<label for="frm_generador_municipio">Delegación o Municipio</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getMunicipio(); ?>" />
			</div>
			<div class="form-group col">
			<label for="frm_generador_estado">Estado</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getEstado(); ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group col">
			<label for="frm_generador_referencias">Referencias</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getReferencias(); ?>" />
			</div>
		</div>
		<h5>Contacto</h5>
		<div class="form-row"><div class="form-group col">
			<label for="frm_generador_representante">Representante</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getRepresentante(); ?>" />
			</div>
			<div class="form-group col">
			<label for="frm_generador_representantecargo">Cargo</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getRepresentantecargo(); ?>" />
			</div>
			<div class="form-group col">
			<label for="frm_generador_representanteemail">Corro Electrónico</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getRepresentanteemail(); ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group col">
			<label for="frm_generador_representantetelefono">Teléfono</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getRepresentantetelefono(); ?>" />
			</div>
			<div class="form-group col">
			<label for="frm_generador_representanextension">Extensión</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getRepresentanteextension(); ?>" />
			</div>
			<div class="form-group col">
			<label for="frm_generador_representantetelefono2">Teléfono 2</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getRepresentantetelefono2(); ?>" />
			</div>
			<div class="form-group col">
			<label for="frm_generador_representanextension2">Extensión 2</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getRepresentanteextension2(); ?>" />
			</div>
		</div>
		<h5>Notas y Observaciones</h5>
		<div class="form-row"><div class="form-group col">
				<input class="form-control" disabled="disabled" value="<?= $objeto->getObservaciones(); ?>" />
			</div>
		</div>
		<h5>Facturación</h5>
		<div id="facturacion"><?= $facturaciones; ?></div>
		<div class="form-row">
			<div class="form-group col">
					<label>
						<input disabled="disabled" type="checkbox" id="frm_generador_ordencompra" name="frm_generador_ordencompra" value="1" <?= ($objeto->getOrdencompra()==1?'checked="checked"':''); ?> />
						Orden de Compra
					</label>
			</div>
			<div class="form-group col">
					<label>
						<input disabled="disabled" type="checkbox" id="frm_generador_desglosemanifiestos" name="frm_generador_desglosemanifiestos" value="1" <?= ($objeto->getDesglosemanifiestos()==1?'checked="checked"':''); ?> />
						Desglosar Manifiestos
					</label>
			</div>
		</div>
		<div class="form-row"><div class="form-group col">
			<label for="frm_generador_leyendas">Leyendas</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getLeyendas(); ?>" />
			</div>
		</div>
		<h5>Cobranza</h5>
		<div class="form-row"><div class="form-group col">
			<label for="frm_generador_cobranzacontacto">Contacto</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getCobranzacontacto(); ?>" />
			</div>
			<div class="form-group col">
			<label for="frm_generador_cobranzaemail">Corro Electrónico</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getCobranzaemail(); ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group col">
			<label for="frm_generador_cobranzatelefono">Teléfono</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getCobranzatelefono(); ?>" />
			</div>
			<div class="form-group col">
			<label for="frm_generador_cobranzaextension">Extensión</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getCobranzaextension(); ?>" />
			</div>
			<div class="form-group col">
			<label for="frm_generador_cobranzatelefono2">Teléfono 2</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getCobranzatelefono2(); ?>" />
			</div>
			<div class="form-group col">
			<label for="frm_generador_cobranzaextension2">Extensión 2</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getCobranzaextension2(); ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group col">
			<label for="frm_generador_cobranzaobservaciones">Observaciones</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getCobranzaobservaciones(); ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group col">
			<label for="frm_generador_cobranzacalle">Calle</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getCobranzacalle(); ?>" />
			</div>
			<div class="form-group col">
		    <label for="frm_generador_cobranzacp">Código Postal</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getCobranzacp(); ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group col">
			<label for="frm_generador_cobranzanumexterior">Número Exterior</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getCobranzanumexterior(); ?>" />
			</div>
			<div class="form-group col">
			<label for="frm_generador_cobranzanuminterior">Número Interior</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getCobranzanuminterior(); ?>" />
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col">
			<label for="frm_generador_cobranzacolonia">Colonia</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getCobranzacolonia(); ?>" />
			</div>
			<div class="form-group col">
			<label for="frm_generador_cobranzamunicipio">Delegación o Municipio</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getCobranzamunicipio(); ?>" />
			</div>
			<div class="form-group col">
			<label for="frm_generador_cobranzaestado">Estado</label>
				<input class="form-control" disabled="disabled" value="<?= $objeto->getCobranzaestado(); ?>" />
			</div>
		</div>
		<h5>Rutas Asociadas</h5>
		<div class="form-row">
		<?php foreach($rutas as $idx_ruta => $r): ?>
			<div class="form-group col">
				<?= $r; ?>
			</div>
		<?php 
			if( $idx_ruta % 4 == 3 ) {
				?></div><div class="form-row"><?php
			}
			endforeach; ?>
		</div>
		<h5>Fechas Calendarizadas</h5>
		<div class="form-row">
			<?php if($objeto->getFechasCalendario()!==false) foreach($objeto->getFechasCalendario() as $k=>$fecha):?>
				<div class="form-group col"><?= DateToMx($fecha); ?></div>
			    <?php if(($k+1)%6==0): ?>
			    	</div>
			    	<div class="form-row">
			    <?php endif; ?>
			<?php endforeach; ?>
		</div>
	</form>
</div>