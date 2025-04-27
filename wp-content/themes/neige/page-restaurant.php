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

<section class="restaurant">
   <div class="container section-text-image">
      <div class="side-text">
         <h5><?= get_field('restaurant_pre_title'); ?></h5>
         <h1><?= get_field('restaurant_title'); ?></h1>
         <div class="signature">
            <?= file_get_contents(get_field('restaurant_signature')); ?>
         </div>
         <div class="shadow-image">
            <div class="front">
               <?= Utils::imgLazy(get_field('restaurant_gallery')[0], 'medium', '800px') ;?>
            </div>
            <div class="shadow">
               <?= Utils::imgLazy(get_field('restaurant_gallery')[1], 'medium', '800px') ;?>
            </div>
         </div>
      </div>

      <div class="side-image">
         <div class="side-img">
            <?php echo Utils::imgLazy(get_field('restaurant_image'), 'medium', '800px'); ?>
         </div>
         <p><?= get_field('restaurant_text') ;?></p>
         <div class="buttons">
         <a href="<?= get_field('button_left')['link']; ?>" class="linkBtn"><?= get_field('button_left')['label']; ?></a>
         <a href="<?= get_field('button_right')['link']; ?>" class="linkBtn"><?= get_field('button_right')['label']; ?></a>
         </div>
      </div>
   </div>
</section>