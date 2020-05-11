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
	shouldBeShown = [[true, true, true], [true, true,true]];
	constructor(jsonUrl){
		this.jsonUrl = jsonUrl;
		this.render();
	}
	get totalNumberOfTrees(){
		return this.totalNumberOfTrees;
	}
	get layerGjethembajtes(){
		return this.layerGjetherenes;
	}
	get layerGjetherenes(){
		return this.layerGjetherenes;
	}
	numberOfTrees(type, size) {
		if (type === "gjetherenes") {
			if (size === "larte") {
				return Object.keys(this.layerGjetherenes[0]._layers).length;
			} else if (size === "mesem") {
				return Object.keys(this.layerGjetherenes[1]._layers).length;
			} else if (size === "ulet") {
				return Object.keys(this.layerGjetherenes[2]._layers).length;
			} else {
				return Object.keys(this.layerGjetherenes[0]._layers).length + Object.keys(this.layerGjetherenes[1]._layers).length + Object.keys(this.layerGjetherenes[2]._layers).length;
			}
		} else if (type === "gjethembajtes") {
			if (size === "larte") {
				return Object.keys(this.layerGjethembajtes[0]._layers).length;
			} else if (size === "mesem") {
				return Object.keys(this.layerGjethembajtes[1]._layers).length;
			} else if (size === "ulet") {
				return Object.keys(this.layerGjethembajtes[2]._layers).length;
			} else {
				return Object.keys(this.layerGjethembajtes[0]._layers).length + Object.keys(this.layerGjethembajtes[1]._layers).length + Object.keys(this.layerGjethembajtes[2]._layers).length;
			}
		}
	}
	show(){
		if(this.shouldBeShown[0][0])
			map.addLayer(this.layerGjetherenes[0]);
		if(this.shouldBeShown[0][1])
		map.addLayer(this.layerGjetherenes[1]);
		if(this.shouldBeShown[0][2])
			map.addLayer(this.layerGjetherenes[2]);
		if(this.shouldBeShown[1][0])
			map.addLayer(this.layerGjethembajtes[0]);
		if(this.shouldBeShown[1][1])
			map.addLayer(this.layerGjethembajtes[1]);
		if(this.shouldBeShown[1][2])
			map.addLayer(this.layerGjethembajtes[2]);
	}

	hide(){
		if(this.shouldBeShown[0][0])
			map.removeLayer(this.layerGjetherenes[0]);
		if(this.shouldBeShown[0][1])
		map.removeLayer(this.layerGjetherenes[1]);
		if(this.shouldBeShown[0][2])
			map.removeLayer(this.layerGjetherenes[2]);
		if(this.shouldBeShown[1][0])
			map.removeLayer(this.layerGjethembajtes[0]);
		if(this.shouldBeShown[1][1])
			map.removeLayer(this.layerGjethembajtes[1]);
		if(this.shouldBeShown[1][2])
			map.removeLayer(this.layerGjethembajtes[2]);
	}
	hideType(type, height){
		if(type === "gjetherenes"){
			this.shouldBeShown[0][height] = false;
			map.removeLayer(this.layerGjetherenes[height]);
		}
		else if(type === "gjethembajtes"){
			this.shouldBeShown[1][height] = false;
			map.removeLayer(this.layerGjethembajtes[height]);
		}
	}

	showType(type, height){
		if(type === "gjetherenes"){
			this.shouldBeShown[0][height] = true;
			map.addLayer(this.layerGjetherenes[height]);
		}
		else if(type === "gjethembajtes"){
			this.shouldBeShown[1][height] = true;
			map.addLayer(this.layerGjethembajtes[height]);
		}
	}
	render(){
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