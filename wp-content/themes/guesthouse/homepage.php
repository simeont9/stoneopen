<?php
/**
 * Template Name: Homepage Template
 * Description: A Page Template only for homepage
 *
 *
 *
 * @package WordPress
 * @subpackage Magazine
 * @since Magazine 1.0
 */

$latteParams['post'] = WpLatte::createPostEntity(
	$GLOBALS['wp_query']->post,
	array(
		'meta' => $GLOBALS['pageOptions'],
	)
);
$latteParams['queried'] = $GLOBALS['wp_query']->get_queried_object();


if ( ! isset( $content_width ) )
$content_width = 1024;

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

/**
 * Fire!
 */
WPLatte::createTemplate(basename(__FILE__, '.php'), $latteParams)->render();