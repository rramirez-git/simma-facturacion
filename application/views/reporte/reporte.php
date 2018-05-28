<?= $menumain; ?>
<div class="container">
	<h3>Reporte <small class="text-muted"><?= $reporte->getTitulo(); ?></small></h3>
	<form autocomplete="off" id="frm_reporte">
		<input type="hidden" name="read" id="read" value="1" />
		<input type="hidden" name="idreporte" id="idreporte" value="<?= $reporte->getIdreporte(); ?>">
		<div id="parametros">
			<div class="form-row">
				<?php foreach($reporte->getParams() as $k=>$p)
				{
					?>
					<div class="form-group col">
						<label for="<?= $p["parametro"]; ?>"><?= $p["etiqueta"]?></label>
						<?php
						switch(strtolower($p["tipo"]))
						{
							case 'text':
								?>
								<input type="text" name="<?= $p["parametro"]; ?>" id="<?= $p["parametro"]; ?>" class="form-control" value="<?= $p["valor"]; ?>" />
								<?php
								break;
							case 'numeric':
								?>
								<input type="number" name="<?= $p["parametro"]; ?>" id="<?= $p["parametro"]; ?>" class="form-control" min="0" value="<?= $p["valor"]; ?>" />
								<?php
								break;
							case 'checkbox':
								?>
								<input type="checkbox" name="<?= $p["parametro"]; ?>" id="<?= $p["parametro"]; ?>" value="1" <?= ($p["valor"]==1?'checked="checked"':''); ?> />
								<?php
								break;
							case 'date':
								?>
								<input type="date" name="<?= $p["parametro"]; ?>" id="<?= $p["parametro"]; ?>" class="form-control" value="<?= $p["valor"]; ?>" />
								<?php
								break;
							default:
								echo $p["tipo"];
						}
						?>
					</div>
					<?php
					if($k%4==3)
					{
						?>
						</div>
						<div class="form-row">
						<?php
					}
				}
				?>
			</div>
		</div>
		<button type="button" class="btn btn-outline-secondary" title="Filtros" onclick="$('#parametros').slideToggle(1000)">
			<i class="fas fa-filter"></i>
		</button>
		<button id="btnGenera" type="button" class="btn btn-outline-primary" onclick="Reporte.Ejecutar()" >Generar</button>
		<button id="btnDescarga" type="button" class="btn btn-info disabled" onclick="Reporte.Descargar()" >Descargar</button>
	</form>
	<div id="bodyreport"></div>
</div>