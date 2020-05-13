class MobiliariParser {
	jsonUrl;
	layer;
	layerNdricim;
	layerUlese;
	layerMbeturina;
	/*
	0 = ndricim
	1 = ulese
	2 = mbeturina
	*/
	totalGjendjeEMire = 0;
	totalGjendjeJoEMire = 0;
	totalNumberOfMobiliari = 0;
	shouldBeShown = [true, true, true];
	constructor(jsonUrl){
		this.jsonUrl = jsonUrl;
		this.render();
	}
	get totalNumberOfMobiliari(){
		return this.totalNumberOfMobiliari;
	}
	get layerNdricim(){
		return this.layerNdricim;
	}
	get layerUlese(){
		return this.layerUlese;
	}
	get layerMbeturina(){
		return this.layerMbeturina;
	}
	get totalGjendjeEMire(){
		return this.totalGjendjeEMire;
	}
	get totalGjendjeJoEMire(){
		return this.totalGjendjeJoEMire;
	}
	numberOfMobilari(type) {
		if (type === "ndricim") {
			return Object.keys(this.layerNdricim._layers).length;
		}
		else if (type === "ulese") {
			return Object.keys(this.layerUlese._layers).length;
		}
		else {
			return Object.keys(this.layerMbeturina._layers).length;
		}
	}
	show(){
		if(this.shouldBeShown[0])
			map.addLayer(this.layerNdricim);
		if(this.shouldBeShown[1])
			map.addLayer(this.layerUlese);
		if(this.shouldBeShown[2])
			map.addLayer(this.layerMbeturina);
	}

	hide(){
		map.removeLayer(this.layerNdricim);
		map.removeLayer(this.layerUlese);
		map.removeLayer(this.layerMbeturina);
	}

	hideType(type){
		if(type === "ndricim"){
			this.shouldBeShown[0] = false;
			if(map.getZoom() < 17)
				return;
			map.removeLayer(this.layerNdricim);
		}
		else if(type === "ulese"){
			this.shouldBeShown[1] = false;
			if(map.getZoom() < 17)
				return;
			map.removeLayer(this.layerUlese);
		}else {
			this.shouldBeShown[2] = false;
			if(map.getZoom() < 17)
				return;
			map.removeLayer(this.layerMbeturina);
		}
	}
	showType(type){
		if(type === "ndricim"){
			this.shouldBeShown[0] = true;
			if(map.getZoom() < 17)
				return;
			map.addLayer(this.layerNdricim);
		}
		else if(type === "ulese"){
			this.shouldBeShown[1] = true;
			if(map.getZoom() < 17)
				return;
			map.addLayer(this.layerUlese);
		}else {
			this.shouldBeShown[2] = true;
			if(map.getZoom() < 17)
				return;
			map.addLayer(this.layerMbeturina);
		}
	}
	render(){
		var _this = this;

		var markers = [[],[],[]];

	   $.getJSON(this.jsonUrl, function(jd) {
	   		_this.totalNumberOfMobiliari = jd.length;
	   		for (var i = 0; i < jd.length; ++i) {
		   		var a = jd[i].acf;
		   		// console.log("WOW");
		   		// console.log(a);
		   		var myIcon;
		   		if(a["gjendja"] === "Jo e mirë") _this.totalGjendjeJoEMire++;
		   		else _this.totalGjendjeEMire++;
				var description = "<dl>"
									+ "<dt>ID:</dt>"
									+ "<dd>" + jd[i]["id"] + "</dd>"
									+ "<dt>Tipi</dt>"
									+ "<dd>" + a["lloji"] + "</dd>"
									+ "<dt>Gjendja</dt>"
									+ "<dd>" + a["gjendja"] + "</dd>"
									+ "<dt>Koordinatat</dt>"
									+ "<dd>" + a["latitude"] + ", " + a["longitude"] + "</dd>"
								+ "</dl>";
				if(a["lloji"] === "Ndricim") {

					myIcon = ndricimIcon;
					markers[0].push(L.circle([a["latitude"], a["longitude"]],myIcon).bindPopup(description));

				}
				else if(a["lloji"] === "Ulëse") {
					myIcon = uleseIcon;
					markers[1].push(L.circle([a["latitude"], a["longitude"]],myIcon).bindPopup(description));
				}
				else {
					myIcon = mbeturinaIcon;
					markers[2].push(L.circle([a["latitude"], a["longitude"]],myIcon).bindPopup(description));
				}
			}

			setTimeout(function(){
			}, 0);
			//console.log(this.layer);
			// _this.layer =  L.layerGroup(markers);
		   try {
				_this.layerNdricim = L.layerGroup(markers[0]);
				_this.layerUlese = L.layerGroup(markers[1]);
				_this.layerMbeturina = L.layerGroup(markers[2]);
			} catch (e) {
			   console.log(e);
		   }
			// _this.show();
			// map.addLayer(_this.layer);
	   });

	}
}