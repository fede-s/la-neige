<?php
$currentSeason = Utils::getCurrentSeason();
$summerIcon = $currentSeason === 'summer' ? get_field('summer_active_icon', 'options') : get_field('summer_icon', 'options');
$winterIcon = $currentSeason === 'winter' ? get_field('winter_active_icon', 'options') : get_field('winter_icon', 'options');
$colorWhite = ($changeColor == true) ? 'color-white ' : '';
?>
<div class="season-selector">
    <div class="season-selector-item <?= $currentSeason === 'summer' ? 'active' : '' ?>">
        <a href="<?= Utils::getSeasonLink('summer') ?>" data-current-season="<?= $currentSeason ?>" data-new-season="summer">
            <span class="<?= $colorWhite ;?>"><?= Utils::getSeasonName('summer') ?></span>
            <?= Utils::imgLazy($summerIcon, 'large', '100px') ?>
        </a>
    </div>
    <div class="season-selector-item <?= $currentSeason === 'winter' ? 'active' : '' ?>">
        <a href="<?= Utils::getSeasonLink('winter') ?>" data-current-season="<?= $currentSeason ?>" data-new-season="winter">
            <span class="<?= $colorWhite ;?>"><?= Utils::getSeasonName('winter') ?></span>
            <?= Utils::imgLazy($winterIcon, 'large', '100px') ?>
        </a>
    </div>
</div>
