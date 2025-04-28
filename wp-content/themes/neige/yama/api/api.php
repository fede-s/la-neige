<?php
add_action('rest_api_init', function () {
    register_rest_route('custom/v1', '/switch-season', [
        'methods' => 'GET',
        'callback' => 'switchSeason',
    ]);
});

function switchSeason() {
    if (!empty($_SESSION['season'])) {
        $_SESSION['season'] = Utils::getOppositeSeason();
    }
}

?>
