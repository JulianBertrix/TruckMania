function localizeMe() {

//     if (navigator.geolocation)
//   var watchId = navigator.geolocation.watchPosition(successCallback,null,         {enableHighAccuracy:true});
// else
//   alert("Votre navigateur ne prend pas en compte la géolocalisation HTML5");

if(navigator.geolocation) {
    
     //var point = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
     
     document.getElementById("location").value = "Johnny Bravo";
}

}
