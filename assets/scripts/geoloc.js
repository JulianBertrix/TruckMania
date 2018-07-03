/**
 * Prend en argument une adresse complete au format string
 * retoure un fichier json de type {lat: 49.5992454, lng: 3.1758519}
 * 
 * @param {string} adresse 
 */
function giveMeTheGPS(adresse){

    var newAdresse = adresse.replace(/ /g,'+');

    var coordGPS;

    $.ajax({
            url: "https://maps.googleapis.com/maps/api/geocode/json?address="+newAdresse+"&key=AIzaSyDd0z6MCPdZ0v5TPvkbB6yWW9dli2vkN3c",
            type: "GET",
            dataType: "json",
            async: false,

            success: function (data) {
                coordGPS = data.results["0"].geometry.location;
            },
            error: function (param1, param2) {
                console.log("error");
            }
        });

        return coordGPS;       
}
/**
 * Prend en argument des coordonnees GPS  et retourne l'adresse correspondante sous la forme
 * d'une string
 * 
 * @param {string} lat 
 * @param {string} lon 
 */
function giveMeTheAdresse(lat,lon){

    var coord = lat+","+lon;

    var adresse = "";

    $.ajax({
            url: "https://maps.googleapis.com/maps/api/geocode/json?latlng="+coord+"&key=AIzaSyDd0z6MCPdZ0v5TPvkbB6yWW9dli2vkN3c",
            type: "GET",
            dataType: "json",
            async: false,

            success: function (data) {
                adresse = data.results["0"].formatted_address;

                //Supression du ", France" de l'adresse
                adresse = adresse.replace(/, France/g,'');
            },
            error: function (param1, param2) {
                console.log("error");
            }
        });

        return adresse;       
}



