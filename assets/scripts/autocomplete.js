var truckcol = [
  { "data": "Id"},
  { "data": "N° Siret"},
  { "data": "Nom"},
  { "data": "Création"},
  { "data": "Logo"},
  { "data": "Catégorie"},
  { "data": "Moyenne"},
  { "data": "Supprimer"},
  { "data": "Ajouter"}
]

var clientcol = [
  { "data": "Id"},
  { "data": "Nom"},
  { "data": "Prénom"},
  { "data": "E-Mail"},
  { "data": "Création"},
  { "data": "Rôle"},
  { "data": "Adresse"},
  { "data": "Food Truck"},
  { "data": "Supprimer"},
  { "data": "Ajouter"}
]

var commandecol = [
  { "data": "N°"},
  { "data": "Date"},
  { "data": "Utilisateur"},
  { "data": "Food Truck"},
  { "data": "Avis"},
  { "data": "Total"},
  { "data": "Supprimer"},
  { "data": "Ajouter"}
]

var evenementcol = [
  { "data": "Id"},
  { "data": "Création"},
  { "data": "Intitulé"},
  { "data": "Date Début"},
  { "data": "Date Fin"},
  { "data": "Description"},
  { "data": "Logo"},
  { "data": "Nbr Participant"},
  { "data": "Utilisateur"},
  { "data": "Adresse"},
  { "data": "Supprimer"},
  { "data": "Ajouter"}
]

var uri;

$(document).ready(function() {
  $("#trucks").click(function(){
    uri = "trucks";
    update(truckcol);
  });

  $("#utilisateur").click(function(){
    uri = "utilisateur";
    update(clientcol);
  });

    $("#utilisateur").click(function(){
        $("#card-client").show();
  });

  $("#commande").click(function(){
    uri = "commande";
    update(commandecol);
  });
  
  $("#evenement").click(function(){
    uri = "evenement";
    update(evenementcol);
  });

});

function update(val){
  $('#datatable').DataTable({
    dom: 'pftlrp',
    pagingType: "simple_numbers",
    lengthMenu:[5,10,15,20,25,50,100,150,200,250,300],
    pageLength: 5,
      "ajax": {
        "url": "http://trucks-mania.bwb/api/" + uri,
        "type": "GET"
    },
    columns : val,
    language: {
      url: "assets/scripts/data_table_translate.json"
    }
  });
}

function initializeAutocomplete(id) {
  var element = document.getElementById(id);
  if (element) {
    var autocomplete = new google.maps.places.Autocomplete(element, { types: ['geocode'] });
    google.maps.event.addListener(autocomplete, 'place_changed', onPlaceChanged);
  }
}

function onPlaceChanged() {
  var place = this.getPlace();
  // console.log(place);  // Uncomment this line to view the full object returned by Google API.
  for (var i in place.address_components) {
    var component = place.address_components[i];
    for (var j in component.types) {  // Some types are ["country", "political"]
      var type_element = document.getElementById(component.types[j]);
      if (type_element) {
        type_element.value = component.long_name;
      }
    }
  }
}

google.maps.event.addDomListener(window, 'load', function() {
  initializeAutocomplete('user_input_autocomplete_address');
});



