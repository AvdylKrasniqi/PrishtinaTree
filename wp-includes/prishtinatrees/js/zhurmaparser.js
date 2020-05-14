class ZhurmaParser {
	jsonUrl;
	layer;
	/*
	0 = ndricim
	1 = ulese
	2 = mbeturina
	*/
    totalNumberOfZhurma;
	shouldBeShown = [true];
	constructor(jsonUrl){
		this.jsonUrl = jsonUrl;
		this.render();
	}
	get totalNumberOfZhurma(){
		return this.totalNumberOfZhurma;
	}
	get layer(){
		return this.layer;
	}
	show(){
		if(this.shouldBeShown[0])
			map.addLayer(this.layer);
	}

	hide(){
		map.removeLayer(this.layer);
	}
	render(){
		var _this = this;

		var markers = [];

	   $.getJSON(this.jsonUrl, function(jd) {
	   		_this.totalNumberOfZhurma = jd.length;
	   		for (var i = 0; i < jd.length; ++i) {
		   		var a = jd[i].acf;
		   		// console.log("WOW");
		   		// console.log(a);
				var description = "<dl>"
									+ "<dt>ID:</dt>"
									+ "<dd>" + jd[i]["id"] + "</dd>"
									+ "<dt>Vlera e dB</dt>"
									+ "<dd>" + a["vlera"] + "</dd>"
								+ "</dl>";
                markers.push(L.marker([a["latitude"], a["longitude"]],{icon: zhurmaIcon}).bindPopup(description));
			}

			setTimeout(function(){
			}, 0);
		   try {
				_this.layer = L.layerGroup(markers);
			} catch (e) {
			   console.log(e);
		   }
			// _this.show();
			// map.addLayer(_this.layer);
	   });

	}
}