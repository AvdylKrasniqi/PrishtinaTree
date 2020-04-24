class PolygonParser {
    jsonUrl;
    color;
    polygoncoords = [];
    polygonName;
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
    get polygonName(){
        return this.polygonName;
    }
    render() {
        $.getJSON(this.jsonUrl, function(data) {
            console.log(data[0][this.polygonName]);
            console.log(this.polygonName);
            //this.polygonCoords.push(jd[0]["dardania"]);
            return data;
        }).done(function(data) {

            console.log(data["dardania"])


            console.log( "second success" );
        }).fail(function() {
            console.log( "error" );
        }).always(function() {
            console.log( "complete" );
        });;
    }
}