<?php

require_once(THEME . '/yama/utils/Utils.php');

$postsWithSeason = ['room-type', 'activity'];

add_action('init', function () {
    global $postsWithSeason;

    register_post_type('room-type', [
        'supports' => ['title', 'thumbnail'],
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'hierarchical' => false,
        'rewrite' => [
            'slug' => '/season/room-types',
            'with_front' => false
        ],
        'labels' => create_post_type_labels('Room Type', 'Room Types'),
        'menu_icon' => 'fas fa-home'
    ]);

    register_taxonomy(
        'amenities',
        ['room-type'],
        [
            'supports' => ['title'],
            'hierarchical' => false,
            'labels' => create_post_type_labels('Amenity', 'Amenities')
        ]
    );

    // register_post_type('form', [
    //     'supports' => ['title'],
    //     'public' => false,
    //     'show_ui' => true,
    //     'show_in_menu' => true,
    //     'menu_position' => 5,
    //     'labels' => create_post_type_labels('Form'),
    //     'menu_icon' => 'fas fa-paste'
    // ]);

    // register_taxonomy(
    //     'restaurant-features',
    //     ['restaurant'],
    //     [
    //         'supports' => ['title'],
    //         'hierarchical' => false,
    //         'labels' => create_post_type_labels('Tag')
    //     ]
    // );

    // register_taxonomy(
    //     'restaurant-content-features',
    //     ['restaurant'],
    //     [
    //         'supports' => ['title'],
    //         'hierarchical' => false,
    //         'labels' => create_post_type_labels('Feature')
    //     ]
    // );

    // register_post_type('offer', [
    //     'supports' => ['title', 'thumbnail'],
    //     'public' => true,
    //     'show_ui' => true,
    //     'show_in_menu' => true,
    //     'menu_position' => 5,
    //     'hierarchical' => false,
    //     'rewrite' => [
    //         'slug' => 'winter/offers',
    //         'with_front' => false
    //     ],
    //     'labels' => create_post_type_labels('Offer'),
    //     'menu_icon' => 'fas fa-piggy-bank'
    // ]);

    // register_taxonomy(
    //     'offer-features',
    //     ['offer'],
    //     [
    //         'supports' => ['title'],
    //         'hierarchical' => false,
    //         'labels' => create_post_type_labels('Tag')
    //     ]
    // );

     register_post_type('activity', [
         'supports' => ['title', 'thumbnail'],
         'public' => true,
         'show_ui' => true,
         'show_in_menu' => true,
         'menu_position' => 5,
         'hierarchical' => false,
         'rewrite' => [
             'slug' => '/season/activities',
             'with_front' => false
         ],
         'labels' => create_post_type_labels('Activity', 'Activities'),
         'menu_icon' => 'fas fa-hiking'
     ]);

    // register_taxonomy(
    //     'experience-features',
    //     ['experience'],
    //     [
    //         'supports' => ['title'],
    //         'hierarchical' => false,
    //         'labels' => create_post_type_labels('Tag')
    //     ]
    // );

    // register_post_type('concierge-service', [
    //     'supports' => ['title', 'thumbnail'],
    //     'public' => true,
    //     'show_ui' => true,
    //     'show_in_menu' => true,
    //     'menu_position' => 5,
    //     'hierarchical' => false,
    //     'rewrite' => [
    //         'slug' => 'winter/concierge-services',
    //         'with_front' => false
    //     ],
    //     'labels' => create_post_type_labels('Concierge Service'),
    //     'menu_icon' => 'fas fa-concierge-bell'
    // ]);

    // register_taxonomy(
    //     'concierge-service-features',
    //     ['concierge-service'],
    //     [
    //         'supports' => ['title'],
    //         'hierarchical' => false,
    //         'labels' => create_post_type_labels('Tag')
    //     ]
    // );

    // register_post_type('featured-stay', [
    //     'supports' => ['title', 'thumbnail'],
    //     'public' => true,
    //     'show_ui' => true,
    //     'show_in_menu' => true,
    //     'menu_position' => 5,
    //     'hierarchical' => false,
    //     'rewrite' => [
    //         'slug' => 'winter/featured-stays',
    //         'with_front' => false
    //     ],
    //     'labels' => create_post_type_labels('Featured Stay'),
    //     'menu_icon' => 'fas fa-star'
    // ]);

    // register_taxonomy(
    //     'featured-stay-features',
    //     ['featured-stay'],
    //     [
    //         'supports' => ['title'],
    //         'hierarchical' => false,
    //         'labels' => create_post_type_labels('Tag')
    //     ]
    // );

    // register_post_type('event', [
    //     'supports' => ['title', 'thumbnail'],
    //     'public' => true,
    //     'show_ui' => true,
    //     'show_in_menu' => true,
    //     'menu_position' => 5,
    //     'hierarchical' => false,
    //     'rewrite' => [
    //         'slug' => 'winter/events',
    //         'with_front' => false
    //     ],
    //     'labels' => create_post_type_labels('Event'),
    //     'menu_icon' => 'fas fa-calendar'
    // ]);

     register_taxonomy(
         'season',
         $postsWithSeason,
         [
             'supports' => ['title', 'thumbnail'],
             'hierarchical' => true,
             'rewrite' => [
                 'slug' => 'season',
                 'with_front' => false
             ],
             'labels' => create_post_type_labels('Season')
         ]
     );
});

 add_action('generate_rewrite_rules', function () {
     global $wp_rewrite;

     $new_rules = [
         'summer/room-types/([^/]+)/?$' => 'index.php?room-type=' . $wp_rewrite->preg_index(1) . '&season=summer',
         'winter/room-types/([^/]+)/?$' => 'index.php?room-type=' . $wp_rewrite->preg_index(1) . '&season=winter',
         'summer/activities/([^/]+)/?$' => 'index.php?activity=' . $wp_rewrite->preg_index(1) . '&season=summer',
         'winter/activities/([^/]+)/?$' => 'index.php?activity=' . $wp_rewrite->preg_index(1) . '&season=winter',
////         '[^/]+/stays/[^/]+/[^/]+/([^/]+)/?$' => 'index.php?chalet-unit=' . $wp_rewrite->preg_index(1),
//         '([^/]+)/stays/([^/]+)/?$' => 'index.php?chalet-types=' . $wp_rewrite->preg_index(2),
//         '([^/]+)/restaurants/([^/]+)/?$' => 'index.php?restaurant=' . $wp_rewrite->preg_index(2) . '&season=' . $wp_rewrite->preg_index(1),
//         '([^/]+)/offers/([^/]+)/?$' => 'index.php?offer=' . $wp_rewrite->preg_index(2) . '&season=' . $wp_rewrite->preg_index(1),
//         'season/experiences/([^/]+)/?$' => 'index.php?activity=' . $wp_rewrite->preg_index(2) . '&season=' . $wp_rewrite->preg_index(1),
//         '([^/]+)/concierge-services/([^/]+)/?$' => 'index.php?concierge-service=' . $wp_rewrite->preg_index(2) . '&season=' . $wp_rewrite->preg_index(1),
//         '([^/]+)/featured-stays/([^/]+)/?$' => 'index.php?featured-stay=' . $wp_rewrite->preg_index(2) . '&season=' . $wp_rewrite->preg_index(1),
////         '([^/]+)/events/([^/]+)/?$' => 'index.php?event=' . $wp_rewrite->preg_index(2) . '&season=' . $wp_rewrite->preg_index(1)
     ];
     $wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
 });

