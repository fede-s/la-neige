<?php
require_once(YAMA . '/utils/Utils.php');
$sizes = Utils::getImageSizesForList($items, 2, 4);
?>

<ul class="box-list image-with-title">
   <?php
   foreach ($items as $item) { ?>
      <li>
         <div class="box-list-item <?= $item['link'] ? 'reactive' : '' ?>">
            <?php
            if ($item['link']) { ?>
               <a class="no-decoration sixteen-nine-ratio" href="<?= $item['link'] ?>">
                  <?= Utils::imgLazy($item['image'], 'medium', $sizes) ?>
                  <span class="title"><?= $item['title'] ?></span>
               </a>
               <?php
            } else { ?>
               <span class="sixteen-nine-ratio">
                  <?= Utils::imgLazy($item['image'], 'medium', $sizes) ?>
                  <span class="title"><?= $item['title'] ?></span>
               </span>
               <?php
            } ?>
         </div>
      </li>
      <?php
   } ?>
</ul>
