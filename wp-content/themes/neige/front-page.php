<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#">
<?php
/**
 * Template Name: Home Page
 */

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
                    allow="autoplay; fullscreen; picture-in-picture"
                    allowfullscreen>
                </iframe>
            </div>
        <?php } else {
          echo YAMA\Utils::imgLazy(get_field('header_image'), 'large', '2000px');
        }?>

    </div>
</div>


<?php get_footer(); ?>