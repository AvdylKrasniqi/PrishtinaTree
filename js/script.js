var $_GET = {};
$_GET['radius'] = 160;
var gjetherenesLarteIcon
var gjetherenesMesemIcon
var gjetherenesUletIcon
var gjethembajtesLarteIcon
var gjethembajtesMesemIcon
var gjethembajtesUletIcon
var publicMarkers = [];
var leafletView = new PruneClusterForLeaflet(parseInt($_GET['radius']));
var leafletView5 = new PruneClusterForLeaflet(parseInt($_GET['radius']));
var x;
//map.removeLayer(leafletView);
if(document.location.toString().indexOf('?') !== -1) {
    var query = document.location
                   .toString()
                   // get the query string
                   .replace(/^.*?\?/, '')
                   // and remove any existing hash string (thanks, @vrijdenker)
                   .replace(/#.*$/, '')
                   .split('&');

    for(var i=0, l=query.length; i<l; i++) {
       var aux = decodeURIComponent(query[i]).split('=');
       $_GET[aux[0]] = aux[1];
    }
}
	


$('#toggleDrunjet').change(function() {
	if($(this).prop('checked')){
		//map.addLayer(markers3);
		//map.addLayer(markers6);
	}
	else{
		//map.removeLayer(markers3);
		//map.removeLayer(markers6);
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

gjetherenesLarteIcon = L.divIcon({
	html: '<svg height="10" width="10"><circle cx="5" cy="5" r="4" stroke="#4e753e" stroke-width="1" fill="#4e753e99"/></svg>',
	iconSize: [10, 10],
	className: 'gjetherenesLarteIcon'
});

gjetherenesMesemIcon = L.divIcon({
	html: '<svg height="10" width="10"><circle cx="5" cy="5" r="4" stroke="#7e9c3b" stroke-width="1" fill="#7e9c3b99"/></svg>',
	iconSize: [10, 10],
	className: 'gjetherenesMesemIcon'
});


gjetherenesUletIcon = L.divIcon({
	html: '<svg height="10" width="10"><circle cx="5" cy="5" r="4" stroke="#c0ae28" stroke-width="1" fill="#c0ae2899"/></svg>',
	iconSize: [10, 10],
	className: 'gjetherenesUletIcon'
});

gjethembajtesLarteIcon = L.divIcon({
	html: '<svg height="10" width="10"><circle cx="5" cy="5" r="4" stroke="#674835" stroke-width="1" fill="#67483599"/></svg>',
	iconSize: [10, 10],
	className: 'gjethembajtesLarteIcon'
});


gjethembajtesMesemIcon = L.divIcon({
	html: '<svg height="10" width="10"><circle cx="5" cy="5" r="4" stroke="#62653a" stroke-width="1" fill="#62653a99"/></svg>',
	iconSize: [10, 10],
	className: 'gjethembajtesMesemIcon'
});


gjethembajtesUletIcon = L.divIcon({
	html: '<svg height="10" width="10"><circle cx="5" cy="5" r="4" stroke="#714220" stroke-width="1" fill="#71422099"/></svg>',
	iconSize: [10, 10],
	className: 'gjethembajtesUletIcon'
});



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


var lastUpdate = 0;
var currentSizeSpan = document.getElementById('currentSize');

var updateSize = function () {
	leafletView5.Cluster.Size = parseFloat(this.value);
	currentSizeSpan.firstChild.data = this.value;

    var now = +new Date();
    if ((now - lastUpdate) < 400) {
    	return;
    }
	leafletView5.ProcessView();
	lastUpdate = now;
};
document.getElementById('sizeInput').onchange = updateSize; 
//document.getElementById('sizeInput').oninput = updateSize; 
dardania = [[42.646496, 21.155415],[42.647274, 21.156808],[42.647491, 21.157477],[42.655514, 21.159591],[42.655702, 21.158578], [42.655704, 21.158024], [42.653091, 21.148391], [42.652853, 21.148482], [42.652577, 21.147757], [42.652215, 21.147459], [42.651886, 21.147427], [42.651689, 21.147556], [42.651579, 21.147395], [42.649494, 21.151600], [42.648318, 21.153617], [42.647647, 21.154464], [42.647079, 21.154990]];

ulpiana = [[42.647465, 21.157504], [42.647181, 21.159500], [42.647148, 21.160618], [42.647320, 21.161556], [42.647480, 21.162052],[42.647858, 21.162765],[42.648727, 21.163649],[42.650233, 21.164821], [42.654022, 21.167615], [42.654216, 21.167527], [42.654544, 21.166813], [42.655544, 21.159613]];

breguIDiellit = [[42.647799, 21.162972], [42.654045, 21.167717], [42.654727, 21.168370], [42.655305, 21.170034], [42.655503, 21.170448], [42.656142, 21.171409], [42.655823, 21.173269], [42.655881, 21.175207], [42.655826, 21.176858], [42.655412, 21.178184], [42.652379, 21.175520], [42.650687, 21.174465], [42.648804, 21.172424], [42.646718, 21.170884], [42.646031, 21.169812], [42.645509, 21.169431]];



dardania_polygon = L.polygon(dardania, {color: 'green'}).addTo(map);
/*

ulpiana_polygon = L.polygon(ulpiana, {color: 'green'}).bindTooltip("Ulpiana",
	{permanent: false, direction:"center"}
).openTooltip().addTo(map);
*/

breguIDiellit_polygon = L.polygon(breguIDiellit, {color: 'green'}).addTo(map);


var onPolyClick = function(event){
	map.fitBounds(event.target.getBounds())
	new TreeParser("./assets/datas/trees/ulpiana1_drunjet.json");
};
	ulpiana_polygon.on('click', onPolyClick);

L.control.scale().addTo(map);
/*
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
*/


/*L.marker([42.667542, 21.166191],{ icon:  faTree}).addTo(map)
	.bindPopup('A pretty CSS3 popup.<br> Easily customizable.')
	//.openPopup();
*/
//polygoni
/*
*/

    
    /*
    var a = pejtoni[i];
	//qetu mujm me bo me type.
	if(a[0] == "Gjethërënës") {
		if(a[1] == "I lartë (> 3m)")
			var marker = new PruneCluster.Marker(a[3], a[4]);
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

    */



/*
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
	//marker.addTo(map);
	markers6.addLayer(marker);
}
//map.addLayer(markers6);

*/

/*
markers3.on("clusterclick", function(a) {
	a.layer.unspiderfy();
	setTimeout(function(){
		a.layer.spiderfy();
	}, 1000);
} );
*/

/*
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