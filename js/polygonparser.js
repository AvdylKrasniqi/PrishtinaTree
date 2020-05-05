var x = 2;
class PolygonParser {
    color;
    polygonName;

    jsonUrl;
    polygoncoords = [];
    turfpolygon;
    constructor(jsonUrl, polygonName){
        this.polygonName = polygonName;
        this.jsonUrl = jsonUrl;
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

    render() {
        var _this = this;
        $.getJSON(_this.jsonUrl, function(data) {
            x = data[0];
            // console.log(data[0]);
            // console.log(data[0][_this.polygonName]);

            _this.polygoncoords =  data[0][_this.polygonName];
            _this.turfpolygon = turf.polygon([_this.polygoncoords]);
            _this.layer = L.polygon(_this.polygoncoords, {color: "green"}).bindTooltip(_this.polygonName,
                {permanent: false, direction:"center"}
            ).openTooltip().addTo(map);
        });
    }
    infoParser(){

    }
}