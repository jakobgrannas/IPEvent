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

		<div class="event-info">
			<?php if (!empty($eventTimeFrom) || !empty($eventTimeTo)) : ?>
				<div class="event-info-group">
					<h6 class="event__group-header"><?php _e('Time', 'Event'); ?></h6>
					<p class="event__group-text">
						<?php echo !empty($eventTimeFrom) ? $eventTimeFrom : ''; ?> <?php echo !empty($eventTimeTo) ? ' - ' . $eventTimeTo : ''; ?>
					</p>
				</div>
			<?php endif; ?>
			<?php if (!empty($eventLocation)) : ?>
				<div class="event-info-group">
					<h6 class="event__group-header"><?php _e('Location', 'Event'); ?></h6>
					<p class="event__group-text">
						<?php echo $eventLocation; ?>
					</p>
				</div>
			<?php endif; ?>
		</div>

		<?php if (!empty($url)) :?>
			<a href="<?php echo esc($url); ?>" class="event__read-more button-small--secondary" data-read-less="<?php _e('Read less', 'Event'); ?>">
				<?php echo !empty($buttonText) ? $buttonText : __('Read more', 'Event'); ?>
			</a>
		<?php endif; ?>
	</div>
</div>