var gjetherenesLarteIcon
var gjetherenesMesemIcon
var gjetherenesUletIcon
var gjethembajtesLarteIcon
var gjethembajtesMesemIcon
var gjethembajtesUletIcon
var x;
var TreeParsers = [];
var PolygonParsers = [];
var onPolyClick;
var currentLocation;
var updateDesc;
$("document").ready(function() {

	$("#mapid").css("height", "calc(100vh - " + $("nav").outerHeight() + "px)")

	map = L.map('mapid', {minZoom: 13, maxZoom: 20}).setView([42.667542, 21.166191], 14);

	updateDesc = function () {
		if (map.getZoom() < 17) {
			//prishtina
			$("#emriLagjes").text("Prishtina");
			$("#totalDrunje").text(function(){
				let sum = 0;
				for (let polygon of PolygonParsers) {
					sum += polygon.numriPemve();
				}
				return sum;
			});

			$("#totalDrunjeGjethrenes").text(function(){
				let sum = 0;
				for(let polygon of PolygonParsers){
					try {
						sum += polygon.pemet[0].numberOfTrees("gjetherenes","")
					}
					catch(e){
						//console.log(e);
					}
				}
				return sum;
			});
			$("#gjrLarte").text(function(){
				let sum = 0;
				for(let polygon of PolygonParsers){
					try {
						sum += polygon.pemet[0].numberOfTrees("gjetherenes","larte")
					}
					catch (e) {
						//console.log(e);
					}
				}
				return sum;
			});
			$("#gjrMesem").text(function(){
				let sum = 0;
				for(let polygon of PolygonParsers){
					try {
						sum += polygon.pemet[0].numberOfTrees("gjetherenes","mesem")
					}
					catch (e) {
						//console.log(e);
					}
				}
				return sum;
			});
			$("#gjrUlet").text(function(){
				let sum = 0;
				for(let polygon of PolygonParsers){
					try {
						sum += polygon.pemet[0].numberOfTrees("gjetherenes","ulet")
					}
					catch (e) {
						//console.log(e);
					}
				}
				return sum;
			});

			$("#totalDrunjeGjethmbajtes").text(function(){
				let sum = 0;
				for(let polygon of PolygonParsers){
					try {
						sum += polygon.pemet[0].numberOfTrees("gjethembajtes", "")
					}
					catch (e) {
						//console.log(e);
					}
				}
				return sum;
			});
			$("#gjmLarte").text(function(){
				let sum = 0;
				for(let polygon of PolygonParsers){
					try {
					sum += polygon.pemet[0].numberOfTrees("gjethembajtes","larte")

					}
					catch (e) {
						//console.log(e);
					}
				}
				return sum;
			});
			$("#gjmMesem").text(function(){
				let sum = 0;
				for(let polygon of PolygonParsers){
					try {
					sum += polygon.pemet[0].numberOfTrees("gjethembajtes","mesem")

					}
					catch (e) {
						//console.log(e);
					}
				}
				return sum;
			});
			$("#gjmUlet").text(function(){
				let sum = 0;
				for(let polygon of PolygonParsers){
					try {
					sum += polygon.pemet[0].numberOfTrees("gjethembajtes","ulet")
					}
					catch (e) {
						//console.log(e);
					}
				}
				return sum;
			});


		} else {
			for (let polygon of PolygonParsers) {
				if (polygon.hasPoint(map.getCenter().lat, map.getCenter().lng)) {
					polygon.updateDesc();
				}
			}
		}
	}

	gjetherenesLarteIcon = {color: '#4e753e', fillColor: '#4e753e', fillOpacity: 0.5, radius: 1.5}
	gjetherenesMesemIcon = {color: '#7e9c3b', fillColor: '#7e9c3b', fillOpacity: 0.4, radius: 1.5}
	gjetherenesUletIcon = {color: '#c0ae28', fillColor: '#c0ae28', fillOpacity: 0.3, radius: 1}
	gjethembajtesLarteIcon = {color: '#674835', fillColor: '#674835', fillOpacity: 0.5, radius: 2}
	gjethembajtesMesemIcon = {color: '#62653a', fillColor: '#62653a', fillOpacity: 0.4, radius: 1.5}
	gjethembajtesUletIcon = {color: '#714220', fillColor: '#714220', fillOpacity: 0.3, radius: 1}

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
	map.on('drag', function () {
		map.panInsideBounds(bounds, {animate: false});
	});

	onPolyClick = function (event) {
		map.fitBounds(event.target.getBounds())
		map.flyTo(event.target.getBounds().getCenter(), 17);
		//new TreeParser("./assets/datas/trees/ulpiana1_drunjet.json");
	};

	//ulpiana_polygon.on('click', onPolyClick);

	L.control.scale().addTo(map);

	var prevZoom = map.getZoom();
	map.on('zoomend', function (e) {
		//debugger;

	updateDesc();
		var currZoom = map.getZoom();
		if (currZoom >= 17) {
			for (let i = 0; i < PolygonParsers.length; i++) {
				PolygonParsers[i].hide();
				try {
					PolygonParsers[i].showPemet();
				} catch (e) {
					//console.log(e);
				}
			}
		} else {
			for (let i = 0; i < PolygonParsers.length; i++) {
				PolygonParsers[i].show();
				try {
					PolygonParsers[i].hidePemet();
				} catch (e) {
					//console.log(e);
				}
			}
		}

		var diff = prevZoom - currZoom;

		if (diff > 0) {
			console.log('zoomed out');
		} else if (diff < 0) {
			console.log('zoomed in');
		} else {
			console.log('no change');
		}
		prevZoom = currZoom;
	});

	currentLocation = new L.marker([42.667542, 21.166191], {
		draggable: true
	}).addTo(map);

	currentLocation.on("drag", function (e) {
		let _temp = e.target;
		let position = _temp.getLatLng();
		console.log(position.lat, position.lng)
	});


	map.on('dragend', function (e) {
		updateDesc();
	});


	PolygonParsers.push(
		new PolygonParser(
			"./assets/datas/kufijte.json",
			"ulpiana",
			[
				"./assets/datas/trees/ulpiana1_drunjet.json"
			]
		)
	);
	PolygonParsers.push(
		new PolygonParser(
			"./assets/datas/kufijte.json",
			"dardania",
			[]
		)
	);

	PolygonParsers.push(
		new PolygonParser(
			"./assets/datas/kufijte.json",
			"aktash",
			[
				"./assets/datas/trees/aktash1_drunjet.json",
				"./assets/datas/trees/aktash2_drunjet.json"
			]
		)
	);

	PolygonParsers.push(
		new PolygonParser(
			"./assets/datas/kufijte.json",
			"kampusi",
			[
				"./assets/datas/trees/kampusi1_drunjet.json",
				"./assets/datas/trees/kampusi2_drunjet.json",
				"./assets/datas/trees/kampusi3_drunjet.json"
			]
		)
	);
	PolygonParsers.push(
		new PolygonParser(
			"./assets/datas/kufijte.json",
			"qendra",
			[
				"./assets/datas/trees/qendra1_drunjet.json",
				"./assets/datas/trees/qendra2_drunjet.json",
				"./assets/datas/trees/qendra3_drunjet.json",
				"./assets/datas/trees/qendra4_drunjet.json",
				"./assets/datas/trees/qendra5_drunjet.json",
				"./assets/datas/trees/qendra6_drunjet.json",
				"./assets/datas/trees/qendra7_drunjet.json"
			]
		)
	);

	PolygonParsers.push(
		new PolygonParser(
			"./assets/datas/kufijte.json",
			"bregu i diellit",
			[
				"./assets/datas/trees/breguidiellit1_drunjet.json"
			]
		)
	);


	PolygonParsers.push(
		new PolygonParser(
			"./assets/datas/kufijte.json",
			"pejton",
			[
				"./assets/datas/trees/pejton1_drunjet.json",
				"./assets/datas/trees/pejton2_drunjet.json"
			]
		)
	);


	PolygonParsers.push(
		new PolygonParser(
			"./assets/datas/kufijte.json",
			"mahalla e muhaxhereve",
			[
				"./assets/datas/trees/mahallamuhaxhereve1_drunjet.json"
			]
		)
	);

	setTimeout(function(){
		updateDesc();
	}, 5000);
});