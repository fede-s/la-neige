<?php
class Utils {

    public static $version;

    static function getPostTerm($post, $taxonomy, $field = '', $default = '') {
        $terms = get_the_terms($post, $taxonomy);
        if ($terms && count($terms) > 0) {
            return $field ? $terms[0]->$field : $terms[0];
        }
        return $default;
    }

    static function getPostBySlug($postType, $slug) {
        $posts = get_posts([
            'post_type' => $postType,
            'name' => $slug
        ]);
        return count($posts) > 0 ? $posts[0] : null;
    }

    static function getPosts($postSlug, $terms = null, $count = -1) {
        $tax = [];
        if ($terms) {
            foreach ($terms as $term) {
                array_push($tax, [
                        'taxonomy' => $term->taxonomy,
                        'terms' => $term ? $term->term_id : 0,
                        'include_children' => false
                ]);
            }
        }
        return get_posts([
            'numberposts' => $count,
            'post_type' => $postSlug,
            'tax_query' => $tax,
            'suppress_filters' => false,
        ]);
    }

    static function getTerms($taxonomy, $termId = 0) {
        return get_terms(array(
            'taxonomy' => $taxonomy,
            'parent' => $termId,
            'hide_empty' => false
        ));
    }

    static public function imgLazyFromPost($post, $size, $sizes = '', $alt = '', $class = '', $useSrcset = true) {
        $imageID = Utils::getPostFeaturedImageID($post);
        return Utils::imgLazy($imageID, $size, $sizes, $alt, $class, $useSrcset);
    }

    static public function imgLazy($image, $size, $sizes = '', $alt = '', $class = '', $useSrcset = true) {
        return apply_filters('bj_lazy_load_html', Utils::img($image, $size, $sizes, $alt, $class, $useSrcset));
    }

    static public function imgLazyFromAssets($asset, $format, $alt = '', $class = '') {
        return apply_filters('bj_lazy_load_html', Utils::imgFromAssets($asset, $format, $alt, $class));
    }

    static public function img($image, $size = 'large', $sizes = '', $alt = '', $class = '', $useSrcset = true) {
        return is_numeric($image) ?
            Utils::imgFromId($image, $size, $sizes, $alt, $class, $useSrcset) :
            Utils::imgFromSrc($image, null, $sizes, $alt, $class);
    }

    static public function imgFromAssets($asset, $format, $alt = '', $class = '') {
        return Utils::imgFromSrc(Utils::getImageAssetUri($asset, $format), null, '', $alt, $class);
    }

    static private function imgFromId($id, $size, $sizes = '', $alt = '', $class = '', $useSrcset = true) {
        $srcArray = wp_get_attachment_image_src($id, $size);
        $src = is_array($srcArray) ? $srcArray[0] : '';
        if ($useSrcset) {
            $srcset = wp_get_attachment_image_srcset($id);
        }
        return Utils::imgFromSrc($src, $srcset, $sizes, $alt, $class);
    }

    static private function imgFromSrc($src, $srcset = null, $sizes = '', $alt = '', $class = '') {
        return '<img src="' . $src . '" srcset="' . $srcset . '" sizes="' . $sizes . '" alt="' . $alt . '" class="' . $class . '">';
    }

    static public function getImageAssetUri($imageName, $imageFormat) {
        return get_stylesheet_directory_uri() . '/assets/images/' . $imageName . '.' . $imageFormat;
    }

    static public function getVersion() {
        if (!Utils::$version) {
            $file = fopen(THEME . '/version.txt', 'c+');
            Utils::$version = str_replace(array("\n", "\r"), '', fgets($file));
            fclose($file);
        }
        return Utils::$version;
    }

    static public function humanTiming($time) {
        $time = ($time < 1) ? 1 : $time;
        $tokens = array(
            31536000 => __('year', 'mw'),
            2592000 => __('month', 'mw'),
            604800 => __('week', 'mw'),
            86400 => __('day', 'mw'),
            3600 => __('hour', 'mw'),
            60 => __('minute', 'mw'),
            1 => __('second', 'mw')
        );
        foreach ($tokens as $unit => $text) {
            if ($time < $unit) continue;
            $numberOfUnits = floor($time / $unit);
            return $numberOfUnits . ' ' . $text . (($numberOfUnits > 1) ? 's' : '');
        }
    }

    static public function spacer() {
        return '<div class="spacer"></div>';
    }

    static public function lazy($html) {
        if (Utils::isYoutubeVideo($html)) {
            return Utils::lazyYoutubeVideo($html);
        }
        return apply_filters('bj_lazy_load_html', $html);
    }

