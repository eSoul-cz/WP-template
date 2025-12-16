<?php 
$be_builder = $_GET['breakdance'] ?? false; 

$deGMCenterPosLat = (float) ($propertiesData['content']['map']['center_position']['latitude'] ?? -34.397); 
$deGMCenterPosLng = (float) ($propertiesData['content']['map']['center_position']['longitude'] ?? 150.644);

$deZoom = (float) ($propertiesData['content']['map']['zoom'] ?? 7);

$de_custom_icon = (string) ($propertiesData['design']['icon']['custom_icon']['svgCode'] ?? '');
$de_custom_icon_color = (string) ($propertiesData['design']['icon']['color'] ?? 'red');

$de_markers_data = (string) ($propertiesData['content']['map']['markers_data'] ?? false);
$de_markers_lat = (string) ($propertiesData['content']['markers']['latitude_field'] ?? false);
$de_markers_lon = (string) ($propertiesData['content']['markers']['longitude_field'] ?? false);

$de_post_type =  (string) ($propertiesData['content']['markers']['post_type'] ?? false);

$de_icon_size =  (float) ($propertiesData['design']['icon']['size'] ?? 100);
$de_disanle_tooltip = (string) ($propertiesData['content']['map']['disable_tooltip'] ?? false);
$de_tooltip_tag = (string) ($propertiesData['content']['tooltip_options']['heading_tag'] ?? false);
$de_tooltip_btn = (string) ($propertiesData['content']['tooltip_options']['include_button'] ?? false);
$de_tooltip_btn_name = (string) ($propertiesData['content']['tooltip_options']['button_name'] ?? false);
$de_tooltip_btn_new_tab = (string) ($propertiesData['content']['tooltip_options']['open_link_in_new_tab'] ?? false);
$de_tooltip_featured_image = (string) ($propertiesData['content']['tooltip_options']['include_featured_image'] ?? false);
$de_tooltip_include_excerpt = (string) ($propertiesData['content']['tooltip_options']['include_excerpt'] ?? false);
$de_additional_data = (string) ($propertiesData['content']['additional_data']['data'] ?? false);

if(!$de_tooltip_tag) $de_tooltip_tag = 'p';

echo '<div id="de-map"></div>';

$localDomains = ['localhost', '127.0.0.1'];
$de_js_maps_api = get_option("destiny_maps_javascript_api");

if ((isset($_SERVER['SERVER_NAME']) && in_array($_SERVER['SERVER_NAME'], $localDomains) || $be_builder == 'builder') || !$de_js_maps_api ) { ?>
        <script>
            window.addEventListener('DOMContentLoaded', function() {
                let script = document.createElement('script');
                script.src = `https://maps.googleapis.com/maps/api/js?callback=initMap&output=embed`;
                document.body.appendChild(script);
            });
        </script>
    <?php 
        
} else { ?>
        <script>
            window.addEventListener('DOMContentLoaded', function() {
                let script = document.createElement('script');
                script.src = `https://maps.googleapis.com/maps/api/js?key=<?php echo $de_js_maps_api; ?>&callback=initMap&output=embed`;
                document.body.appendChild(script);
            });
        </script>
    <?php 
}
?>


