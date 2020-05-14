<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package prishtinatrees
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function prishtinatrees_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'prishtinatrees_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function prishtinatrees_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'prishtinatrees_pingback_header' );







//function action_wpcf7_before_send_mail( $contact_form ) {
//        $submission = WPCF7_Submission::get_instance();
//       if($submission->get_posted_data()['_wpcf7'] == '15509') {
//
//            $recent_posts = wp_get_recent_posts(array(
//            'post_type'   => 'tree',
//            'numberposts' => 1,
//            'post_status' => 'any'
//            ));
//            if(count($recent_posts) == 0) $recent_posts[0]["ID"] = 0;
//           $args = array(
//               'post_type' => 'tree',
//               'post_status' => 'Pending',
//               'post_title' => $recent_posts[0]["ID"]
//           );
//       }
//       else if($submission->get_posted_data()['_wpcf7'] == '15510'){
//
//            $recent_posts = wp_get_recent_posts(array(
//            'post_type'   => 'mobiliari',
//            'numberposts' => 1,
//            'post_status' => 'any'
//            ));
//            if(count($recent_posts) == 0) $recent_posts[0]["ID"] = 0;
//           $args = array(
//               'post_type' => 'mobiliari',
//               'post_status' => 'Pending',
//               'post_title' => $recent_posts[0]["ID"]
//           );
//       }
//       else if($submission->get_posted_data()['_wpcf7'] == '15511'){
//
//            $recent_posts = wp_get_recent_posts(array(
//            'post_type'   => 'zhurma',
//            'numberposts' => 1,
//            'post_status' => 'any'
//            ));
//            if(count($recent_posts) == 0) $recent_posts[0]["ID"] = 0;
//           $args = array(
//               'post_type' => 'zhurma',
//               'post_status' => 'Pending',
//               'post_title' => $recent_posts[0]["ID"]
//           );
//       }
//       $post_id = wp_insert_post($args);
//
//       if(!is_wp_error($post_id)){
//           if($submission->get_posted_data()['_wpcf7'] == '15509'){
//               if (isset($submission->get_posted_data()['latitude'])) {
//                   update_post_meta($post_id, 'latitude', $submission->get_posted_data()['latitude']);
//               }
//               if (isset($submission->get_posted_data()['longitude'])) {
//                   update_post_meta($post_id, 'longitude', $submission->get_posted_data()['longitude']);
//               }
//               if (isset($submission->get_posted_data()['lloji'])) {
//                   update_post_meta($post_id, 'lloji', $submission->get_posted_data()['lloji']);
//               }
//               if (isset($submission->get_posted_data()['lartesia'])) {
//                   update_post_meta($post_id, 'lartesia', $submission->get_posted_data()['lartesia']);
//               }
//               if (isset($submission->get_posted_data()['gjendja'])) {
//                   update_post_meta($post_id, 'gjendja', $submission->get_posted_data()['gjendja']);
//               }
//               if (isset($submission->uploaded_files()["foto"])) {
//                   update_post_meta($post_id, "foto", $submission->uploaded_files()["foto"]);
//               }
//               if (isset($submission->get_posted_data()["onPolygon"])) {
//                   update_post_meta($post_id, "onpolygon", $submission->get_posted_data()["onPolygon"]);
//               }
//           }
//           else if($submission->get_posted_data()['_wpcf7'] == '15510'){
//               if (isset($submission->get_posted_data()['latitude'])) {
//                   update_post_meta($post_id, 'latitude', $submission->get_posted_data()['latitude']);
//               }
//               if (isset($submission->get_posted_data()['longitude'])) {
//                   update_post_meta($post_id, 'longitude', $submission->get_posted_data()['longitude']);
//               }
//               if (isset($submission->get_posted_data()['lloji'])) {
//                   update_post_meta($post_id, 'lloji', $submission->get_posted_data()['lloji']);
//               }
//               if (isset($submission->get_posted_data()['gjendja'])) {
//                   update_post_meta($post_id, 'gjendja', $submission->get_posted_data()['gjendja']);
//               }
//               if (isset($submission->uploaded_files()["foto"])) {
//                   update_post_meta($post_id, "foto", $submission->uploaded_files()["foto"]);
//               }
//               if (isset($submission->get_posted_data()["onPolygon"])) {
//                   update_post_meta($post_id, "onpolygon", $submission->get_posted_data()["onPolygon"]);
//               }
//           }
//           else if($submission->get_posted_data()['_wpcf7'] == '15511'){
//               if (isset($submission->get_posted_data()['latitude'])) {
//                   update_post_meta($post_id, 'latitude', $submission->get_posted_data()['latitude']);
//               }
//               if (isset($submission->get_posted_data()['longitude'])) {
//                   update_post_meta($post_id, 'longitude', $submission->get_posted_data()['longitude']);
//               }
//               if (isset($submission->get_posted_data()['vleranedb'])) {
//                   update_post_meta($post_id, 'vlera', $submission->get_posted_data()['vleranedb']);
//               }
//               if (isset($submission->get_posted_data()["onPolygon"])) {
//                   update_post_meta($post_id, "onpolygon", $submission->get_posted_data()["onPolygon"]);
//               }
//           }
//       }
//};


