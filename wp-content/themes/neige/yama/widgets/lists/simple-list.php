<?php
require_once(YAMA . '/utils/Utils.php');

$sizes = Utils::getImageSizesForListFromClass($items, $listClass);
?>

<ul class="box-list simple-list <?= $listClass?>">
   <?php
   foreach ($items as $item) {
      $categories = $item['categories'] ? http_build_query($item['categories'], null, ' ') : '';
      $tag = $item['link'] ? 'a' : 'div' ?>
      <li <?= $categories ?>>
         <<?= $tag ?> class="box-list-item" <?= $item['disabled'] ? 'disabled="true"' : '' ?> href="<?= $item['link'] ?>">
            <span class="sixteen-nine-ratio">
               <?= Utils::imgLazy($item['image'], 'medium', $sizes) ?>
               <span class="top-caption"><?= $item['caption'] ?></span>
            </span>
            <span class="content">
               <?php
               if ($item['title']) { ?>
                  <div class="title">
                     <?= $item['title'] ?>
                  </div>
                  <?php
               }
               if ($item['description']) { ?>
                  <div class="description">
                     <?= $item['description'] ?>
                  </div>
                  <?php
               } ?>
               <?php
               if ($item['more']) { ?>
                  <div class="more">
                     <button type="button" class="btn btn-sm btn-primary"><?= $item['more'] ?></button>
                  </div>
                  <?php
               } ?>
            </span>
         </<?= $tag ?>>
      </li>
      <?php
   } ?>
</ul>
