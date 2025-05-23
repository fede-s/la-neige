<?php

/**
 * Template Name: Contact
 */


global $post;

$fields = get_fields($post);

get_header(); ?>


<section class="contact container restaurant forest-blue">
   <div class="contact-title">
      <h1 class="fadeIn"><?= $fields['title']; ?></h1>
      <div class="contact-signature fadeIn">
         <?= $fields['signature']; ?>
      </div>
      <div class="contact-data fadeIn">
         <?php
         $telephone = get_field('telephone', 'options');
         if (!empty($telephone)) { ?>
            <div>
               <p><a href="tel:<?= $telephone ?>"><?= $telephone; ?></a></p>
            </div>
         <?php } ?>
         <?php
         $email = get_field('email', 'options');
         if (!empty($email)) { ?>
            <div>
               <p><a href="mailto:<?= $email ?>"><?= $email ?></a></p>
            </div>
         <?php } ?>
      </div>
   </div>
   <div class="section-text-image">
      <div class="side-text fadeIn">
         <?= Utils::imgLazy(get_field('contact_logo'), 'medium', '300px'); ?>
         <h5><?= $fields['name'] ;?></h5>
         <?= $fields['text'] ?? '' ?>
      </div>

      <div class="side-image">
         <?php
         if (!empty($fields['gallery'][0])) {
         ?>
            <div class="shadow-image fadeIn">
               <div class="front fadeIn">
                  <?= Utils::imgLazy($fields['gallery'][0], 'medium', '800px'); ?>
               </div>
               <div class="shadow fadeIn <?= ($fields['gallery'][1] == null) ? 'lock' : ''; ?>">
                  <?php if (!empty($fields['gallery'][1])) { ?>
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
            <h1 class="fadeIn"><?= $fields['access_title'] ?? '' ?></h1>
         </div>
         <div class="contact-signature fadeIn">
            <?= $fields['access_signature']; ?>
         </div>
         <p class="access-text fadeIn"><?= $fields['access_text'] ?? '' ?></p>
         <?php
         if (!empty($fields['travel_options'])) {
            foreach ($fields['travel_options'] as $option) { ?>
               <div class="travel-option">
                  <?= Utils::imgLazy($option['icon'], 'large', '100px', '', 'fadeIn'); ?>
                  <h5 class="fadeIn"><?= $option['title']; ?></h5>
                  <p class="fadeIn"><?= $option['text']; ?></p>
               </div>
         <?php
            }
         } ?>
      </div>

      <div class="side-image fadeIn">
         <?php
         if (!empty($fields['map_image'])) {
            echo Utils::imgLazy($fields['map_image'], 'medium', '1000px');
         } else {
            echo $fields['map'] ?? '';
         } ?>
      </div>
   </div>
</section>








<?php get_footer(); ?>