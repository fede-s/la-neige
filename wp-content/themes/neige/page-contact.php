<?php

/**
 * Template Name: Contact
 */


global $post;

$fields = get_fields($post);

get_header(); ?>



<section class="contact container restaurant forest-blue">
   <div class="contact-title">
      <h1><?= $fields['title']; ?></h1>
      <div class="sig-svg" style=" width:<?= $fields['signature_size']; ?>px">
         <?= file_get_contents($fields['signature']); ?>
      </div>
   </div>
   <div class="section-text-image">
      <div class="side-text">
         <?= $fields['text']; ?>
      </div>

      <div class="side-image">
         <?php
         if ($fields['gallery'][0]) {
         ?>
            <div class="shadow-image">
               <div class="front">
                  <?= Utils::imgLazy($fields['gallery'][0], 'medium', '800px'); ?>
               </div>
               <div class="shadow <?= ($fields['gallery'][1] == null) ? 'lock' : ''; ?>">
                  <?php if ($fields['gallery'][1]) { ?>
                     <?= Utils::imgLazy($fields['gallery'][1], 'medium', '800px'); ?>
                  <?php } ?>
               </div>
            </div>
         <?php } ?>
      </div>
   </div>
</section>








<?php get_footer(); ?>