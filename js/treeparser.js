class TreeParser {
	jsonUrl;
	constructor(jsonUrl){
		this.jsonUrl = jsonUrl;
		this.render();
	}
	render() {
	   $.getJSON(this.jsonUrl, function(jd) {
	   		
	   		for (var i = 0; i < jd.length; ++i) {
		   		var a = jd[i];
				var description = "<dl>"
									+ "<dt>Tipi i drurit</dt>"
									+ "<dd>" + a["Lloji"] + "</dd>"
									+ "<dt>Lartësia</dt>"
									+ "<dd>" + a["Lartesi"] + "</dd>"
									+ "<dt>Gjendja</dt>"
									+ "<dd>" + a["Gjendja"] + "</dd>"
									+ "<dt>Koordinatat</dt>"
									+ "<dd>" + a["KordinataY"] + " " + a["KordinataX"] + "</dd>"
								+ "</dl>";
				var marker = new PruneCluster.Marker(a["KordinataY"], a["KordinataX"], {popup: description});
				if(a["Lloji"] == "Gjethërënës") {
					if(a["Lartësi"] == "I lartë (> 3m)")
						marker.data.icon = gjetherenesLarteIcon;
					else if(a["Lartesi"] == "I mesëm (1 - 3m)")
						marker.data.icon = gjetherenesMesemIcon;
					else if(a["Lartesi"] == "I ulët (< 1m)")
						marker.data.icon = gjetherenesUletIcon;
					else
						marker.data.icon = gjetherenesMesemIcon;
				} else if(a["Lloji"] == "Gjethëmbajtës") {
					if(a["Lartesi"] == "I lartë (> 3m)")
						marker.data.icon = gjethembajtesLarteIcon;
					else if(a["Lartesi"] == "I mesëm (1 - 3m)")
						marker.data.icon = gjethembajtesMesemIcon;
					else if(a["Lartesi"] == "I ulët (< 1m)")
						marker.data.icon = gjethembajtesUletIcon;
					else
						marker.data.icon = gjethembajtesMesemIcon;
				}
				else
					marker.data.icon = gjetherenesMesemIcon;
			    publicMarkers.push(marker);
    			leafletView5.RegisterMarker(marker);
			}
			setTimeout(function(){
			}, 0);
			map.addLayer(leafletView5);
	   });

	}
}