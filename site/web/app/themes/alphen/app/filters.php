<?php

/**
 * Theme filters.
 */

namespace App;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
  return sprintf(' &hellip; <a href="%s">%s</a>', get_permalink(), __('Continued', 'sage'));
});

/**
 * WP_NAV_MENU attributes
 */
add_filter('nav_menu_css_class', function ($classes, $item, $args) {
  if (isset($args->list_item_class)) {
    $classes[] = $args->list_item_class;
  }
  return $classes;
}, 1, 3);
add_filter('nav_menu_link_attributes', function ($atts, $item, $args) {
  if (isset($args->link_class)) {
    $atts['class'] = $args->link_class;
  }
  return $atts;
}, 1, 3);
