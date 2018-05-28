<div class="dataListSupercontainerParent">
	<h3>Asignación de Clientes</h3>
	<div class="dataListSupercontainerSearcher">
		<form autocomplete="off" onsubmit="return false" id="frm_assign">
			<div class="form-row">
				<div class="form-group col">
					<label>Buscar por</label>
					<input type="text" class="form-control" id="frm_txt2Find" name="frm_txt2Find" maxlength="250" />
				</div>
				<div class="form-group col">
					<label>Cliente Inicial</label>
					<input type="number" class="form-control" id="frm_cteInicio" name="frm_cteInicio" maxlength="10" min=0 />
				</div>
				<div class="form-group col">
					<label>Cliente Final</label>
					<input type="number" class="form-control" id="frm_cteFin" name="frm_cteFin" maxlength="10" min=0 />
				</div>
			</div>
			<button type="button" class="btn btn-outline-secondary" onclick="Grupo.findCtes()">Buscar</button>
		</form>
	</div>
	<div class="dataListSupercontainer">
		<?php foreach($empresas as $emp): ?>
			<h4><?= $emp["data"]["razonsocial"]; ?></h4>
			<?php foreach($emp["sucs"] as $suc): ?>
				<h5><?= $suc["data"]["nombre"]; ?></h5>
				<ul class="list-group">
					<?php foreach($suc["ctes"] as $cte): ?>
						<li class="list-group-item" id="element_<?= $cte["idcliente"]; ?>" onclick="Grupo.setCte('<?= $cte["idcliente"]; ?>')"><?= "{$cte["identificador"]} - {$cte["razonsocial"]}" . ( $cte["nombrecorto"] != "" ? " ({$cte["nombrecorto"]})" : "" ); ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endforeach; ?>
		<?php endforeach; ?>
	</div>
</div>