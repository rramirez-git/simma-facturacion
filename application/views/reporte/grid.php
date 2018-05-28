<?php
$enc="";
?>
	<table class="table table-hover table-sm table-responsive Reporte" id="reporttable">
		<tbody id="reporttablebody">
			<?php if($registros!==false) foreach($registros as $k=>$reg):
				?>
				<tr>
					<?php foreach($reg as $k2=>$campo): 
						if($k==0)
							$enc.="<th>$k2</th>";
						?>
						<td><?= $campo ?></td>
					<?php endforeach; ?>
				</tr>
			<?php endforeach;?>
		</tbody>
		<thead>
			<tr>
				<?= $enc; ?>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<?= $enc; ?>
			</tr>
		</tfoot>
	</table>
<?php if($registros===false||count($registros)==0): ?>
	<div class="alert alert-warning">No hay resultados que mostrar</div>
<?php endif; ?>
<!--
<?= $this->db->last_query(); ?>
-->