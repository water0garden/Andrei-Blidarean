<?php if($site->touchImage()->isNotEmpty()): ?>
	<?php if($site->faviconImage()->toFile() != null): ?>
		<link rel="apple-touch-icon" href="<?= $site->touchImage()->toFile()->resize(180, 180)->url(); ?>">
	<?php endif; ?>
<?php elseif($site->faviconImage()->isNotEmpty()): ?>
	<?php if($site->faviconImage()->toFile() != null): ?>
		<link rel="apple-touch-icon" href="<?= $site->faviconImage()->toFile()->resize(180, 180)->url(); ?>">
	<?php endif; ?>
<?php endif; ?>
<?php if($site->faviconImage()->isNotEmpty()): ?>
	<?php if($site->faviconImage()->toFile() != null): ?>
		<link rel="icon" href="<?= $site->faviconImage()->toFile()->resize(192, 192)->url(); ?>">
	<?php endif; ?>
<?php endif; ?>
