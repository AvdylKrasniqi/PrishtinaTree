var $_GET = {};
$_GET['radius'] = 160;
var gjetherenesLarteIcon
var gjetherenesMesemIcon
var gjetherenesUletIcon
var gjethembajtesLarteIcon
var gjethembajtesMesemIcon
var gjethembajtesUletIcon
var publicMarkers = [];
var x;



$("document").ready(function() {

	$("#mapid").css("height",  "calc(100vh - " + $("nav").outerHeight() + "px)")

	map = L.map('mapid', {minZoom: 13, maxZoom: 20}).setView([42.667542, 21.166191], 14);


	gjetherenesLarteIcon = {color: '#4e753e', fillColor: '#4e753e', fillOpacity: 0.5, radius: 1.5 }
	gjetherenesMesemIcon = {color: '#7e9c3b', fillColor: '#7e9c3b', fillOpacity: 0.4, radius: 1.5 }
	gjetherenesUletIcon = {color: '#c0ae28', fillColor: '#c0ae28', fillOpacity: 0.3, radius: 1 }
	gjethembajtesLarteIcon = {color: '#674835', fillColor: '#674835', fillOpacity: 0.5, radius: 2 }
	gjethembajtesMesemIcon = {color: '#62653a', fillColor: '#62653a', fillOpacity: 0.4, radius: 1.5 }
	gjethembajtesUletIcon = {color: '#714220', fillColor: '#714220', fillOpacity: 0.3, radius: 1 }

	//
	// gjetherenesLarteIcon = L.divIcon({
	// 	html: '<svg height="10" width="10"><circle cx="5" cy="5" r="4" stroke="#4e753e" stroke-width="1" fill="#4e753e99"/></svg>',
	// 	iconSize: [10, 10],
	// 	className: 'gjetherenesLarteIcon'
	// });


	var gl = L.mapboxGL({
		attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">© MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">© OpenStreetMap contributors</a>',
		accessToken: 'not-needed',
		style: 'https://api.maptiler.com/maps/positron/style.json?key=SUSH2C7iOeiRtPMHq2pu'
	  }).addTo(map);



	southWest = L.latLng(42.608370, 21.114769),
	northEast = L.latLng(42.709740, 21.235619);
	bounds = L.latLngBounds(southWest, northEast);

	map.setMaxBounds(bounds);
	map.on('drag', function() {
		map.panInsideBounds(bounds, { animate: false });
	});




	var onPolyClick = function(event){
		map.fitBounds(event.target.getBounds())
		//new TreeParser("./assets/datas/trees/ulpiana1_drunjet.json");
	};

	//ulpiana_polygon.on('click', onPolyClick);

	L.control.scale().addTo(map);


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
		prevZoom = currZoom;
	});
	new TreeParser("./assets/datas/trees/aktash1_drunjet.json");
	new TreeParser("./assets/datas/trees/aktash2_drunjet.json");
	new TreeParser("./assets/datas/trees/breguidiellit1_drunjet.json");
	new TreeParser("./assets/datas/trees/kampusi1_drunjet.json");
	new TreeParser("./assets/datas/trees/kampusi2_drunjet.json");
	new TreeParser("./assets/datas/trees/kampusi3_drunjet.json");
	new TreeParser("./assets/datas/trees/mahallamuhaxhereve1_drunjet.json");
	new TreeParser("./assets/datas/trees/pejton1_drunjet.json");
	new TreeParser("./assets/datas/trees/pejton2_drunjet.json");
	new TreeParser("./assets/datas/trees/qendra1_drunjet.json");
	new TreeParser("./assets/datas/trees/qendra2_drunjet.json");
	new TreeParser("./assets/datas/trees/qendra3_drunjet.json");
	new TreeParser("./assets/datas/trees/qendra4_drunjet.json");
	new TreeParser("./assets/datas/trees/qendra5_drunjet.json");
	new TreeParser("./assets/datas/trees/qendra6_drunjet.json");
	new TreeParser("./assets/datas/trees/qendra7_drunjet.json");
	new TreeParser("./assets/datas/trees/ulpiana1_drunjet.json");
});