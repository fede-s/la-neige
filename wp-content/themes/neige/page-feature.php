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
      <h5><?= $fields['pre_title']; ?></h5>
      <h1><?= $fields['title']; ?></h1>
   </div>
</div>
<div class="introduction-text">
   <p><?= $fields['introduction_text']; ?></p>
   <?php if (!empty($fields['introduction_signature'])) {
   ?>
      <div class="intro-signature">
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
               <div class="feature-image">
                  <?= Carousel::galleryFromACF($feature['gallery'], false, '', true);; ?>
               </div>
               <div class="feature-text">
                  <h5><?= $feature['pre_title']; ?></h5>
                  <div class="signature">
                     <h1><?= $feature['title']; ?>
                     <?php if(!empty($feature['signature'])) { ?>
                        <div class="sig-svg">
                           <?= $feature['signature']; ?>
                        </div>
                        <?php } ?>
                     </h1>
                  </div>
                  <p>
                     <?= $feature['text'] ;?>
                  </p>
               </div>

            </div>
   <?php }
      }
   } ?>

</section>

<?php if (!empty($fields['gallery'])) { ?>
   <section class="container">
      <?php Carousel::galleryFromACF($fields['gallery'], true, '', true); ?>
   </section>

   <div class="spacer"></div>
<?php } ?>


<?php get_footer(); ?>