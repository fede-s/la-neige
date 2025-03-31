<?php
namespace Yama;

require_once(YAMA . '/utils/Utils.php');

class Carousel {
   static function galleryFromACF($gallery, $wide = true, $sizes = '', $isModal = false, $ratio = '') {
      if ($gallery) {
         $modalID = !$isModal ? rand() : null;
         if (!$isModal) {
            include(YAMA . '/widgets/gallery-modal.php');
         }
         $images = array_map(function ($image) {
            return [
               'image' => $image['id'],
               'caption' => $image['caption']
            ];
         }, $gallery);
         Carousel::gallery($images, $wide, $sizes, $modalID, $ratio);
      }
   }

   static function gallery($items, $wide = true, $sizes = '', $modalID, $ratio = '') {
      $mobileItems = $wide ? min(1.3, count($items)) : 1;
      $desktopItems = $wide ? min(2.3, count($items)) : 1;
      $class = $wide ? 'wide' : '';
      include(__DIR__ . '/gallery.php');
   }

   static function simple($items, $title = '') {
      $item_view = __DIR__ . '/simple-item-view.php';
      include(__DIR__ . '/carousel-list-view.php');
   }
}
?>
