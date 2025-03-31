<?php
function create_post_type_labels($singular, $plural = null) {
    if ($plural === null) {
        $plural = $singular.'s';
    }
    $labels = array(
        'name'               => __( $plural, 'text-domain'),
        'singular_name'      => __( $singular, 'text-domain'),
        'menu_name'          => __( $plural, 'text-domain'),
        'name_admin_bar'     => __( $singular, 'text-domain'),
        'add_new_item'       => __( 'Add New '.$singular, 'text-domain'),
        'new_item'           => __( 'New '.$singular, 'text-domain'),
        'edit_item'          => __( 'Edit '.$singular, 'text-domain'),
        'view_item'          => __( 'View '.$singular, 'text-domain'),
        'all_items'          => __( 'All '.$plural, 'text-domain'),
        'search_items'       => __( 'Search '.$plural, 'text-domain'),
        'parent_item_colon'  => __( 'Parent '.$plural.':', 'text-domain'),
        'not_found'          => __( 'No '.$plural.' found.', 'text-domain'),
        'not_found_in_trash' => __( 'No '.$plural.' found in Trash.', 'text-domain')
    );
    return $labels;
}

function add_columns_before_date($columns, $add) {
   $before = array_slice($columns, 0, count($columns) - 1, true);
   return $before + $add + array_slice($columns, count($columns) - 1, count($columns) - 1, true);
}


function update_acf_post_column($column, $post_id, $field_name) {
   $ids = get_field($field_name, $post_id);
   if ($ids) {
      if (!is_array($ids)) {
         $ids = [$ids];
      }
      for ($i = 0; $i < count($ids); $i++) {
         $post = get_post($ids[$i]);
         $link = get_post_permalink($post);
         if ($i > 0) {
            echo ', ';
         }
         echo "<a href='${link}'>$post->post_title</a>";
      }
   } else {
      echo "Not Selected";
   }
}

function update_taxonomy_column($column, $post_id, $taxonomy) {
   $terms = get_the_term_list($post_id, $taxonomy, '', ',', '');
   echo is_string($terms) ? $terms : 'Uncategorized';
}

function add_taxonomy_filters($post_type) {
   $taxonomies = get_object_taxonomies($post_type);
   foreach ($taxonomies as $taxonomy_slug) {
		$taxonomy_obj = get_taxonomy($taxonomy_slug);
		$taxonomy_name = $taxonomy_obj->labels->name;
		$terms = get_terms($taxonomy_slug);
		echo "<select name='{$taxonomy_slug}' id='{$taxonomy_slug}' class='postform'>";
		echo '<option value="">' . sprintf( esc_html__('All %s', 'text_domain'), $taxonomy_name) . '</option>';
		foreach ($terms as $term) {
			printf(
				'<option value="%1$s" %2$s>%3$s (%4$s)</option>',
				$term->slug,
				((isset($_GET[$taxonomy_slug]) && $_GET[$taxonomy_slug] == $term->slug) ? ' selected="selected"' : ''),
				$term->name,
				get_term_count_for_post_type($term->slug, $taxonomy_slug, $post_type)
			);
		}
		echo '</select>';
	}
}

function get_term_count_for_post_type($term_slug, $taxonomy_slug, $post_type){
   $posts = get_posts(array(
      'fields' =>'ids',
      'posts_per_page' => -1,
      'post_type' => $post_type,
      'tax_query' => array(
         array(
            'taxonomy' => $taxonomy_slug,
            'field' => 'slug',
            'terms' => $term_slug
            )
         )
   ));
   return count($posts);
}

function get_menu_items($menu){
   if ($menu === 'left') {
      return wp_get_nav_menu_items(wp_get_nav_menus()[0]);
   }
   return wp_get_nav_menu_items(wp_get_nav_menus()[1]);
}
?>
