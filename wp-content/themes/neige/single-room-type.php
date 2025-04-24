<?php
/**
 * Template Name: room type
 */

use Yama\Utils;

global $post;

$fields = get_fields($post);

get_header(); ?>

<div class="container">
    <div class="room-details">
        <div class="details">
            <h1 class="post-title"><?php the_title(); ?></h1>
            <h6><?= YAMA\Utils::getSeasonField($fields, 'sub_title') ?></h6>
            <ul class="basic-info">
                <div>
                    <?= file_get_contents(get_field('square_meters_icon', 'options')); ?>
                    <li><?= YAMA\Utils::getSeasonField($fields, 'square_meters'); ?></li>
                </div>
                <div>
                    <?= file_get_contents(get_field('people_icon', 'options')); ?>
                    <li><?= YAMA\Utils::getSeasonField($fields, 'people'); ?></li>
                </div>
                <div>
                    <?= file_get_contents(get_field('beds_icon', 'options')); ?>
                    <li><?= YAMA\Utils::getSeasonField($fields, 'beds'); ?></li>
                </div>
                <div>
                    <?= file_get_contents(get_field('bathrooms_icon', 'options')); ?>
                    <li><?= YAMA\Utils::getSeasonField($fields, 'bathrooms'); ?></li>
                </div>
            </ul>
            <p><?= YAMA\Utils::getSeasonField($fields, 'description'); ?></p>
            <div class="top-50">
                <h4>Room Amenities</h4>
                <ul class="amenities basic-info">
                    <?php
                    $amenities = YAMA\Utils::getSeasonField($fields, 'amenities');
                    if ($amenities) {
                        foreach ($amenities as $term_id) {
                            $amenity = get_term($term_id);
                            $icon_url = get_term_meta($term_id, 'icon', true);
                            $image_data = wp_get_attachment_image_src($icon_url, 'thumbnail'); ?>
                            <div>
                                <?= file_get_contents($image_data[0]); ?>
                                <li><?= $amenity->name; ?></li>
                            </div>
                        <?php }
                    }
                    ?>
                </ul>
            </div>
            <div class="this-suite top-50">
                <h4>What’s included in this suite?</h4>
                <?= YAMA\Utils::getSeasonField($fields, 'this_suite'); ?>
            </div>

        </div>
        <div class="side-img">
            <?php
            $sideGallery = Utils::getSeasonField($fields, 'side_images');
            if ($sideGallery) {
                $count = 0;
                foreach ($sideGallery as $image) {
                    $count++;
                    if ($count == 1) { ?>
                        <div class="base-image">
                            <?php echo YAMA\Utils::imgLazy($image, 'medium', '800px'); ?>
                        </div>
                        <?php
                    } else { ?>
                        <div class="top-image">
                            <?php echo YAMA\Utils::imgLazy($image, 'medium', '800px'); ?>
                        </div>
                        <?php
                    }
                    ?>
                <?php }
            } ?>
        </div>
    </div>
    <?php
    $gallery = Utils::getSeasonField($fields, 'room_gallery');
    ?>
    <?php YAMA\Carousel::galleryFromACF($gallery); ?>
</div>


<?php get_footer(); ?>
