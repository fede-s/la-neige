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
?>

<?php get_footer(); ?>