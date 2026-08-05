<?php 

$de_adv_table_data_col = (array) ($propertiesData['content']['table_data']['row_headers'] ?? []);
$de_adv_table_data_row = (array) ($propertiesData['content']['table_data']['columns'] ?? []);

$de_adv_table_disable_row_headers = (bool) ($propertiesData['content']['table_options']['disable_row_headers'] ?? false);
$de_adv_table_disable_col_headers = (bool) ($propertiesData['content']['table_options']['disable_column_headers'] ?? false);

$de_adv_table_open_icon = isset($propertiesData['design']['accordion']['icon']['open_icon']) ? $propertiesData['design']['accordion']['icon']['open_icon']['svgCode'] : false;
$de_adv_table_close_icon = isset($propertiesData['design']['accordion']['icon']['close_icon']) ? $propertiesData['design']['accordion']['icon']['close_icon']['svgCode'] : false;




?>
<?php

    // if(!$de_adv_table_disable_col_headers) {
    foreach ($de_adv_table_data_col as $key_col => $value_col) {
        $col_index = $key_col + 1;
        if(!$de_adv_table_disable_col_headers) {
            if ($key_col == 0 ) {
                echo '<div class="de-col-wrapper de-col-headers" role="rowgroup">';
                if(!$de_adv_table_disable_row_headers) {
                    echo '<div aria-hidden="true" class="de-col-header hidden" role="columnheader" aria-colindex="1" aria-rowindex="1""></div>';
                }
                // Show Row headers
                foreach ($de_adv_table_data_row as $key_row => $value_row) {
                    $row_index = $key_row + 2;
                    echo '<div class="de-col-header" role="columnheader" aria-colindex="'.$row_index.'" aria-rowindex="'.$col_index.'">'.(string) ($value_row['column_header'] ?? '').'<span class="de-adv-table-open-icon">'.$de_adv_table_open_icon.'</span><span class="de-adv-table-close-icon">'.$de_adv_table_close_icon.'</span></div>';
                }
                echo '</div>';
            }
        }


        echo '<div class="de-col-wrapper" role="rowgroup">';
            if(!$de_adv_table_disable_col_headers) {
                $col_index = $key_col + 2;
            } else {
                $col_index = $key_col + 1;
            }
            if(!$de_adv_table_disable_row_headers) {
                echo '<div class="de-row-header" role="rowheader" aria-rowindex="1" aria-colindex="'.$col_index.'">'.(string) ($value_col['row_header'] ?? '').'</div>';
            }
            foreach ($de_adv_table_data_row as $key_row => $value_row) {
                $row_index = $key_row + 2;
                $row_items = isset($value_row['column_items']) ? $value_row['column_items'] : null;
                $first_item = isset($row_items[$key_col]) ? $row_items[$key_col] : null;
                $link = isset($first_item['link_url']) ? $first_item['link_url'] : null;
                $link_new_tab = isset($first_item['open_in_new_tab']) ? 'target="_blank"' : '';
               
                echo '<div class="de-cell" role="cell" aria-colindex="'.$row_index.'" aria-rowindex="'.$col_index.'" aria-label="'.(string) ($value_col['column_header'] ?? '').' '.(string) ($value_row['column_header'] ?? '').'">
                        '.(string) ($first_item['text'] ?? '').'
                        '.(isset($first_item['link_name'])  ? '<a class="de-res-btn" href="'.$link .'" '.$link_new_tab.'>'.(string) ($first_item['link_name'] ?? '').'</a>' : '').'
                     </div>';
            }
        echo '</div>';
    }
?>


