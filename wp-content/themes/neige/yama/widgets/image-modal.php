<?php
require_once(YAMA . '/utils/Utils.php'); ?>

<div id="<?= $modalId ?>" class="modal fade image-modal" role="dialog" onclick="closeModal()">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-body">
            <?= Utils::imgLazy($image, 'large') ?>
         </div>
      </div>
   </div>
</div>
