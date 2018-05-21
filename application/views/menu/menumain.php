<!-- Vista menu/menumain -->
<?php
if(!isset($justCloseWindow)) $justCloseWindow=false
?>
<nav id="main_navbar" class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
	<a class="navbar-brand" href="<?= base_url('inicio/principal'); ?>">
		<img src="<?= base_url('project_files/img/sistema/logo_simma.png'); ?>" class="logo_simma" />
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu_navegacion_principal" aria-controls="menu_navegacion_principal" aria-expanded="false" aria-label="Mostrar/Ocultar Menú Principal">
		<span class="navbar-toggler-icon"></span>
  	</button>
  	<div class="collapse navbar-collapse" id="menu_navegacion_principal">
  		<ul class="navbar-nav mr-auto">
  			<?php if( ! $justCloseWindow ): ?>
  				<?php if( $this->modsesion->hasPermisoHijo( 121 ) ): ?>
  					<li class="nav-item dropdown">
  						<a class="nav-link dropdown-toggle" href="#" id="navbar_item_121" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Documentación
						</a>
						<div class="dropdown-menu" aria-labelledby="navbar_item_121">
							<?php if($this->modsesion->hasPermisoHijo(122)): ?>
								<a class="dropdown-item" href="http://pisa.servicios-simma.com.mx" target="_blank">PISA</a>
							<?php endif;
							if($this->modsesion->hasPermisoHijo(123)): ?>
								<a class="dropdown-item" href="http://pisa.servicios-simma.com.mx/1._DIMESA" target="_blank">PISA - DIMESA</a>
							<?php endif;
							if($this->modsesion->hasPermisoHijo(124)): ?>
								<a class="dropdown-item" href="http://pisa.servicios-simma.com.mx/2._F._LA_PAZ" target="_blank">PISA - FARMACIA LA PAZ</a>
							<?php endif;
							if($this->modsesion->hasPermisoHijo(125)): ?>
								<a class="dropdown-item" href="http://pisa.servicios-simma.com.mx/3._MEDICOM" target="_blank">PISA - MEDICOM</a>
							<?php endif;
							if($this->modsesion->hasPermisoHijo(126)): ?>
								<a class="dropdown-item" href="http://pisa.servicios-simma.com.mx/4._SAFE" target="_blank">PISA - SAFE</a>
							<?php endif;
							if($this->modsesion->hasPermisoHijo(127)): ?>
								<a class="dropdown-item" href="http://pisa.servicios-simma.com.mx/5._SANEFRO" target="_blank">PISA - SANEFRO</a>
							<?php endif; ?>
						</div>
  					</li>
  				<?php endif; ?>
  				<?php if( $this->modsesion->hasPermisoHijo( 1 ) ): ?>
  					<li class="nav-item dropdown">
  						<a class="nav-link dropdown-toggle" href="#" id="navbar_item_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Adminisración
						</a>
						<div class="dropdown-menu" aria-labelledby="navbar_item_1">
							<?php if($this->modsesion->hasPermisoHijo(5)): ?>
								<a class="dropdown-item" href="<?= base_url('clientes'); ?>">Clientes</a>
							<?php endif;
							if($this->modsesion->hasPermisoHijo(6)):?>
								<a class="dropdown-item" href="<?= base_url('empresas'); ?>">Empresas</a>
							<?php endif;
							if($this->modsesion->hasPermisoHijo(7)):?>
								<a class="dropdown-item" href="<?= base_url('sucursales'); ?>">Sucursales</a>
							<?php endif;
							if($this->modsesion->hasPermisoHijo(8)):?>
								<a class="dropdown-item" href="<?= base_url('operadores'); ?>">Operadores</a>
							<?php endif;
							if($this->modsesion->hasPermisoHijo(9)):?>
								<a class="dropdown-item" href="<?= base_url('vehiculos'); ?>">Vehiculos</a>
							<?php endif;
							if($this->modsesion->hasPermisoHijo(52)):?>
								<a class="dropdown-item" href="<?= base_url('rutas'); ?>">Rutas</a>
							<?php endif;
							if($this->modsesion->hasPermisoHijo(53)):?>
								<a class="dropdown-item" href="<?= base_url('residuos'); ?>">Residuos</a>
							<?php endif; ?>
						</div>
					</li>
				<?php endif; ?>
				<?php if( $this->modsesion->hasPermisoHijo( 2 ) ): ?>
  					<li class="nav-item dropdown">
  						<a class="nav-link dropdown-toggle" href="#" id="navbar_item_2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Operación
						</a>
						<div class="dropdown-menu" aria-labelledby="navbar_item_2">
							<?php if($this->modsesion->hasPermisoHijo(18)): ?>
								<a class="dropdown-item" href="<?= base_url('manifiestos'); ?>">Manifiestos</a>
							<?php endif;
							if($this->modsesion->hasPermisoHijo(19)):?>
								<a class="dropdown-item" href="<?= base_url('bitacoras'); ?>">Bitácoras</a>
							<?php endif; ?>
						</div>
					</li>
				<?php endif; ?>
				<?php if( $this->modsesion->hasPermisoHijo( 3 ) ): ?>
  					<li class="nav-item dropdown">
  						<a class="nav-link dropdown-toggle" href="#" id="navbar_item_3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Configuración
						</a>
						<div class="dropdown-menu" aria-labelledby="navbar_item_3">
							<?php if($this->modsesion->hasPermisoHijo(82)): ?>
								<a class="dropdown-item" href="<?= base_url('cambiopassword'); ?>">Cambiar Contraseña</a>
							<?php endif;
							if($this->modsesion->hasPermisoHijo(81)):?>
								<a class="dropdown-item" href="<?= base_url('reseteopassword'); ?>">Resetear Contraseña</a>
							<?php endif;
							if($this->modsesion->hasPermisoHijo(29)):?>
								<a class="dropdown-item" href="<?= base_url('catalogos'); ?>">Catalogos</a>
							<?php endif;
							if($this->modsesion->hasPermisoHijo(109)):?>
								<a class="dropdown-item" href="<?= base_url('grupos'); ?>">Grupos de Clientes</a>
							<?php endif;
							if($this->modsesion->hasPermisoHijo(26)):?>
								<a class="dropdown-item" href="<?= base_url('usuarios'); ?>">Usuarios</a>
							<?php endif;
							if($this->modsesion->hasPermisoHijo(28)):?>
								<a class="dropdown-item" href="<?= base_url('perfiles'); ?>">Perfiles</a>
							<?php endif;
							if($this->modsesion->hasPermisoHijo(27)):?>
								<a class="dropdown-item" href="<?= base_url('permisos'); ?>">Permisos</a>
							<?php endif; ?>
						</div>
					</li>
				<?php endif; ?>
  			<?php endif; ?>
  		</ul>
  	</div>
  	<a class="btn float-right btn-dark" href="<?= base_url('/sesiones/logout'); ?>">
  		<i class="far fa-window-close"></i>
  	</a>
</nav>
<div id="main_navbar_blank_space"></div>
<script type="text/javascript">
	$( document ).ready( function() {
		$( "#main_navbar_blank_space" ).height( $( "#main_navbar" ).height() + 25 );
	} );
</script>
<!-- Vista menu/menumain End -->