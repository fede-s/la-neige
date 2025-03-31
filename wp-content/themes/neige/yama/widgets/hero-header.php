<div class="hero-header <?= $title ?>">
   <?= Utils::img($image) ?>
   <div class="container">
      <div class="hero-content">
         <div class="title">
            <h1><?= $title ?></h1>
            <h2><?= $subtitle ?></h2>
         </div>
         <?php
         if ($video) { ?>
            <div class="hero-video d-none d-md-block">
               <div class="sixteen-nine-ratio">
                  <?= Utils::videoIframeOnDemand($video) ?>
               </div>
            </div>
            <?php
         } ?>
      </div>
   </div>
</div>
<?php
if ($video) { ?>
   <div class="hero-video d-md-none">
      <div class="sixteen-nine-ratio">
         <?= Utils::videoIframeOnDemand($video) ?>
      </div>
   </div>
   <?php
} ?>
<?php
$object = get_queried_object();
if (!(isset($object->taxonomy) && $object->taxonomy === 'country')) {
   Widgets::breadcrumb();
} ?>
