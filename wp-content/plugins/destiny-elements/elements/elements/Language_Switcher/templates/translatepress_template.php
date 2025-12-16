<div class="my-custom-switcher" data-no-translation>
	<?php
	$current_language = null;

	// Przechodzimy przez tablicę w poszukiwaniu języka z current_lang ustawionym na true
	foreach ($languages as $code => $details) {
		if ($details["current_lang"]) {
			$current_language = $details;
			break; // Znaleziono język aktualny, więc przerywamy pętlę
		}
	}

	?>

	<?php if($showflags || $showname) : ?>

		<?php if ($dropdown_display) : ?>
			<div class="language-switcher">
				<button class="switcher-button" role="combobox" aria-haspopup="listbox" aria-expanded="false" aria-controls="language-dropdown">
					<span class="current-language">
						<?php if ($showflags) : ?>
								<?php if (!empty($flags_array)) : ?>
									<?php if (isset($flags_array[$current_language['language_code']])) : ?>
										<img src="<?php echo $flags_array[$current_language['language_code']]; ?>" alt="<?php echo $current_language['short_language_name']; ?>" title="<?php echo $current_language['language_name']; ?>">
									<?php else : ?>
										<img src="<?php echo $current_language['flag_link']; ?>" alt="<?php echo $current_language['short_language_name']; ?>" title="<?php echo $current_language['language_name']; ?>">
									<?php endif; ?>
								<?php else : ?>
									<img src="<?php echo $current_language['flag_link']; ?>" alt="<?php echo $current_language['short_language_name']; ?>" title="<?php echo $current_language['language_name']; ?>">
								<?php endif; ?>
							<?php endif; ?>
						<?php if ($showname) : ?>
							<?php
							if ($language_name === 'native') {
								echo $current_language['native_name'];
							} elseif ($language_name === 'translated') {
								echo $current_language['english_name'];
							} elseif ($language_name === 'slug') {
								echo $current_language['lang_simple_code'];
							}
							?>
						<?php endif; ?>
					</span>
					<span class="arrow"></span>
				</button>
				<ul class="language-dropdown" role="listbox" id="language-dropdown">
					<?php foreach ($languages as $code => $language) : ?>
						<?php if ($hidecurrent && $language['current_lang']) continue; ?>
						<li role="option" data-value="<?php echo $language['current_page_url']; ?>" <?php if ($language['current_lang']) echo 'aria-selected="true"'; ?>>
							<?php if ($showflags) : ?>
								<?php if (!empty($flags_array)) : ?>
									<?php if (isset($flags_array[$language['language_code']])) : ?>
										<img src="<?php echo $flags_array[$language['language_code']]; ?>" alt="<?php echo $language['short_language_name']; ?>" title="<?php echo $language['language_name']; ?>">
									<?php else : ?>
										<!-- img with language flag -->
										<img src="<?php echo $language['flag_link']; ?>" alt="<?php echo $language['short_language_name']; ?>" title="<?php echo $language['language_name']; ?>">
									<?php endif; ?>
								<?php else : ?>
									<!-- img with language flag -->
									<img src="<?php echo $language['flag_link']; ?>" alt="<?php echo $language['short_language_name']; ?>" title="<?php echo $language['language_name']; ?>">
								<?php endif; ?>
							<?php endif; ?>
							<?php if ($showname) : ?>
								<?php
								if ($language_name === 'native') {
									echo $language['native_name'];
								} elseif ($language_name === 'translated') {
									echo $language['english_name'];
								} elseif ($language_name === 'slug') {
									echo $language['lang_simple_code'];
								}
								?>
							<?php endif; ?>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>

		<?php else : ?>
			<ul class="my-custom-switcher-list">
				<?php foreach ($languages as $code => $language) : ?>
					<li class="<?php echo implode(' ', $language['classes']) ?> my-custom-switcher-item">
						<a href="<?php echo $language['current_page_url']; ?>">
							<?php if ($showflags) : ?>
								<!-- $flags_array  -->
								<?php if (!empty($flags_array)) : ?>
									<?php if (isset($flags_array[$language['language_code']])) : ?>
										<img src="<?php echo $flags_array[$language['language_code']]; ?>" alt="<?php echo $language['short_language_name']; ?>" title="<?php echo $language['language_name']; ?>">
									<?php else : ?>
										<!-- img with language flag -->
										<img src="<?php echo $language['flag_link']; ?>" alt="<?php echo $language['short_language_name']; ?>" title="<?php echo $language['language_name']; ?>">
									<?php endif; ?>
								<?php else : ?>
									<!-- img with language flag -->
									<img src="<?php echo $language['flag_link']; ?>" alt="<?php echo $language['short_language_name']; ?>" title="<?php echo $language['language_name']; ?>">
								<?php endif; ?>
							<?php endif; ?>
							<?php if ($showname) : ?>
								<?php
								if ($language_name === 'native') {
									echo $language['native_name'];
								} elseif ($language_name === 'translated') {
									echo $language['english_name'];
								} elseif ($language_name === 'slug') {
									echo $language['lang_simple_code'];
								}
								?>
							<?php endif; ?>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>

	<?php endif; ?>
</div>

<script>
	const switcher = document.querySelector(".language-switcher");
	const switcherButton = switcher.querySelector(".switcher-button");
	const dropdown = switcher.querySelector(".language-dropdown");
	const options = dropdown.querySelectorAll("li");

	switcherButton.addEventListener("click", () => {
		switcher.classList.toggle("active");
		const expanded = switcherButton.getAttribute("aria-expanded") === "true";
		switcherButton.setAttribute("aria-expanded", !expanded);
	});

	options.forEach(option => {
		option.addEventListener("click", () => {
			const selectedValue = option.getAttribute("data-value");
			window.location.href = selectedValue;
		});
	});
</script>