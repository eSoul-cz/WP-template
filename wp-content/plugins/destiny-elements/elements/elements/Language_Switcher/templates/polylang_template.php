<?php if ($dropdown_display): ?>
	<select class="my-custom-switcher my-custom-switcher-select">
		<?php foreach ($raw_translations as $code => $language): ?>
			<option value="<?php echo $language['url']; ?>" <?php if ($language['current_lang']) echo 'selected'; ?> class="<?php echo implode(' ', $language['classes']) ?> my-custom-switcher-item">
				<?php
				if ($name_version === 'full') {
					echo $language['name'];
				} elseif ($name_version === 'code') {
					echo $language['slug'];
				} else {
					echo $language['name'];
				}
				?>
			</option>
		<?php endforeach; ?>
	</select>
<?php else: ?>
	<ul class="my-custom-switcher">
		<?php foreach ($raw_translations as $code => $language): ?>
			<li class="<?php echo implode(' ', $language['classes']) ?>  my-custom-switcher-item">
				<a href="<?php echo $language['url']; ?>">
					<?php if ($showflags): ?>
						<?php if (!empty($flags_array)): ?>
							<?php if (isset($flags_array[$language['slug']])): ?>
								<img src="<?php echo $flags_array[$language['slug']]; ?>" alt="<?php echo $language['slug']; ?>" title="<?php echo $language['name']; ?>">
							<?php else: ?>
								<?php echo $language['flag']; ?>
							<?php endif; ?>
						<?php else: ?>
							<?= $language['flag'] ?? '' ?>
						<?php endif; ?>
					<?php endif; ?>

					<?php if ($showname): ?>
						<?php
						if ($name_version === 'full') {
							echo $language['name'];
						} elseif($name_version === 'code') {
							echo $language['slug'];
						} else {
							echo $language['name'];
						}
						?>
					<?php endif; ?>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>


<script>
	const selectElement = document.querySelector('.my-custom-switcher-select');

	if (selectElement) {
		selectElement.addEventListener('change', function () {
			window.location.href = this.value;
		});
	}
</script>