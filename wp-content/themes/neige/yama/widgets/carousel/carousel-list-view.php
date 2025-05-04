<?php
$maxItems = min(count($items), $maxItems ? $maxItems : 4);
$id = $id ?? rand(); ?>
<div class="carousel-list <?= $class ?>">
    <div id="<?= $id ?>" class="owl-carousel owl-theme items-<?= count($items) ?>">
        <?php
        foreach ($items as $item) {
            include($item_view);
        } ?>
    </div>
</div>

<script>
    jQuery(document).ready(function () {
        jQuery('#<?= $id ?>').owlCarousel({
            margin: 10,
            nav: true,
            dots: false,
            loop: true,
            responsive: {
                0: {
                    items: 1,
                    nav: false
                },
                767: {
                    items: 2
                },
                1200: {
                    items: 3
                }
            }
        })
    });
</script>
