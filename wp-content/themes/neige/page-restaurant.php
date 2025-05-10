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
      <h5><?= $fields['pre_title'] ;?></h5>
      <h1><?= $fields['title'] ;?></h1>
   </div>
</div>
 <div class="introduction-text">
   <p><?= $fields['introduction_text'] ;?></p>
 </div>

<section class="restaurant forest-blue">
   <div class="container section-text-image">
      <div class="side-text">
         <h5><?= $fields['restaurant_pre_title']; ?></h5>
         <?php if (get_field('restaurant_signature')) {
         ?>
            <div class="signature">
               <h1><?= $fields['restaurant_title']; ?>
               <div class="sig-svg">
                  <?= $fields['restaurant_signature']; ?>
               </div>
            </h1>
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
         <?php if (get_field('chef_signature')) {
         ?>
            <div class="signature">
               <h1><?= $fields['chef_title']; ?>
               <div class="sig-svg">
                  <?= $fields['chef_signature']; ?>
               </div>
            </h1>
         </div>
         <?php }
          if (get_field('chef_gallery')[0]) {
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
         <?= get_field('opening_text'); ?>
         <div class="buttons">
            <a href="<?= get_field('opening_button')['link']; ?>" class="linkBtn"><?= get_field('button_left')['label']; ?></a>
         </div>
      </div>
   </div>
</section>

<?php get_footer(); ?>