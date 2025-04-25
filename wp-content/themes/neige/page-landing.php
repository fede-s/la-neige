<?php
/**
 * Template Name: Landing
 */

$season = get_field('current_season', 'option');
$isHTTPS = parse_url(home_url(), PHP_URL_SCHEME) === 'https';
if ($isHTTPS) {
    header('Location: /'. $season);
}
 ?>
