
class PolygonParser {
    color;
    polygonName;
    jsonUrl;
    polygoncoords = [];
    turfpolygon;
    pemet = [];
    isShowed = false;
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
        return turf.booleanPointInPolygon(pt, this.turfpolygon);
    }
    area() {
        return turf.area(this.turfpolygon);
    }
    hide() {
        if(this.isShowed){
            map.removeLayer(this.layer);
            this.isShowed = false;
        }
    }
    show() {
        if(!this.isShowed){
            map.addLayer(this.layer);
            this.isShowed = true;
        }
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
    showPemet(){
        for(let i =  0; i < this.pemet.length; i++){
            this.pemet[i].show();
        }
    }
    hidePemet(){
        for(let i =  0; i < this.pemet.length; i++){
            this.pemet[i].hide();
        }
    }
    render() {
        var _this = this;
        $.getJSON(_this.jsonUrl, function(data) {
            console.log(_this.polygonName);
            _this.polygoncoords =  data[0][_this.polygonName];
            _this.turfpolygon = turf.polygon([data[0][_this.polygonName]]);
            _this.layer = L.polygon(_this.polygoncoords, {color: "white", fillColor: "green",  fillOpacity: 0.7}).bindTooltip(_this.polygonName,
                {permanent: true, direction:"center",className: 'toolTipClass'}
            ).openTooltip().addTo(map);
        });
        setTimeout(function(){
            let color;
            let dendesiaPemve = _this.numriPemve() / _this.area() * 1000;
            console.log(dendesiaPemve);
            if(dendesiaPemve < 3.08) color = "#FCFCFF";
            if(dendesiaPemve < 3.24) color = "#F2F8F6";
            else if(dendesiaPemve < 4.67) color = "#E7F4ED";
            else if(dendesiaPemve < 4.81) color = "#DCEFE3";
            else if(dendesiaPemve < 5.24) color = "#D1EBDA";
            else if(dendesiaPemve < 5.39) color = "#C6E6D0";
            else if(dendesiaPemve < 5.98) color = "#BBE2C7";
            else if(dendesiaPemve < 6.74) color = "#B0DDBD";
            else if(dendesiaPemve < 7.63) color = "#A5D9B4";
            else if(dendesiaPemve < 7.66) color = "#9AD5AB";
            else if(dendesiaPemve < 8.77) color = "#177917";
            else if(dendesiaPemve < 9.32) color = "#8FD0A1";
            else if(dendesiaPemve < 10.28) color = "#84CC98";
            else if(dendesiaPemve < 10.89) color = "#79C78E";
            else if(dendesiaPemve < 10.89) color = "#6EC385";
            else if(dendesiaPemve < 14.60) color = "#63BE7B";
            else color = "#63BE7B";
            _this.layer.setStyle({"fillColor": color});
            _this.layer.on('click', onPolyClick);
        }, 1000);
    }
    updateDesc(){
        $("#emriLagjes").text(this.polygonName);
        $("#totalDrunje").text(this.numriPemve());

        $("#totalDrunjeGjethrenes").text(this.pemet[0].numberOfTrees("gjetherenes",""));
        $("#gjrLarte").text(this.pemet[0].numberOfTrees("gjetherenes","larte"));
        $("#gjrMesem").text(this.pemet[0].numberOfTrees("gjetherenes","mesem"));
        $("#gjrUlet").text(this.pemet[0].numberOfTrees("gjetherenes","ulet"));

        $("#totalDrunjeGjethmbajtes").text(this.pemet[0].numberOfTrees("gjetherenes",""));
        $("#gjmLarte").text(this.pemet[0].numberOfTrees("gjetherenes","larte"));
        $("#gjmMesem").text(this.pemet[0].numberOfTrees("gjetherenes","mesem"));
        $("#gjmUlet").text(this.pemet[0].numberOfTrees("gjetherenes","ulet"));


    }
}