<?= $menumain; ?>
<div class="container">
	<div class="btn-toolbar float-right" role="toolbar">
		<div class="btn-group" role="group">
			<?php if($this->modsesion->hasPermisoHijo(66)): ?>
			<button type="button" class="btn btn-outline-secondary" title="Ver el Generador Asociado" onclick="location.href='<?= base_url('generadores/ver/'.$objeto->getIdgenerador()); ?>';">
				<i class="fas fa-eye"></i>
			</button>
			<?php endif; ?>
		</div>
	</div>
	<h3>Generadores - Calendarización</h3>
	<div class="form-row">
		<div class="form-group col">
			<label>Cliente:</label>
			<input disabled="disabled" type="text" class="form-control" value="(<?= $cliente->getIdentificador(); ?>) <?= $cliente->getRazonsocial() . ( $cliente->getNombreCorto() != "" ? " - " . $cliente->getNombreCorto() : "" ); ?>" />
		</div>
		<div class="form-group col">
			<label>Generador:</label>
			<input disabled="disabled" type="text" class="form-control" value="(<?= $objeto->getIdentificador(); ?>) <?= $objeto->getRazonsocial() . ( $objeto->getNombreCorto() != "" ? " - " . $objeto->getNombreCorto() : "" ); ?>" />
		</div>
	</div>
	<div class="form-row">
		<div class="form-group col">
			<label>Frecuencia:</label>
			<input disabled="disabled" type="text" class="form-control" value="<?php foreach($frecuencia["opciones"] as $opc) if($opc["idcatalogodet"]==$objeto->getFrecuencia()): ?><?= $opc["descripcion"]; ?><?php endif; ?>" />
		</div>
		<div class="form-group col">
			<label>Inicio de Servicios:</label>
			<input disabled="disabled" type="text" class="form-control" value="<?= DateToMx($cliente->getFechaserviciosinicio()) ?>" />
		</div>
		<div class="form-group col">
			<label>Fin de Servicios:</label>
			<input disabled="disabled" type="text" class="form-control" value="<?= DateToMx($cliente->getFechaserviciosfin()) ?>" />
		</div>
	</div>
	<hr />
	<input type="hidden" id="idgenerador" name="idgenerador" value="<?= $objeto->getIdgenerador(); ?>" />
	<input type="hidden" id="frecuencia" name="frecuencia" value="<?= $objeto->getFrecuencia(); ?>" />
	<input type="hidden" id="inicio" name="inicio" value="<?= $cliente->getFechaserviciosinicio(); ?>" />
	<input type="hidden" id="fin" name="fin" value="<?= $cliente->getFechaserviciosfin(); ?>" />
	<?php
	if($objeto->getFrecuencia()=="74"||$objeto->getFrecuencia()=="75"||$objeto->getFrecuencia()=="76"||$objeto->getFrecuencia()=="77")
	{
		// 74	Frecuencia diaria
		// 75	Frecuencia dos veces por semana
		// 76	Frecuencia tres veces por semana
		// 77	Frecuencia semanal
		?>
		<div class="form-row">
			<div class="form-group col">Generar servicios para los días:</div>
		</div>
		<div class="form-row">
			<div class="form-group col">
				<label>
					<input type="checkbox" id="lunes" name="lunes" value="1" checked="checked" />
					Lunes
				</label>
			</div>
			<div class="form-group col">
				<label>
					<input type="checkbox" id="martes" name="martes" value="1" checked="checked" />
					Martes
				</label>
			</div>
			<div class="form-group col">
				<label>
					<input type="checkbox" id="miercoles" name="miercoles" value="1" checked="checked" />
					Miércoles
				</label>
			</div>
			<div class="form-group col">
				<label>
					<input type="checkbox" id="jueves" name="jueves" value="1" checked="checked" />
					Jueves
				</label>
			</div>
			<div class="form-group col">
				<label>
					<input type="checkbox" id="viernes" name="viernes" value="1" checked="checked" />
					Viernes
				</label>
			</div>
			<div class="form-group col">
				<label>
					<input type="checkbox" id="sabado" name="sabado" value="1" checked="checked" />
					Sábado
				</label>
			</div>
			<div class="form-group col">
				<label>
					<input type="checkbox" id="domingo" name="domingo" value="1" checked="checked" />
					Domingo
				</label>
			</div>
		</div>
		<?php
	}
	else if($objeto->getFrecuencia()=="78"||$objeto->getFrecuencia()=="79"||$objeto->getFrecuencia()=="80"||$objeto->getFrecuencia()=="81"||$objeto->getFrecuencia()=="82")
	{
		// 78	Frecuencia Quincenal
		// 79	Frecuencia Mensual
		// 80	Frecuencia Bimestral
		// 81	Frecuencia Trimestral
		// 82	Frecuencia Semestral
		?>
		<div class="form-row">
			<div class="col-xs-12">Generar servicios para los días:</div>
		</div>
		<div class="form-row">
			<div class="form-group col">
				<label>
					<input type="checkbox" id="lunes" name="lunes" value="1" />
					Lunes
				</label>
			</div>
			<div class="form-group col">
				<label>
					<input type="checkbox" id="martes" name="martes" value="1" />
					Martes
				</label>
			</div>
			<div class="form-group col">
				<label>
					<input type="checkbox" id="miercoles" name="miercoles" value="1" />
					Miércoles
				</label>
			</div>
			<div class="form-group col">
				<label>
					<input type="checkbox" id="jueves" name="jueves" value="1" />
					Jueves
				</label>
			</div>
			<div class="form-group col">
				<label>
					<input type="checkbox" id="viernes" name="viernes" value="1" />
					Viernes
				</label>
			</div>
			<div class="form-group col">
				<label>
					<input type="checkbox" id="sabado" name="sabado" value="1" />
					Sábado
				</label>
			</div>
			<div class="form-group col">
				<label>
					<input type="checkbox" id="domingo" name="domingo" value="1" />
					Domingo
				</label>
			</div>
		</div>
		<div class="form-row">
			<div class="col-xs-12">En la semana:</div>
		</div>
		<div class="form-row">
			<div class="form-group col">
				<label>
					<input type="checkbox" id="semana1" name="semana1" value="1" />
					Semana 01
				</label>
			</div>
			<div class="form-group col">
				<label>
					<input type="checkbox" id="semana2" name="semana2" value="1" />
					Semana 02
				</label>
			</div>
			<div class="form-group col">
				<label>
					<input type="checkbox" id="semana3" name="semana3" value="1" />
					Semana 03
				</label>
			</div>
			<div class="form-group col">
				<label>
					<input type="checkbox" id="semana4" name="semana4" value="1" />
					Semana 04
				</label>
			</div>
		</div>
		<?php
	}
	?>
	<button type="button" class="btn btn-outline-primary" onclick="Calendario.GeneraFechas()" >Siguiente</button>
	<hr />
	<div class="form-row">
		<div class="form-group col">
			<label>Agregar Fecha Eventual:</label>
			<input type="date" class="form-control" id="fechaeventual" name="fechaeventual" />
		</div>
		<div class="form-group col">
			<button type="button" class="btn btn-info" onclick="Calendario.GeneraCalendarioEventual()" >Agregar</button>
		</div>
	</div>
	<div id="fechascalendario_space" style="display: none;">
		<form autocomplete="off" id="frm_fechas">
				<table class="table table-hover table-sm table-responsive-sm">
					<thead>
						<tr>
							<th>Fecha</th>
							<th>Guardar</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>Fecha</th>
							<th>Guardar</th>
						</tr>
					</tfoot>
					<tbody id="fechascalendario_tbl"></tbody>
				</table>
		</form>
		<div class="row">
			<div class="col-sm-12">
				<div class="alert alert-info ">
					<div class="float-right">
						<label>
							<i class="fas fa-info-circle"></i>
							<input type="checkbox" checked="checked" id="delOtherDates" name="delOtherDates" value="1" />
							Eliminar fechar almacenadas anteriormente.
						</label>
					</div>
					&nbsp;
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-8"></div>
			<div class="col-sm-2">
		        <button type="button" class="btn btn-outline-primary" onclick="Calendario.GuardarFechas()" >Guardar</button>
		    </div>
		    <div class="col-sm-2">
		        <button type="button" class="btn btn-outline-secondary" onclick="location.href='<?= base_url('generadores/ver/'.$objeto->getIdgenerador()); ?>';">Cancelar</button>
		    </div>
		</div>
	</div>
</div>