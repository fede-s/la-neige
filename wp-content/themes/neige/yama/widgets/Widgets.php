<?php
require_once(YAMA . '/forms/Forms.php');
require_once(YAMA . '/utils/Utils.php');

class Widgets {

   public static function textSection($text) {
      include(__DIR__ . '/text-section.php');
   }

   public static function footerGallery() {
      $items = get_field('footer_gallery', get_queried_object());
      if ($items) {
         include(__DIR__ . '/gallery-wall.php');
      }
   }

   public static function button($button, $class = '') {
      if (!empty($button['form_id'])) {
         Forms::createButton($button['form_id'], $button['label'], $class);
         Forms::createPopUp($button['form_id']);
      } else {
         include(__DIR__ . '/button.php');
      }
   }

   static function faq($faq) {
      include(__DIR__ . '/faq.php');
   }

   static function iconWithTextItems($items) {
      include(__DIR__ . '/icon-with-text-items.php');
   }

   static function breadcrumb() {
      $items = Utils::getNavigation(get_queried_object(), []);;
      include(__DIR__ . '/breadcrumb.php');
   }

   static function parallaxHeader($post) {
      include(__DIR__ . '/parallax-header.php');
   }
   public static function textImageSection($type) {
      include(__DIR__ . '/text-image-section.php');
  }

  public static function seasonSwitch() {
      include(__DIR__ . '/season-switch.php');
  }
}
?>
