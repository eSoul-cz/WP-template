<?php

$de_acc_faq_content = (array) ($propertiesData['content']['content']['items'] ?? []);
$de_acc_data_type = (string) ($propertiesData['content']['options']['data_type'] ?? '');

// ACF Fields
$de_acc_acf_repeater = (string) ($propertiesData['content']['content']['acf_repeater_field'] ?? 'faq');
$de_acc_acf_heading = (string) ($propertiesData['content']['content']['acf_field_header'] ?? 'heading');
$de_acc_acf_content = (string) ($propertiesData['content']['content']['acf_field_content'] ?? 'answer' );

// Meta Box Fields
$de_acc_mb_group =(string) ($propertiesData['content']['content']['meta_box_group_id'] ?? '');
$de_acc_mb_heading = (string) ($propertiesData['content']['content']['meta_box_heading_id'] ?? '');
$de_acc_mb_content = (string) ($propertiesData['content']['content']['meta_box_content_id'] ?? '');

$de_acc_icon_postion = (string) ($propertiesData['design']['trigger']['icon']['position'] ?? '');
$de_acc_icon_svg = isset($propertiesData['design']['trigger']['icon']['icon']) ? $propertiesData['design']['trigger']['icon']['icon']['svgCode'] : false;
$de_acc_icon_disable = (bool) ($propertiesData['design']['trigger']['icon']['disable_icon'] ?? false);
$de_acc_number_count = (bool) ($propertiesData['content']['options']['enable_number_count'] ?? false);

$custom_heading_tag = (string) ($propertiesData['content']['options']['heading_tag'] ?? 'h3');

$de_index = 1;
if ($de_acc_data_type == 'acf') {

// check if acf is installed & active 
if ( is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) {

	$de_acf_repeater = $de_acc_acf_repeater;

	if (have_rows($de_acf_repeater, is_archive() ? get_queried_object() : null)) :

		// Loop through rows.
		while (have_rows($de_acf_repeater, is_archive() ? get_queried_object() : null)) : the_row();

			// Load sub field value.
			$sub_heading = get_sub_field($de_acc_acf_heading);
			$sub_content = get_sub_field($de_acc_acf_content);
			// Do something...
	?>
	<<?php echo $custom_heading_tag; ?> class="de-accordion-trigger-heading">
	<button id="de-accordion-%%ID%%-<?php echo $de_index; ?>" class="de-accordion-trigger" type="button" aria-controls="de-acc-%%ID%%-<?php echo $de_index; ?>">
		<?php if ($de_acc_icon_postion == 'left') { ?>
			<?php if(!$de_acc_icon_disable) { ?>
			<span class="acc-icon">
				<?php echo $de_acc_icon_svg; ?>
			</span>
			<?php } ?>
		<?php if ($de_acc_number_count) { ?>
				<span class="trigger-number"><?php echo $de_index; ?></span>
		<?php } ?>
			<span class="trigger-text"><?php echo $sub_heading; ?></span>
		<?php } else { ?>
			<?php if ($de_acc_number_count) { ?>
				<span class="trigger-number"><?php echo $de_index; ?></span>
			<?php } ?>
		<span class="trigger-text"><?php echo $sub_heading; ?></span>
		<?php if(!$de_acc_icon_disable) { ?>
			<span class="acc-icon">
				<?php echo $de_acc_icon_svg; ?>
			</span>
		<?php } ?>
		<?php } ?>
	</button>
	</<?php echo $custom_heading_tag; ?>>
	<div id="de-acc-%%ID%%-<?php echo $de_index; ?>" class="de-accordion-panel" role="region" aria-labelledby="de-accordion-%%ID%%-<?php echo $de_index; ?>">
		<?php echo $sub_content; ?>
	</div>

	<?php 
	$de_index++;
	// End loop.
	endwhile;
	// No value.
	else :
		?>
		<p>No ACF Repeater is Found</p>
		<?php
	endif;
} else {
	echo '<p>ACF is required to use ACF data type</p>';
}
} elseif ($de_acc_data_type == 'metabox') {
	
	// check if meta box is installed & active 
	if ( is_plugin_active( 'meta-box/meta-box.php' ) ) {

		// Meta box group field in here
		$de_acc_group = rwmb_meta($de_acc_mb_group);
		if ( ! empty( $de_acc_group ) ) {
			foreach ( $de_acc_group as $content ) {
				// var_dump($content);
				$sub_heading = isset( $content[$de_acc_mb_heading] ) ? $content[$de_acc_mb_heading] : '';
				$sub_content = isset( $content[$de_acc_mb_content] ) ? $content[$de_acc_mb_content] : '';
				?>
					<<?php echo $custom_heading_tag; ?> class="de-accordion-trigger-heading">
					  <button id="de-accordion-%%ID%%-<?php echo $de_index; ?>" class="de-accordion-trigger" type="button" aria-controls="de-acc-%%ID%%-<?php echo $de_index; ?>">
						<?php if ($de_acc_icon_postion == 'left') { ?>
							<?php if(!$de_acc_icon_disable) { ?>
							  <span class="acc-icon">
								<?php echo $de_acc_icon_svg; ?>
							  </span>
							<?php } ?>
						   <?php if ($de_acc_number_count) { ?>
								<span class="trigger-number"><?php echo $de_index; ?></span>
						   <?php } ?>
							<span class="trigger-text"><?php echo $sub_heading; ?></span>
						<?php } else { ?>
							<?php if ($de_acc_number_count) { ?>
								<span class="trigger-number"><?php echo $de_index; ?></span>
							<?php } ?>
						  <span class="trigger-text"><?php echo $sub_heading; ?></span>
						  <?php if(!$de_acc_icon_disable) { ?>
							<span class="acc-icon">
								<?php echo $de_acc_icon_svg; ?>
							</span>
						  <?php } ?>
						<?php } ?>
					  </button>
					</<?php echo $custom_heading_tag; ?>>
					<div id="de-acc-%%ID%%-<?php echo $de_index; ?>" class="de-accordion-panel" role="region" aria-labelledby="de-accordion-%%ID%%-<?php echo $de_index; ?>">
						<?php echo wpautop($sub_content); ?>
					</div>

					<?php 
					$de_index++;
			}
		} else {
			echo '<p>No Meta Box Fields Found</p>';
		}
	} else {
		echo '<p>Meta Box is required to use Meta Box data type</p>';
	}
}