add_filter('post_type_link', function ($link, $post) {
    global $postsWithSeason;

    if (in_array($post->post_type, $postsWithSeason)) {
        $season = get_the_terms($post->ID, 'season');
        if ($season && !is_wp_error($season)) {
            $season_slug = $season[0]->slug;
            $link = str_replace('/season/', '/' . $season_slug . '/', $link);
        }
    }
    return $link;
}, 10, 2);

//add_filter('wp_unique_post_slug', function ($slug, $post_ID, $post_status, $post_type, $post_parent) {
//    if ($post_type === 'room-type') {
//        $season = get_the_terms($post_ID, 'season');
//        $seasonSlug = $season[0]->slug;
//        if ($season && !is_wp_error($season) && !str_contains($slug, $seasonSlug)) {
//            return $seasonSlug . '-' . $slug; // Append the season slug to make it unique.
//        }
//    }
//    return $slug;
//}, 10, 5);


// add_filter('post_type_link', function ($link, $post) {
//     if (strpos($link, 'stays/chalet-type/chalet') > 0) {
//         $chalet = get_field('chalet', $post);
//         $term = Utils::getPostTerm($chalet, 'chalet-types', 'slug');
//         $link = str_replace('stays/chalet-type/chalet', 'chalets/' . $term . '/' . get_post_field('post_name', $chalet), $link);
//     } else if (strpos($link, 'stays/chalet-type/') > 0) {
//         $term = Utils::getPostTerm($post, 'chalet-types', 'slug');
//         $link = str_replace('stays/chalet-type', 'stays/' . $term, $link);
//     }
//     return $link;
// }, 1, 2);

