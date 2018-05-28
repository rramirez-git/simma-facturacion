<?= $menumain; ?>
<div class="container">
	<h3>
		Generadores
		<button type="button" class="btn btn-outline-secondary btn-sm" title="Copiar datos del Cliente" onclick="Generador.CopiaDatos()">
			<i class="far fa-copy"></i>
		</button>
	</h3>
	<form autocomplete="off" id="frm_generadores">
		<input type="hidden" id="frm_generador_idsucursal" name="frm_generador_idgenerador" value="<?= $objeto->getIdgenerador(); ?>" />
		<input type="hidden" id="frm_generador_idcliente" name="frm_generador_idcliente" value="<?= $objeto->getIdcliente(); ?>" />
		<div class="form-row"><div class="form-group col">
			<label for="frm_generador_razonsocial">Razón Social <abbr class="text-danger" title="Campo Obligatorio">(obligatorio)</abbr></label>
				<input type="text" class="form-control" id="frm_generador_razonsocial" name="frm_generador_razonsocial" value="<?= $objeto->getRazonsocial(); ?>" placeholder="Nombre o Razón Social del Generador" maxlength="60" />
			</div>
			<div class="form-group col">
			<label for="frm_generador_rfc">Registro Federal de Contribuyentes <abbr class="text-danger" title="Campo Obligatorio">(obligatorio)</abbr></label>
				<input type="text" class="form-control" id="frm_generador_rfc" name="frm_generador_rfc" value="<?= $objeto->getRfc(); ?>" placeholder="Registro Federal de Contribuyentes del Generador" />
			</div>
		</div>
		<div class="form-row"><div class="form-group col">
			<label for="frm_generador_nombrecorto">Nombre Corto</label>
				<input type="text" class="form-control" id="frm_generador_nombrecorto" name="frm_generador_nombrecorto" value="<?= $objeto->getNombrecorto(); ?>" placeholder="" maxlength="60" />
			</div>
			<div class="form-group col">
			<label for="frm_generador_identificador">Número de Generador <abbr class="text-danger" title="Campo Obligatorio">(obligatorio)</abbr></label>
				<input type="text" class="form-control" id="frm_generador_identificador" name="frm_generador_identificador" value="<?= $objeto->getIdentificador(); ?>" placeholder="Número de Generador" readonly="readonly" maxlength="13" />
			</div>
			<div class="form-group col">
			<label for="frm_generador_numregamb">Número de Registro Ambiental</label>
				<input type="text" class="form-control" id="frm_generador_numregamb" name="frm_generador_numregamb" value="<?= $objeto->getNumregamb(); ?>" placeholder="NRA" maxlength="61" />
			</div>
			<!--<div class="form-group col">
			<label for="frm_generador_numreggen">Número de Registro como Generador</label>
				<input type="text" class="form-control" id="frm_generador_numreggen" name="frm_generador_numreggen" value="<?= $objeto->getNumreggen(); ?>" placeholder="NRG" />
			</div>-->
		</div>
		<div class="form-row"><div class="form-group col">
			<label for="frm_generador_frecuencia">Frecuencia de Recolección</label>
				<select id="frm_generador_frecuencia" name="frm_generador_frecuencia" class="form-control">
					<?php if($frecuencia!==false) foreach($frecuencia["opciones"] as $opc): ?>
						<option value="<?= $opc["idcatalogodet"]; ?>" <?= ($opc["idcatalogodet"]==$objeto->getFrecuencia()?'selected="selected"':''); ?> >
							<?= $opc["descripcion"]; ?>
						</option>
					<?php endforeach; ?>
				</select>
			</div>
			<!--<div class="form-group col">
			<label for="frm_generador_servicio">Tipo de Servicio</label>
				<input type="text" class="form-control" id="frm_generador_servicio" name="frm_generador_servicio" value="<?= $objeto->getServicio(); ?>" placeholder="Tipo de Servicio" />
			</div>-->
			<div class="form-group col">
			<label for="frm_generador_giro">Giro</label>
				<input type="text" class="form-control" id="frm_generador_giro" name="frm_generador_giro" value="<?= $objeto->getGiro(); ?>" placeholder="" maxlength="255" />
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col">
					<label>
						<input type="checkbox" value="1" id="frm_generador_activo" name="frm_generador_activo" <?= ($objeto->getActivo()==1?'checked="checked"':''); ?> />
						Activo
					</label>
					<input type="hidden" id="frm_generador_fechaactivo" name="frm_generador_fechaactivo" value="<?= $objeto->getFechaactivo(); ?>" />
					<input type="hidden" id="frm_generador_activo_current" name="frm_generador_activo_current" value="<?= $objeto->getActivo(); ?>" />
			</div>
		</div>
		<h5>Servicios</h5>
		<div class="form-row">
			<div class="form-group col">
					<label>
						<input type="checkbox" value="1" id="frm_generador_serviciolunes" name="frm_generador_serviciolunes" <?= ($objeto->getServiciolunes()==1?'checked="checked"':''); ?> />
						Lunes
					</label>
			</div>
			<div class="form-group col">
					<label>
						<input type="checkbox" value="1" id="frm_generador_serviciomartes" name="frm_generador_serviciomartes" <?= ($objeto->getServiciomartes()==1?'checked="checked"':''); ?> />
						Martes
					</label>
			</div>
			<div class="form-group col">
					<label>
						<input type="checkbox" value="1" id="frm_generador_serviciomiercoles" name="frm_generador_serviciomiercoles" <?= ($objeto->getServiciomiercoles()==1?'checked="checked"':''); ?> />
						Miércoles
					</label>
			</div>
			<div class="form-group col">
					<label>
						<input type="checkbox" value="1" id="frm_generador_serviciojueves" name="frm_generador_serviciojueves" <?= ($objeto->getServiciojueves()==1?'checked="checked"':''); ?> />
						Jueves
					</label>
			</div>
			<div class="form-group col">
					<label>
						<input type="checkbox" value="1" id="frm_generador_servicioviernes" name="frm_generador_servicioviernes" <?= ($objeto->getServicioviernes()==1?'checked="checked"':''); ?> />
						Viernes
					</label>
			</div>
			<div class="form-group col">
					<label>
						<input type="checkbox" value="1" id="frm_generador_serviciosabado" name="frm_generador_serviciosabado" <?= ($objeto->getServiciosabado()==1?'checked="checked"':''); ?> />
						Sabado
					</label>
			</div>
			<div class="form-group col">
					<label>
						<input type="checkbox" value="1" id="frm_generador_serviciodomingo" name="frm_generador_serviciodomingo" <?= ($objeto->getServiciodomingo()==1?'checked="checked"':''); ?> />
						Domingo
					</label>
			</div>
		</div>
		<div class="form-row"><div class="form-group col">
			<label for="frm_generador_horarioinicio">Hora Inicio (Mat.)</label>
				<input type="time" class="form-control" id="frm_generador_horarioinicio" name="frm_generador_horarioinicio" value="<?= $objeto->getHorarioinicio(); ?>" />
			</div>
			<div class="form-group col">
			<label for="frm_generador_horariofin">Hora Fin (Mat.)</label>
				<input type="time" class="form-control" id="frm_generador_horariofin" name="frm_generador_horariofin" value="<?= $objeto->getHorariofin(); ?>" />
			</div>
			<div class="form-group col">
			<label for="frm_generador_horarioinicio2">Hora Inicio (Vesp.)</label>
				<input type="time" class="form-control" id="frm_generador_horarioinicio2" name="frm_generador_horarioinicio2" value="<?= $objeto->getHorarioinicio2(); ?>" />
			</div>
			<div class="form-group col">
			<label for="frm_generador_horariofin2">Hora Fin (Vesp.)</label>
				<input type="time" class="form-control" id="frm_generador_horariofin2" name="frm_generador_horariofin2" value="<?= $objeto->getHorariofin2(); ?>" />
			</div>
		</div>
		<h5>Dirección</h5>
		<div class="form-row"><div class="form-group col">
			<label for="frm_generador_calle">Calle</label>
				<input type="text" class="form-control" id="frm_generador_calle" name="frm_generador_calle" value="<?= $objeto->getCalle(); ?>" placeholder="Calle" />
			</div>
			<div class="form-group col">
		    <label for="frm_generador_cp">Código Postal</label>
		    	<div class="input-group">
					<input type="number" class="form-control" id="frm_generador_cp" name="frm_generador_cp" value="<?= $objeto->getCp(); ?>" placeholder="C. P." min="0" max="99999" maxlength="5" />
					<div class="input-group-append">
						<button type="button" class="btn btn-outline-secondary" onclick="Generador.DisplayFrmCP()">
							<i class="fas fa-search"></i>
						</button>
					</div>
				</div>
			</div>
		</div>
		<div class="form-row"><div class="form-group col">
			<label for="frm_generador_numexterior">Número Exterior</label>
				<input type="text" class="form-control" id="frm_generador_numexterior" name="frm_generador_numexterior" value="<?= $objeto->getNumexterior(); ?>" placeholder="Número Exterior" />
			</div>
			<div class="form-group col">
			<label for="frm_generador_numinterior">Número Interior</label>
				<input type="text" class="form-control" id="frm_generador_numinterior" name="frm_generador_numinterior" value="<?= $objeto->getNuminterior(); ?>" placeholder="Número Interior" />
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col">
			<label for="frm_generador_colonia">Colonia</label>
				<input type="text" class="form-control" id="frm_generador_colonia" name="frm_generador_colonia" value="<?= $objeto->getColonia(); ?>" placeholder="Colonia" />
			</div>
			<div class="form-group col">
			<label for="frm_generador_municipio">Delegación o Municipio</label>
				<input type="text" class="form-control" id="frm_generador_municipio" name="frm_generador_municipio" value="<?= $objeto->getMunicipio(); ?>" placeholder="Delegación o Municipio" maxlength="27" />
			</div>
			<div class="form-group col">
			<label for="frm_generador_estado">Estado</label>
				<input type="text" class="form-control" id="frm_generador_estado" name="frm_generador_estado" value="<?= $objeto->getEstado(); ?>" placeholder="Estado" maxlength="16" />
			</div>
		</div>
		<div class="form-row"><div class="form-group col">
			<label for="frm_generador_referencias">Referencias</label>
				<textarea rows="3" class="form-control" id="frm_generador_referencias" name="frm_generador_referencias"><?= $objeto->getReferencias(); ?></textarea>
			</div>
		</div>
		<h5>Contacto</h5>
		<div class="form-row"><div class="form-group col">
			<label for="frm_generador_representante">Representante <abbr class="text-danger" title="Campo Obligatorio">(obligatorio)</abbr></label>
				<input type="text" class="form-control" id="frm_generador_representante" name="frm_generador_representante" value="<?= $objeto->getRepresentante(); ?>" placeholder="Representante" maxlength="75" />
			</div>
			<div class="form-group col">
			<label for="frm_generador_representantecargo">Cargo</label>
				<input type="text" class="form-control" id="frm_generador_representantecargo" name="frm_generador_representantecargo" value="<?= $objeto->getRepresentantecargo(); ?>" placeholder="Cargo del Representante" />
			</div>
			<div class="form-group col">
			<label for="frm_generador_representanteemail">Corro Electrónico</label>
				<input type="email" class="form-control" id="frm_generador_representanteemail" name="frm_generador_representanteemail" value="<?= $objeto->getRepresentanteemail(); ?>" placeholder="Correo Electrónico" />
			</div>
		</div>
		<div class="form-row"><div class="form-group col">
			<label for="frm_generador_representantetelefono">Teléfono</label>
				<input type="tel" class="form-control" id="frm_generador_representantetelefono" name="frm_generador_representantetelefono" value="<?= $objeto->getRepresentantetelefono(); ?>" placeholder="Teléfono" maxlength="13" />
			</div>
			<div class="form-group col">
			<label for="frm_generador_representanextension">Extensión</label>
				<input type="tel" class="form-control" id="frm_generador_representanteextension" name="frm_generador_representanteextension" value="<?= $objeto->getRepresentanteextension(); ?>" placeholder="Extensión" maxlength="5" />
			</div>
			<div class="form-group col">
			<label for="frm_generador_representantetelefono2">Teléfono 2</label>
				<input type="tel" class="form-control" id="frm_generador_representantetelefono2" name="frm_generador_representantetelefono2" value="<?= $objeto->getRepresentantetelefono2(); ?>" placeholder="Teléfono 2" maxlength="13" />
			</div>
			<div class="form-group col">
			<label for="frm_generador_representanextension2">Extensión 2</label>
				<input type="tel" class="form-control" id="frm_generador_representanteextension2" name="frm_generador_representanteextension2" value="<?= $objeto->getRepresentanteextension2(); ?>" placeholder="Extensión 2" maxlength="5" />
			</div>
		</div>
		<h5>Notas y Observaciones</h5>
		<div class="form-row"><div class="form-group col">
				<textarea rows="3" class="form-control" id="frm_generador_observaciones" name="frm_generador_observaciones"><?= $objeto->getObservaciones(); ?></textarea>
			</div>
		</div>
		<h5>
			Facturación
			<button type="button" class="btn btn-outline-secondary btn-sm" title="Agregar Opción" onclick="Generador.FrmAgregarFacturacion()">
				<i class="fas fa-plus"></i>
			</button>
		</h5>
		<div id="facturacion"><?= $facturaciones; ?></div>
		<div class="form-row">
			<div class="form-group col">
					<label>
						<input type="checkbox" id="frm_generador_ordencompra" name="frm_generador_ordencompra" value="1" <?= ($objeto->getOrdencompra()==1?'checked="checked"':''); ?> />
						Orden de Compra
					</label>
			</div>
			<div class="form-group col">
					<label>
						<input type="checkbox" id="frm_generador_desglosemanifiestos" name="frm_generador_desglosemanifiestos" value="1" <?= ($objeto->getDesglosemanifiestos()==1?'checked="checked"':''); ?> />
						Desglosar Manifiestos
					</label>
			</div>
		</div>
		<div class="form-row"><div class="form-group col">
			<label for="frm_generador_leyendas">Leyendas</label>
				<textarea rows="3" class="form-control" id="frm_generador_leyendas" name="frm_generador_leyendas"><?= $objeto->getLeyendas(); ?></textarea>
			</div>
		</div>
		<h5>
			Cobranza
			<button type="button" class="btn btn-outline-secondary btn-sm" title="Copiar datos desde generales" onclick="Generador.CopiaGenerales()">
				<i class="far fa-copy"></i>
			</button>
		</h5>
		<div class="form-row"><div class="form-group col">
			<label for="frm_generador_cobranzacontacto">Contacto</label>
				<input type="text" class="form-control" id="frm_generador_cobranzacontacto" name="frm_generador_cobranzacontacto" value="<?= $objeto->getCobranzacontacto(); ?>" placeholder="Contacto" />
			</div>
			<div class="form-group col">
			<label for="frm_generador_cobranzaemail">Corro Electrónico</label>
				<input type="email" class="form-control" id="frm_generador_cobranzaemail" name="frm_generador_cobranzaemail" value="<?= $objeto->getCobranzaemail(); ?>" placeholder="Correo Electrónico" />
			</div>
		</div>
		<div class="form-row"><div class="form-group col">
			<label for="frm_generador_cobranzatelefono">Teléfono</label>
				<input type="tel" class="form-control" id="frm_generador_cobranzatelefono" name="frm_generador_cobranzatelefono" value="<?= $objeto->getCobranzatelefono(); ?>" placeholder="Teléfono" maxlength="13" />
			</div>
			<div class="form-group col">
			<label for="frm_generador_cobranzaextension">Extensión</label>
				<input type="tel" class="form-control" id="frm_generador_cobranzaextension" name="frm_generador_cobranzaextension" value="<?= $objeto->getCobranzaextension(); ?>" placeholder="Extensión" maxlength="5" />
			</div>
			<div class="form-group col">
			<label for="frm_generador_cobranzatelefono2">Teléfono 2</label>
				<input type="tel" class="form-control" id="frm_generador_cobranzatelefono2" name="frm_generador_cobranzatelefono2" value="<?= $objeto->getCobranzatelefono2(); ?>" placeholder="Teléfono 2" maxlength="13" />
			</div>
			<div class="form-group col">
			<label for="frm_generador_cobranzaextension2">Extensión 2</label>
				<input type="tel" class="form-control" id="frm_generador_cobranzaextension2" name="frm_generador_cobranzaextension2" value="<?= $objeto->getCobranzaextension2(); ?>" placeholder="Extensión 2" maxlength="5" />
			</div>
		</div>
		<div class="form-row"><div class="form-group col">
			<label for="frm_generador_cobranzaobservaciones">Observaciones</label>
				<textarea rows="3" class="form-control" id="frm_generador_cobranzaobservaciones" name="frm_generador_cobranzaobservaciones"><?= $objeto->getCobranzaobservaciones(); ?></textarea>
			</div>
		</div>
		<div class="form-row"><div class="form-group col">
			<label for="frm_generador_cobranzacalle">Calle</label>
				<input type="text" class="form-control" id="frm_generador_cobranzacalle" name="frm_generador_cobranzacalle" value="<?= $objeto->getCobranzacalle(); ?>" placeholder="Calle" />
			</div>
			<div class="form-group col">
		    <label for="frm_generador_cobranzacp">Código Postal</label>
		    	<div class="input-group">
					<input type="number" class="form-control" id="frm_generador_cobranzacp" name="frm_generador_cobranzacp" value="<?= $objeto->getCobranzacp(); ?>" placeholder="C. P." min="0" max="99999" />
					<div class="input-group-append">
						<button type="button" class="btn btn-outline-secondary" onclick="Generador.DisplayFrmCPCobranza()">
							<i class="fas fa-search"></i>
						</button>
					</div>
				</div>
			</div>
		</div>
		<div class="form-row"><div class="form-group col">
			<label for="frm_generador_cobranzanumexterior">Número Exterior</label>
				<input type="text" class="form-control" id="frm_generador_cobranzanumexterior" name="frm_generador_cobranzanumexterior" value="<?= $objeto->getCobranzanumexterior(); ?>" placeholder="Número Exterior" />
			</div>
			<div class="form-group col">
			<label for="frm_generador_cobranzanuminterior">Número Interior</label>
				<input type="text" class="form-control" id="frm_generador_cobranzanuminterior" name="frm_generador_cobranzanuminterior" value="<?= $objeto->getCobranzanuminterior(); ?>" placeholder="Número Interior" />
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col">
			<label for="frm_generador_cobranzacolonia">Colonia</label>
				<input type="text" class="form-control" id="frm_generador_cobranzacolonia" name="frm_generador_cobranzacolonia" value="<?= $objeto->getCobranzacolonia(); ?>" placeholder="Colonia" />
			</div>
			<div class="form-group col">
			<label for="frm_generador_cobranzamunicipio">Delegación o Municipio</label>
				<input type="text" class="form-control" id="frm_generador_cobranzamunicipio" name="frm_generador_cobranzamunicipio" value="<?= $objeto->getCobranzamunicipio(); ?>" placeholder="Delegación o Municipio" />
			</div>
			<div class="form-group col">
			<label for="frm_generador_cobranzaestado">Estado</label>
				<input type="text" class="form-control" id="frm_generador_cobranzaestado" name="frm_generador_cobranzaestado" value="<?= $objeto->getCobranzaestado(); ?>" placeholder="Estado" />
			</div>
		</div>
		<?php if($this->modsesion->hasPermisoHijo(75) || $this->modsesion->hasPermisoHijo(78)): ?>
			<h5>Rutas Asociadas</h5>
			<?php
			foreach($rutasEsquema as $emp)
			{
				?>
				<div class="form-row"><div class="col"><strong><?= $emp["razonsocial"]; ?></strong></div></div>
				<?php
				foreach($emp["sucursales"] as $suc)
				{
					//var_dump($suc);
					?>
					<div class="form-row"><div class="col"><i><?= $suc["nombre"]; ?></i></div></div>
					<div class="form-row">
					<?php
					foreach($suc["rutas"] as $idx_ruta => $ruta)
					{
						?>
						<div class="form-group col">
									<label>
										<input type="checkbox" value="<?= $ruta["id"]; ?>" id="frm_generador_rutas[]" name="frm_generador_rutas[]" <?= (in_array($ruta["id"],$objeto->getRutas())?'checked="checked"':''); ?> />
										<?= $ruta["identificador"]." - ".$ruta["nombre"]; ?>
									</label>
							</div>
						<?php
						if( $idx_ruta % 4 == 3 ) {
							?></div><div class="form-row"><?php
						}
					}
					?>
					</div>
					<?php
				}
			}
			?>
		<?php endif; ?>
		<button type="button" class="btn btn-outline-primary" onclick="Generador.Enviar(<?= ($objeto->getIdgenerador()!="" && $objeto->getIdgenerador()!=0?'false':'true'); ?>)" >Guardar</button>
		<button type="button" class="btn btn-outline-secondary" onclick="location.href='<?= base_url("clientes/ver/{$objeto->getIdcliente()}"); ?>'">Cancelar</button>
	</form>
