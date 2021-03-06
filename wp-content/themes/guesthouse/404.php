<?php

$latteParams['bodyClasses'] .= ' with-sidebar';
$latteParams['bodyId'] = 'normal-page';

$latteParams['customTypeName'] = defined('EDITABLE_CT_NAME') ? EDITABLE_CT_NAME : '';
$latteParams['customTypeShow'] = defined('SHOW_EDITABLE_CT_IN_MENU') ? SHOW_EDITABLE_CT_IN_MENU : '';
$latteParams['roomTypeName'] = defined('ROOM_CT_NAME') ? ROOM_CT_NAME : '';

/* GET CATEGORIES FOR GROUPING IN SLIDER */
$sliderOptions = aitGetOptions($latteParams['post'],'page_slider');
if($sliderOptions->sliderFormCat == "0"){
  $categories = array();
  $term = get_categories(array('taxonomy' => 'ait-item-category', 'hide_empty' => 0, 'number' => 0));
  foreach($term as $item){
    if($item->term_id == 1){
    } else {
      array_push($categories, $item->name);
    }
  }
}
$latteParams['itemSliderCategories'] = $categories;
/* GET CATEGORIES FOR GROUPING IN SLIDER */

WPLatte::createTemplate(basename(__FILE__, '.php'), $latteParams)->render();