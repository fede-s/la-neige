<?php
include(__DIR__ . '/yama/config/config.php');
require_once(THEME . '/yama/utils/Utils.php');

if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', Utils::getVersion());
}

//session_start();
//$seasonFromUrl = Utils::getSeasonFromURL();
//$_SESSION['season'] =  !empty($seasonFromUrl) ? $seasonFromUrl : Utils::getCurrentSeason();

function arphabet_widgets_init() {

    register_sidebar(array(
        'name' => 'Home right sidebar',
        'id' => 'home_right_1',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="rounded">',
        'after_title' => '</h2>',
    ));

}

add_action('widgets_init', 'arphabet_widgets_init');

add_theme_support('post-thumbnails');

register_nav_menus(
    array(
        'menu-1' => esc_html__('Primary', 'neige'),
        'menu-2' => esc_html__('Secundary', 'neige')
    )
);

function neige_files() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('third-party-js', THEME_URI . '/build/third-party.js', ['jquery'], _S_VERSION);
    wp_enqueue_script('lib', THEME_URI . '/build/lib.js', ['jquery', 'third-party-js'], _S_VERSION);
    wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@200..900&display=swap');
    wp_enqueue_style('neige_main_styles', get_theme_file_uri('/assets/css/style.css'), [], _S_VERSION);
}

add_action('wp_enqueue_scripts', 'neige_files');


function neige_features() {

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

}


add_action('after_setup_theme', 'neige_features');


add_action('admin_menu', function () {
    global $menu;
    $winterId = get_page_by_path('winter')->ID;
    $summerId = get_page_by_path('summer')->ID;
    add_menu_page('Winter', 'Winter', 'read', 'post.php?post=' . $winterId . '&action=edit', '', 'fas fa-snowboarding', 4);
    add_menu_page('Summer', 'Summer', 'read', 'post.php?post=' . $summerId . '&action=edit', '', 'fas fa-sun', 4);
    remove_menu_page('edit-comments.php');
});

add_shortcode('button', function ($atts) {
    ob_start();
    include(__DIR__ . '/button.php');
    return ob_get_clean();
});


function altyn_remove_empty_p($content) {
    $content = force_balance_tags($content);
    $content = preg_replace('#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content);
    $content = preg_replace('#<p>\s*(<img .*?>)\s*</p>#i', '\1', $content);
    $content = preg_replace('#<p>\s*(<iframe .*?>)\s*</p>#i', '\1', $content);
    return $content;
}

add_filter('the_content', 'altyn_remove_empty_p');








