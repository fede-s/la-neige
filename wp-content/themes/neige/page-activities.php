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
      <h5><?= $fields['pre_title'] ;?></h5>
      <h1><?= $fields['title'] ;?></h1>
   </div>
</div>
 <div class="introduction-text">
   <p><?= $fields['activities_introduction_text'] ;?></p>
 </div>

<section class="container bottom-30 forest-blue">
   <div class="activities">
      <?php
      $activities = Utils::getCurrentSeasonPosts('activity');  
      foreach ($activities as $activity) { ?>
         <div class="activity">
            <a class="cta-link" href="<?= Utils::getPostLink($activity->ID); ?>"></a>
            <div class="activity-img">
            <?= Utils::imgLazyFromPost($activity, 'medium', '400px'); ?>
            </div>
            <div class="content">
               <h5><?= Utils::getSeasonField($activity, 'pre_title') ;?></h5>
               <h3><?= $activity->post_title ;?></h3>
               <p><?= Utils::getSeasonField($activity, 'short_description') ;?></p>
               <a class="discover">Discover More</a>
            </div>
         </div>
      <?php } ?>

   </div>

</section>



<?php get_footer(); ?>