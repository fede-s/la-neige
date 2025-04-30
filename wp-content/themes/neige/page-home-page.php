<?php

/**
 * Template Name: Home Page
 */
global $post;

$fields = get_fields($post);

get_header(); ?>


<?php $videoId = Utils::getVimeoVideoId(get_field('video')); ?>
<div class="header">
    <div class="gradient">
        <div class="logo-header">
            <?= file_get_contents(get_field('logo', 'options')); ?>
        </div>
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
            echo Utils::imgLazy(get_field('header_image'), 'large', '2000px');
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
<section class="insta">
    <div class="container section-text-image instagram">
        <div class="side-text">
            <h5><?= get_field('instagram_pre_title'); ?></h5>
            <div class="signature">
                <h1><?= get_field('instagram_title'); ?>
                <div class="sig-svg" style=" width:<?= $fields['instagram_signature_size'] ;?>px">
                    <?= file_get_contents(get_field('instagram_signature')) ;?>
                </div>
                </h1>
            </div>

        </div>
    </div>
    <div class="post one">
        <a href="<?= get_field('post_1')['link']['url'] ?>">
            <?= Utils::imgLazy(get_field('post_1')['image'], 'large', '800px') ?>
        </a>
    </div>
    <div class="post two">
        <a href="<?= get_field('post_2')['link']['url'] ?>">
            <?= Utils::imgLazy(get_field('post_2')['image'], 'large', '800px') ?>
        </a>
    </div>
    <div class="post three">
        <a href="<?= get_field('post_3')['link']['url'] ?>">
            <?= Utils::imgLazy(get_field('post_3')['image'], 'large', '800px') ?>
        </a>
    </div>
    <div class="post four">
        <a href="<?= get_field('post_4')['link']['url'] ?>">
            <?= Utils::imgLazy(get_field('post_4')['image'], 'large', '800px') ?>
        </a>
    </div>
</section>
<section class="container top-100 bottom-100 pink">
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
            $roomTypes = Utils::getPosts('room-type');
            foreach ($roomTypes as $room) {
            ?>
                <div class="item">
                    <a href="<?= get_permalink($room->ID); ?>" target="_blank">
                        <?= Utils::imgLazyFromPost($room, 'medium', '400px'); ?>
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