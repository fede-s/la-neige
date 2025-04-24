<?php
$season = get_field('current_season', 'option');
var_dump($season);
header('Location: /'. $season); ?>
