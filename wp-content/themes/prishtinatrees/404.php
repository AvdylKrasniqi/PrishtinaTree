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

get_header();
?>

	<main id="primary" class="site-main">

        <style>
            #howitworks span {
                font-size: 40px;
            }
        </style>
        <div id="howitworks" class="container my-5">
            <div class="row m-0 mt-5">
                <div class="col-6">
                    <span class="icon-404" style="font-size: 100px;"></span>
                    <h4 class="my-3">404 !</h4>
                    <p>Kjo faqe nuk ekziston.</p>
                    <p>Ju lutem provoni njerën nga faqet tjera:</p>
                    <b><a class="text-dark" href="<?= get_home_url(); ?>">Ballina</a> |
                        <a class="text-dark" href="<?= get_home_url(); ?>/howitworks">Si funksionon?</a> |
                        <a class="text-dark" href="<?= get_home_url(); ?>/about">Rreth prishtinatrees.org</a>
                    </b>
                </div>
                <div class="col-6 text-en">
                    <span class="icon-404" style="font-size: 100px;"></span>
                    <h4 class="my-3">404 !</h4>
                    <p>This page does not exist.</p>
                    <p>Please try one of the other pages:</p>
                    <b> <a class="text-en" href="<?= get_home_url(); ?>">Ballina</a> |
                        <a class="text-en" href="<?= get_home_url(); ?>/howitworks">How it works?</a> |
                        <a class="text-en" href="<?= get_home_url(); ?>/about">About prishtinatrees.org</a>
                    </b>
                </div>
            </div>
        </div>
	</main><!-- #main -->

<?php
get_footer();
