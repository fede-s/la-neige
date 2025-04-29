<?php
require_once(THEME . '/yama/utils/Utils.php');
require_once(THEME . '/yama/widgets/Widgets.php');
require_once(THEME . '/yama/widgets/lists/Lists.php');
require_once(THEME . '/yama/widgets/carousel/Carousel.php');

$currentSeason = Utils::getCurrentSeason();
$menu_items = wp_get_nav_menu_items($currentSeason);

?>
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
    <script>
        window.version = '<?= Utils::getVersion(); ?>';
    </script>
    <style>
        :root {
            --main-season-color: <?= $currentSeason === 'winter' ? 'var(--main-winter-color)' : 'var(--main-summer-color)' ?>;
            --secondary-season-color: <?= $currentSeason === 'winter' ? 'var(--secondary-winter-color)' : 'var(--secondary-summer-color)' ?>;
            --oposite-season-color: <?= $currentSeason === 'winter' ? 'var(--main-summer-color)' : 'var(--main-winter-color)' ?>;
        }
    </style>
    <?php wp_head(); ?>
</head>

<body <?php body_class([$currentSeason]); ?>>
    <?php
    var_dump('lalala');
    var_dump(wp_get_nav_menus());
    if (!empty($menu_items)) { ?>
        <div class="menu-nav-bar">
            <div class="container">
                <div class="nav-bar-left">
                    <div id="hamburger-menu">
                        <?= file_get_contents(THEME . '/svg/burger-menu.svg'); ?>
                    </div>
                    <div class="season-selector">
                        <div class="season-selector-item <?= $currentSeason === 'summer' ? 'active' : '' ?>">
                            <a href="<?= Utils::getSeasonLink('summer') ?>" data-current-season="<?= $currentSeason ?>" data-new-season="summer"><?= Utils::getSeasonName('summer') ?></a>
                        </div>
                        <div class="season-selector-item <?= $currentSeason === 'winter' ? 'active' : '' ?>">
                            <a href="<?= Utils::getSeasonLink('winter') ?>" data-current-season="<?= $currentSeason ?>" data-new-season="winter"><?= Utils::getSeasonName('winter') ?></a>
                        </div>
                    </div>
                </div>
                <div class="menu-logo">
                    <a href="<?= get_permalink(Utils::getSeasonHome()) ?>">
                        <?= file_get_contents(get_field('logo', 'options')); ?>
                    </a>
                </div>
                <div class="nav-bar-right">

                </div>
            </div>
        </div>
        <div id="side-menu">
            <div class="menu-left">
                <div class="close-menu">
                    <span class="close-icon">X Close</span>
                </div>
                <ul class="menu-items">
                    <?php
                    foreach ($menu_items as $item) {
                        $slug = get_post_field('post_name', $item->object_id); ?>
                        <li class="menu-item" data-featured-image="<?= $slug ?>">
                            <a href="<?= $item->url; ?>"> <?= $item->title ?></a>
                        </li>
                    <?php
                    } ?>
                </ul>
                <div class="container social-media top-100">
                    <a href="<?= get_field('instagram', 'options'); ?>"><?= file_get_contents(get_template_directory_uri() . '/svg/instagram.svg'); ?></a>
                    <a href="<?= get_field('facebook', 'options'); ?>"><?= file_get_contents(get_template_directory_uri() . '/svg/facebook.svg'); ?></a>
                    <a href="<?= get_field('youtube', 'options'); ?>"><?= file_get_contents(get_template_directory_uri() . '/svg/youtube.svg'); ?></a>
                    <a href="<?= get_field('tiktok', 'options'); ?>"><?= file_get_contents(get_template_directory_uri() . '/svg/tiktok.svg'); ?></a>
                </div>
            </div>
            <div class="menu-right">
                <div class="logo-header">
                    <?= file_get_contents(get_field('logo', 'options')); ?>
                </div>
                <?php
                foreach ($menu_items as $item) {
                    $slug = get_post_field('post_name', $item->object_id);
                    echo Utils::imgLazyFromPost($item->object_id, 'large', '100vw', '', $slug);
                } ?>
            </div>
        </div>
    <?php
    }

    ?>
