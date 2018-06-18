<?= $menumain; ?>
<div class="container">
	<h3>Desasociar Generadores <small class="text-muted"><?= $ruta->getIdentificador()." - ".$ruta->getNombre(); ?></small></h3>
		<table class="table table-hover table-sm table-responsive-sm">
			<thead>
				<tr>
					<th></th>
					<th>No. Cliente</th>
					<th>Cliente</th>
					<th>No. Generador</th>
					<th>Generador</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th></th>
					<th>No. Cliente</th>
					<th>Cliente</th>
					<th>No. Generador</th>
					<th>Generador</th>
				</tr>
			</tfoot>
			<tbody id="generadores">
				<?php
				$gs=$ruta->getGeneradoresAsociados($ruta->getIdruta());
				if($gs!==false && count($gs)>0) foreach($gs as $g)
				{
					$generador->setIdgenerador($g["idgenerador"]);
					$generador->getFromDatabase();
					$cliente->setIdcliente($generador->getIdcliente());
					$cliente->getFromDatabase();
					?>
					<tr>
						<td><input type="checkbox" value="<?= $generador->getIdgenerador(); ?>" /></td>
						<td><?= $cliente->getIdentificador(); ?></td>
						<td><?= $cliente->getRazonsocial(); ?></td>
						<td><?= $generador->getIdentificador(); ?></td>
						<td><?= $generador->getRazonsocial(); ?></td>
					</tr>
					<?php
				}
				?>
			</tbody>
		</table>
	<input type="hidden" id="idruta" name="idruta" value="<?= $ruta->getIdruta(); ?>" />
	<button type="button" class="btn btn-outline-primary" onclick="Ruta.DelGeneradores()" >Desasociar</button>
	<button type="button" class="btn btn-outline-secondary" onclick="location.href='<?= base_url("rutas/ver/".$ruta->getIdruta()); ?>'">Cancelar</button>
</div>