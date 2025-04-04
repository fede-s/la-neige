<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#">
<?php
/**
 * Template Name: room type
 */
require_once(THEME . '/yama/widgets/Widgets.php');
require_once(THEME . '/yama/widgets/lists/Lists.php');
require_once(THEME . '/yama/widgets/carousel/Carousel.php');
get_header(); ?>

<div class="container">
    <div class="room-details">
        <div class="details">
            <h1 class="post-title"><?php the_title(); ?></h1>
            <h6><?= get_field('sub_title') ?></h6>
            <ul class="basic-info">
                <div>
                    <?= file_get_contents(get_field('square_meters_icon', 'options')); ?>
                    <li><?= get_field('square_meters'); ?></li>
                </div>
                <div>
                    <?= file_get_contents(get_field('people_icon', 'options')); ?>
                    <li><?= get_field('people'); ?></li>
                </div>
                <div>
                    <?= file_get_contents(get_field('beds_icon', 'options')); ?>
                    <li><?= get_field('beds'); ?></li>
                </div>
                <div>
                    <?= file_get_contents(get_field('bathrooms_icon', 'options')); ?>
                    <li><?= get_field('bathrooms'); ?></li>
                </div>
            </ul>
            <p><?= get_field('description'); ?></p>
            <div class="top-50">
                <h4>Room Amenities</h4>
                <ul class="amenities basic-info">
                    <?php
                    $amenities = YAMA\Utils::getTerms('amenities');
                    foreach ($amenities as $amenity) {
                        $term_id = $amenity->term_id;
                        $icon_url = get_term_meta($term_id, 'icon', true);
                        $image_data = wp_get_attachment_image_src($icon_url, 'thumbnail');
                        ?>
                        <div>
                            <?= file_get_contents($image_data[0]); ?>
                            <li><?= $amenity->name; ?></li>
                        </div>
                    <?php }
                    ?>
                </ul>
            </div>
            <div class="this-suite top-50">
                <h4>What’s included in this suite?</h4>
                <?= get_field('this_suite'); ?>
            </div>

        </div>
        <div class="side-img">
            <?php
            $sideGallery = get_field('side_images');
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
            <?php } ?>
        </div>
    </div>
    <?php
    $gallery = get_field('room_gallery');
    ?>
    <?php YAMA\Carousel::galleryFromACF($gallery); ?>
</div>


<?php get_footer(); ?>