    static public function videoIframeOnDemand($src, $placeHolder = null) {
        if (Utils::isYoutubeVideo($src)) {
            return Utils::lazyYoutubeVideo($src);
        }
        return include(__DIR__ . '/lazy-video-iframe.php');
    }

    static public function isYoutubeVideo($src) {
        $index = strpos($src, 'youtube');
        return $index && $index >= 0;
    }

    static public function lazyYoutubeVideo($html) {
        $videoId = Utils::getYoutubeVideoId($html);
        include(__DIR__ . '/lazy-youtube.php');
    }

    static public function getYoutubeVideoId($src) {
        preg_match('/embed\/(.*?)[\?|"]|v=(.*?)(&|$|")/', $src, $match);
        return $match[1] ? $match[1] : $match[2];
    }

    static public function getVimeoVideoId($src) {
        preg_match('/vimeo.com\/video\/(.*?)\?/', $src, $match);
        return empty($match[1]) ? null : $match[1];
    }

    static public function textToList($text, $before = '') {
        $lines = explode(PHP_EOL, $text);
        $list = '<ul>';
        foreach ($lines as $line) {
            $list .= '<li>';
            $list .= $before;
            $list .= '<span>' . strip_tags($line) . '</span>';
            $list .= '</li>';
        }
        return $list . '</ul>';
    }

    static function getPostTags($post) {
        $post_tags = get_the_tags($post);
        $separator = ' | ';
        if (!empty($post_tags)) {
            foreach ($post_tags as $tag) {
                $output .= '<a href="' . get_tag_link($tag->term_id) . '" class="nice-link">' . $tag->name . '</a>' . $separator;
            }
            return trim($output, $separator);
        }
    }

    static function replace($string, $variables) {
        foreach ($variables as $var) {
            $string = str_replace($var['key'], $var['value'], $string);
            $string = str_replace(strtoupper($var['key']), strtoupper($var['value']), $string);
        }
        return $string;
    }

    static function getImageSizesForListFromClass($items, $listClass) {
        $mobileCols = $listClass && strpos($listClass, 'mobile-big') ? 1 : 2;
        if ($listClass) {
            if (strpos($listClass, 'three-col')) {
                $desktopCols = 3;
            } else if (strpos($listClass, 'two-col')) {
                $desktopCols = 2;
            }
        }
        $desktopCols = $desktopCols ? $desktopCols : 4;
        return Utils::getImageSizesForList($items, $mobileCols, $desktopCols);
    }

    static function getImageSizesForList($items, $mobileCols, $desktopCols) {
        $sizes = '';
        if ($mobileCols === 1 || count($items) === 1) {
            $sizes .= '(max-width: 479px) 94vw,';
        } else {
            $sizes .= '(max-width: 479px) 45vw,';
        }
        if (count($items) === 1) {
            $sizes .= '(max-width: 991px) 520px,460px';
        } else if (count($items) === 2 || $desktopCols === 2) {
            $sizes .= '(max-width: 991px) 340px,460px';
        } else if (count($items) === 3 || $desktopCols === 3) {
            $sizes .= '(max-width: 991px) 250px,370px';
        } else {
            $sizes .= '(max-width: 991px) 250px,300px';
        }
        return $sizes;
    }

    static function getNavigation($object, $items) {
        $next = null;
        if (!$object) {
            return array_reverse($items);
        }
        if (isset($object->post_type)) {
            $season = Utils::getCurrentSeason();
            if ($object->post_type === 'post') {
                $next = get_page_by_path('news');
            } else if ($object->post_type === 'restaurant') {
                $next = get_page_by_path($season . '/restaurants');
            } else if ($object->post_type === 'chalet') {
                $next = Utils::getChaletTerm($object);
            } else if ($object->post_type === 'offer') {
                $next = get_page_by_path($season . '/offers');
            } else if ($object->post_parent) {
                $next = get_page($object->post_parent);
            } else if ($object->post_name !== 'summer' && $object->post_name !== 'winter') {
                $next = get_page_by_path('winter');
            }
            $link = Utils::getPostLink($object);
            $text = $object->post_title;
        } else if (isset($object->taxonomy)) {
            if ($object->taxonomy === 'chalet-types') {
                $next = get_page_by_path(Utils::getCurrentSeason());
            }
            $link = Utils::getTermLink($object);
            $text = $object->name;
        }
        array_push($items, [
            'text' => $text,
            'link' => $link
        ]);
        return Utils::getNavigation($next, $items);
    }

