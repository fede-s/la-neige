<?php
require_once(YAMA . '/utils/Utils.php');
require_once(YAMA . '/widgets/Widgets.php');
?>
<?php 
if($actualPost != $item['id']) { ?>
<div class="more">
    <a class="box-list-item" href="<?= $item['link'] ?>">
            <span class="square-ratio">
               <?= Utils::imgLazy($item['image'], 'large', '500px') ?>
            </span>
        <div class="flex-1"></div>
        <?php
        if (!empty($item['title'])) { ?>
            <div class="title"><?= $item['title'] ?></div>
            <?php
        }
        if (!empty($item['pre_title'])) { ?>
            <h6 class="pre-title"><?= $item['pre_title'] ?></h6>
            <?php
        } ?>
    </a>
</div>

<?php } ?>