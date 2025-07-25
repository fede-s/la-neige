<?php

/**
 * Template Name: Restaurant
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

<section class="restaurant forest-blue">
   <div class="container section-text-image">
      <div class="side-text">
         <h5 class="fadeIn"><?= $fields['restaurant_pre_title']; ?></h5>
         
            <div class="signature fadeIn">
               <h1><?= $fields['restaurant_title']; ?>
               <div class="sig-svg">
                  <?= $fields['restaurant_signature']; ?>
               </div>
            </h1>
            </div>
         <?php 
         if (get_field('restaurant_gallery')[0]) {
         ?>
            <div class="shadow-image fadeIn">
               <div class="front fadeIn">
                  <?= Utils::imgLazy(get_field('restaurant_gallery')[0], 'medium', '800px'); ?>
               </div>
               <div class="shadow fadeIn <?= (get_field('restaurant_gallery')[1] == null) ? 'lock' : ''; ?>">
                  <?php if (get_field('restaurant_gallery')[1]) { ?>
                     <?= Utils::imgLazy(get_field('restaurant_gallery')[1], 'medium', '800px'); ?>
                  <?php } ?>
               </div>
            </div>
         <?php } ?>
      </div>

      <div class="side-image">
         <div class="side-img image-aspect">
            <?php echo Utils::imgLazy(get_field('restaurant_image'), 'medium', '800px', '', 'image-aspect fadeIn'); ?>
         </div>
         <div class="fadeIn wysiwyg-container"><?= get_field('restaurant_text'); ?></div>
         <?php if(!empty($fields['button_left']['link']) || !empty($fields['button_right']['link'])) {
             ?>
            <div class="buttons fadeIn">
            <?php if(!empty($fields['button_left']['link']) && !empty($fields['button_left']['label'])) {
                ?>
               <a href="<?= get_field('button_left')['link']; ?>" class="linkBtn"><?= get_field('button_left')['label']; ?></a>
               <?php } ?>
            <?php if(!empty($fields['button_right']['link']) && !empty($fields['button_right']['label'])) {
               ?>
               <a href="<?= get_field('button_right')['link']; ?>" class="linkBtn"><?= get_field('button_right')['label']; ?></a>
               <?php } ?>
            </div>
           <?php } ?>
      </div>
   </div>
</section>

<section class="restaurant chef pink">
   <div class="container section-text-image">
      <div class="side-image">
         <div class="side-img image-aspect">
            <?php echo Utils::imgLazy(get_field('chef_image'), 'medium', '800px', '', 'image-aspect fadeIn'); ?>
         </div>
         <div class="fadeIn wysiwyg-container"><?= get_field('chef_text'); ?></div>
      </div>
      <div class="side-text">
         <h5 class="fadeIn"><?= get_field('chef_pre_title'); ?></h5>
         
            <div class="signature fadeIn">
               <h1><?= $fields['chef_title']; ?>
               <div class="sig-svg">
                  <?= $fields['chef_signature']; ?>
               </div>
            </h1>
         </div>
         <?php 
          if (get_field('chef_gallery')[0]) {
         ?>
            <div class="shadow-image fadeIn">
               <div class="front fadeIn">
                  <?= Utils::imgLazy(get_field('chef_gallery')[0], 'medium', '800px'); ?>
               </div>
               <div class="shadow fadeIn <?= (get_field('chef_gallery')[1] == null) ? 'lock' : ''; ?>">
                  <?php if (get_field('chef_gallery')[1]) { ?>
                     <?= Utils::imgLazy(get_field('chef_gallery')[1], 'medium', '800px'); ?>
                  <?php } ?>
               </div>
            </div>
         <?php } ?>
      </div>
   </div>
</section>

<section class="restaurant opening forest-blue">
   <div class="container section-text-image">
      <div class="side-image">
         <div class="side-img">
            <?php echo Utils::imgLazy(get_field('opening_gallery')[0], 'medium', '800px', '', 'fadeIn'); ?>
            <?php echo Utils::imgLazy(get_field('opening_gallery')[1], 'medium', '800px', '', 'fadeIn'); ?>
         </div>
      </div>
      <div class="side-text">
         <h5 class="fadeIn"><?= get_field('opening_pre_title'); ?></h5>
         <h1 class="fadeIn"><?= get_field('opening_title'); ?></h1>
         <div class="fadeIn">
            <?= get_field('opening_text'); ?>
         </div>
         <?php if(!empty($fields['opening_button']['link']) && !empty($fields['opening_button']['label'])) {
          ?>
         <div class="buttons fadeIn">
            <a href="<?= get_field('opening_button')['link']; ?>" class="linkBtn"><?= get_field('opening_button')['label']; ?></a>
         </div>
         <?php } ?>
      </div>
   </div>
</section>

<?php get_footer(); ?>