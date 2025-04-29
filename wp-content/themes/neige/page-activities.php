<?php

/**
 * Template Name: Activities
 */


global $post;

$fields = get_fields($post);

get_header(); ?>

<div class="header">
   <div class="gradient">
      <?= Utils::imgLazy(get_field('header_image'), 'large', '2000px') ?>
   </div>
   <div class="header-text">
      <?= get_field('header_text'); ?>
   </div>
</div>

<section class="container">
   <div class="activities">
      <?php
      $activities = Utils::getCurrentSeasonPosts('activities');
      foreach ($activities as $activity) { ?>
         <div class="activity">
            <div class="acivity-img">
            <?= Utils::imgLazyFromPost($activity, 'medium', '400px'); ?>
            </div>
            <h5></h5>
            <h1></h1>
            <p></p>

         </div>
      <?php } ?>

   </div>

</section>