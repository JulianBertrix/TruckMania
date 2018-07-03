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


