var j;
class PolygonParser {
    id;
    color;
    polygonName;
    jsonUrl;
    polygoncoords = [];
    turfpolygon;
    pemet = [];
    mobiliari = [];
    zhurma = [];
    isShowed = false;
    constructor(id, jsonUrl, polygonName, pemet, mobiliari, zhurma){
        this.id = id;
        this.polygonName = polygonName;
        this.jsonUrl = jsonUrl;
        for(let i = 0; i < pemet.length; i++){
            this.krijoPemet(pemet[i]);
        }
        for(let i = 0; i < mobiliari.length; i++){
            this.krijoMobiliari(mobiliari[i]);
        }
        for(let i = 0; i < zhurma.length; i++){
            this.krijoZhurma(zhurma[i]);
        }
        setTimeout(function(){}, 0);
        this.render();
    }
    get id(){
        return this.id;
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

    /*START OF ZHURMA*/
    krijoZhurma(jsonUrl){
        this.zhurma.push(new ZhurmaParser(jsonUrl));
    }

    showZhurma(){
        for(let i =  0; i < this.zhurma.length; i++){
            this.zhurma[i].show();
        }
    }
    hideZhurma(){
        for(let i =  0; i < this.zhurma.length; i++){
            this.zhurma[i].hide();
        }
    }

    mesatarjaZhurma(){
        let sum = 0;
        let i = 0;
        for(i; i < this.zhurma.length; i++){
            sum += this.zhurma[i].totalNumberOfZhurma;
        }
        return sum/i;
    }

    /*START OF PEMET*/
    krijoPemet(jsonUrl) {
        this.pemet.push(new TreeParser(jsonUrl));
    }
    numriPemve(){
        let sum = 0;
        for(let i = 0; i < this.pemet.length; i++){
            sum += this.pemet[i].totalNumberOfTrees;
        }
        return sum;
    }

    numriPemveByTypeSize(type, size){
        let sum = 0;
        for(let i = 0; i < this.pemet.length; i++){
            sum += this.pemet[i].numberOfTrees(type, size);
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
    hideTypeOfTrees(type, height){
        for(let i = 0; i < this.pemet.length; i++){
            this.pemet[i].hideType(type, height);
        }
    }
    showTypeOfTrees(type, height){
        for(let i = 0; i < this.pemet.length; i++){
            this.pemet[i].showType(type, height);
        }
    }
    /*END OF PEMET*/
    /*START OF MOBILIARI*/
    krijoMobiliari(jsonUrl) {
        this.mobiliari.push(new MobiliariParser(jsonUrl));
    }
    numriMobiliari(){
        let sum = 0;
        for(let i = 0; i < this.mobiliari.length; i++){
            sum += this.mobiliari[i].totalNumberOfMobiliari;
        }
        return sum;
    }
    get mobiliari() {
        return this.mobiliari;
    }
    showMobiliari(){
        for(let i =  0; i < this.mobiliari.length; i++){
            this.mobiliari[i].show();
        }
    }
    hideMobiliari(){
        for(let i =  0; i < this.mobiliari.length; i++){
            this.mobiliari[i].hide();
        }
    }
    hideTypeOfMobiliari(type){
        for(let i = 0; i < this.mobiliari.length; i++){
            this.mobiliari[i].hideType(type);
        }
    }
    showTypeOfMobiliari(type){
        for(let i = 0; i < this.mobiliari.length; i++){
            this.mobiliari[i].showType(type);
        }
    }

    numriMobiliariByType(type){
        let sum = 0;
        for(let i = 0; i < this.mobiliari.length; i++){
            sum += this.mobiliari[i].numberOfMobilari(type);
        }
        return sum;
    }
    mobiliariGjendjeEMire(){
        let sum = 0;
        for(let i = 0; i < this.mobiliari.length; i++){
            sum += this.mobiliari[i].totalGjendjeEMire;
        }
        return sum;
    }
    mobiliariGjendjeJoEMire(){
        let sum = 0;
        for(let i = 0; i < this.mobiliari.length; i++){
            sum += this.mobiliari[i].totalGjendjeJoEMire;
        }
        return sum;
    }
    /*END OF MOBILIARI*/



    render() {
        var _this = this;
        $.getJSON(_this.jsonUrl, function (data) {
        }).done(function (data) {

            _this.polygoncoords = JSON.parse("[" + data.acf["coords"] + "]");
            _this.polygonName = data.acf["name"];
            _this.turfpolygon = turf.polygon([_this.polygoncoords]);

            _this.layer = L.polygon(_this.polygoncoords, {
                color: "white",
                fillColor: "white",
                fillOpacity: 0.7
            }).bindTooltip(_this.polygonName,
                {permanent: true, direction: "center", className: 'toolTipClass'}
            ).openTooltip();

        }).always(function () {


            setTimeout(function(){
_this.layer.addTo(map);
            let color;
            let dendesiaPemve = (_this.numriPemve() * 1000) / _this.area();
            if (dendesiaPemve < 3.08) color = "#FCFCFF";
            if (dendesiaPemve < 3.24) color = "#F2F8F6";
            else if (dendesiaPemve < 4.67) color = "#E7F4ED";
            else if (dendesiaPemve < 4.81) color = "#DCEFE3";
            else if (dendesiaPemve < 5.24) color = "#D1EBDA";
            else if (dendesiaPemve < 5.39) color = "#C6E6D0";
            else if (dendesiaPemve < 5.98) color = "#BBE2C7";
            else if (dendesiaPemve < 6.74) color = "#B0DDBD";
            else if (dendesiaPemve < 7.63) color = "#A5D9B4";
            else if (dendesiaPemve < 7.66) color = "#9AD5AB";
            else if (dendesiaPemve < 9.32) color = "#8FD0A1";
            else if (dendesiaPemve < 10.28) color = "#84CC98";
            else if (dendesiaPemve < 10.89) color = "#79C78E";
            else if (dendesiaPemve < 10.89) color = "#6EC385";
            else if (dendesiaPemve < 14.60) color = "#63BE7B";
            else color = "#177917";
            _this.layer.setStyle({"fillColor": color});

            _this.layer.on('click', onPolyClick);

            }, 1000);
        });
    }
    updateDesc(){

        try {
            $("#emriLagjes").text(this.polygonName);
            $("#totalDrunje").text(this.numriPemve());
            $("#totalMobilari").text(this.numriMobiliari());
        }
        catch(e){
        //
        }
        try {
            $("#totalDrunjeGjethrenes").text(this.numriPemveByTypeSize("gjetherenes", ""));
            $("#gjrLarte").text(this.numriPemveByTypeSize("gjetherenes", "larte"));
            $("#gjrMesem").text(this.numriPemveByTypeSize("gjetherenes", "mesem"));
            $("#gjrUlet").text(this.numriPemveByTypeSize("gjetherenes", "ulet"));


            $("#totalDrunjeGjethmbajtes").text(this.numriPemveByTypeSize("gjethembajtes", ""));
            $("#gjmLarte").text(this.numriPemveByTypeSize("gjethembajtes", "larte"));
            $("#gjmMesem").text(this.numriPemveByTypeSize("gjethembajtes", "mesem"));
            $("#gjmUlet").text(this.numriPemveByTypeSize("gjethembajtes", "ulet"));


            $("#nrUlese").text(this.numriMobiliariByType("ulese"));
            $("#nrNdricim").text(this.numriMobiliariByType("ndricim"));
            $("#nrMbeturina").text(this.numriMobiliariByType("mbeturina"));

            $("#mobGjendjeEMire").text(this.mobiliariGjendjeEMire());
            $("#mobGjendjeJoEMire").text(this.mobiliariGjendjeJoEMire());

            $("#reduktimiCO2PerVit").text((this.numriPemve()/14.5).toFixed(3));
            $("#perqindjaENumritTeDrunjeveTePrishtines").text((100*this.numriPemve()/totalNumriPemveNePr).toFixed(3));

            $("#mesatarjaZhurma").text(this.mesatarjaZhurma());
        }
        catch (e) {
            console.log(e);
        }
    }
}