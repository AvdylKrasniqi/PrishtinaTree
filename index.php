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

		$('#toggleDrunjet').change(function() {
	    	if($(this).prop('checked')){
	      		map.addLayer(markers3);
	      		map.addLayer(markers6);
	      	}
    	  	else{
      			map.removeLayer(markers3);
      			map.removeLayer(markers6);
      		}
	    })

			var progress = document.getElementById('progress');
		var progressBar = document.getElementById('progress-bar');

		function updateProgressBar(processed, total, elapsed, layersArray) {
			if (elapsed > 1000) {
				// if it takes more than a second to load, display the progress bar:
				progress.style.display = 'block';
				progressBar.style.width = Math.round(processed/total*100) + '%';
			}

			if (processed === total) {
				// all markers processed - hide the progress bar:
				progress.style.display = 'none';
			}
		}

	$("document").ready(function() {

		$("#mapid").css("height",  "calc(100vh - " + $("nav").outerHeight() + "px)")

		map = L.map('mapid', {minZoom: 13, maxZoom: 20}).setView([42.667542, 21.166191], 14);


		const gjetherenesLarteIcon = L.divIcon({
		    html: '<svg height="10" width="10"><circle cx="5" cy="5" r="4" stroke="#4e753e" stroke-width="1" fill="#4e753e99"/></svg>',
		    iconSize: [10, 10],
		    className: 'gjetherenesLarteIcon'
		});

		const gjetherenesMesemIcon = L.divIcon({
		    html: '<svg height="10" width="10"><circle cx="5" cy="5" r="4" stroke="#7e9c3b" stroke-width="1" fill="#7e9c3b99"/></svg>',
		    iconSize: [10, 10],
		    className: 'gjetherenesMesemIcon'
		});


		const gjetherenesUletIcon = L.divIcon({
		    html: '<svg height="10" width="10"><circle cx="5" cy="5" r="4" stroke="#c0ae28" stroke-width="1" fill="#c0ae2899"/></svg>',
		    iconSize: [10, 10],
		    className: 'gjetherenesUletIcon'
		});

		const gjethembajtesLarteIcon = L.divIcon({
		    html: '<svg height="10" width="10"><circle cx="5" cy="5" r="4" stroke="#674835" stroke-width="1" fill="#67483599"/></svg>',
		    iconSize: [10, 10],
		    className: 'gjethembajtesLarteIcon'
		});


		const gjethembajtesMesemIcon = L.divIcon({
		    html: '<svg height="10" width="10"><circle cx="5" cy="5" r="4" stroke="#62653a" stroke-width="1" fill="#62653a99"/></svg>',
		    iconSize: [10, 10],
		    className: 'gjethembajtesMesemIcon'
		});


		const gjethembajtesUletIcon = L.divIcon({
		    html: '<svg height="10" width="10"><circle cx="5" cy="5" r="4" stroke="#714220" stroke-width="1" fill="#71422099"/></svg>',
		    iconSize: [10, 10],
		    className: 'gjethembajtesUletIcon'
		});




		var gl = L.mapboxGL({
	        attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">© MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">© OpenStreetMap contributors</a>',
	        accessToken: 'not-needed',
	        style: 'https://api.maptiler.com/maps/positron/style.json?key=SUSH2C7iOeiRtPMHq2pu'
	      }).addTo(map);

		/* icons */

		


		southWest = L.latLng(42.608370, 21.114769),
		northEast = L.latLng(42.709740, 21.235619);
		bounds = L.latLngBounds(southWest, northEast);

		map.setMaxBounds(bounds);
		map.on('drag', function() {
		    map.panInsideBounds(bounds, { animate: false });
		});


		/*L.marker([42.667542, 21.166191],{ icon:  faTree}).addTo(map)
		    .bindPopup('A pretty CSS3 popup.<br> Easily customizable.')
		    //.openPopup();
*/
		//polygoni
		dardania = [[42.646496, 21.155415],[42.647274, 21.156808],[42.647491, 21.157477],[42.655514, 21.159591],[42.655702, 21.158578], [42.655704, 21.158024], [42.653091, 21.148391], [42.652853, 21.148482], [42.652577, 21.147757], [42.652215, 21.147459], [42.651886, 21.147427], [42.651689, 21.147556], [42.651579, 21.147395], [42.649494, 21.151600], [42.648318, 21.153617], [42.647647, 21.154464], [42.647079, 21.154990]];

		ulpiana = [[42.647465, 21.157504], [42.647181, 21.159500], [42.647148, 21.160618], [42.647320, 21.161556], [42.647480, 21.162052],[42.647858, 21.162765],[42.648727, 21.163649],[42.650233, 21.164821], [42.654022, 21.167615], [42.654216, 21.167527], [42.654544, 21.166813], [42.655544, 21.159613]];

		breguIDiellit = [[42.647799, 21.162972], [42.654045, 21.167717], [42.654727, 21.168370], [42.655305, 21.170034], [42.655503, 21.170448], [42.656142, 21.171409], [42.655823, 21.173269], [42.655881, 21.175207], [42.655826, 21.176858], [42.655412, 21.178184], [42.652379, 21.175520], [42.650687, 21.174465], [42.648804, 21.172424], [42.646718, 21.170884], [42.646031, 21.169812], [42.645509, 21.169431]];

		markers3 = L.markerClusterGroup(
			{
				elementsPlacementStrategy: 'original-locations',
				//disableClusteringAtZoom: 17,
				chunkedLoading: true, 
				chunkProgress: updateProgressBar,
				spiderLegPolylineOptions: {opacity: 0}
			}
		);

 
		
		for (let i = 0; i < pejtoni.length; i++) {
			var a = pejtoni[i];
			//qetu mujm me bo me type.
			if(a[0] == "Gjethërënës") {
				if(a[1] == "I lartë (> 3m)")
					var marker = L.marker([a[3], a[4]], { title: "Druri " + i, icon: gjetherenesLarteIcon});
				else if(a[1] == "I mesëm (1 - 3m)")
					var marker = L.marker([a[3], a[4]], { title: "Druri " + i, icon: gjetherenesMesemIcon});
				else if(a[1] == "I ulët (< 1m)")
					var marker = L.marker([a[3], a[4]], { title: "Druri " + i, icon: gjetherenesUletIcon});
			} else if(a[0] == "Gjethëmbajtës") {
				if(a[1] == "I lartë (> 3m)")
					var marker = L.marker([a[3], a[4]], { title: "Druri " + i, icon: gjethembajtesLarteIcon});
				else if(a[1] == "I mesëm (1 - 3m)")
					var marker = L.marker([a[3], a[4]], { title: "Druri " + i, icon: gjethembajtesMesemIcon});
				else if(a[1] == "I ulët (< 1m)")
					var marker = L.marker([a[3], a[4]], { title: "Druri " + i, icon: gjethembajtesUletIcon});
			}
			var description = "<dl>"
								+ "<dt>Tipi i drurit</dt>"
					           	+ "<dd>" + a[0] + "</dd>"
				          	 	+ "<dt>Gjatësia</dt>"
			            		+ "<dd>" + a[1] + "</dd>"
				          	 	+ "<dt>Gjendja</dt>"
			            		+ "<dd>" + a[2] + "</dd>"
				            + "</dl>";
			marker.bindPopup(description);
			markers3.addLayer(marker);
		}
		map.addLayer(markers3);



		markers6 = L.markerClusterGroup(
			{
				elementsPlacementStrategy: 'original-locations',
				//disableClusteringAtZoom: 17,
				//dis: 17,
				chunkedLoading: true, 
				chunkProgress: updateProgressBar,
				spiderLegPolylineOptions: {opacity: 0}
			}
		);
		

		markers7 = L.tileLayer()
		for (let i = 0; i < kampusi.length; i++) {
			var a = kampusi[i];
			//qetu mujm me bo me type.
			if(a[0] == "Gjethërënës") {
				if(a[1] == "I lartë (> 3m)")
					var marker = L.marker([a[3], a[4]], { title: "Druri " + i, icon: gjetherenesLarteIcon});
				else if(a[1] == "I mesëm (1 - 3m)")
					var marker = L.marker([a[3], a[4]], { title: "Druri " + i, icon: gjetherenesMesemIcon});
				else if(a[1] == "I ulët (< 1m)")
					var marker = L.marker([a[3], a[4]], { title: "Druri " + i, icon: gjetherenesUletIcon});
			} else if(a[0] == "Gjethëmbajtës") {
				if(a[1] == "I lartë (> 3m)")
					var marker = L.marker([a[3], a[4]], { title: "Druri " + i, icon: gjethembajtesLarteIcon});
				else if(a[1] == "I mesëm (1 - 3m)")
					var marker = L.marker([a[3], a[4]], { title: "Druri " + i, icon: gjethembajtesMesemIcon});
				else if(a[1] == "I ulët (< 1m)")
					var marker = L.marker([a[3], a[4]], { title: "Druri " + i, icon: gjethembajtesUletIcon});
			}
			var description = "<dl>"
								+ "<dt>Tipi i drurit</dt>"
					           	+ "<dd>" + a[0] + "</dd>"
				          	 	+ "<dt>Gjatësia</dt>"
			            		+ "<dd>" + a[1] + "</dd>"
				          	 	+ "<dt>Gjendja</dt>"
			            		+ "<dd>" + a[2] + "</dd>"
				            + "</dl>";
			marker.bindPopup(description);
			markers6.addLayer(marker);
		}
		map.addLayer(markers6);

		L.control.scale().addTo(map);

		/*
		markers3.on("clusterclick", function(a) {
			a.layer.unspiderfy();
			setTimeout(function(){
				a.layer.spiderfy();
			}, 1000);
		} );
		*/

		var prevZoom = map.getZoom();
		map.on('zoomend',function(e){
			//debugger;
			var currZoom = map.getZoom();
		    var diff = prevZoom - currZoom;
		    if(diff > 0){
		  	   console.log('zoomed out');
		    } else if(diff < 0) {
		  	   console.log('zoomed in');
		    } else {
		  	   console.log('no change');
		    }
		    console.log(map.getZoom() + map.getCenter());
		    prevZoom = currZoom;
		});
		booli = false;

		markers3.on("clusterclick", function(a) {
			//a.layer.unspiderfy();
			if(!booli) {
			setTimeout(function(){
				a.layer.spiderfy();
			}, 1000);
			}
		} );


		markers6.on("clusterclick", function(a) {
			//a.layer.unspiderfy();
			if(!booli) {
			setTimeout(function(){
				a.layer.spiderfy();
			}, 1000);
			}
		} );
/*


		markers6.on("clusterclick", function(a) {
			a.layer.unspiderfy();
			setTimeout(function(){
				a.layer.spiderfy();
			}, 1000);
		} );


*/

		/*

		markers3.on("clusterclick", function(a) {
			a.layer.unspiderfy();
			setTimeout(function(){
				a.layer.spiderfy();
			}, 1000);
		} );





		markers4 = L.markerClusterGroup();

		dardania_polygon = L.polygon(dardania, {color: 'green'}).addTo(map);
		

	  	ulpiana_polygon = L.polygon(ulpiana, {color: 'green'}).addTo(map);
		

	  	breguIDiellit_polygon = L.polygon(breguIDiellit, {color: 'green'}).addTo(map);
		

		markers = L.markerClusterGroup();
		
		for (let i = 0; i < breguIDiellit.length; i++) {
			var a = breguIDiellit[i];
			var title = a[2];
			var marker = L.marker(new L.LatLng(a[0], a[1]), { title: "titulli" });
			//marker.bindPopup("title");
			markers.addLayer(marker);

		}
		map.addLayer(markers);

		markers2 = L.markerClusterGroup({showCoverageOnHover: false});
		
		for (let i = 0; i < dardania.length; i++) {
			var a = dardania[i];
			var title = a[2];
			var marker2 = L.marker(new L.LatLng(a[0], a[1]), { title: "titulli" });
			//marker2.bindPopup("title");
			markers2.addLayer(marker2);
		}
		map.addLayer(markers2);


		var prevZoom = map.getZoom();
		map.on('zoomstart',function(e){
			//debugger;
			var currZoom = map.getZoom();
		    var diff = prevZoom - currZoom;
		    if(diff > 0){
		  	   console.log('zoomed out');
		    } else if(diff < 0) {
		  	   console.log('zoomed in');
		    } else {
		  	   console.log('no change');
		    }
		    prevZoom = currZoom;
		});
		*/

		//markers3.on("clusterclick", a => a.layer.spiderfy());
		
		/*
		markers3.on("clusterclick", function(a) {
			a.layer.unspiderfy();
			setTimeout(function(){
				a.layer.spiderfy();
			}, 1000);
		} );
		*/
	

		// zoom the map to the polygon
		//map.fitBounds(markers.getBounds());

	});
</script>
</html>