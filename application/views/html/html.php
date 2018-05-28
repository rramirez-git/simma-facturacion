<!DOCTYPE html>
<html lang="es">
	<head>
		<!-- Vista hmtl/html:head -->
		<?= $head; ?>
		<!-- Vista hmtl/html:head End-->
	</head>
	<body>
		<!-- Vista hmtl/html:body -->
		<?= $body; ?>
		<!-- Vista hmtl/html:body End -->
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