</div>
<script type="text/javascript">
	var dataCliente={
		razonsocial:'<?= $cliente->getRazonsocial(); ?>',
		rfc:'<?= $cliente->getRfc(); ?>',
		direccion:{
			calle:'<?= $cliente->getCalle(); ?>',
			numexterior:'<?= $cliente->getNumexterior(); ?>',
			numinterior:'<?= $cliente->getNuminterior(); ?>',
			cp:'<?= $cliente->getCp(); ?>',
			colonia:'<?= $cliente->getColonia(); ?>',
			municipio:'<?= $cliente->getMunicipio(); ?>',
			estado:'<?= $cliente->getEstado(); ?>',
			referencias:'<?= str_replace("\r","\\r\\n",str_replace("\n","",$cliente->getReferencias())); ?>'
		},
		representante:{
			nombre:'<?= $cliente->getRepresentante(); ?>',
			cargo:'<?= $cliente->getRepresentantecargo(); ?>',
			email:'<?= $cliente->getRepresentanteemail(); ?>',
			telefono:'<?= $cliente->getRepresentantetelefono(); ?>',
			extension:'<?= $cliente->getRepresentanteextencion(); ?>',
			telefono2:'<?= $cliente->getRepresentantetelefono2(); ?>',
			extension2:'<?= $cliente->getRepresentanteextension2(); ?>',
		},
		observaciones:'<?= str_replace("\r","\\r\\n",str_replace("\n","",$cliente->getObservaciones())); ?>',
		facturacion:{
			leyendas:'<?= $cliente->getLeyendas(); ?>',
			ordencompra:'<?= $cliente->getOrdencompra(); ?>',
			desglosemanifiestos:'<?= $cliente->getDesglosemanifiestos(); ?>'
		},
		cobranza:{
			nombre:'<?= $cliente->getCobranzacontacto(); ?>',
			email:'<?= $cliente->getCobranzaemail(); ?>',
			telefono:'<?= $cliente->getCobranzatelefono(); ?>',
			extension:'<?= $cliente->getCobranzaextension(); ?>',
			telefono2:'<?= $cliente->getCobranzatelefono2(); ?>',
			extension2:'<?= $cliente->getCobranzaextension2(); ?>',
			observaciones:'<?= str_replace("\r","\\r\\n",str_replace("\n","",$cliente->getCobranzaobservaciones())); ?>',
			calle:'<?= $cliente->getCobranzacalle(); ?>',
			numexterior:'<?= $cliente->getCobranzanumexterior(); ?>',
			numinterior:'<?= $cliente->getCobranzanuminterior(); ?>',
			cp:'<?= $cliente->getCobranzacp(); ?>',
			colonia:'<?= $cliente->getCobranzacolonia(); ?>',
			municipio:'<?= $cliente->getCobranzamunicipio(); ?>',
			estado:'<?= $cliente->getCobranzaestado(); ?>'
		}
	};
</script>