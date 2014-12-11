<?php
/**
 * Public representation of the widget.
 * All form data is available here in form of variables.
 * Please check the existence of all variables as at the beginning widget has no data.
 */
?>

<div class="bullet <?php echo !empty($cssClasses) ? $cssClasses : ''; ?>">
	<div class="bullet__point">
		<div class="bullet__point-inner">
			<span class="bullet__point-text--primary"><?php echo !empty($eventDay) ? $eventDay : ''; ?></span>
			<span class="bullet__point-text--secondary"><?php echo !empty($eventMonth) ? $eventMonth : ''; ?></span>
		</div>
	</div>
	<div class="bullet__content">
		<?php if (!empty($textPrimary)) : ?>
			<div class="bullet__text--primary"><?php echo $textPrimary; ?></div>
		<?php endif; ?>
		<?php if (!empty($textSecondary)) : ?>
			<div class="bullet__text--secondary"><?php echo $textSecondary; ?></div>
		<?php endif; ?>
	</div>
</div>