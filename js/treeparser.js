class TreeParser {
	jsonUrl;
	layer = [];
	constructor(jsonUrl){
		this.jsonUrl = jsonUrl;
		this.render();
	}
	render() {
		var _this = this;
	   $.getJSON(this.jsonUrl, function(jd) {
	   		
	   		for (var i = 0; i < jd.length; ++i) {
		   		var a = jd[i];
		   		var myIcon;
				var description = "<dl>"
									+ "<dt>Tipi i drurit</dt>"
									+ "<dd>" + a["Lloji"] + "</dd>"
									+ "<dt>Lartësia</dt>"
									+ "<dd>" + a["Lartesi"] + "</dd>"
									+ "<dt>Gjendja</dt>"
									+ "<dd>" + a["Gjendja"] + "</dd>"
									+ "<dt>Koordinatat</dt>"
									+ "<dd>" + a["KordinataY"] + ", " + a["KordinataX"] + "</dd>"
								+ "</dl>";
				// var marker = new PruneCluster.Marker(a["KordinataY"], a["KordinataX"], {popup: description});
				if(a["Lloji"] == "Gjethërënës") {
					if(a["Lartesi"] == "I lartë (> 3m)")
						myIcon = gjetherenesLarteIcon;
					else if(a["Lartesi"] == "I mesëm (1 - 3m)")
						myIcon = gjetherenesMesemIcon;
					else if(a["Lartesi"] == "I ulët (< 1m)")
						myIcon = gjetherenesUletIcon;
					else
						myIcon = gjetherenesMesemIcon;
				} else if(a["Lloji"] == "Gjethëmbajtës") {
					if(a["Lartesi"] == "I lartë (> 3m)")
						myIcon = gjethembajtesLarteIcon;
					else if(a["Lartesi"] == "I mesëm (1 - 3m)")
						myIcon = gjethembajtesMesemIcon;
					else if(a["Lartesi"] == "I ulët (< 1m)")
						myIcon = gjethembajtesUletIcon;
					else
						myIcon = gjethembajtesMesemIcon;
				}
				else
					myIcon = gjetherenesMesemIcon;
				var marker = L.circle([a["KordinataY"], a["KordinataX"]], myIcon).bindPopup(description).addTo(map);
				//_this.layer.push(L.circle([a["KordinataY"], a["KordinataX"]], myIcon).bindPopup(description));
			    //publicMarkers.push(marker);
    			// leafletView5.RegisterMarker(marker);
			}
			setTimeout(function(){
			}, 5000);
	   		//console.log(this.layer);
			map.addLayer(this.layer);
	   });


	}
}