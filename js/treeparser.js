class TreeParser {
	jsonUrl;
	layer;
	constructor(jsonUrl){
		this.jsonUrl = jsonUrl;
		this.layer;
		this.render();
	}

	get layer(){
		return this.layer;
	}
	set layer(layer){
		this.layer = layer;
	}

	render() {
		var _this = this;

		var markers = [];

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
				if(a["Lloji"] === "Gjethërënës") {
					if(a["Lartesi"] === "I lartë (> 3m)")
						myIcon = gjetherenesLarteIcon;
					else if(a["Lartesi"] === "I mesëm (1 - 3m)")
						myIcon = gjetherenesMesemIcon;
					else if(a["Lartesi"] === "I ulët (< 1m)")
						myIcon = gjetherenesUletIcon;
					else
						myIcon = gjetherenesMesemIcon;
				} else if(a["Lloji"] === "Gjethëmbajtës") {
					if(a["Lartesi"] === "I lartë (> 3m)")
						myIcon = gjethembajtesLarteIcon;
					else if(a["Lartesi"] === "I mesëm (1 - 3m)")
						myIcon = gjethembajtesMesemIcon;
					else if(a["Lartesi"] === "I ulët (< 1m)")
						myIcon = gjethembajtesUletIcon;
					else
						myIcon = gjethembajtesMesemIcon;
				}
				else
					myIcon = gjetherenesMesemIcon;
				markers.push(L.circle([a["KordinataY"], a["KordinataX"]], myIcon).bindPopup(description));
			}

			setTimeout(function(){
			}, 0);
			//console.log(this.layer);
			_this.layer =  L.layerGroup(markers);
			map.addLayer(_this.layer);
	   });

	}
}