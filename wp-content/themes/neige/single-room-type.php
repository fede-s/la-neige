<?php

/**
 * Template Name: room type
 */

global $post;

$fields = get_fields($post);
$options = get_fields('options');

get_header(); ?>

<div class="container">
    <div class="room-details">
        <div class="details">
            <h1 class="post-title fadeIn"><?php the_title(); ?></h1>
            <h6 class="fadeIn"><?= Utils::getSeasonField($fields, 'sub_title') ?></h6>
            <ul class="basic-info fadeIn">
                <?php if (!empty($fields['square_meters'])) { ?>
                    <li>
                        <?= Utils::imgLazy(get_field('square_meters_icon', 'options'), 'large', '100px'); ?>
                        <div><?= Utils::getSeasonField($fields, 'square_meters'); ?></div>
                    </li>
                <?php } ?>
                <?php if (!empty($fields['people'])) { ?>
                    <li>
                        <?= Utils::imgLazy(get_field('people_icon', 'options'), 'large', '100px'); ?>
                        <div><?= Utils::getSeasonField($fields, 'people'); ?></div>
                    </li>
                <?php } ?>
                <?php if (!empty($fields['beds'])) { ?>
                    <li>
                        <?= Utils::imgLazy(get_field('beds_icon', 'options'), 'large', '100px'); ?>
                        <div><?= Utils::getSeasonField($fields, 'beds'); ?></div>
                    </li>
                <?php } ?>
                <?php if (!empty($fields['bathrooms'])) { ?>
                    <li>
                        <?= Utils::imgLazy(get_field('bathrooms_icon', 'options'), 'large', '100px'); ?>
                        <div><?= Utils::getSeasonField($fields, 'bathrooms'); ?></div>
                    </li>
                <?php } ?>
                <?php if (!empty($fields['sofa'])) { ?>
                    <li>
                        <?= Utils::imgLazy(get_field('sofa_icon', 'options'), 'large', '100px'); ?>
                        <div><?= Utils::getSeasonField($fields, 'sofa'); ?></div>
                    </li>
                <?php } ?>
            </ul>
            <p class="fadeIn"><?= Utils::getSeasonField($fields, 'description'); ?></p>
            <div class="top-50 fadeIn">
                <h4 class="fadeIn">ROOM AMENITIES</h4>
                <ul class="amenities basic-info">
                    <?php
                    $amenities = Utils::getSeasonField($fields, 'amenities');
                    if ($amenities) {
                        foreach ($amenities as $term_id) {
                            $amenity = get_term($term_id);
                            $icon = get_field('icon', $amenity); ?>
                            <li>
                                <?= Utils::imgLazy($icon, 'large', '100px') ?>
                                <div><?= $amenity->name; ?></div>
                            </li>
                    <?php }
                    }
                    ?>
                </ul>
            </div>
            <div class="this-suite top-50 fadeIn">
                <h4>FEATURES AND HIGHLIGHTS</h4>
                <?= Utils::getSeasonField($fields, 'this_suite'); ?>
            </div>

        </div>
        <div class="side-img base-top-image">
            <?php
            $sideGallery = Utils::getSeasonField($fields, 'side_images');
            if ($sideGallery) {
                $count = 0;
                foreach ($sideGallery as $image) {
                    $count++;
                    if ($count == 1) { ?>
                        <div class="base-image">
                            <?php echo Utils::imgLazy($image, 'medium', '800px', '', 'fadeIn'); ?>
                        </div>
                    <?php
                    } else { ?>
                        <div class="top-image">
                            <?php echo Utils::imgLazy($image, 'medium', '800px', '', 'fadeIn'); ?>
                        </div>
                    <?php
                    }
                    ?>
            <?php }
            } ?>
        </div>
    </div>
    <div class="fadeIn">
        <?php
        $gallery = Utils::getSeasonField($fields, 'room_gallery');
        ?>
    </div>
    <div class="fadeIn">
        <?php Carousel::galleryFromACF($gallery, true, '', true); ?>
    </div>
    <div class="spacer medium"></div>
</div>

<section class="container bottom-100 top-100 pink">
    <div class="section-text-image">
        <div class="side-text discover-more discover-room">
            <h5 class="fadeIn">THERE IS MORE</h5>
            <div class="signature fadeIn">
                <h1><a href="room-types">
                        MORE WAYS TO STAY
                    </a>
                    <div class="sig-svg">
                    </div>
                </h1>
            </div>
        </div>
    </div>
    <div class="rooms-display bottom-30 fadeIn">
        <div id="rooms" class="owl-carousel owl-theme">
            <?php
            $colorWhite = ($options['change_color'] == true) ? 'color-white ' : '';
            $roomTypes = Utils::getPosts('room-type');
            $actualPost = get_the_ID();
            foreach ($roomTypes as $room) {
                if ($actualPost != $room->ID) {
            ?>
                    <div class="item">
                        <a href="<?= get_permalink($room->ID); ?>" target="_blank">
                            <?= Utils::imgLazyFromPost($room, 'medium', '400px'); ?>
                            <div class="info <?= $colorWhite ;?>">
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
            <?php }
            } ?>
        </div>
    </div>
</section>


<?php get_footer(); ?>