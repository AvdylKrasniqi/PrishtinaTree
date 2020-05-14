<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package prishtinatrees
 */
ini_set('max_execution_time', '0');

get_header();
?>

	<main id="primary" class="site-main">

		<?php
        $allposts= get_posts( array('post_type'=>'tree','numberposts'=>-1) );
//        foreach ($allposts as $eachpost) {
//        wp_delete_post( $eachpost->ID, true );
//        }
//
//        die();
        $args = array(
           'post_type' => 'zhurma',
           'post_status' => 'Publish',
           'post_title' => 'r'
        );

        $json = file_get_contents('http://localhost/prishtinatrees/wp-includes/prishtinatrees/assets/datas/zhurma/ulpiana.json');

        // Converts it into a PHP object
        $data = json_decode($json, true);
        echo count($data);
//        echo "<pre>" . var_export($data, true) . "</pre>";
//        var_dump($data);
        for($i = 0; $i < count($data); $i++){

        $post_id = wp_insert_post($args);

           if(!is_wp_error($post_id)) {
               $my_post = array(
                  'ID'           => $post_id,
                  'post_title'   =>$post_id,
              );
               wp_update_post( $my_post );
               update_post_meta($post_id, 'latitude', $data[$i]["latitude"]);
               update_post_meta($post_id, 'longitude', $data[$i]["longitude"]);
               update_post_meta($post_id, 'vlera', $data[$i]["Vlera e dB"]);
//               update_post_meta($post_id, 'gjendja', $data[$i]["Gjendja"]);

//               update_post_meta($post_id, 'lartesia', $data[$i]["Lartesi"]);

//               update_post_meta($post_id, 'foto', $data[$i]["Foto"]);
               update_post_meta($post_id, 'onpolygon', 147);
           }
           else {
               echo "SHKOJ GABIM" . $post_id . " ". $i;
           }
        }
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
