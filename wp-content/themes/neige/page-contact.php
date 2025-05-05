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
      <div class="contact-data">
         <?php
         $tel = get_field('telephone', 'options');
         if (!empty($tel)) { ?>
            <div>
               <p><a href="tel:<?= $tel ?>"><?= $tel; ?></a></p>
            </div>
         <?php } ?>
         <?php
         $mail = get_field('email', 'options');
         if (!empty($mail)) { ?>
            <div>
               <p><a href="mailto:<?= $mail; ?>"><?= $mail; ?></a></p>
            </div>
         <?php } ?>
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

<section class="contact container restaurant forest-blue access">
   <div class="section-text-image">
      <div class="side-text">
         <div class="contact-title">
            <h1><?= $fields['access_title']; ?></h1>
            <div class="sig-svg" style=" width:<?= $fields['access_signature_size']; ?>px">
               <?= file_get_contents($fields['access_signature']); ?>
            </div>
         </div>
         <p class="access-text"><?= $fields['access_text'] ;?></p>
         <?php 
         foreach($fields['travel_options'] as $option) { ?>
            <div class="travel-option">
               <?= Utils::imgLazy($option['icon'], 'large', '100px') ;?>
               <h6><?= $option['title'] ;?></h6>
               <p><?= $option['text'] ;?></p>
            </div>


         <?php } ?>
      </div>

      <div class="side-image">
         <?php 
         if($fields['map_image']) {
            echo Utils::imgLazy($fields['map_image'], 'medium', '1000px');
         } else {
            echo $fields['map'];
         }
         ?>
         
      </div>
   </div>
</section>








<?php get_footer(); ?>
