<?php

/**
 * Template Name: Feature
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
   <?php if(!empty($fields['introduction_signature'])) {
    ?>
   <div class="intro-signature">
      <?= $fields['introduction_signature'] ;?>
   </div>
   <?php } ?>
 </div>


<?php get_footer(); ?>