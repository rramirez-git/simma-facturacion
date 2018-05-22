<!-- Vista cliente/calendario -->
<?= $menumain; ?>
<div class="container">
	<h3>Calendarios</h3>
	<form autocomplete="off" class="noImprimir" id="frm_rc" method="post">
		<div class="form-row"><div class="form-group col">
			<label for="frm_fec_inicial">Periodo (inicio)</label>
				<input type="date" class="form-control" id="frm_fec_inicial" name="frm_fec_inicial" value="<?= $fec_inicial; ?>" />
			</div>
			<div class="form-group col">
			<label for="frm_fec_final">Periodo (fin)</label>
				<input type="date" class="form-control" id="frm_fec_final" name="frm_fec_final" value="<?= $fec_final; ?>" />
			</div>
		</div>
		<div class="form-row"><div class="form-group">
			<label>Tipo:</label>
				<label>
					<input type="radio" name="tipo_gen" value="rc" <?= ($tipo=="rc"?'checked="checked"':''); ?> />
					Por Rango de Clientes
				</label>
				<label>
					<input type="radio" name="tipo_gen" value="rg" <?= ($tipo=="rg"?'checked="checked"':''); ?> />
					Por Rango de Generadores
				</label>
			</div>
		</div>
		<div class="form-row"><div class="form-group col">
			<label for="frm_cte_inicial">No Cliente. (inicio)</label>
				<input type="number" class="form-control" id="frm_cte_inicial" name="frm_cte_inicial" value="<?= $cte_inicial; ?>" placeholder="" maxlength="10" />
			</div>
			<div class="form-group col">
			<label for="frm_cte_final">No Cliente. (fin)</label>
				<input type="number" class="form-control" id="frm_cte_final" name="frm_cte_final" value="<?= $cte_final; ?>" placeholder="" maxlength="10" />
			</div>
		</div>
		<div class="form-row"><div class="form-group col">
			<label for="frm_gen_inicial">No Generador (inicio)</label>
				<input type="number" class="form-control" id="frm_gen_inicial" name="frm_gen_inicial" value="<?= $gen_inicial; ?>" placeholder="" maxlength="10" />
			</div>
			<div class="form-group col">
			<label for="frm_gen_final">No Generador (fin)</label>
				<input type="number" class="form-control" id="frm_gen_final" name="frm_gen_final" value="<?= $gen_final; ?>" placeholder="" maxlength="10" />
			</div>
		</div>
		<button type="submit" class="btn btn-outline-primary">Generar</button>
	</form>
	<?php foreach($data as $cte): ?>
		<h4><?= $cte["identificador"]." - ".$cte["razonsocial"] . ( $cte[ "nombrecorto" ] != "" ? " ({$cte["nombrecorto"]})" : "" ); ?></h4>
		<?php foreach($cte["generadores"] as $k=>$gen): 
			if($k!=0)
				echo '<div class="saltoPagina"></div>';
			?>			
			<h5><?= $gen["identificador"]." - ".$gen["razonsocial"]. ( $gen[ "nombrecorto" ] != "" ? " ({$gen["nombrecorto"]})" : "" ); ?></h5>
			<?= $gen["vista"]; ?>
			<div class="calendarioEnd"></div>
		<?php endforeach; ?>
	<?php endforeach; ?>
</div>
<!-- Vista cliente/calendario End -->