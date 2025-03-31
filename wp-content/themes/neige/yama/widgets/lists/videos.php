<?php
require_once(YAMA . '/utils/Utils.php');
?>

<ul class="box-list three-col mobile-big">
   <?php
   foreach ($videos as $video) { ?>
      <li>
         <div class="sixteen-nine-ratio">
            <?= Utils::lazy($video) ?>
         </div>
      </li>
      <?php
   } ?>
</ul>
