<?php
require_once(THEME . '/utils/Utils.php');
require_once(THEME . '/widgets/Carousel.php');  ?>

<div id="<?= $modalID ?>" class="modal fade image-modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <button class="close-button" onclick="closeModal('#<?= $modalID ?>')"><i class="far fa-times-circle"></i></button>
            <div class="modal-body">
                <?php Carousel::galleryFromACF($gallery, false, '', true, 'contain') ?>
            </div>
        </div>
    </div>
</div>
