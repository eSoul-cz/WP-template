<?php 

// Data Type
$de_tl_data_type = (string) ($propertiesData['content']['options']['data_type'] ?? 'query');

// Meta Box Fields
$de_tl_mb_group = (string) ($propertiesData['content']['timeline']['meta_box_group_id'] ?? '');
$de_tl_mb_heading = (string) ($propertiesData['content']['timeline']['meta_box_heading_id'] ?? '');
$de_tl_mb_content = (string) ($propertiesData['content']['timeline']['meta_box_content_id'] ?? '');
$de_tl_mb_date = (string) ($propertiesData['content']['timeline']['meta_box_date_id'] ?? '');
$de_tl_mb_icon = (string) ($propertiesData['content']['timeline']['meta_box_icon_id'] ?? '');
$de_tl_mb_image = (string) ($propertiesData['content']['timeline']['meta_box_image_id'] ?? '');

// Acf Fields
$de_tl_acf_repeater = (string) ($propertiesData['content']['timeline']['acf_repeater_name'] ?? '');
$de_tl_acf_heading = (string) ($propertiesData['content']['timeline']['acf_heading_field'] ?? '');
$de_tl_acf_content = (string) ($propertiesData['content']['timeline']['acf_content_field'] ?? '');
$de_tl_acf_date = (string) ($propertiesData['content']['timeline']['acf_date_field'] ?? '');
$de_tl_acf_icon = (string) ($propertiesData['content']['timeline']['acf_icon_field'] ?? '');
$de_tl_acf_image = (string) ($propertiesData['content']['timeline']['acf_image_field'] ?? '');


// Options
$de_tl_date = (bool) ($propertiesData['content']['options']['enable_date'] ?? false);
$de_tl_icons = (bool) ($propertiesData['content']['options']['enable_custom_icons'] ?? false);
$de_tl_images = (bool) ($propertiesData['content']['options']['enable_images'] ?? false);
$de_tl_content = (bool) ($propertiesData['content']['options']['enable_content'] ?? false);

// query
$argsFromQuery = \Breakdance\WpQueryControl\getWpQueryArgumentsFromWpQueryControlProperties( (array) ($propertiesData['content']['query']['query'] ?? []));

