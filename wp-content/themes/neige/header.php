<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no,address=no,email=no">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant:ital,wght@0,400;0,500;0,600;1,300&family=Poppins:wght@300&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
          rel="stylesheet">

    <?php wp_head(); ?>
</head>


<body>
<?php
require_once(THEME . '/yama/utils/Utils.php');
require_once(THEME . '/yama/widgets/Widgets.php');
require_once(THEME . '/yama/widgets/lists/Lists.php');
require_once(THEME . '/yama/widgets/carousel/Carousel.php');
?>
<!-- <?php
if (has_nav_menu('menu-1')) {
    $menu_items = wp_get_nav_menu_items('menu-1');
    $itemsArray = array();
    foreach ($menu_items as $m) {
        $itemsArray[]['title'] = $m->title;
    }
    wp_nav_menu(
        array(
            'theme_location' => 'menu-1',
            'menu_id' => 'primary-menu',
            'container' => 'ul',
            'menu_class' => 'gNav_main, list-num-1',
        )
    );
} ?> -->


<?php
$menu_items = wp_get_nav_menu_items('menu-1');

if ($menu_items) {
function get_svg_content($svg_path) {
    if (file_exists($svg_path)) {
        return file_get_contents($svg_path);
    } else {
        return '';
    }
}

$svg_path = get_template_directory_uri() . '/svg/burger-menu.svg';
$svg_content = get_svg_content(get_template_directory() . '/svg/burger-menu.svg'); ?>
<div id="hamburger-menu">
    <?= $svg_content ?>
</div>
<div id="side-menu" class="hidden">
    <div class="menu-left">
        <div class="close-menu">
            <span class="close-icon">X Close</span> 
        </div>
        <ul class="menu-items">
            <?php
            foreach ($menu_items as $item) {
                $slug = get_post_field( 'post_name', $item->object_id ); ?>
                <li class="menu-item" data-featured-image="<?= $slug ?>">
                    <a href="<?= $item->url; ?>"> <?= $item->title ?></a>
                </li>
                <?php
            } ?>
        </ul>
    </div>
    <div class="menu-right">
        <?php
        foreach ($menu_items as $item) {
            $slug = get_post_field( 'post_name', $item->object_id );
            echo YAMA\Utils::imgLazyFromPost($item->object_id, 'large', '100vw', '', $slug);
        } ?>
    </div>
</div>
<?php
}

?>
