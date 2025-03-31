<?php
require_once(YAMA  . '/utils/Utils.php');
$excerpt = get_the_excerpt($post);
if (strlen($excerpt) > 130) {
   $excerpt = substr($excerpt, 0, 230). ' [...]';
}
?>

<li class="post-item">
   <span class="image">
      <a class="no-decoration" href="<?= Utils::getPostLink($post) ?>">
         <div class="sixteen-nine-ratio hover-zoom">
            <?= Utils::imgLazyFromPost($post, 'medium', '500px') ?>
         </div>
      </a>
   </span>
   <span class="content">
      <a class="no-decoration" href="<?= Utils::getPostLink($post) ?>">
         <h5><?= get_the_title($post) ?></h5>
      </a>
      <?php
      if ($showExcerpt && $excerpt) { ?>
         <p class"excerpt">
            <?= $excerpt ?>
         </p>
         <?php
      } ?>
      <?php
      if ($showReadMore) { ?>
         <a class="nice-link" href="<?= Utils::getPostLink($post) ?>">Read More</a>
         <?php
      } ?>
   </span>
</li>
