var gjetherenesLarteIcon
var gjetherenesMesemIcon
var gjetherenesUletIcon
var gjethembajtesLarteIcon
var gjethembajtesMesemIcon
var gjethembajtesUletIcon
var uleseIcon
var ndricimIcon
var mbeturinaIcon
var x;
var TreeParsers = [];
var PolygonParsers = [];
var onPolyClick;
var currentLocation;
var updateDesc;
var toggleDesc = false;
var hideTypeOfTrees, showTypeOfTrees, toggleTypeOfTrees, hideTypeOfMobiliari, showTypeOfMobiliari, toggleTypeOfMobiliari;
var numriBanoreve = 208230;
var totalNumriPemveNePr = 0;

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
	$("#newElementLatitude").val(position.coords.latitude);
	$("#newElementLongitude").val(position.coords.longitude);
}


$("#treeLatitude").on("keyup", function(){
	currentLocation.setLatLng([$("#treeLatitude").val(), $("#treeLongitude").val()]);
})
$("#treeLongitude").on("keyup", function(){
	currentLocation.setLatLng([$("#treeLatitude").val(), $("#treeLongitude").val()]);
})
$("#mobLatitude").on("keyup", function(){
	currentLocation.setLatLng([$("#mobLatitude").val(), $("#mobLongitude").val()]);
})
$("#mobLongitude").on("keyup", function(){
	currentLocation.setLatLng([$("#mobLatitude").val(), $("#mobLongitude").val()]);
})

