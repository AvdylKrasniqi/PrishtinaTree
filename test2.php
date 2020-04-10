<?php


?>
<!DOCTYPE html>
<html>
<head>
	<title>Prishtina Trees</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<script type="text/javascript" src="./assets/jquery/jquery-3.4.1.min.js"></script>
	
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
  integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
  crossorigin=""/>
  	<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
  integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
  crossorigin=""></script>
	
	<link href="./assets/bootstrap/bootstrap-4.4.1.min.css" rel="stylesheet">
	<script src="./assets/bootstrap/bootstrap-4.4.1.min.js"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js" integrity="sha256-MAgcygDRahs+F/Nk5Vz387whB4kSK9NXlDN3w58LLq0=" crossorigin="anonymous"></script>

	
	<script type="text/javascript" src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"  crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css"  crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css"  crossorigin="anonymous">

	<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
	
	<script type="text/javascript" src="./assets/datas/trees/pejtoni.min.js"></script>
	<script type="text/javascript" src="./assets/datas/trees/kampusi.min.js"></script>
	<script src="./assets/leaflet/plugins/placementstrategies/leaflet-markercluster.placementstrategies.js"></script>



    <script src="https://cdn.maptiler.com/mapbox-gl-js/v1.5.1/mapbox-gl.js"></script>
    <script src="https://cdn.maptiler.com/mapbox-gl-leaflet/latest/leaflet-mapbox-gl.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.0.3/leaflet.css" />
    <link rel="stylesheet" href="https://cdn.maptiler.com/mapbox-gl-js/v1.5.1/mapbox-gl.css" />

</head>
<body style="overflow-y: hidden;">
	<!-- Image and text -->
<nav class="navbar navbar-success navbar-expand-lg bg-success">
  <a class="navbar-brand text-white" href="#">
    <img src="./assets/images/tree.png" width="30" height="30" class="d-inline-block align-top" alt="">
    PrishtinaTrees
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active text-white" href="index.php">[ Ballina ] <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link text-white" href="kontribo.php">[ Shto të dhëna ]</a>
      <a class="nav-item nav-link text-white" href="kontributoret.php">[ Kontributorët ]</a>
    </div>
  </div>
