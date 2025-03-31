<?php
require_once(YAMA . '/utils/Utils.php');
?>
<div class="gallery-wall">
   <?php
   foreach ($items as $item) { ?>
      <div class="item">
         <div class="sixteen-nine-ratio">
            <?php
            if ($item['video']) {
               Utils::videoIframeOnDemand($item['video']);
            } else if ($item['image']) {
               echo Utils::imgLazy($item['image'], 'medium_large', '400px');
            } ?>
         </div>
      </div>
      <?php
   } ?>
</div>
