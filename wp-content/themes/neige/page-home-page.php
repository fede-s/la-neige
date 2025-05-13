<?php

/**
 * Template Name: Home Page
 */
global $post;

$fields = get_fields($post);

get_header(); ?>


<?php $videoId = Utils::getVimeoVideoId(get_field('video')); ?>
<div class="header header-home">
    <div class="gradient no-gradient">
        <?php if (get_field('video')) {
        ?>
            <div class="video-container">
                <iframe
                    src="https://player.vimeo.com/video/<?= $videoId ?>?autoplay=1&muted=1&loop=1&controls=0"
                    frameborder="0"
                    allow="autoplay; fullscreen; picture-in-picture">
                </iframe>
            </div>
        <?php } else { ?>
            <div class="header-content">
            <?= Utils::imgLazy(get_field('logo', 'options'), 'large', '200px', '', 'logo-header fadeIn'); ?>
            <?php echo Utils::imgLazy(get_field('header_image'), 'large', '2000px', '', 'image-header fadeIn'); ?>
            <div class="signature-header contact-signature fadeIn">
                <?php echo $fields['header_signature']; ?>
            </div>
            </div>
            
        <?php } ?>

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
<section class="container bottom-100 pink">
    <div class="section-text-image">
        <div class="side-text discover-more">
            <h5 class="fadeIn"><?= $fields['room_preview_pre_title'] ;?></h5>
            <div class="signature fadeIn">
                <h1><a href="room-types">
                <?= $fields['room_preview_title'] ;?>
                    </a>
                    <div class="sig-svg">
                    <?= $fields['room_preview_signature']; ?>
                    </div>
                </h1>
            </div>
        </div>
    </div>
    <div class="rooms-display bottom-30 fadeIn">
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
                                <li><?= get_post_meta($room->ID, 'square_meters', true); ?></li>
                                <li><?= get_post_meta($room->ID, 'people', true); ?></li>
                                <li><?= get_post_meta($room->ID, 'beds', true); ?></li>
                                <li><?= get_post_meta($room->ID, 'bathrooms', true); ?></li>
                                <li><?= get_post_meta($room->ID, 'sofa', true); ?></li>
                            </ul>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<section class="insta">
    <div class="container section-text-image instagram">
        <div class="side-text">
            <h5 class="fadeIn"><?= get_field('instagram_pre_title'); ?></h5>
            <div class="signature fadeIn">
                <h1><?= get_field('instagram_title'); ?>
                    <div class="sig-svg">
                        <?= $fields['instagram_signature']; ?>
                    </div>
                </h1>
            </div>

        </div>
    </div>
    <div class="post one fadeIn">
        <a href="<?= get_field('post_1')['link']['url'] ?>">
            <?= Utils::imgLazy(get_field('post_1')['image'], 'large', '800px') ?>
        </a>
    </div>
    <div class="post two fadeIn">
        <a href="<?= get_field('post_2')['link']['url'] ?>">
            <?= Utils::imgLazy(get_field('post_2')['image'], 'large', '800px') ?>
        </a>
    </div>
    <div class="post three fadeIn">
        <a href="<?= get_field('post_3')['link']['url'] ?>">
            <?= Utils::imgLazy(get_field('post_3')['image'], 'large', '800px') ?>
        </a>
    </div>
    <div class="post four fadeIn">
        <a href="<?= get_field('post_4')['link']['url'] ?>">
            <?= Utils::imgLazy(get_field('post_4')['image'], 'large', '800px') ?>
        </a>
    </div>
</section>
<?php get_footer(); ?>