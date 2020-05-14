<?php
ini_set('max_execution_time', '0');
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package prishtinatrees
 */

get_header();
?>

	<main id="primary" class="site-main">

<?php
    $posts = array(
      'post_type'   => 'polygon',
      'numberposts' => -1,
    );
    $lastposts = get_posts($posts);

    if ( $lastposts ) {
        foreach ( $lastposts as $post ){
            setup_postdata( $post );

            $site = get_home_url() . '/wp-json/acf/v3/polygon/'. get_the_ID();
            $homepage = file_get_contents($site);
            $filename = getcwd() . '/datas/polygons/' . get_the_ID() . '.json';
            $handle = fopen($filename,"w");
            fwrite($handle,$homepage);

            $site = get_home_url()  . '/wp-json/acf/v3/tree?per_page=20000&filter[meta_key]=onpolygon&filter[meta_compare]=LIKE&filter[meta_value]=' . get_the_ID();
            $homepage = file_get_contents($site);
            $filename = getcwd() . '/datas/trees/' . get_the_ID() . '.json';
            $handle = fopen($filename,"w");
            fwrite($handle,$homepage);

            $site = get_home_url()  . '/wp-json/acf/v3/mobiliari?per_page=20000&filter[meta_key]=onpolygon&filter[meta_compare]=LIKE&filter[meta_value]=' . get_the_ID();
            $homepage = file_get_contents($site);
            $filename = getcwd() . '/datas/mobiliari/' . get_the_ID() . '.json';
            $handle = fopen($filename,"w");
            fwrite($handle,$homepage);

        }
        wp_reset_postdata();
    }

echo "Success";
fclose($handle);
?>
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
