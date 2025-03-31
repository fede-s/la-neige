<?php
$id = rand();
?>
<div id="<?= $id ?>" class="lazy-video-iframe" onclick="createIframe({id: '<?= $id ?>', src: '<?= $src ?>'})">
   <?= Utils::imgLazy($placeHolder, null, '', '', 'w-100') ?>
   <?= Utils::imgFromAssets('play', 'png', '', 'play-button') ?>
</div>
