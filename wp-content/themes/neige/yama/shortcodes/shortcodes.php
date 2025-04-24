<?php

require_once(YAMA . '/widgets/Widgets.php');
require_once(YAMA . '/forms/Forms.php');

add_shortcode('button', function($atts) {
   ob_start();
   $atts['target'] = '_blank';
   Widgets::button($atts, 'btn btn-secondary');
   return ob_get_clean();
});

add_shortcode('form', function($atts) {
   ob_start();
   Forms::createForm($atts['id']);
   return ob_get_clean();
});
?>
