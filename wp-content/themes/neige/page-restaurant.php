<?php

/**
 * Template Name: Restaurant
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

<section class="restaurant forest-blue">
   <div class="container section-text-image">
      <div class="side-text">
         <h5><?= get_field('restaurant_pre_title'); ?></h5>
         <h1><?= get_field('restaurant_title'); ?></h1>
         <?php if (get_field('restaurant_signature')) {
         ?>
            <div class="signature">
               <?= file_get_contents(get_field('restaurant_signature')); ?>
            </div>
         <?php }
         if (get_field('restaurant_gallery')[0]) {
         ?>
            <div class="shadow-image">
               <div class="front">
                  <?= Utils::imgLazy(get_field('restaurant_gallery')[0], 'medium', '800px'); ?>
               </div>
               <div class="shadow <?= (get_field('restaurant_gallery')[1] == null) ? 'lock' : ''; ?>">
                  <?php if (get_field('restaurant_gallery')[1]) { ?>
                     <?= Utils::imgLazy(get_field('restaurant_gallery')[1], 'medium', '800px'); ?>
                  <?php } ?>
               </div>
            </div>
         <?php } ?>
      </div>

      <div class="side-image">
         <div class="side-img">
            <?php echo Utils::imgLazy(get_field('restaurant_image'), 'medium', '800px'); ?>
         </div>
         <p><?= get_field('restaurant_text'); ?></p>
         <div class="buttons">
            <a href="<?= get_field('button_left')['link']; ?>" class="linkBtn"><?= get_field('button_left')['label']; ?></a>
            <a href="<?= get_field('button_right')['link']; ?>" class="linkBtn"><?= get_field('button_right')['label']; ?></a>
         </div>
      </div>
   </div>
</section>

<section class="restaurant chef pink">
   <div class="container section-text-image">
      <div class="side-image">
         <div class="side-img">
            <?php echo Utils::imgLazy(get_field('chef_image'), 'medium', '800px'); ?>
         </div>
         <p><?= get_field('chef_text'); ?></p>
      </div>
      <div class="side-text">
         <h5><?= get_field('chef_pre_title'); ?></h5>
         <h1><?= get_field('chef_title'); ?></h1>
         <div class="signature">
            <?= file_get_contents(get_field('chef_signature')); ?>
         </div>
         <?php if (get_field('chef_gallery')[0]) {
         ?>
            <div class="shadow-image">
               <div class="front">
                  <?= Utils::imgLazy(get_field('chef_gallery')[0], 'medium', '800px'); ?>
               </div>
               <div class="shadow <?= (get_field('chef_gallery')[1] == null) ? 'lock' : ''; ?>">
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
            <?php echo Utils::imgLazy(get_field('opening_gallery')[0], 'medium', '800px'); ?>
            <?php echo Utils::imgLazy(get_field('opening_gallery')[1], 'medium', '800px'); ?>
         </div>
      </div>
      <div class="side-text">
         <h5><?= get_field('opening_pre_title'); ?></h5>
         <h1><?= get_field('opening_title'); ?></h1>
         <?= get_field('opening_text') ;?>
         <div class="buttons">
            <a href="<?= get_field('opening_button')['link']; ?>" class="linkBtn"><?= get_field('button_left')['label']; ?></a>
         </div>
      </div>
   </div>
</section>

