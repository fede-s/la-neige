<?php
require_once(THEME . '/yama/utils/Utils.php');
require_once(THEME . '/yama/widgets/Widgets.php');
require_once(THEME . '/yama/widgets/lists/Lists.php');
require_once(THEME . '/yama/widgets/carousel/Carousel.php');

global $TRP_LANGUAGE;
$currentSeason = Utils::getCurrentSeason();
$menu_items = wp_get_nav_menu_items($currentSeason);
$options = get_fields('options');
$lang = substr($TRP_LANGUAGE, 0, 2);
$langAndLocale = $lang === 'en' ? 'en-US' : ($lang === 'ja' ? 'ja-JP' : '');
$bookingURL = "https://reservations.hakubahospitalitygroup.com/?chain=31179&hotel=48088&locale={$langAndLocale}&theme=LANEIGE";
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
    if ($menu_items) { ?>
        <div class="menu-nav-bar">
            <div class="container">
                <div class="nav-bar-left">
                    <div id="hamburger-menu">
                        <?= file_get_contents(THEME . '/assets/images/burger-menu.svg'); ?>
                    </div>
                    <?= do_shortcode('[language-switcher]'); ?>
                    <?php Widgets::seasonSwitch(); ?>
                </div>
                <div class="menu-logo">
                    <a href="<?= get_permalink(Utils::getSeasonHome()) ?>">
                        <?= Utils::imgLazy(get_field('logo_sticky_bar', 'options'), 'large', '150px'); ?>
                    </a>
                </div>
                <div class="nav-bar-right">
                    <a href="<?= $bookingURL ?>" target="_blank" class="linkBtn book-btn">Reserve</a>
                </div>
            </div>
        </div>
        <div id="side-menu">
            <div class="menu-left">
                <div class="close-menu">
                    <span class="close-icon">X Close</span>
                </div>
                <?php Widgets::seasonSwitch(); ?>
                <ul class="menu-items">
                    <?php
                    foreach ($menu_items as $item) {
                        $slug = get_post_field('post_name', $item->object_id). 'Image'; ?>
                        <li class="menu-item" data-featured-image="<?= $slug ?>">
                            <a href="<?= $item->url; ?>"> <?= $item->title ?></a>
                        </li>
                    <?php
                    } ?>
                </ul>
                <div class="social-media top-100">
                    <a href="<?= get_field('instagram', 'options'); ?>"><?= Utils::imgLazy($options['instagram_icon'], 'large', '100px') ?></a>
                    <a href="<?= get_field('facebook', 'options'); ?>"><?= Utils::imgLazy($options['facebook_icon'], 'large', '100px') ?></a>
                    <a href="<?= get_field('youtube', 'options'); ?>"><?= Utils::imgLazy($options['youtube_icon'], 'large', '100px') ?></a>
                    <a href="<?= get_field('tiktok', 'options'); ?>"><?= Utils::imgLazy($options['tiktok_icon'], 'large', '100px') ?></a>
                </div>
            </div>
            <div class="menu-right">
                <div class="logo-header">
                    <?= Utils::imgLazy(get_field('logo_menu', 'options'), 'large', '200px'); ?>
                </div>
                <?php
                foreach ($menu_items as $item) {
                    $slug = get_post_field('post_name', $item->object_id). 'Image';
                    echo Utils::imgLazyFromPost($item->object_id, 'large', '100vw', '', $slug);
                } ?>
            </div>
        </div>
    <?php
    }

    ?>
