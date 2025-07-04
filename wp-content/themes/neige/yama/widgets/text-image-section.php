<?php
$name = ($type == 1) ? 'about' : (($type == 2) ? 'features' : (($type == 3) ? 'restaurant' : ''));


$preTitle = get_field($name . '_pre_title');
$title = get_field($name . '_title');
$signature = get_field($name . '_signature');
$text = get_field($name . '_text');
$button = get_field($name . '_button');
$gallery = get_field($name . '_gallery');
$icons = get_field($name);
$backGround = get_field($name . '_background_image');


?>



<section class="container sections <?php echo ($type == 1) ? 'bottom-100 top-100' : '';
                                    echo ($type == 2) ? 'pink bottom-100' : (($type == 3) ? 'forest-blue' : ''); ?>">
    <?php if($type == 2) {
     echo Utils::imgLazy($backGround, 'large', '2000px', '', 'background-image type-2 fadeIn'); 
    }?>
    <div class="section-text-image base-top-img">
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
                                <?php echo Utils::imgLazy($image, 'medium', '800px','', 'fadeIn'); ?>
                            </div>
                        <?php
                        } else { ?>
                            <div class="top-image">
                                <?php echo Utils::imgLazy($image, 'medium', '800px','', 'fadeIn'); ?>
                            </div>
                        <?php
                        }
                        ?>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
        <div class="side-text <?php echo ($type == 2 || $type == 3) ? 'top-100' : ''; ?>">
            <h5 class="fadeIn"><?= $preTitle; ?></h5>
            <div class="signature fadeIn">
                <h1><?= $title; ?> <div class="sig-svg"><?= $signature; ?></div>
                </h1>

            </div>
            <div class="fadeIn wysiwyg-container"><?= $text; ?></div>
            <?php if ($type == 1 || $type == 3) { ?>
                <a href="<?= $button['link']; ?>" class="linkBtn fadeIn"><?= $button['label']; ?></a>
            <?php }
            if ($type == 2) { ?>
                <ul class="amenities basic-info fadeIn">
                    <?php
                    foreach ($icons as $icon) { ?>
                        <li>
                            <?= Utils::imgLazy($icon['icon'], 'large', '100px'); ?>
                            <div><?= $icon['text']; ?></div>
                        </li>
                    <?php }
                    ?>
                </ul>
            <?php } ?>
        </div>
        <?php
        if ($type == 1) {
            echo '<div class="side-image fadeIn bottom-30">';
            Carousel::galleryFromACF($gallery, false, '', true);
            echo '</div>';
        }
        if ($type == 3) { ?>
            <div class="side-image fadeIn main-image">
                <?= Utils::imgLazy($gallery[0], 'large', '1000px') ?>
            </div>
        <?php } ?>
    </div>
    <?php
    if ($type == 3) { ?>
        <div class="float-img forest-blue">
        <?php if($type == 3) {
     echo Utils::imgLazy(get_field('background_image_restaurant'), 'large', '2000px', '', 'background-image type-3 fadeIn'); 
    }?>
            <div class="image-left top-100 fadeIn">
                <?= Utils::imgLazy($gallery[1], 'medium', '800px') ?>
            </div>
            <div class="image-right fadeIn">
                <?= Utils::imgLazy($gallery[2], 'medium', '800px') ?>
            </div>
        </div>
    <?php }  ?>
</section>