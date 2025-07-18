<?php
/**
 * Template Name: Room Types
 */
global $post;

$fields = get_fields($post);
$options = get_fields('options');
$colorWhite = ($options['change_color'] == true) ? 'color-white ' : '';

get_header(); ?>

<div class="header">
   <div class="gradient">
      <?= Utils::imgLazy(get_field('header_image'), 'large', '2000px') ?>
   </div>
   <div class="header-text fadeIn <?= $colorWhite ;?>">
      <h5><?= $fields['pre_title'] ;?></h5>
      <h1><?= $fields['title'] ;?></h1>
   </div>
</div>
 <div class="introduction-text">
   <p class="fadeIn"><?= $fields['introduction_text'] ;?></p>
   <?php if(!empty($fields['introduction_signature'])) {
    ?>
   <div class="intro-signature fadeIn02">
      <?= $fields['introduction_signature'] ;?>
   </div>
   <?php } ?>
 </div>

<div class="rooms-container container">
   <?php
   $roomTypes = Utils::getCurrentSeasonPosts('room-type');
   foreach ($roomTypes as $room) { ?>
      <div class="room">
         <a href="<?= Utils::getPostLink($room->ID); ?>">
            <?= Utils::imgLazyFromPost($room, 'medium', '400px', '', 'fadeIn'); ?>
         </a>
         <h3 class="fadeIn"><?= $room->post_title; ?></h3>
         <p class="fadeIn"><?= Utils::getSeasonField($room, 'short_description') ?></p>
         <a class="room-link fadeIn" href="<?= Utils::getPostLink($room->ID); ?>">Room Details</a>
      </div>

   <?php  } ?>

</div>



<?php get_footer(); ?>
