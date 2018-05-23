<div class="dataListSupercontainerParent">
	<h3>Asignación de Sucursales</h3>
	<div class="dataListSupercontainerSearcher">
		<form autocomplete="off" onsubmit="return false" id="frm_assign">
			<div class="form-row">
				<div class="form-group col">
					<label>Buscar por</label>
					<input type="text" class="form-control" id="frm_txt2Find" name="frm_txt2Find" maxlength="250" />
				</div>
			</div>
			<button type="button" class="btn btn-outline-secondary" onclick="Grupo.findSucursales()">Buscar</button>
		</form>
	</div>
	<div class="dataListSupercontainer">
		<?php foreach($empresas as $emp): ?>
			<h4><?= $emp["data"]["razonsocial"]; ?></h4>
			<ul class="list-group">
				<?php foreach($emp["sucs"] as $suc): ?>
					<li class="list-group-item" id="element_<?= $suc["idsucursal"]; ?>" onclick="Grupo.setSucursal('<?= $suc["idsucursal"]; ?>')"><?= $suc["nombre"]; ?></li>
				<?php endforeach; ?>
			</ul>
		<?php endforeach; ?>
	</div>
</div>