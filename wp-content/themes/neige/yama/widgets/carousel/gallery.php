<?php
require_once(YAMA . '/utils/Utils.php');

$carousel_id = rand();
$ratio = empty($ratio) ? 'three-two-ratio' : $ratio; ?>

<div class="carousel-gallery <?= $class ?>">
    <div id="<?= $carousel_id ?>" class="owl-carousel displayed">
        <?php
        for ($i = 0; $i < count($items); $i++) {
            $item = $items[$i];
            $itemRatio = $ratio . ' ' . ($item['type'] ?? '');
            $onclick = $modalID ? "return displayModalGallery('#" . $modalID . "', " . $i . ");" : ''; ?>
            <div class="<?= $itemRatio ?>" onclick="<?= $onclick ?>">
                <?php
                if (!empty($item['video'])) {
                    if (strpos($item['video'], '[video') === 0) {
                        echo do_shortcode($item['video']);
                    } else {
                        YAMA\Utils::videoIframeOnDemand($item['video'], $item['image']);
                    }
                } else {
                    echo YAMA\Utils::imgLazy($item['image'], 'medium_large', $sizes);
                }
                if (!empty($item['type']) && $item['type'] === 'panoramic') {
                    echo YAMA\Utils::imgFromAssets('panoramic', 'png', '', 'panoramic-icon');
                }
                if (!empty($item['caption'])) { ?>
                    <p class="caption"><?= $item['caption'] ?></p>
                    <?php
                } ?>
            </div>
            <?php
        } ?>
    </div>
</div>
<script>
    jQuery('#<?= $carousel_id ?>').owlCarousel({
        loop: true,
        touchDrag: true,
        mouseDrag: true,
        nav: true,
        responsive: {
            0: {
                items: <?= $mobileItems ?>,
                dots: <?= !$wide || count($items) > ($mobileItems + 1) ? 1 : 0 ?>
            },
            992: {
                items: <?= $desktopItems ?>,
                dots: <?= !$wide || count($items) > ($desktopItems + 1) ? 1 : 0 ?>
            }
        }
    });
</script>
