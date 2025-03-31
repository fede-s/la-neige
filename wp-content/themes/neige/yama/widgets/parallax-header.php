<?php
$customImage = get_field('header', $post)['image'];
$image = $customImage ? $customImage : get_field('default_header_image', 'option');
?>
<div class="hero-header back">
   <?= Utils::imgLazy($image, 'large') ?>
   <span class="live-up"><?= Utils::imgLazy(get_field('under_header_logo', 'option'), 'large', '300px'); ?></span>
</div>
