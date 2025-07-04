<?php


get_header();
$fields = get_fields();
$gallery = Utils::getSeasonField($fields, 'gallery');
$videoId = Utils::getVimeoVideoId(get_field('activity_video'));
?>

<div class="header activity-header">
   <div class="gradient no-gradient">
   <?php if (get_field('activity_video')) {
        ?>
            <div class="video-container">
                <iframe
                    src="https://player.vimeo.com/video/<?= $videoId ?>?autoplay=1&muted=1&loop=1&controls=0"
                    frameborder="0"
                    allow="autoplay; fullscreen; picture-in-picture">
                </iframe>
            </div>
        <?php } else { ?>
      <?= Utils::imgLazyFromPost($post, 'large', '2000px'); ?>
      <?php } ?>
   </div>
</div>
<section class="container">
   <div class="spacer"></div>
   <div class="spacer"></div>
   <div class="container">
      <h1 class="fadeIn"><?= the_title(); ?></h1>
      <div class="spacer"></div>
      <div class="activity-info">
         <div class="info-left fadeIn">
            <?= Utils::getSeasonField($fields, 'intro') ?>
         </div>
         <div class="info-right">
            <div class="property-features fadeIn">
               <div>
                  <?= $fields['details'] ?>
               </div>
            </div>
            <?php
            if (!empty($fields['booking_title'])) { ?>
               <div class="spacer"></div>
               <div class="title-with-line fadeIn">
                  <span></span><?= $fields['booking_title']  ?><span></span>
               </div>
            <?php
            }
            if (!empty($fields['booking_button']['link'])) { ?>
               <div class="book-button-wrapper fadeIn">
                  
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
      <div class="fadeIn">
         <?php Carousel::galleryFromACF($gallery, true, '', true); ?>
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
      <div class="">
         <h1 class="fadeIn activity-more">EXPLORE MORE</h1>
      </div>
      <div class="fadeIn">
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
