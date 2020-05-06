class TreeParser {
	jsonUrl;
	layer;
	layerGjetherenes = [];
	layerGjethembajtes = [];
	/*
	0 = larte
	1 = mesem
	2 = ulet
	*/
	totalNumberOfTrees;
	constructor(jsonUrl){
		this.jsonUrl = jsonUrl;
		this.render();
	}
	get totalNumberOfTrees(){
		return this.totalNumberOfTrees;
	}
	show(){
		map.addLayer(this.layerGjetherenes[0]);
		map.addLayer(this.layerGjetherenes[1]);
		map.addLayer(this.layerGjetherenes[2]);
		map.addLayer(this.layerGjethembajtes[0]);
		map.addLayer(this.layerGjethembajtes[1]);
		map.addLayer(this.layerGjethembajtes[2]);
	}

	hide(){
		map.removeLayer(this.layerGjetherenes[0]);
		map.removeLayer(this.layerGjetherenes[1]);
		map.removeLayer(this.layerGjetherenes[2]);
		map.removeLayer(this.layerGjethembajtes[0]);
		map.removeLayer(this.layerGjethembajtes[1]);
		map.removeLayer(this.layerGjethembajtes[2]);
	}

	render() {
		var _this = this;

		var markers = [[[],[],[]],[[],[],[]]];

	   $.getJSON(this.jsonUrl, function(jd) {
	   		_this.totalNumberOfTrees = jd.length;
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
					if(a["Lartesi"] === "I lartë (> 3m)"){
						myIcon = gjetherenesLarteIcon;
						markers[0][0].push(L.circle([a["KordinataY"], a["KordinataX"]],myIcon).bindPopup(description));
						// markers.push(L.circl)
					}
					else if(a["Lartesi"] === "I mesëm (1 - 3m)"){
						myIcon = gjetherenesMesemIcon;
						markers[0][1].push(L.circle([a["KordinataY"], a["KordinataX"]],myIcon).bindPopup(description));
						// markers.push(L.circl)
					}
					else if(a["Lartesi"] === "I ulët (< 1m)"){
						myIcon = gjetherenesUletIcon;
						markers[0][2].push(L.circle([a["KordinataY"], a["KordinataX"]],myIcon).bindPopup(description));
						// markers.push(L.circl)
					}
					else{
						myIcon = gjetherenesMesemIcon;
						markers[0][1].push(L.circle([a["KordinataY"], a["KordinataX"]],myIcon).bindPopup(description));
						// markers.push(L.circl)
					}
				}
				// else if(a["Lloji"] === "Gjethëmbajtës")
				else
				{
					if(a["Lartesi"] === "I lartë (> 3m)"){
						myIcon = gjethembajtesLarteIcon;
						markers[1][0].push(L.circle([a["KordinataY"], a["KordinataX"]],myIcon).bindPopup(description));
					}
					else if(a["Lartesi"] === "I mesëm (1 - 3m)"){
						myIcon = gjethembajtesMesemIcon;
						markers[1][1].push(L.circle([a["KordinataY"], a["KordinataX"]],myIcon).bindPopup(description));
					}
					else if(a["Lartesi"] === "I ulët (< 1m)"){
						myIcon = gjethembajtesUletIcon;
						markers[1][2].push(L.circle([a["KordinataY"], a["KordinataX"]],myIcon).bindPopup(description));
					}
					else{
						myIcon = gjethembajtesMesemIcon;
						markers[1][2].push(L.circle([a["KordinataY"], a["KordinataX"]],myIcon).bindPopup(description));
					}
				}
			}

			setTimeout(function(){
			}, 0);
			//console.log(this.layer);
			// _this.layer =  L.layerGroup(markers);
			_this.layerGjetherenes[0] = L.layerGroup(markers[0][0]);
			_this.layerGjetherenes[1] = L.layerGroup(markers[0][1]);
			_this.layerGjetherenes[2] = L.layerGroup(markers[0][2]);
			_this.layerGjethembajtes[0] = L.layerGroup(markers[1][0]);
			_this.layerGjethembajtes[1] = L.layerGroup(markers[1][1]);
			_this.layerGjethembajtes[2] = L.layerGroup(markers[1][2]);

			// _this.show();
			// map.addLayer(_this.layer);
	   });

	}
}