    public static function getChaletTerm($post) {
        return Utils::getPostTerm($post, 'chalet-types');
    }

    public static function getSeasonFromURL(): string {
        preg_match('/^\/(summer|winter)/', $_SERVER['REQUEST_URI'], $matches);
        return !empty($matches[1]) ? $matches[1] : '';
    }

    public static function getCurrentSeason() {
        $season = Utils::getSeasonFromURL();
        if (!$season && !empty($_SESSION['season'])) {
            $season = $_SESSION['season'];
        }
        return $season ?: get_field('current_season', 'option');
    }

    public static function getSeasonTerm($season = null) {
        return get_term_by('slug', $season ?? Utils::getCurrentSeason(), 'season');
    }

    public static function getSeasonPage($season = null) {
        return Utils::getPostBySlug('page', $season ?? Utils::getCurrentSeason());
    }

    public static function getPageForSeason($slug, $season = null) {
        $posts = get_posts([
            'post_type' => 'page',
            'name' => $slug,
            'post_parent' => Utils::getSeasonPage($season)->ID
        ]);
        return count($posts) > 0 ? $posts[0] : null;
    }

    public static function getCurrentSeasonPosts($postType, $count = -1) {
        $seasonTerm = Utils::getSeasonTerm();
        return Utils::getPosts($postType, [$seasonTerm], $count);
    }

    public static function getOppositeSeason() {
        $current = Utils::getCurrentSeason();
        return $current === 'winter' ? 'summer' : 'winter';
    }

    public static function getSeasonName($season) {
        return $season === 'winter' ? 'Winter' : 'Summer';
    }

    public static function getSeasonIcon($season) {
        if ($season === 'winter') {
            return '<i class="fas fa-snowflake"></i>';
        } else {
            return '<i class="fas fa-sun"></i>';
        }
    }

    public static function getPostLink($post, $season = ''): string {
        $link = get_permalink($post);
        $season = $season ? $season : Utils::getCurrentSeason();
        return str_replace(['/winter/', '/summer/'], '/' .$season . '/', $link);
    }

    public static function getTermLink($term, $season = ''): string {
        $link = get_term_link($term);
        $season = $season ? $season : Utils::getCurrentSeason();
        return str_replace(['/winter/', '/summer/'], '/' .$season . '/', $link);
    }

    public static function getTermsList($post, $taxonomy) {
        $terms = get_the_terms($post, $taxonomy);
        if (is_array($terms)) {
            return array_map(function ($term) {
                return $term->name;
            }, get_the_terms($post, $taxonomy));
        }
        return [];
    }

    public static function getOppositeSeasonLink() {
        $object = get_queried_object();
        $season = Utils::getOppositeSeason();
        if (isset($object->post_type)) {
            $oppositePage = Utils::getPageForSeason($object->post_name, $season);
            if ($oppositePage) {
                return get_permalink($oppositePage);
            }
            if (has_term(Utils::getSeasonTerm($season), 'season', $object) || in_array($object->post_name, ['chalet', 'offers', 'restaurants'])) {
                return Utils::getPostLink($object, Utils::getOppositeSeason());
            }
        } else if (isset($object->taxonomy)) {
            return Utils::getTermLink($object, Utils::getOppositeSeason());
        }
        return home_url($season);
    }

    static function truncateString( $string, $length = 100, $append = '&hellip;' ) {
        $string = trim( $string );

        if ( strlen( $string ) > $length ) {
            $string = wordwrap( $string, $length );
            $string = explode( "\n", $string, 2 );
            $string = $string[0] . $append;
        }

        return $string;
    }

    public static function getSeasonField($objectOrFields, $key) {
        $season = Utils::getCurrentSeason();
        if (is_array($objectOrFields)) {
            return $season === 'summer' & !empty($objectOrFields['summer'][$key]) ? $objectOrFields['summer'][$key] : $objectOrFields[$key];
        } else {
            $seasonField = null;
            if ($season === 'summer') {
                $seasonField = get_field('summer_' . $key, $objectOrFields);
            }
            return !empty($seasonField) ? $seasonField : get_field($key, $objectOrFields);
        }
    }

    public static function getPostFeaturedImageID($post) {
        $season = Utils::getCurrentSeason();
        $imageID = null;
        if ($season === 'summer') {
            $imageID = get_field('summer_featured_image', $post);
        }
        return !empty($imageID) ? $imageID : get_post_thumbnail_id($post);
    }
}

?>
