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

<section class="container bottom-100 top-100 pink">
    <div class="section-text-image">
        <div class="side-text discover-more">
            <h5 class="fadeIn">See More!</h5>
            <div class="signature fadeIn">
                <h1><a href="room-types">
                More Pages
                    </a>
                </h1>
            </div>
        </div>
    </div>
<div class="rooms-display bottom-30 fadeIn">
        <div id="rooms" class="owl-carousel owl-theme">
            <?php
            $currentSeason = Utils::getCurrentSeason();
            $menu_items = wp_get_nav_menu_items($currentSeason);
            foreach ($menu_items as $item) {
            ?>
                <div class="item">
                    <a href="<?= $item->url; ?>" target="_blank">
                        <?= Utils::imgLazyFromPost($item->object_id, 'medium', '400px'); ?>
                        <div class="info">
                            <h3><?= $item->title; ?></h3>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</section>


<?php get_footer(); ?>