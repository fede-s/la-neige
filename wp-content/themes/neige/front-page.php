<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#">
<?php
/**
 * Template Name: Home Page
 */

use Yama\Widgets;

get_header(); ?>

<?php $videoId = YAMA\Utils::getVimeoVideoId(get_field('video')); ?>
<div class="header">
    <div class="gradient">
        <?php if (get_field('video')) {
        ?>
            <div class="video-container">
                <iframe
                    src="https://player.vimeo.com/video/<?= $videoId ?>?autoplay=1&muted=1&loop=1&controls=0"
                    frameborder="0"
                    allow="autoplay; fullscreen; picture-in-picture">
                </iframe>
            </div>
        <?php } else {
            echo YAMA\Utils::imgLazy(get_field('header_image'), 'large', '2000px');
        } ?>

    </div>
</div>

<?php
$type = 1;
Widgets::textImageSection($type);
$type = 2;
Widgets::textImageSection($type);
$type = 3;
Widgets::textImageSection($type);
?>
<section class="temporal-dos">
    <div class="container section-text-image instagram">
        <div class="side-text">
            <h5><?= get_field('instagram_pre_title'); ?></h5>
            <h1><?= get_field('instagram_title'); ?></h1>
            <?= file_get_contents(get_field('instagram_signature')); ?>

        </div>
    </div>
    <div class="post one">
        <a href="<?= get_field('post_1')['link']['url'] ?>">
            <?= YAMA\Utils::imgLazy(get_field('post_1')['image'], 'large', '800px') ?>
        </a>
    </div>
    <div class="post two">
        <a href="<?= get_field('post_2')['link']['url'] ?>">
            <?= YAMA\Utils::imgLazy(get_field('post_2')['image'], 'large', '800px') ?>
        </a>
    </div>
    <div class="post three">
        <a href="<?= get_field('post_3')['link']['url'] ?>">
            <?= YAMA\Utils::imgLazy(get_field('post_3')['image'], 'large', '800px') ?>
        </a>
    </div>
    <div class="post four">
        <a href="<?= get_field('post_4')['link']['url'] ?>">
            <?= YAMA\Utils::imgLazy(get_field('post_4')['image'], 'large', '800px') ?>
        </a>
    </div>
</section>
<section class="container top-100 pink">
    <div class="discover">
        <h5>
            Discover Our Accommodations
        </h5>
        <h3>
            <a href="stay">
                Explore All Accommodations ----
            </a>
        </h3>
    </div>
    <div class="rooms-display bottom-30 top-100">
        <div id="rooms" class="owl-carousel owl-theme">
            <?php
            $roomTypes = YAMA\Utils::getPosts('room-type');
            foreach ($roomTypes as $room) {
            ?>
                <div class="item">
                    <a href="<?= get_permalink($room->ID); ?>" target="_blank">
                        <?= YAMA\Utils::imgLazyFromPost($room, 'medium', '400px'); ?>
                        <div class="info">
                            <h3><?= $room->post_title; ?></h3>
                            <ul class="basic-info">
                                <div>
                                    <?php
                                    //  echo file_get_contents(get_field('square_meters_icon', 'options')); 
                                    ?>
                                    <li><?= get_post_meta($room->ID, 'square_meters', true); ?></li>
                                </div>
                                <div>
                                    <?php
                                    //  echo file_get_contents(get_field('people_icon', 'options')); 
                                    ?>
                                    <li><?= get_post_meta($room->ID, 'people', true); ?></li>
                                </div>
                                <div>
                                    <?php
                                    //  echo file_get_contents(get_field('beds_icon', 'options')); 
                                    ?>
                                    <li><?= get_post_meta($room->ID, 'beds', true); ?></li>
                                </div>
                                <div>
                                    <?php
                                    //  echo file_get_contents(get_field('bathrooms_icon', 'options')); 
                                    ?>
                                    <li><?= get_post_meta($room->ID, 'bathrooms', true); ?></li>
                                </div>
                            </ul>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</section>


<?php get_footer(); ?>