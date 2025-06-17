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






<?php get_footer(); ?>