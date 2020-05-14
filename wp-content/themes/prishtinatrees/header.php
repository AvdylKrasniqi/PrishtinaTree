<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package prishtinatrees
 */

?>
<!doctype html>
<html>
<head>
	<title>Prishtina Trees</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">

	<script type="text/javascript" src="<?= get_home_url()?>/wp-includes/prishtinatrees/assets/jquery/jquery-3.4.1.min.js"></script>

	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
  integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
  crossorigin=""/>
    <link rel="stylesheet" href="<?= get_home_url()?>/wp-includes/prishtinatrees/css/style.css">
  	<script src="<?= get_home_url()?>/wp-includes/prishtinatrees/js/leaflet.js"></script>

	<link href="<?= get_home_url()?>/wp-includes/prishtinatrees/assets/bootstrap/bootstrap-4.4.1.min.css" rel="stylesheet">
	<script src="<?= get_home_url()?>/wp-includes/prishtinatrees/assets/bootstrap/bootstrap-4.4.1.min.js"></script>
	<script type="text/javascript" src="<?= get_home_url()?>/wp-includes/prishtinatrees/js/treeparser.js"></script>
	<script type="text/javascript" src="<?= get_home_url()?>/wp-includes/prishtinatrees/js/mobiliariparser.js"></script>
	<script type="text/javascript" src="<?= get_home_url()?>/wp-includes/prishtinatrees/js/zhurmaparser.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@turf/turf@5.1.6/turf.min.js"></script>
    <script type="text/javascript" src="<?= get_home_url()?>/wp-includes/prishtinatrees/js/polygonparser.js"></script>
    <link  href="<?= get_home_url()?>/wp-includes/prishtinatrees/assets/images/icons/style.css" rel="stylesheet" >



 <script src="https://cdn.maptiler.com/mapbox-gl-js/v1.5.1/mapbox-gl.js"></script>
  <script src="https://cdn.maptiler.com/mapbox-gl-leaflet/latest/leaflet-mapbox-gl.js"></script>

  <link rel="stylesheet" href="https://cdn.maptiler.com/mapbox-gl-js/v1.5.1/mapbox-gl.css" />
    <? wp_head(); ?>
</head>
<body>

<?php wp_body_open(); ?>
	<!-- Image and text -->
<nav class="navbar navbar-expand-lg bg-light navbar-light">
  <a <?php if(wp_is_mobile()) { echo 'style="display: none !important;" '; }?>  class="navbar-brand" href="<?= get_home_url()?>">
     <img src="<?= get_home_url()?>/wp-includes/prishtinatrees/assets/images/header/logo.svg"  height="90" class="d-inline-block align-top" alt="">
  </a>
  <div>
      <a class="text-dark text-decoration-none" href="<?= get_home_url(); ?>"><span style="font-size: <?= (wp_is_mobile()) ? '15' : '30' ?>px;">PRISHTINA</span></a>
      <a class="text-dark text-decoration-none" href="<?= get_home_url(); ?>"><span style="font-size: <?= (wp_is_mobile()) ? '10' : '20' ?>px;"> Tree and Public Space Map</span></a><br/>
  	<span>by <a class="text-dark" href="http://www.architectureforhumans.com/" target="_blank">Architecture for Humans</a></span>
  </div>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav ml-auto">
      <a class="nav-item nav-link mx-3" href="<?= get_home_url() ?>">Ballina<br/><span class="text-muted">Home</span><span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link mx-3" href="howitworks">Si funksionon?<br/><span class="text-muted">How it works</span></a>
      <a class="nav-item nav-link mx-3" href="about">Rreth prishtinatrees.org<br/><span class="text-muted">About prishtinatrees.org</span></a>
      <img <?php if(wp_is_mobile()) { echo 'style="display: none !important;" '; }?> src="<?= get_home_url()?>/wp-includes/prishtinatrees/assets/images/header/header_right.png"  height="60" width="60" alt="">
    </div>
  </div>
</nav>

