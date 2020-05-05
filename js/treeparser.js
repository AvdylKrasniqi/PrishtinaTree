class TreeParser {
	jsonUrl;
	layer;
	constructor(jsonUrl){
		this.jsonUrl = jsonUrl;
		this.layerGjetherenes = [];
		this.layerGjethembajtes = [];
		/*
		0 = larte
		1 = mesem
		2 = ulet
		*/
		this.render();
	}


	render() {
		var _this = this;

		var markers = [
			[
				[],
				[],
				[]
			],
			[
				[],
				[],
				[]
			]
		];

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
			map.addLayer(_this.layerGjetherenes[0] = L.layerGroup(markers[0][0]));
			map.addLayer(_this.layerGjetherenes[1] = L.layerGroup(markers[0][1]));
			map.addLayer(_this.layerGjetherenes[2] = L.layerGroup(markers[0][2]));
			map.addLayer(_this.layerGjethembajtes[0] = L.layerGroup(markers[1][0]));
			map.addLayer(_this.layerGjethembajtes[1] = L.layerGroup(markers[1][1]));
			map.addLayer(_this.layerGjethembajtes[2] = L.layerGroup(markers[1][2]));
			// map.addLayer(_this.layer);
	   });

	}
}