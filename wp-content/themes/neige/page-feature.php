<?php

/**
 * Template Name: Feature
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
      <h5><?= $fields['pre_title']; ?></h5>
      <h1><?= $fields['title']; ?></h1>
   </div>
</div>
<div class="introduction-text">
   <p class="fadeIn"><?= $fields['introduction_text']; ?></p>
   <?php if (!empty($fields['introduction_signature'])) {
   ?>
      <div class="intro-signature fadeIn">
         <?= $fields['introduction_signature']; ?>
      </div>
   <?php } ?>
</div>

<section class="container">
   <?php if (!empty($fields['features'])) { ?>
      <?php foreach ($fields['features'] as $feature) {
         if (!empty($feature['gallery']) && !empty($feature['text'])) {
      ?>
            <div class="feature-image-text">
               <div class="feature-image fadeIn">
                  <?= Carousel::galleryFromACF($feature['gallery'], false, '', true);; ?>
               </div>
               <div class="feature-text fadeIn">
                  <h5 class="fadeIn"><?= $feature['pre_title']; ?></h5>
                  <div class="signature fadeIn">
                     <h1><?= $feature['title']; ?>
                     <?php if(!empty($feature['signature'])) { ?>
                        <div class="sig-svg">
                           <?= $feature['signature']; ?>
                        </div>
                        <?php } ?>
                     </h1>
                  </div>
                  <p class="fadeIn">
                     <?= $feature['text'] ;?>
                  </p>
               </div>

            </div>
   <?php }
      }
   } ?>

</section>
<?php 
$type = 2;
Widgets::textImageSectionLegacy($type);
?>
<div class="top-50"></div>

<?php if (!empty($fields['gallery'])) { ?>
   <section class="container fadeIn">
      <?php Carousel::galleryFromACF($fields['gallery'], true, '', true); ?>
   </section>

   <div class="spacer"></div>
<?php } ?>


<?php get_footer(); ?>