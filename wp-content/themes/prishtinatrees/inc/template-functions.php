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

/*
 * Funksione ekstra
// */
//function save_posted_data( $posted_data ) {
//$submission = WPCF7_Submission::get_instance();
//var_dump($submission->uploaded_files());
//    var_dump($_POST["foto"], $_POST['treeFile']);
//    die();
////        $recent_posts = wp_get_recent_posts(array(
////            'post_type'   => 'tree',
////            'numberposts' => 1, // Number of recent posts thumbnails to display
////            'post_status' => 'any'
////        ));
////        if(count($recent_posts) == 0) $recent_posts[0]["ID"] = 0;
////
//
//       $args = array(
//         'post_type' => 'tree',
//         'post_status'=>'Pending',
//         'post_title'=>'hi there'
//       );
//       $post_id = wp_insert_post($args);
//
//       if(!is_wp_error($post_id)){
//         if( isset($posted_data['latitude']) ){
//           update_post_meta($post_id, 'latitude', $posted_data['latitude']);
//         }
//         if( isset($posted_data['longitude']) ){
//           update_post_meta($post_id, 'longitude', $posted_data['longitude']);
//         }
//         if( isset($posted_data['lloji']) ){
//           update_post_meta($post_id, 'lloji', $posted_data['lloji']);
//         }
//         if( isset($posted_data['lartesia']) ){
//           update_post_meta($post_id, 'lartesia', $posted_data['lartesia']);
//         }
//         if( isset($posted_data['gjendja']) ){
//           update_post_meta($post_id, 'gjendja', $posted_data['gjendja']);
//         }
//         if( isset($posted_data['foto'])){
//             echo "<script>alert('PO HIN QETU');</script>";
//             update_post_meta($post_id, "foto", $_POST["foto"] );
//         }
//     }
// }
//
//add_filter( 'wpcf7_posted_data', 'save_posted_data' );
// define the wpcf7_before_send_mail callback
function action_wpcf7_before_send_mail( $contact_form ) {
        $submission = WPCF7_Submission::get_instance();
        echo $submission->uploaded_files()["foto"];
        $recent_posts = wp_get_recent_posts(array(
        'post_type'   => 'tree',
        'numberposts' => 1, // Number of recent posts thumbnails to display
        'post_status' => 'any'
        ));
        if(count($recent_posts) == 0) $recent_posts[0]["ID"] = 0;


       $args = array(
         'post_type' => 'tree',
         'post_status'=>'Pending',
         'post_title'=>$recent_posts[0]["ID"]
       );
       $post_id = wp_insert_post($args);

       if(!is_wp_error($post_id)){
         if( isset($submission->get_posted_data()['latitude']) ){
           update_post_meta($post_id, 'latitude', $submission->get_posted_data()['latitude']);
         }
         if( isset($submission->get_posted_data()['longitude']) ){
           update_post_meta($post_id, 'longitude', $submission->get_posted_data()['longitude']);
         }
         if( isset($submission->get_posted_data()['lloji']) ){
           update_post_meta($post_id, 'lloji', $submission->get_posted_data()['lloji']);
         }
         if( isset($submission->get_posted_data()['lartesia']) ){
           update_post_meta($post_id, 'lartesia', $submission->get_posted_data()['lartesia']);
         }
         if( isset($submission->get_posted_data()['gjendja']) ){
           update_post_meta($post_id, 'gjendja', $submission->get_posted_data()['gjendja']);
         }
         if( isset($submission->uploaded_files()["foto"])){
             update_post_meta($post_id, "foto", $submission->uploaded_files()["foto"] );
         }
     }
};

// add the action
add_action( 'wpcf7_before_send_mail', 'action_wpcf7_before_send_mail', 10, 1 );
//do_action( 'wpcf7_before_send_mail', "HAJT PLDH" );
