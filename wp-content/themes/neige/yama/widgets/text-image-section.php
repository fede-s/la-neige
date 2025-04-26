<?php
$name = ($type == 1) ? 'about' : (($type == 2) ? 'features' : (($type == 3) ? 'restaurant' : ''));


$preTitle = get_field($name . '_pre_title');
$title = get_field($name . '_title');
$signature = get_field($name . '_signature');
$text = get_field($name . '_text');
$button = get_field($name . '_button');
$gallery = get_field($name . '_gallery');
$icons = get_field($name);


?>



<section class="container <?php echo ($type == 1) ? 'bottom-100' : '';
                            echo ($type == 2) ? 'pink bottom-100' : (($type == 3) ? 'forest-blue' : ''); ?>">
    <div class="section-text-image">
        <?php
        if ($type == 2) { ?>
            <div class="side-image">
                <div class="side-img">
                    <?php
                    $count = 0;
                    foreach ($gallery as $image) {
                        $count++;
                        if ($count == 1) { ?>
                            <div class="base-image">
                                <?php echo Utils::imgLazy($image, 'medium', '800px'); ?>
                            </div>
                        <?php
                        } else { ?>
                            <div class="top-image">
                                <?php echo Utils::imgLazy($image, 'medium', '800px'); ?>
                            </div>
                        <?php
                        }
                        ?>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
        <div class="side-text <?php echo ($type == 2 || $type == 3) ? 'top-100' : ''; ?>">
            <h5><?= $preTitle; ?></h5>
            <div class="signature">
            <h1><?= $title; ?> <?= file_get_contents($signature); ?></h1>
                
            </div>
            <p><?= $text; ?></p>
            <?php if ($type == 1 || $type == 3) { ?>
                <a href="<?= $button['link']; ?>" class="linkBtn"><?= $button['label']; ?></a>
            <?php }
            if ($type == 2) { ?>
                <ul class="amenities basic-info">
                    <?php
                    foreach ($icons as $icon) {
                    ?>
                        <div>
                            <?= file_get_contents($icon['icon']); ?>
                            <li><?= $icon['text']; ?></li>
                        </div>
                    <?php }
                    ?>
                </ul>
            <?php } ?>
        </div>
        <?php
        if ($type == 1) {
            echo '<div class="side-image bottom-30">';
            Carousel::galleryFromACF($gallery, false);
            echo '</div>';
        }
        if ($type == 3) { ?>
            <div class="side-image main-image">
                <?= Utils::imgLazy($gallery[0], 'large', '1000px') ?>
            </div>
        <?php } ?>
    </div>
    <?php
    if ($type == 3) { ?>
        <div class="float-img forest-blue">
            <div class="image-left top-100">
                <?= Utils::imgLazy($gallery[1], 'medium', '800px') ?>
            </div>
            <div class="image-right">
                <?= Utils::imgLazy($gallery[2], 'medium', '800px') ?>
            </div>
        </div>
    <?php }  ?>
</section>