<!-- Vista manifiestos/menucrearmanifiestos -->
<p><strong>Seleccione el Método de Creación de Manifiestos:</strong></p>
<div class="list-group">
	<?php if($this->modsesion->hasPermisoHijo( 38 ) ): ?>
		<button onclick="Manifiesto.CrearManifiestoCteGen()" type="button" class="list-group-item list-group-item-action">
			Por Número de Cliente / Generador
		</button>
	<?php endif; ?>
	<?php if($this->modsesion->hasPermisoHijo( 39 ) ): ?>
		<button onclick="Manifiesto.CrearManifiestoRutaBruto()" type="button" class="list-group-item list-group-item-action">
			Por Ruta (todos los generadores de la ruta)
		</button>
	<?php endif; ?>
	<?php if($this->modsesion->hasPermisoHijo( 40 ) ): ?>
		<button onclick="Manifiesto.CrearManifiestoRutaCalendario()" type="button" class="list-group-item list-group-item-action">
			Por Ruta (con base en calendario)
		</button>
	<?php endif; ?>
	<?php if($this->modsesion->hasPermisoHijo( 41 ) ): ?>
		<button onclick="Manifiesto.CrearManifiestoCalendario()" type="button" class="list-group-item list-group-item-action">
			Por Calendario
		</button>
	<?php endif; ?>
</div>
<!-- Vista manifiestos/menucrearmaifiestos End -->