$("document").ready(function() {

	$("#mapid").css("height", "calc(100vh - " + $("nav").outerHeight() + "px)")

	map = L.map('mapid', {minZoom: 13, maxZoom: 20}).setView([42.667542, 21.166191], 14);

	updateDesc = function () {
		if (map.getZoom() < 17) {
			if(toggleDesc)
				return;
			toggleDesc = true;
			$(".DPKB").show();
			$(".NDNL").hide();
			//prishtina
			$("#emriLagjes").text("Prishtina");
			$("#totalDrunje").text(function(){
				let sum = 0;
				for (let polygon of PolygonParsers) {
					sum += polygon.numriPemve();
				}
				totalNumriPemveNePr = sum;
				$("#reduktimiCO2PerVit").text(sum*14.5);
				$("#drunjePerKokeBanori").text((sum/numriBanoreve).toFixed(2));
				$("#30drunjePerKokeBanori").text((100*sum/(30*numriBanoreve)).toFixed(2));
				return sum;
			});
			$("#totalMobilari").text(function(){
				let sum = 0;
				for(let polygon of PolygonParsers){
					try {
					sum += polygon.numriMobiliari();
					}
					catch (e) {
						//console.log(e);
					}
				}
				return sum;
			});

			$("#totalDrunjeGjethrenes").text(function(){
				let sum = 0;
				for(let polygon of PolygonParsers){
					try {
						sum += polygon.numriPemveByTypeSize("gjetherenes","")
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
						sum += polygon.numriPemveByTypeSize("gjetherenes","larte")
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
						sum += polygon.numriPemveByTypeSize("gjetherenes","mesem")
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
						sum += polygon.numriPemveByTypeSize("gjetherenes","ulet")
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
						sum += polygon.numriPemveByTypeSize("gjethembajtes", "")
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
					sum += polygon.numriPemveByTypeSize("gjethembajtes","larte")

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
					sum += polygon.numriPemveByTypeSize("gjethembajtes","mesem")

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
					sum += polygon.numriPemveByTypeSize("gjethembajtes","ulet")
					}
					catch (e) {
						//console.log(e);
					}
				}
				return sum;
			});

			$("#nrUlese").text(function(){
				let sum = 0;
				for(let polygon of PolygonParsers){
					try {
					sum += polygon.numriMobiliariByType("ulese");
					}
					catch (e) {
						//console.log(e);
					}
				}
				return sum;
			});
			$("#nrNdricim").text(function(){
				let sum = 0;
				for(let polygon of PolygonParsers){
					try {
					sum += polygon.numriMobiliariByType("ndricim");
					}
					catch (e) {
						//console.log(e);
					}
				}
				return sum;
			});
			$("#nrMbeturina").text(function(){
				let sum = 0;
				for(let polygon of PolygonParsers){
					try {
					sum += polygon.numriMobiliariByType("mbeturina");
					}
					catch (e) {
						//console.log(e);
					}
				}
				return sum;
			});
			$("#mobGjendjeEMire").text(function(){
				let sum = 0;
				for(let polygon of PolygonParsers){
					try {
					sum += polygon.mobiliariGjendjeEMire();
					}
					catch (e) {
						//console.log(e);
					}
				}
				return sum;
			});
			$("#mobGjendjeJoEMire").text(function(){
				let sum = 0;
				for(let polygon of PolygonParsers){
					try {
					sum += polygon.mobiliariGjendjeJoEMire();
					}
					catch (e) {
						//console.log(e);
					}
				}
				return sum;
			});

		}
		else {
			toggleDesc = false;

			$(".DPKB").hide();
			$(".NDNL").show();
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

	uleseIcon = {color: '#e24d21', fillColor: '#e24d21', fillOpacity: 0.5, radius: 1}
	ndricimIcon = {color: '#4090a8', fillColor: '#4090a8', fillOpacity: 0.5, radius: 1}
	mbeturinaIcon = {color: '#624785', fillColor: '#624785', fillOpacity: 0.5, radius: 1}

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
		//new TreeParser("./wp-includes/prishtinatrees/assets/datas/trees/ulpiana1_drunjet.json");
	};


	//ulpiana_polygon.on('click', onPolyClick);

	L.control.scale().addTo(map);

	var prevZoom = map.getZoom();
	map.on('zoomend', function (e) {
		var currZoom = map.getZoom();
		if (currZoom >= 17) {

			for (let i = 0; i < PolygonParsers.length; i++) {
				PolygonParsers[i].hide();
				try {
					PolygonParsers[i].showPemet();
					PolygonParsers[i].showMobiliari();
				} catch (e) {
					//console.log(e);
				}
			}
		} else {
			for (let i = 0; i < PolygonParsers.length; i++) {
				PolygonParsers[i].show();
				try {
					PolygonParsers[i].hidePemet();
					PolygonParsers[i].hideMobiliari();
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
		updateDesc();
	});

	currentLocation = new L.marker([42.667542, 21.166191], {
		draggable: true
	});

	currentLocation.bindPopup('Zhvendosni pikën');
	currentLocation.on("drag", function (e) {
		let position = e.target.getLatLng();
		$("#treeLatitude").val(position.lat);
		$("#mobLatitude").val(position.lat);
		$("#treeLongitude").val(position.lng);
		$("#mobLongitude").val(position.lng);
	});
	currentLocation.on("move", function (e) {
		let position = e.target.getLatLng();
		$("#treeLatitude").val(position.lat);
		$("#mobLatitude").val(position.lat);
		$("#treeLongitude").val(position.lng);
		$("#mobLongitude").val(position.lng);
	});


	map.on('dragend', function (e) {
		updateDesc();
	});


	PolygonParsers.push(
		new PolygonParser(
			"./wp-includes/prishtinatrees/assets/datas/kufijte.json",
			"ulpiana",
			[
				"./wp-includes/prishtinatrees/assets/datas/trees/ulpiana1_drunjet.json"
			],
			[
				"./wp-includes/prishtinatrees/assets/datas/mobiliari/ulpiana1_mobiliari.json"
			]
		)
	);
	PolygonParsers.push(
		new PolygonParser(
			"./wp-includes/prishtinatrees/assets/datas/kufijte.json",
			"dardania",
			[],
			[]
		)
	);

	PolygonParsers.push(
		new PolygonParser(
			"./wp-includes/prishtinatrees/assets/datas/kufijte.json",
			"aktash",
			[
				"./wp-includes/prishtinatrees/assets/datas/trees/aktash1_drunjet.json",
				"./wp-includes/prishtinatrees/assets/datas/trees/aktash2_drunjet.json"
			],
			[
				"./wp-includes/prishtinatrees/assets/datas/mobiliari/aktash1_mobiliari.json",
				"./wp-includes/prishtinatrees/assets/datas/mobiliari/aktash2_mobiliari.json"
			]
		)
	);

	PolygonParsers.push(
		new PolygonParser(
			"./wp-includes/prishtinatrees/assets/datas/kufijte.json",
			"kampusi",
			[
				"./wp-includes/prishtinatrees/assets/datas/trees/kampusi1_drunjet.json",
				"./wp-includes/prishtinatrees/assets/datas/trees/kampusi2_drunjet.json",
				"./wp-includes/prishtinatrees/assets/datas/trees/kampusi3_drunjet.json"
			],
			[
				"./wp-includes/prishtinatrees/assets/datas/mobiliari/kampusi1_mobiliari.json",
				"./wp-includes/prishtinatrees/assets/datas/mobiliari/kampusi2_mobiliari.json"
			]
		)
	);
	PolygonParsers.push(
		new PolygonParser(
			"./wp-includes/prishtinatrees/assets/datas/kufijte.json",
			"qendra",
			[
				"./wp-includes/prishtinatrees/assets/datas/trees/qendra1_drunjet.json",
				"./wp-includes/prishtinatrees/assets/datas/trees/qendra2_drunjet.json",
				"./wp-includes/prishtinatrees/assets/datas/trees/qendra3_drunjet.json",
				"./wp-includes/prishtinatrees/assets/datas/trees/qendra4_drunjet.json",
				"./wp-includes/prishtinatrees/assets/datas/trees/qendra5_drunjet.json",
				"./wp-includes/prishtinatrees/assets/datas/trees/qendra6_drunjet.json",
				"./wp-includes/prishtinatrees/assets/datas/trees/qendra7_drunjet.json"
			],
			[
				"./wp-includes/prishtinatrees/assets/datas/mobiliari/qendra1_mobiliari.json",
				"./wp-includes/prishtinatrees/assets/datas/mobiliari/qendra2_mobiliari.json",
				"./wp-includes/prishtinatrees/assets/datas/mobiliari/qendra3_mobiliari.json",
				"./wp-includes/prishtinatrees/assets/datas/mobiliari/qendra4_mobiliari.json",
				"./wp-includes/prishtinatrees/assets/datas/mobiliari/qendra5_mobiliari.json",
				"./wp-includes/prishtinatrees/assets/datas/mobiliari/qendra6_mobiliari.json",
				"./wp-includes/prishtinatrees/assets/datas/mobiliari/qendra7_mobiliari.json"
			]
		)
	);

	PolygonParsers.push(
		new PolygonParser(
			"./wp-includes/prishtinatrees/assets/datas/kufijte.json",
			"bregu i diellit",
			[
				"./wp-includes/prishtinatrees/assets/datas/trees/breguidiellit1_drunjet.json"
			],
			[
				"./wp-includes/prishtinatrees/assets/datas/mobiliari/breguidiellit1_mobiliari.json"
			]
		)
	);


	PolygonParsers.push(
		new PolygonParser(
			"./wp-includes/prishtinatrees/assets/datas/kufijte.json",
			"pejton",
			[
				"./wp-includes/prishtinatrees/assets/datas/trees/pejton1_drunjet.json",
				"./wp-includes/prishtinatrees/assets/datas/trees/pejton2_drunjet.json"
			],
			[
				"./wp-includes/prishtinatrees/assets/datas/mobiliari/pejton1_mobiliari.json",
				"./wp-includes/prishtinatrees/assets/datas/mobiliari/pejton2_mobiliari.json"
			]
		)
	);


	PolygonParsers.push(
		new PolygonParser(
			"./wp-includes/prishtinatrees/assets/datas/kufijte.json",
			"mahalla e muhaxhereve",
			[
				"./wp-includes/prishtinatrees/assets/datas/trees/mahallamuhaxhereve1_drunjet.json"
			],
			[
				"./wp-includes/prishtinatrees/assets/datas/mobiliari/mahallamuhaxhereve1_mobiliari.json"
			]
		)
	);

	hideTypeOfTrees = function(type, height){
	    for(let i = 0; i < PolygonParsers.length; i++){
	        PolygonParsers[i].hideTypeOfTrees(type, height);
        }
    }
    showTypeOfTrees  = function(type, height){
	    for(let i = 0; i < PolygonParsers.length; i++){
	        PolygonParsers[i].showTypeOfTrees(type, height);
        }
    }

    toggleTypeOfTrees = function(btn, type, height){
	    if($(btn).attr("data-display") === "true"){
            $(btn).addClass('bg-light').attr("data-display", "false");
            hideTypeOfTrees(type, height);
        }
	    else {
            $(btn).removeClass('bg-light').attr("data-display", "true");
            showTypeOfTrees(type, height);
        }
    }

    hideTypeOfMobiliari = function(type){
	    for(let i = 0; i < PolygonParsers.length; i++){
	        PolygonParsers[i].hideTypeOfMobiliari(type);
        }
    }
    showTypeOfMobiliari  = function(type){
	    for(let i = 0; i < PolygonParsers.length; i++){
	        PolygonParsers[i].showTypeOfMobiliari(type);
        }
    }

    toggleTypeOfMobiliari = function(btn, type){
	    if($(btn).attr("data-display") === "true"){
            $(btn).addClass('bg-light').attr("data-display", "false");
            hideTypeOfMobiliari(type);
        }
	    else {
            $(btn).removeClass('bg-light').attr("data-display", "true");
            showTypeOfMobiliari(type);
        }
    }


	setTimeout(function(){
		updateDesc();
	}, 5000);

});
