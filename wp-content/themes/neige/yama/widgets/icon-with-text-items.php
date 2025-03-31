<?php
require_once(YAMA . '/utils/Utils.php');
?>
<div class="check-list">
   <?php
   foreach($items as $item) { ?>
      <div>
         <?= $item['icon'] ?>
         <span><?= $item['description'] ?></span>
      </div>
      <?php
   }
   ?>
</div>
