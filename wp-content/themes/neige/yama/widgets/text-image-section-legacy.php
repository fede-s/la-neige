<?php
$name = ($type == 1) ? 'about' : (($type == 2) ? 'legacy' : (($type == 3) ? 'intro' : ''));


$preTitle = get_field($name . '_pre_title');
$title = get_field($name . '_title');
$signature = get_field($name . '_signature');
$text = get_field($name . '_text');
$button = get_field($name . '_button');
$gallery = get_field($name . '_gallery');
$icons = get_field($name);
$backGround = get_field($name . '_background_image');
if ($type == 1 ) {
   $text = $var['about_text'];
   $gallery = $var['about_gallery'];
} 


if (!empty($gallery)) {
?>



<section class="container sections <?php echo ($type == 1) ? 'bottom-100 top-100 section-legacy' : '';
                                    echo ($type == 2) ? 'pink bottom-100' : (($type == 3) ? 'forest-blue' : ''); ?>">
    <?php if($type == 2) {
    //  echo Utils::imgLazy($backGround, 'large', '2000px', '', 'background-image type-2 fadeIn'); 
    }?>
    <div class="section-text-image base-top-img <?php echo (($count % 2 == 0) && ($type == 1)) ? 'legacy-flex' : '';?> ">
        <?php
        if ($type == 2) {
            if(!empty($gallery)) {
            ?>
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
                    <?php }  ?>
                </div>
            </div>
        <?php } } ?>
        <div class="side-text <?php echo ($type == 2 || $type == 3) ? 'top-100' : '';
                                    echo ($type == 3) ? ' mobile-padding' : ''; ?>">
            <?php if ($type == 2 || $type == 3) { ?>
            <h5 class="fadeIn"><?= $preTitle; ?></h5>
            <div class="signature fadeIn">
                <h1><?= $title; ?></h1>
            </div>
            <div class="fadeIn wysiwyg-container"><?= $text; ?></div>
            <?php } ?>
            <?php if ($type == 1) { ?>
               <div class="fadeIn legacy-content">
                  <?= $text ;?>
               </div>
               <?php } ?>
            <?php if ($type == 2) { 
                if(!empty($button)) {
                ?>
                <a href="<?= $button['url']; ?>" class="linkBtn fadeIn pink"><?= $button['title']; ?></a>
            <?php } } ?>
        </div>
        <?php
        if ($type == 1) {
            echo '<div class="side-image fadeIn bottom-30 legacy-gallery">';
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
     echo Utils::imgLazy($backGround, 'large', '2000px', '', 'background-image type-3 fadeIn'); 
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

<?php } ?>