<?php if($de_markers_data == 'acf' || $de_markers_data == 'metabox') { ?>

<script>
    let deGMCenterPosLat = "<?php echo $deGMCenterPosLat ?>";
    let deGMCenterPosLng = "<?php echo $deGMCenterPosLng ?>";

    customDtMarker = <?php echo $de_custom_icon ? true : 0;  ?>;
    let map;
    function deInitMap() {
        map = new google.maps.Map(document.getElementById("de-map"), {
            center: {
                lat: Number(deGMCenterPosLat),
                lng: Number(deGMCenterPosLng)
            },
            zoom: <?php echo $deZoom; ?>,
            streetViewControl: false,
        });
        const deLocations = [];
        <?php 
        $latitude_key = $de_markers_lat;
        $longitude_key = $de_markers_lon;
        $args = array(
            'post_type'      => $de_post_type,
            'posts_per_page' => -1,
            'meta_query'     => array(
                'relation' => 'AND',
                array(
                    'key'     => $latitude_key,
                    'compare' => 'EXISTS',
                ),
                array(
                    'key'     => $longitude_key,
                    'compare' => 'EXISTS',
                ),
            ),
        );
        $pages_query = new WP_Query($args);
        if ($pages_query->have_posts()) {
            while ($pages_query->have_posts()) {
                $pages_query->the_post();
        
                $page_id = get_the_ID();
                
                if ($de_markers_data == 'acf') {
                    if ( is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) {
                        $latitude = get_field($de_markers_lat,  $page_id);
                        $longitude = get_field($de_markers_lon,  $page_id);
                    } else {
                        return;
                    }
                } else if ($de_markers_data == 'metabox') {
                    if ( is_plugin_active( 'meta-box/meta-box.php' ) ) {
                        $latitude  = rwmb_get_value($de_markers_lat);
                        $longitude = rwmb_get_value($de_markers_lon);
                    } else {
                        return;
                    }
                } else {
                    return;
                }
               
                // Check if the latitude and longitude custom fields are set
                if ($latitude && $longitude) {
                    // Get the page title and page URL
                    $page_title = get_the_title();
                    $page_url = get_permalink();
                    $page_exc = get_the_excerpt();
        
                    ?>
                    deLocations.push({
                        position: {
                            lat: Number(<?php echo $latitude; ?>),
                            lng: Number(<?php echo $longitude ?>)
                        },
                        title: '<?php echo '<'. $de_tooltip_tag .'>' .$page_title .'</'.$de_tooltip_tag. '>' ?>',
                        icon: '',
                        iconColor: '',
                        pageUrl: '<?php echo  $page_url; ?>',
                        button: '<?php echo $de_tooltip_btn ? $de_tooltip_btn : 0; ?>',
                        buttonName: '<?php echo $de_tooltip_btn_name ? $de_tooltip_btn_name : 'View Location'; ?>',
                        excerpt: `<?php  echo $de_tooltip_include_excerpt ? $page_exc : ''; ?>`,
                        <?php if ($de_additional_data) { ?>
                        additionalData: [
                            <?php
                            $index = 1;
                            foreach ($de_additional_data as $data) {
                                if ($de_markers_data == 'acf' && is_plugin_active( 'advanced-custom-fields-pro/acf.php' )) {
                                    if($data[custom_field_dynamic_meta][field][category] == 'ACF') {
                                    $field_key = str_replace('acf_field_','', $data[custom_field_dynamic_meta][field][slug]);
                                    $field_object = get_field_object($field_key, $page_id);
                                    $field_object = $field_object[value];
                                    $field_css =  $field_key;
                                    } else {
                                        $field_key = $data[custom_field];
                                        $field_object = get_field($field_key, $page_id);
                                        $field_css =  $field_key;
                                    }
                                } else if ($de_markers_data == 'metabox' && is_plugin_active( 'meta-box/meta-box.php' )) {
                                    if($data[custom_field_dynamic_meta][field][category] == 'Metabox') {
                                    $field_object =  rwmb_get_value(str_replace('metabox_field_', '',$data[custom_field_dynamic_meta][field][slug]), '', $page_id);
                                    $field_css =  str_replace('metabox_field_', '',$data[custom_field_dynamic_meta][field][slug]);
                                    } else {
                                        $field_object =  rwmb_get_value($data[custom_field], '', $page_id);
                                        $field_css =  $data[custom_field];
                                    }
                                } else {
                                    $field_object = $data[custom_field];
                                    $field_css = $index;
                                }
                                $index++;
                                ?>
                                {
                                    name: `<?php echo $data['name'];  ?>`,
                                    custom_field: `<?php echo $field_object; ?>`,
                                    customCSS : `<?php echo $field_css ?>`
                                },
                                <?php
                            }
                            ?>
                        ],
                        <?php } ?>
                        featuredImage: `<?php echo $de_tooltip_featured_image ? get_the_post_thumbnail() : ''?>`,
                        pageID: `<?php echo $page_id; ?>`
                    });

                    <?php
                }
            }
        
            // Reset the post data after the loop
            wp_reset_postdata();
        }
        ?>
// Create an info window to share between markers.
const infoWindow = new google.maps.InfoWindow();
let contentString;
deLocations.forEach((location) => {
    if (location.icon) {
        let el = document.createElement('div');
        el.innerHTML = location.icon;
        let svgIcon = el.firstChild;
        svgIcon.style.fill = location.iconColor;
        let contentString = location.title;
        if(location.excerpt) {
            contentString += `<p class="de-agm-exc">${location.excerpt}</p>`;
        }
        if (location.additionalData && location.additionalData.length > 0) {
            contentString += '<div class="de-extra-fields-wrapper">'
            location.additionalData.forEach((data) => {
                contentString += `<p class="de-extra-fields"><strong class="name">${data.name}</strong> ${data.custom_field}</p>`;
            });
            contentString += '</div>'
        }
        if (location.button && location.button != '0') {
            contentString +=  `<a class="de-agm-btn" href="${location.pageUrl}"><?php echo $de_tooltip_btn_name; ?></a>`;
        }
        const infowindow = new google.maps.InfoWindow({
            content: contentString
        });
        const marker = new google.maps.Marker({
            position: location.position,
            map: map,
            title: location.title,
            icon: {
                url: `data:image/svg+xml;charset=utf-8, ${svgIcon.parentNode.innerHTML}`,
                size: new google.maps.Size(<?php echo $de_icon_size; ?>, $de_icon_size),
            }
        });
        marker.addListener("click", () => {
            infoWindow.close();
            infowindow.open(map, marker);
        });
    } else {
        let marker;
        if (customDtMarker) {
            marker = new google.maps.Marker({
                position: location.position,
                map: map,
                title: location.title,
                icon: {
                    url: `data:image/svg+xml;charset=utf-8, <?php echo str_replace('<svg', '<svg fill="' .  urlencode($de_custom_icon_color) . '"', str_replace('"', "'", $de_custom_icon)); ?>`,
                    size: new google.maps.Size(<?php echo $de_icon_size; ?>, <?php echo $de_icon_size; ?>),
                }
            });
        } else {
            marker = new google.maps.Marker({
                position: location.position,
                map: map,
                title: location.title,
            });
        }
        if(location.featuredImage) {
            contentString = `<div class="de-agm-wrapper ${location.pageID}">`
            contentString += location.featuredImage;
            contentString += '<div class="de-agm-content">'
            contentString += location.title;
        } else {
            contentString = `<div class="de-agm-wrapper-no-img ${location.pageID}">`
            contentString += location.title;
        }
        if(location.excerpt) {
            contentString += `<p class="de-agm-exc">${location.excerpt}</p>`;
        }
        if (location.additionalData && location.additionalData.length > 0) {
            contentString += '<div class="de-extra-fields-wrapper">'
            location.additionalData.forEach((data) => {
                contentString += `<div class="de-extra-fields de-extra-field-${data.customCSS}"><strong class="name">${data.name}</strong> ${data.custom_field}</div>`;
            });
            contentString += '</div>'
        }
        if (location.button && location.button != '0') {
            contentString +=  `<a class="de-agm-btn" href="${location.pageUrl}"><?php echo $de_tooltip_btn_name; ?></a>`;
        }
        if(location.featuredImage) {
            contentString += '</div>'
        }
        contentString += '</div>'
        let infowindow = new google.maps.InfoWindow({
            content: contentString
        });
        <?php if (!$de_disanle_tooltip) {?>
        marker.addListener("click", () => {
            infoWindow.close();
            infowindow.open(map, marker);
        });
        <?php } ?>
    }
});
    }

    window.initMap = deInitMap;
</script>

<?php } ?>
