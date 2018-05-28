<?php
if(!isset($tipopanel)) $tipopanel="primary";
?>
<div class="card bg-<?= $tipopanel; ?>">
	<?php if(isset($panelheading) && $panelheading!=""): ?>
		<div class="card-header"><?= $panelheading; ?></div>
	<?php endif; ?>
	<?php if(isset($panelbody) && $panelbody!=""): ?>
		<div class="card-body"><?= $panelbody; ?></div>
	<?php endif; ?>
	<?php if(isset($panelfooter) && $panelfooter!=""): ?>
		<div class="card-footer"><?= $panelfooter; ?></div>
	<?php endif; ?>
</div>