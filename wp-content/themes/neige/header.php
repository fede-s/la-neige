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
<div>lalal</div>
    <?php
    var_dump($currentSeason);
//    var_dump($menu_items);

    ?>
