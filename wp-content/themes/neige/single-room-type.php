<?php
/**
 * Template Name: room type
 */

global $post;

$fields = get_fields($post);

get_header(); ?>

<div class="container">
    <div class="room-details">
        <div class="details">
            <h1 class="post-title"><?php the_title(); ?></h1>
            <h6><?= Utils::getSeasonField($fields, 'sub_title') ?></h6>
            <ul class="basic-info">
                <li>
                    <?= Utils::imgLazy(get_field('square_meters_icon', 'options'), 'large', '100px'); ?>
                    <div><?= Utils::getSeasonField($fields, 'square_meters'); ?></div>
                </li>
                <li>
                    <?= Utils::imgLazy(get_field('people_icon', 'options'), 'large', '100px'); ?>
                    <div><?= Utils::getSeasonField($fields, 'people'); ?></div>
                </li>
                <li>
                    <?= Utils::imgLazy(get_field('beds_icon', 'options'), 'large', '100px'); ?>
                    <div><?= Utils::getSeasonField($fields, 'beds'); ?></div>
                </li>
                <li>
                    <?= Utils::imgLazy(get_field('bathrooms_icon', 'options'), 'large', '100px'); ?>
                    <div><?= Utils::getSeasonField($fields, 'bathrooms'); ?></div>
                </li>
                <li>
                    <?= Utils::imgLazy(get_field('sofa_icon', 'options'), 'large', '100px'); ?>
                    <div><?= Utils::getSeasonField($fields, 'sofa'); ?></div>
                </li>
            </ul>
            <p><?= Utils::getSeasonField($fields, 'description'); ?></p>
            <div class="top-50">
                <h4>Room Amenities</h4>
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
            <div class="this-suite top-50">
                <h4>What's included in this room type?</h4>
                <?= Utils::getSeasonField($fields, 'this_suite'); ?>
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
                            <?php echo Utils::imgLazy($image, 'medium', '800px'); ?>
                        </div>
                        <?php
                    } else { ?>
                        <div class="top-image">
                            <?php echo Utils::imgLazy($image, 'medium', '800px'); ?>
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
    <?php Carousel::galleryFromACF($gallery); ?>
</div>


<?php get_footer(); ?>
