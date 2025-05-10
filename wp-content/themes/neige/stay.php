<?php
/**
 * Template Name: Room Types
 */
global $post;

$fields = get_fields($post);

get_header(); ?>

<div class="header">
   <div class="gradient">
      <?= Utils::imgLazy(get_field('header_image'), 'large', '2000px') ?>
   </div>
   <div class="header-text">
      <h5><?= $fields['pre_title'] ;?></h5>
      <h1><?= $fields['title'] ;?></h1>
   </div>
</div>
 <div class="introduction-text">
   <p><?= $fields['introduction_text'] ;?></p>
 </div>

<div class="rooms-container container">
   <?php
   $roomTypes = Utils::getCurrentSeasonPosts('room-type');
   foreach ($roomTypes as $room) { ?>
      <div class="room">
         <a href="<?= Utils::getPostLink($room->ID); ?>">
            <?= Utils::imgLazyFromPost($room, 'medium', '400px'); ?>
         </a>
         <h3><?= $room->post_title; ?></h3>
         <p><?= Utils::getSeasonField($room, 'short_description') ?></p>
         <a class="room-link" href="<?= Utils::getPostLink($room->ID); ?>">Room Details</a>
      </div>

   <?php  } ?>

</div>



<?php get_footer(); ?>
