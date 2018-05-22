<!doctype html>
<html class="no-js" lang="es">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0" />
		<title>SIMMA | Servicios Industriales para el manejo del medio ambiente.</title>
		<link rel="stylesheet" href="<?= base_url('project_files/css/style.css'); ?>" />
		<link rel="shortcut icon" href="<?= base_url('project_files/img/icon/favicon.ico'); ?>" type="image/x-icon" />
		<link rel="apple-touch-icon" href="<?= base_url('project_files/img/icon/favicon.ico'); ?>" />
		<link rel="apple-touch-icon" sizes="57x57" href="<?= base_url('project_files/img/icon/apple-touch-icon-57x57'); ?>" />
		<link rel="apple-touch-icon" sizes="72x72" href="<?= base_url('project_files/img/icon/apple-touch-icon-72x72.png'); ?>" />
		<link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('project_files/img/icon/apple-touch-icon-76x76.png'); ?>" />
		<link rel="apple-touch-icon" sizes="114x114" href="<?= base_url('project_files/img/icon/apple-touch-icon-114x114.png'); ?>" />
		<link rel="apple-touch-icon" sizes="120x120" href="<?= base_url('project_files/img/icon/apple-touch-icon-120x120.png'); ?>" />
		<link rel="apple-touch-icon" sizes="144x144" href="<?= base_url('project_files/img/icon/apple-touch-icon-144x144.png'); ?>" />
		<link rel="apple-touch-icon" sizes="152x152" href="<?= base_url('project_files/img/icon/apple-touch-icon-152x152.png'); ?>" />
		<meta name="apple-mobile-web-app-title" content="SIMMA | Servicios Industriales para el manejo del medio ambiente.">
		<link rel="stylesheet" type="text/css" href="<?= base_url('project_files/css/bootstrap-4.1.0/css/bootstrap.min.css'); ?>" />
		<script src="<?= base_url('project_files/js/jquery-3.3.1.min.js'); ?>"></script>
		<script src="<?= base_url('project_files/js/popper.min.js'); ?>"></script>
		<script src="<?= base_url('project_files/js/vendor/modernizr.js'); ?>"></script>
		<script type="text/javascript" src="<?= base_url('project_files/css/bootstrap-4.1.0/js/bootstrap.min.js'); ?>"></script>
		<!-- jQuery MSG plugin -->
		<script type="text/javascript" src="<?= base_url('project_files/msg/jquery.center.min.js'); ?>"></script>
		<script type="text/javascript" src="<?= base_url('project_files/msg/jquery.msg.min.js'); ?>"></script>
		<link media="screen" href="<?= base_url('project_files/msg/jquery.msg.css'); ?>" rel="stylesheet" type="text/css">
		<script src="<?= base_url('project_files/js/app.js'); ?>"></script>
		<script src="<?= base_url('project_files/js/generic.js'); ?>"></script>
		<script src="<?= base_url('project_files/js/handlebars-v1.1.2.js'); ?>"></script>
		<script type="text/javascript">
			var baseURL='<?= base_url(); ?>';
		</script>
		<style type="text/css">
			.row.homebrand {
				display: block !important;
			}
		</style>
	</head>
	<body class="home" style="background-image: url('<?= base_url('project_files/img/sistema/bg.jpg'); ?>');">
		<ul id="cbp-bislideshow" class="cbp-bislideshow">
			<li><img src="<?= base_url('project_files/img/sistema/bg-1.jpg'); ?>"/></li>
			<li><img src="<?= base_url('project_files/img/sistema/bg-2.jpg'); ?>"/></li>
			<li><img src="<?= base_url('project_files/img/sistema/bg-3.jpg'); ?>"/></li>
		</ul>
		<div class="row homebrand">
			<div class="large-12">
				<div class="page-canvas">
					<form autocomplete="off" id="frm_acceso" class="form-signin" onsubmit="return false;">
						<a href="<?= base_url(); ?>">
							<img src="<?= base_url('project_files/img/sistema/simma-login.png'); ?>" width="336" height="82" class="brand animated fadeInDown">
						</a>
						<div class="contenedorForma">
							<p style="text-align: justify;">Iniciarás el proceso de restauración de contraseña, para ello es necesario que ingreses tu <strong>usuario</strong> y en breve recibirás un correo electrónico con tu nueva contraseña.</p>
							<label class="label" for="usr"> Usuario </label>
							<input class="form-control" id="usr" name="usr" placeholder="Nombre de usuario" required="required" >
							<label>&nbsp;</label>
							<button class="btnlog" type="" onclick="Usuario.GetData()">Recuperar Contraseña</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<script src="<?= base_url('project_files/js/jquery.imagesloaded.min.js'); ?>"></script>
		<script src="<?= base_url('project_files/js/cbpBGSlideshow.min.js'); ?>"></script>
		<script>
			$(function() {
				cbpBGSlideshow.init();
			});
		</script>
		<script src="<?= base_url('project_files/js/foundation.min.js'); ?>"></script>
		<script>
			$(document).foundation();
		</script>
		<div id="panel-div"></div>
		<script id="modal-panel-scr" type="text/x-handlebars-template">
			<div class="modal fade" role="dialog" id="modal-panel">
				<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">{{{title}}}</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							{{{body}}}
						</div>
						<div class="modal-footer">
							{{{footer}}}
						</div>
					</div>
				</div>
			</div>
		</script>
	</body>
</html>