if ($de_tl_data_type == 'acf') {

	// check if acf is installed & active 
	if ( is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) {
		if( have_rows($de_tl_acf_repeater) ):
	
			// Loop through rows.
			while( have_rows($de_tl_acf_repeater) ) : the_row();
	
				// Load sub field value.
				$sub_date = get_sub_field($de_tl_acf_date);
				$sub_heading = get_sub_field($de_tl_acf_heading);
				$sub_content = get_sub_field($de_tl_acf_content);
				$sub_icon = get_sub_field($de_tl_acf_icon);
				$sub_image = get_sub_field($de_tl_acf_image);
				// Do something...
		?>
		
		<div class="de-cols">
			<div class="de-col de-date">
				<?php if ($de_tl_date) { ?>
				<h3 class="de-date-heading"><?php echo $sub_date ?></h3>
				<?php } ?>
			</div>
				<div class="de-line">
				<div class="de-dot">
				<?php if($de_tl_icons) { ?>
					<div class="de-timeline-icon">
						<?php echo $sub_icon; ?>
					</div>
				<?php } ?>
				</div>
				</div>
			<div class="de-col de-content">
				<?php if($de_tl_images) { ?>
				<img src="<?php echo wp_get_attachment_image_url( $sub_image, '' ); ?>" alt="<?php echo get_post_meta($sub_image , '_wp_attachment_image_alt', true); ?>" />
				<?php } ?>
					<div class="de-text-content">
					<?php if($sub_heading) { ?>
					<h4 class="de-heading"><?php echo $sub_heading ?></h4>
					<?php } ?>
					<?php if ($sub_content) { ?>
						<?php echo $sub_content ?>
					<?php } ?>
					</div>
			</div>
		</div>

		<?php 
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
} else if ($de_tl_data_type == 'metabox') {
	
	// check if meta box is installed & active 
	if ( is_plugin_active( 'meta-box/meta-box.php' ) ) {

		// Meta box group field in here
		$de_tl_group = rwmb_meta($de_tl_mb_group);
		if ( ! empty( $de_tl_group ) ) {
			foreach ( $de_tl_group as $content ) {
				// var_dump($content);
				$sub_date = isset( $content[$de_tl_mb_content] ) ? $content[$de_tl_mb_content] : '';
				$sub_heading = isset( $content[$de_tl_mb_heading] ) ? $content[$de_tl_mb_heading] : '';
				$sub_content = isset( $content[$de_tl_mb_content] ) ? $content[$de_tl_mb_content] : '';
				$sub_icon = isset( $content[$de_tl_mb_icon] ) ? $content[$de_tl_mb_icon] : '';
				$sub_image = isset( $content[$de_tl_mb_image] ) ? $content[$de_tl_mb_image] : '';

				?>
					<div class="de-cols">
						 <div class="de-col de-date">
						   <?php if ($de_tl_date) { ?>
						   <h3 class="de-date-heading"><?php echo $sub_date ?></h3>
						   <?php } ?>
						</div>
						 <div class="de-line">
							<div class="de-dot">
							<?php if($de_tl_icons) { ?>
								<div class="de-timeline-icon">
									<?php echo $sub_icon; ?>
								</div>
							<?php } ?>
						   </div>
						  </div>
					   <div class="de-col de-content">
						 <?php if($de_tl_images) { ?>
						   	<img src="<?php echo wp_get_attachment_image_url( $sub_image, '' ); ?>" alt="<?php echo get_post_meta($sub_image , '_wp_attachment_image_alt', true); ?>" />
						  <?php } ?>
							 <div class="de-text-content">
								<?php if($sub_heading) { ?>
							   <h4 class="de-heading"><?php echo $sub_heading ?></h4>
							   <?php } ?>
							   <?php if ($sub_content) { ?>
								   <?php echo wpautop($sub_content); ?>
							   <?php } ?>
							 </div>
						</div>
					 </div>

					<?php 
			}
		} else {
			echo '<p>No Meta Box Fields Found</p>';
		}
	} else {
		echo '<p>Meta Box is required to use Meta Box data type</p>';
	}
} else if ($de_tl_data_type == 'query') {

/** @var array $contentProps */

	$loop = new WP_Query($argsFromQuery);

	while ($loop->have_posts()): $loop->the_post();

		$sub_date = get_the_date(); // Get the post's publication date
		$sub_icon = ''; // Ignore $sub_icon for now
		$sub_image = get_the_post_thumbnail_url(get_the_ID()); // Get the featured image URL for the post
		$sub_heading = get_the_title(); // Get the post's title
		$sub_content = get_the_content(); // Get the post's content
		?>

		<div class="de-cols">	
			<div class="de-col de-date">
				<?php if ($de_tl_date) { ?>
				<h3 class="de-date-heading"><?php echo $sub_date ?></h3>
				<?php } ?>
			</div>
			<div class="de-line">
				<div class="de-dot">
					<?php if($de_tl_icons) { ?>
					<div class="de-timeline-icon">
						<?php echo $sub_icon; ?>
					</div>
					<?php } ?>
				</div>
			</div>
			<div class="de-col de-content">
				<?php if($de_tl_images) { ?>
				<img src="<?php echo $sub_image; ?>" alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>" />
				<?php } ?>
				<div class="de-text-content">
					<?php if($sub_heading) { ?>
					<h4 class="de-heading"><?php echo $sub_heading ?></h4>
					<?php } ?>
					<?php if ($de_tl_content) { ?>
						<?php echo wpautop($sub_content); ?>
					<?php } ?>
				</div>
			</div>
		</div>

		<?php
	endwhile;
}