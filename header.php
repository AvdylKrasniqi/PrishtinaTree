<?php
function get_header(){
echo '<head>
	<title>Prishtina Trees</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<script type="text/javascript" src="./assets/jquery/jquery-3.4.1.min.js"></script>
	
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
  integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
  crossorigin=""/>
    <link rel="stylesheet" href="./css/style.css">
  	<script src="./js/leaflet.js"></script>
	
	<link href="./assets/bootstrap/bootstrap-4.4.1.min.css" rel="stylesheet">
	<script src="./assets/bootstrap/bootstrap-4.4.1.min.js"></script>
	<script type="text/javascript" src="./js/treeparser.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@turf/turf@5.1.6/turf.min.js"></script>
    <script type="text/javascript" src="./js/polygonparser.js"></script>
    <link  href="./assets/images/icons/style.css" rel="stylesheet" >
	'
  /*
   *
    <script src="./assets/prunecluster/dist/PruneCluster.js"></script>

  <link href="./assets/prunecluster/dist/LeafletStyleSheet.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js" integrity="sha256-MAgcygDRahs+F/Nk5Vz387whB4kSK9NXlDN3w58LLq0=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"  crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css"  crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css"  crossorigin="anonymous">

	<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>


*/
  . '

 <script src="https://cdn.maptiler.com/mapbox-gl-js/v1.5.1/mapbox-gl.js"></script>
  <script src="https://cdn.maptiler.com/mapbox-gl-leaflet/latest/leaflet-mapbox-gl.js"></script>
  
  <link rel="stylesheet" href="https://cdn.maptiler.com/mapbox-gl-js/v1.5.1/mapbox-gl.css" />

</head>
<body>
	<!-- Image and text -->
<nav class="navbar navbar-expand-lg bg-light navbar-light">
  <a class="navbar-brand p-3" href="#">
    <img src="./assets/images/header/logo.svg"  height="90" class="d-inline-block align-top" alt="">
  </a>
  <div>
  	<span style="font-size: 30px;">PRISHTINA</span>
  	<span style="font-size: 20px;"> Tree and Public Space Map</span><br/>
  	<span>by <a class="text-dark" href="http://www.architectureforhumans.com/">Architecture for Humans</a></span>
  </div>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav ml-auto">
      <a class="nav-item nav-link active mx-3" href="index.php">Ballina<br/><span class="text-muted">Home</span><span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link mx-3" href="howitworks.php">Si funksionon?<br/><span class="text-muted">How it works</span></a>
      <a class="nav-item nav-link mx-3" href="about.php">Rreth prishtinatrees.org<br/><span class="text-muted">About prishtinatrees.org</span></a>
      <img src="./assets/images/header/header_right.png"  height="60" width="60" alt="">
    </div>
  </div>
</nav>';
}
?>