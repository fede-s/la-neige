<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#">
<?php
/**
 * Template Name: Stay
 */

get_header(); ?>

<div class="header">
   <div class="gradient">
      <?= Utils::imgLazy(get_field('header_image'), 'large', '2000px') ?>
   </div>
   <div class="header-text">
      <?= get_field('header_text'); ?>
   </div>

</div>

<div class="rooms-container container">

   <?php
   $roomTypes = Utils::getPosts('room-type');
   foreach ($roomTypes as $room) {
   ?>
      <div class="room">
         <a href="<?= get_permalink($room->ID); ?>" target="_blank">
            <?= Utils::imgLazyFromPost($room, 'medium', '400px'); ?>
         </a>
         <h3><?= $room->post_title; ?></h3>
         <p><?= get_post_meta($room->ID, 'short_description', true) ?></p>
         <a class="room-link" href="<?= get_permalink($room->ID); ?>" target="_blank">Room Details</a>
      </div>

   <?php  } ?>

</div>



<?php get_footer(); ?>
