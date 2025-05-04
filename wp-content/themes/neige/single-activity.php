<?php


get_header();
$fields = get_fields();
$gallery = Utils::getSeasonField($fields, 'gallery');
?>

<div class="header activity-header">
   <div class="gradient">
      <?= Utils::imgLazyFromPost($post, 'large', '2000px'); ?>
   </div>
</div>
<section class="container">
   <div class="spacer"></div>
   <div class="spacer"></div>
   <div class="container">
      <h1><?= the_title(); ?></h1>
      <div class="spacer"></div>
      <div class="activity-info">
         <div class="info-left">
            <?= Utils::getSeasonField($fields, 'intro') ?>
         </div>
         <div class="info-right">
            <div class="property-features">
               <div>
                  <?= $fields['details'] ?>
               </div>
            </div>
            <?php
            if (!empty($fields['booking_title'])) { ?>
               <div class="spacer"></div>
               <div class="title-with-line">
                  <span></span><?= $fields['booking_title']  ?><span></span>
               </div>
            <?php
            }
            if (!empty($fields['booking_button']['link'])) { ?>
               <div class="book-button-wrapper">
                  
                     <a href="<?= $fields['booking_button']['link']; ?>" class="linkBtn"><?= $fields['booking_button']['label']; ?></a>
                  
               </div>
            <?php
            } ?>
         </div>
      </div>
   </div>
   <?php
   if (!empty($gallery)) { ?>
      <div class="spacer large"></div>
      <div class="">
         <?php Carousel::galleryFromACF($gallery); ?>
      </div>
   <?php
   }
   if (!empty($fields['sections']) && count($fields['sections'])) { ?>
      <div class="spacer"></div>
      <div class="container">
         <?php Widgets::sections($fields['sections']) ?>
      </div>
   <?php
   }
    ?>
      <div class="spacer large"></div>
      <div class="container">
         <h2 class="text-center">More</h2>
      </div>
      <div class="container large">
         <div class="spacer sm"></div>
         <?php
         $activities = Utils::getCurrentSeasonPosts('activity');
         $actualPost = get_the_ID(); 
          Carousel::generic($activities, $actualPost); ?>
      </div>
   <?php
   
   if ($post->post_type === 'post') { ?>
      <div class="spacer medium"></div>
      <div class="text-center">
         <a class="btn btn-primary btn-lg" href="javascript:window.history.back();">Back to News</a>
      </div>
   <?php
   } ?>
   <div class="spacer large"></div>



</section>
<?php
get_footer();