</nav>
	<div class="row m-0" style="overflow: hidden;">
		
		<div class="col p-0">
			<div id="progress"><div id="progress-bar"></div></div>
			<div id="mapid" class="w-100"></div>
			<button onclick="$('#descDiv').toggle(function(){map.invalidateSize()});" id="descToggler" class="btn btn-sm btn-outline-dark btn-light" style="cursor: pointer; position: absolute; top:10px; right: 10px; z-index: 400"><i class="fas fa-angle-right"></i></button>
		</div>
		<div id="descDiv" class="col-4 p-5" style="height: 100vh; overflow-y: scroll;">
			<table  class="table table-bordered table-striped table-hover text-center">
				<thead>
					<tr>
						<th scope="col">Ikona</th>
						<th scope="col">Përshkrimi</th>
						<th scope="col">Shfaqe</th>
					</tr>
				</thead>
				<tbody>
					<tr scope="row">
						<td><i class="fas fa-tree text-success"></i></td>
						<td>Dru</td>
						<td><input id="toggleDrunjet" type="checkbox" checked data-toggle="toggle" data-size="sm"></td>
					</tr>
					<tr scope="row">
						<td><i class="fas fa-trash-alt"></i></td>
						<td>Shportë</td>
						<td><input id="toggleShportat" type="checkbox" checked data-toggle="toggle" data-size="sm"></td>
					</tr>
					<tr scope="row">
						<td><i class="fas fa-volume-up text-info"></i></td>
						<td>Niveli i zhurmës</td>
						<td><input id="toggleZhurmen" type="checkbox" checked data-toggle="toggle" data-size="sm"></td>
					</tr>
					<tr scope="row">
						<td><i class="fas fa-bolt text-warning"></i></td>
						<td>Shtyllë elektrike</td>
						<td><input id="toggleShtyllat" type="checkbox" checked data-toggle="toggle" data-size="sm"></td>
					</tr>
				</tbody>
			</table>
			<h3>Legjenda</h3>
			<div id="legjenda" class="row pt-3">
				<div class="col-12" style="border-bottom: 1px dashed;">
					<h3 id="emriLagjes">Emri Lagjes</h3>
				</div>
				<div class="col-3 p-1" style="border-bottom: 1px dashed;">
					<img class="w-100" src="./assets/images/drunjte.png"/>
				</div>
				<div class="col-9" style="border-bottom: 1px dashed;">
					<h5>DRUNJË</h5>
					<p>Gjithsej njësi:<span id="totalDrunje" class="font-weight-bold">1078</span></p>
				</div>
				<div class="col-6 row m-0 p-0">
					<div class="col-3 p-2">
						<img src="./assets/images/gjethembajtes.png" class="w-100"/>
					</div>
					<div class="col-9">
						<h5>Gjethrënës</h5>
						<p>Gjithsej: <span id="totalDrunjeGjethrenes" class="font-weight-bold">508</span></p>
					</div>
					<div class="col-12 m-0 p-0 text-center">
						<button class="button rounded-circle border-0 pt-2" style="background-color: #4e753e; height: 30px; width: 30px;">&nbsp;</button>Lartë: <span class=" pt-2">508</span><br/>
						<button class="button rounded-circle border-0 pt-2" style="background-color: #7e9c3b; height: 30px; width: 30px;">&nbsp;</button>Mesëm: <span class=" pt-2">25</span><br/>
						<button class="button rounded-circle border-0 pt-2" style="background-color: #c0ae28; height: 30px; width: 30px;">&nbsp;</button>Ultë: <span class=" pt-2">200</span><br/>
					</div>
				</div>
				<div class="col-6 row m-0 p-0">
					<div class="col-3 p-2">
						<img src="./assets/images/gjetherenes.png" class="w-100"/>
					</div>
					<div class="col-9">
						<h5>Gjethmbajtës</h5>
						<p>Gjithsej: <span id="totalDrunjeGjethmbajtes" class="font-weight-bold">508</span></p>
					</div>
					<div class="col-12 m-0 p-0 text-center">
						<button class="button rounded-circle border-0" style="background-color: #674835; height: 30px; width: 30px;">&nbsp;</button>Lartë: <span>508</span><br/>
						<button class="button rounded-circle border-0" style="background-color: #62653a; height: 30px; width: 30px;">&nbsp;</button>Mesëm: <span>25</span><br/>
						<button class="button rounded-circle border-0" style="background-color: #714220; height: 30px; width: 30px;">&nbsp;</button>Ultë: <span>200</span><br/>
					</div>
				</div>
				<div class="col-12 pt-2 pb-2" style="border-bottom: 1px dashed;"></div>
				<div class="col-3 p-1" style="border-bottom: 1px dashed;">
					<img class="w-100" src="./assets/images/drunjte.png"/>
				</div>
				<div class="col-9" style="border-bottom: 1px dashed;">
					<h5>Mobilari</h5>
					<p>Gjithsej njësi:<span id="totalDrunje" class="font-weight-bold">1078</span></p>
				</div>
				<div class="col-6 row m-0 p-0">
					<div class="col-3 p-2">
						<img src="./assets/images/gjethembajtes.png" class="w-100"/>
					</div>
					<div class="col-9">
						<h5>Gjethrënës</h5>
						<p>Gjithsej: <span id="totalDrunjeGjethrenes" class="font-weight-bold">508</span></p>
					</div>
					<div class="col-12 m-0 p-0 text-center">
						<button class="button rounded-circle border-0 pt-2" style="background-color: #e24d21; height: 30px; width: 30px;">&nbsp;</button>Ulëse: <span class=" pt-2">508</span><br/>
						<button class="button rounded-circle border-0 pt-2" style="background-color: #4090a8; height: 30px; width: 30px;">&nbsp;</button>Ndriçim: <span class=" pt-2">25</span><br/>
						<button class="button rounded-circle border-0 pt-2" style="background-color: #624785; height: 30px; width: 30px;">&nbsp;</button>Mbeturina: <span class=" pt-2">200</span><br/>
					</div>
				</div>
				<div class="col-6 row m-0 p-0">
					<div class="col-3 p-2">
						<img src="./assets/images/gjetherenes.png" class="w-100"/>
					</div>
					<div class="col-9">
						<h5>Gjethmbajtës</h5>
						<p>Gjithsej: <span id="totalDrunjeGjethmbajtes" class="font-weight-bold">508</span></p>
					</div>
					<div class="col-12 m-0 p-0 text-center">
						<button class="button rounded-circle border-0" style="background-color: #674835; height: 30px; width: 30px;">&nbsp;</button>Lartë: <span>508</span><br/>
						<button class="button rounded-circle border-0" style="background-color: #62653a; height: 30px; width: 30px;">&nbsp;</button>Mesëm: <span>25</span><br/>
						<button class="button rounded-circle border-0" style="background-color: #714220; height: 30px; width: 30px;">&nbsp;</button>Ultë: <span>200</span><br/>
					</div>
				</div>
				<div class="col-12 pt-2 pb-2" style="border-bottom: 1px dashed;"></div>
				
				<div class="col-12 pt-2 pb-2" style="border-bottom: 1px dashed;"></div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript">


	$("document").ready(function() {

	});
</script>
</html>