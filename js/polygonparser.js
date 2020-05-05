
class PolygonParser {
    color;
    polygonName;
    jsonUrl;
    polygoncoords = [];
    turfpolygon;
    pemet = [];
    constructor(jsonUrl, polygonName, pemet){

        this.polygonName = polygonName;
        this.jsonUrl = jsonUrl;
        for(let i = 0; i < pemet.length; i++){
            this.krijoPemet(pemet[i]);
        }
        setTimeout(function(){}, 0);
        this.render();
    }
    set color(color){
        this.color = color;
    }
    get color(){
        return this.color;
    }
    set polygoncoords(polygoncoords){
        this.polygoncoords = polygoncoords;
    }
    hasPoint(lat, lng) {
        let pt = turf.point([lat, lng]);
        return turf.booleanPointInPolygon(pt, turfpolygon);
    }
    area() {
        return turf.area(this.turfpolygon);
    }
    hide() {
        map.removeLayer(this.layer);
    }
    show() {
        map.addLayer(this.layer);
    }

    krijoPemet(jsonUrl) {
        this.pemet.push(new TreeParser(jsonUrl));
    }
    numriPemve(){
        let sum = 0;
        for(var i = 0; i < this.pemet.length; i++){
            sum += this.pemet[i].totalNumberOfTrees;
        }
        return sum;
    }
    get pemet() {
        return this.pemet;
    }

    render() {
        var _this = this;
        $.getJSON(_this.jsonUrl, function(data) {
            console.log(_this.polygonName);
            _this.polygoncoords =  data[0][_this.polygonName];
            _this.turfpolygon = turf.polygon([data[0][_this.polygonName]]);
            _this.layer = L.polygon(_this.polygoncoords, {color: "white", fillColor: "green", fillOpacity: 0.8, opacity: 0.8}).bindTooltip(_this.polygonName,
                {permanent: false, direction:"center"}
            ).openTooltip().addTo(map);
        });
        setTimeout(function(){
            let color;
            let nrPemve = _this.numriPemve();
            if(nrPemve < 1000) color = "#7fd67f";
            else if(nrPemve < 1000) color = "#47aa47";
            else if(nrPemve < 1500) color = "#279027";
            else if(nrPemve < 2500) color = "#177917";
            else  color = "darkgreen";
            _this.layer.setStyle({"fillColor": color});
            console.log(nrPemve);
        }, 3000);
    }
    infoParser(){

    }
}