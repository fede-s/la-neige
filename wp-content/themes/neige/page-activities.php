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
   <div class="header-text fadeIn">
      <h5><?= $fields['pre_title'] ;?></h5>
      <h1><?= $fields['title'] ;?></h1>
   </div>
</div>
<div class="introduction-text">
   <p class="fadeIn"><?= $fields['activities_introduction_text'] ;?></p>
   <?php if(!empty($fields['introduction_signature'])) {
    ?>
   <div class="intro-signature fadeIn02">
      <?= $fields['introduction_signature'] ;?>
   </div>
   <?php } ?>
 </div>

<section class="container bottom-30 forest-blue">
   <div class="activities fadeIn">
      <?php
      $activities = Utils::getCurrentSeasonPosts('activity');  
      foreach ($activities as $activity) { ?>
         <div class="activity fadeIn">
            <a class="cta-link fadeIn" href="<?= Utils::getPostLink($activity->ID); ?>"></a>
            <div class="activity-img fadeIn">
            <?= Utils::imgLazyFromPost($activity, 'medium', '400px'); ?>
            </div>
            <div class="content fadeIn">
               <h5 class="fadeIn"><?= Utils::getSeasonField($activity, 'pre_title') ;?></h5>
               <h3 class="fadeIn"><?= $activity->post_title ;?></h3>
               <p class="fadeIn"><?= Utils::getSeasonField($activity, 'short_description') ;?></p>
               <a class="discover fadeIn">Discover More</a>
            </div>
         </div>
      <?php } ?>

   </div>

</section>



<?php get_footer(); ?>