function action_wpcf7_before_send_mail( $contact_form ) {
    $submission = WPCF7_Submission::get_instance();
    $myPhoto = $submission->uploaded_files()["foto"];
    if($submission->get_posted_data()['_wpcf7'] == '15510') {
       $args = array(
           'post_type' => 'tree',
           'post_status' => 'Pending',
           'post_title' => 'r'
       );
    }
    else if($submission->get_posted_data()['_wpcf7'] == '15509'){
       $args = array(
           'post_type' => 'mobiliari',
           'post_status' => 'Pending',
           'post_title' => 'r'
       );
    }
    else if($submission->get_posted_data()['_wpcf7'] == '15511'){
       $args = array(
           'post_type' => 'zhurma',
           'post_status' => 'Pending',
           'post_title' => 'r'
       );
    }
    else {
       return;
   }
    $post_id = wp_insert_post($args);

    if(!is_wp_error($post_id)){
        $my_post = array(
          'ID'           => $post_id,
          'post_title'   => $post_id,
        );
        wp_update_post( $my_post );
        if($submission->get_posted_data()['_wpcf7'] == '15510'){

           if (isset($submission->get_posted_data()['latitude'])) {
               update_post_meta($post_id, 'latitude', $submission->get_posted_data()['latitude']);
           }
           if (isset($submission->get_posted_data()['longitude'])) {
               update_post_meta($post_id, 'longitude', $submission->get_posted_data()['longitude']);
           }
           if (isset($submission->get_posted_data()['lloji'])) {
               update_post_meta($post_id, 'lloji', $submission->get_posted_data()['lloji']);
           }
           if (isset($submission->get_posted_data()['lartesia'])) {
               update_post_meta($post_id, 'lartesia', $submission->get_posted_data()['lartesia']);
           }
           if (isset($submission->get_posted_data()['gjendja'])) {
               update_post_meta($post_id, 'gjendja', $submission->get_posted_data()['gjendja']);
           }
           if (isset($myPhoto)) {
               $fotoja = explode("/DCIM/", $myPhoto);
               $fotoja = "/DCIM/" . $fotoja[1];
               update_post_meta($post_id, "foto", $fotoja);
           }
           if (isset($submission->get_posted_data()["onPolygon"])) {
               update_post_meta($post_id, "onpolygon", $submission->get_posted_data()["onPolygon"]);
           }
       }
        else if($submission->get_posted_data()['_wpcf7'] == '15509'){
           if (isset($submission->get_posted_data()['latitude'])) {
               update_post_meta($post_id, 'latitude', $submission->get_posted_data()['latitude']);
           }
           if (isset($submission->get_posted_data()['longitude'])) {
               update_post_meta($post_id, 'longitude', $submission->get_posted_data()['longitude']);
           }
           if (isset($submission->get_posted_data()['lloji'])) {
               update_post_meta($post_id, 'lloji', $submission->get_posted_data()['lloji']);
           }
           if (isset($submission->get_posted_data()['gjendja'])) {
               update_post_meta($post_id, 'gjendja', $submission->get_posted_data()['gjendja']);
           }
           if (isset($myPhoto)) {
               $fotoja = explode("/DCIM/", $myPhoto);
               $fotoja = "/DCIM/" . $fotoja[1];
               update_post_meta($post_id, "foto", $fotoja);
           }
           if (isset($submission->get_posted_data()["onPolygon"])) {
               update_post_meta($post_id, "onpolygon", $submission->get_posted_data()["onPolygon"]);
           }
       }
        else if($submission->get_posted_data()['_wpcf7'] == '15511'){
            if (isset($submission->get_posted_data()['latitude'])) {
               update_post_meta($post_id, 'latitude', $submission->get_posted_data()['latitude']);
            }
            if (isset($submission->get_posted_data()['longitude'])) {
               update_post_meta($post_id, 'longitude', $submission->get_posted_data()['longitude']);
            }
            if (isset($submission->get_posted_data()['vleranedb'])) {
               update_post_meta($post_id, 'vlera', $submission->get_posted_data()['vleranedb']);
            }
            if (isset($submission->get_posted_data()["onPolygon"])) {
               update_post_meta($post_id, "onpolygon", $submission->get_posted_data()["onPolygon"]);
            }
        }
    }
};
add_action( 'wpcf7_before_send_mail', 'action_wpcf7_before_send_mail', 10, 1 );


/**
 * Register the /wp-json/acf/v3/posts endpoint so it will be cached.
 */



function wprc_add_acf_posts_endpoint( $allowed_endpoints ) {
    if ( ! isset( $allowed_endpoints[ 'acf/v3' ] ) || ! in_array( 'posts', $allowed_endpoints[ 'acf/v3' ] ) ) {
        $allowed_endpoints[ 'acf/v3' ][] = 'polygon';
        $allowed_endpoints[ 'acf/v3' ][] = 'tree';
        $allowed_endpoints[ 'acf/v3' ][] = 'mobiliari';
    }
    return $allowed_endpoints;
}

add_filter( 'wp_rest_cache/allowed_endpoints', 'wprc_add_acf_posts_endpoint', 10, 1);