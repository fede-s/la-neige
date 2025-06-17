<?php
/**
 * Template Name: Legacy
 */
global $post;
$fields = get_fields($post);
get_header(); ?>

<?php 
$type = 3;
Widgets::textImageSectionLegacy($type);
$count = 0;
$type = 1;
foreach ($fields['about'] as $item) {
   $count++;
   Widgets::textImageSectionLegacy($type, $item,$count);
}
?>

<section class="restaurant opening  legacy-flex">
   <div class="container section-text-image">
      <div class="side-image">
         <div class="side-img">
            <?php echo Utils::imgLazy($fields['about_2_gallery'][0], 'medium', '800px', '', 'fadeIn'); ?>
            <?php echo Utils::imgLazy($fields['about_2_gallery'][1], 'medium', '800px', '', 'fadeIn'); ?>
         </div>
      </div>
      <div class="side-text fadeIn">
         <?= $fields['about_2_text'] ;?>
      </div>
   </div>
</section>






<?php get_footer(); ?>