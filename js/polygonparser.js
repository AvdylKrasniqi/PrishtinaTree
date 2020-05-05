
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

    get pemet() {
        return this.pemet;
    }

    render() {
        var _this = this;
        $.getJSON(_this.jsonUrl, function(data) {
            console.log(_this.polygonName);
            _this.polygoncoords =  data[0][_this.polygonName];
            _this.turfpolygon = turf.polygon([data[0][_this.polygonName]]);
            _this.layer = L.polygon(_this.polygoncoords, {color: "green"}).bindTooltip(_this.polygonName,
                {permanent: false, direction:"center"}
            ).openTooltip().addTo(map);
        });
    }
    infoParser(){

    }
}