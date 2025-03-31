<?php
require_once(YAMA . '/utils/Utils.php');

$sizes = Utils::getImageSizesForList($items, 1, 4);
?>
<ul class="box-list mobile-big top-title-list">
   <?php
   foreach ($items as $item) { ?>
      <li id=<?= $item['id'] ?>>
         <?php
         if ($item['title']) { ?>
            <h5 class="title">
               <?= $item['title'] ?>
            </h5>
            <?php
         } ?>
         <a class="box-list-item" <?= $item['disabled'] ? 'disabled="true"' : '' ?> href="<?= $item['link'] ?>">
            <span class="sixteen-nine-ratio">
               <?php
               if ($item['video']) {
                  Utils::videoIframeOnDemand($item['video']);
               } else {
                  echo Utils::imgLazy($item['image'], 'medium', $sizes);
               } ?>
            </span>
            <span class="content">
               <div class="description">
                  <?= $item['description'] ?>
               </div>
               <div class="more">
                  <button type="button" class="btn btn-sm btn-primary"><?= $item['more'] ?></button>
               </div>
            </span>
         </a>
      </li>
      <?php
   } ?>
</ul>
