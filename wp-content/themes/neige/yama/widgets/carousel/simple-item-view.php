<a class="box-list-item simple-item <?= $item['link'] ? 'reactive' : '' ?>" <?= $item['link'] ? 'href="' . $item['link'] . '"' : '' ?>>
   <span class="sixteen-nine-ratio">
      <?= Utils::imgLazy($item['image'], 'medium_large', '500px') ?>
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
      if ($item['subtitle']) { ?>
         <div class="subtitle">
            <?= $item['subtitle'] ?>
         </div>
         <?php
      }
      if ($item['description']) { ?>
         <div class="description">
            <?= $item['description'] ?>
         </div>
         <?php
      }
      if ($item['more']) { ?>
         <div class="more">
            <button type="button" class="btn btn-sm btn-primary"><?= $item['more'] ?></button>
         </div>
         <?php
      } ?>
   </span>
</a>