// add_filter('term_link', function ($link, $term) {
//     if (strpos($link, '/season/') > 0) {
//         $link = str_replace('season', 'winter', $link);
//     }
//     return $link;
// }, 1, 2);

// add_action('wp_loaded', function () {
//     flush_rewrite_rules();
// });

// add_action('restrict_manage_posts', function ($post_type, $which) {
//     //add filters
// }, 10, 2);

// add_filter('page_template', function ($template) {
//     $custom_template = TEMPLATES_DIR . '/page-' . get_queried_object()->post_name . '.php';
//     return file_exists($custom_template) ? $custom_template : $template;
// });

// add_filter('taxonomy_template', function ($template) {
//     return TEMPLATES_DIR . '/taxonomy-' . get_queried_object()->taxonomy . '.php';
// });

// add_filter('single_template', function () {
//     global $post;
//     $template = TEMPLATES_DIR . '/single-' . $post->post_type . '.php';
//     return $template;
// });

// function set_the_terms_in_order($terms, $id, $taxonomy)
// {
//     $terms = wp_cache_get($id, "{$taxonomy}_relationships_sorted");
//     if (false === $terms) {
//         $terms = wp_get_object_terms($id, $taxonomy, array('orderby' => 'term_order'));
//         wp_cache_add($id, $terms, $taxonomy . '_relationships_sorted');
//     }
//     return $terms;
// }

// add_filter('get_the_terms', 'set_the_terms_in_order', 10, 4);

// function do_the_terms_in_order()
// {
//     global $wp_taxonomies;

//     $wp_taxonomies['amenities']->sort = true;
//     $wp_taxonomies['amenities']->args = array('orderby' => 'term_order');
// }

// add_action('init', 'do_the_terms_in_order');


// function form_shortcode()
// {
//     global $post;
//     $formShorcode = '[form id="' . $post->ID . '"]';
//     $buttonShortcode = '[button label="label" form_id="' . $post->ID . '"]';
//     echo '<input type="text" value=\'' . $formShorcode . '\' class="widefat" style="margin-bottom: 10px;" />';
//     echo '<input type="text" value=\'' . $buttonShortcode . '\' class="widefat"/>';
// }

// function ve_custom_meta_boxes()
// {
//     add_meta_box('projects_refid', 'Shortcodes', 'form_shortcode', 'form', 'side', 'high');
// }

// add_action('add_meta_boxes', 've_custom_meta_boxes');

// add_filter('get_custom_logo', function () {
//     $custom_logo_id = get_theme_mod('custom_logo');
//     $html = sprintf('<a href="%1$s" class="custom-logo-link" rel="home" itemprop="url">%2$s</a>',
//         esc_url(Utils::homeUrl()),
//         wp_get_attachment_image($custom_logo_id, 'full', false, array(
//             'class' => 'custom-logo',
//         ))
//     );
//     return $html;
// });

// add_action('restrict_manage_posts', function ($post_type, $which) {
//     if (in_array($post_type, ['chalet', 'restaurant', 'offer', 'experience', 'concierge-service', 'featured-stay'])) {
//         add_taxonomy_filters($post_type);
//     }
// }, 10, 2);

// add_action('manage_restaurant_posts_custom_column', 'update_columns', 10, 2);
// add_action('manage_chalet_posts_custom_column', 'update_columns', 10, 2);
// add_action('manage_chalet-unit_posts_custom_column', 'update_columns', 10, 2);
// add_action('manage_offer_posts_custom_column', 'update_columns', 10, 2);


// add_filter('manage_restaurant_posts_columns', function ($columns) {
//     return add_columns_before_date($columns, [
//         'season' => 'Season',
//     ]);
// });

// add_filter('manage_offer_posts_columns', function ($columns) {
//     return add_columns_before_date($columns, [
//         'season' => 'Season',
//     ]);
// });

// add_filter('manage_hotel_posts_columns', function ($columns) {
//     return add_columns_before_date($columns, [
//         'season' => 'Season',
//     ]);
// });

// add_filter('manage_chalet_posts_columns', function ($columns) {
//     return add_columns_before_date($columns, [
//         'chalet-types' => 'Type',
//         'season' => 'Season',
//     ]);
// });

// add_filter('manage_chalet-unit_posts_columns', function ($columns) {
//     return add_columns_before_date($columns, [
//         'chalet' => 'Property'
//     ]);
// });

// add_filter('wpseo_canonical', function ($url) {
//     return str_replace(['winter', 'summer'], Utils::getCurrentSeason(), $url);
// });

?>
