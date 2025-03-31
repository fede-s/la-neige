<?php
define('THEME', get_template_directory());
define('THEME_URI', get_stylesheet_directory_uri());
define('YAMA', THEME . '/yama');
define('TEMPLATES_DIR', THEME . '/page-templates');

// add_action('admin_menu', function() {
//    global $menu;

//    $menu[5][0] = 'Blog';
//    $winterId = get_page_by_path('winter')->ID;
//    $summerId = get_page_by_path('summer')->ID;
//    add_menu_page('Winter', 'Winter', 'read', 'post.php?post=' . $winterId . '&action=edit', '', 'fas fa-snowboarding', 4);
//    add_menu_page('Summer', 'Summer', 'read', 'post.php?post=' . $summerId . '&action=edit', '', 'fas fa-sun', 4);
//    add_submenu_page('edit.php?post_type=restaurant', 'Winter Page', 'Winter Page', 'read', 'post.php?post=72&action=edit');
//    add_submenu_page('edit.php?post_type=restaurant', 'Summer Page', 'Summer Page', 'read', 'post.php?post=1668&action=edit');
//    add_submenu_page('edit.php?post_type=concierge-service', 'Winter Page', 'Winter Page', 'read', 'post.php?post=4082&action=edit');
//    add_submenu_page('edit.php?post_type=concierge-service', 'Summer Page', 'Summer Page', 'read', 'post.php?post=4079&action=edit');
//    add_submenu_page('edit.php?post_type=offer', 'Winter Page', 'Winter Page', 'read', 'post.php?post=70&action=edit');
//    add_submenu_page('edit.php?post_type=offer', 'Summer Page', 'Summer Page', 'read', 'post.php?post=1642&action=edit');
//    add_submenu_page('edit.php?post_type=experience', 'Winter Page', 'Winter Page', 'read', 'post.php?post=4058&action=edit');
//    add_submenu_page('edit.php?post_type=experience', 'Summer Page', 'Summer Page', 'read', 'post.php?post=4056&action=edit');
//    add_submenu_page('edit.php?post_type=event', 'Winter Page', 'Winter Page', 'read', 'post.php?post=5772&action=edit');
//    add_submenu_page('edit.php?post_type=event', 'Summer Page', 'Summer Page', 'read', 'post.php?post=5770&action=edit');
//    remove_menu_page('edit-comments.php');
// });

if (function_exists('acf_add_options_page')) {
	acf_add_options_page();
}

include(__DIR__ . '/config-utils.php');
include(__DIR__ . '/theme-config.php');
include(YAMA . '/shortcodes/shortcodes.php');
?>
