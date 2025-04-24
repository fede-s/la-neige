<?php

require_once(YAMA . '/utils/Utils.php');

class Lists {

   public static function imageWithTitle($items) {
      include(__DIR__ . '/image-with-title.php');
   }

   static public function featuredPosts($count, $class = '') {
      $featured = get_term_by('slug', 'featured', 'category');
      Lists::posts([
         'posts' => Utils::getPosts('post', [$featured], $count),
         'title' => 'Featured Posts',
         'showExcerpt' => false,
         'class' => $class
      ]);
   }

   static public function posts($config) {
      $showExcerpt = isset($config['showExcerpt']) ? $config['showExcerpt'] : true;
      $showReadMore = isset($config['showReadMore']) ? $config['showReadMore'] : false;
      echo '<h4 class="list-title">' . $config['title'] . '</h4>';
      echo '<hr />';
      echo '<div class="' . $config['class'] . '">';
      foreach ($config['posts'] as $post) {
         include(__DIR__ . '/post-item.php');
      }
      echo '</div>';
   }

   static public function postTags() {
      include(__DIR__ . '/post-tags.php');
   }

   static public function videosFromACFRepeater($field) {
      $videos = array_map(function ($video) {
         return $video['video'];
      }, $field);
      include(__DIR__ . '/videos.php');
   }

}
 ?>
