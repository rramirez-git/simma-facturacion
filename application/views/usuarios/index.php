<?= $menumain; ?>
<div class="container">
	<div class="btn-toolbar float-right" role="toolbar">
		<div class="btn-group" role="group">
			<?php if($this->modsesion->hasPermisoHijo(88)): ?>
			<button type="button" class="btn btn-outline-secondary" title="Nuevo Usuario" onclick="location.href='<?= base_url('usuarios/nuevo');?>';">
				<i class="far fa-file-alt"></i>
			</button>
			<?php endif; ?>
		</div>
	</div>
	<h3>Usuarios</h3>
		<table class="table table-hover table-sm table-responsive">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Usuario</th>
					<th>E-Mail</th>
					<th>Activo</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>Nombre</th>
					<th>Usuario</th>
					<th>E-Mail</th>
					<th>Activo</th>
				</tr>
			</tfoot>
			<tbody>
				<?php if($usuarios!==false) foreach($usuarios as $usuario): ?>
					<tr>
						<td>
							<?php if($this->modsesion->hasPermisoHijo(89)): ?>
							<a href="<?= base_url('usuarios/ver/'.$usuario["idusuario"])?>">
							<?php endif; ?>
								<?= $usuario["nombre"]; ?> <?= $usuario["apaterno"]; ?> <?= $usuario["amaterno"]; ?>
							<?php if($this->modsesion->hasPermisoHijo(89)): ?>
							</a>
							<?php endif; ?>
						</td>
						<td><?= $usuario["usuario"]?></td>
						<td>
							<a href="mailto: <?= $usuario["email"]?>">
								<?= $usuario["email"]?>
							</a>
						</td>
						<td>
							<input type="checkbox" <?= ($usuario["activo"]==1?'checked="checked"':''); ?> disabled="disabled" />
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
</div>