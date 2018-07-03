$(document).ready(function() {
    $('#dataTabletruck').DataTable({
       dom: 'pftlrp',
       responsive: true,
       pagingType: "simple_numbers",
       lengthMenu:[5,10,15,20,25,50],
       pageLength: 5,
       language: {
         url: "assets/scripts/data_table_translate.json"
       }
     });
   });
  
  
  // var truckcol = [
  //   { "data": "Id"},
  //   { "data": "N° Siret"},
  //   { "data": "Nom"},
  //   { "data": "Création"},
  //   { "data": "Logo"},
  //   { "data": "Catégorie"},
  //   { "data": "Moyenne"},
  //   { "data": "Supprimer"},
  //   { "data": "Ajouter"}
  // ]
  
  // var clientcol = [
  //   { "data": "Id"},
  //   { "data": "Nom"},
  //   { "data": "Prénom"},
  //   { "data": "E-Mail"},
  //   { "data": "Création"},
  //   { "data": "Rôle"},
  //   { "data": "Adresse"},
  //   { "data": "Food Truck"},
  //   { "data": "Supprimer"},
  //   { "data": "Ajouter"}
  // ]
  
  // var commandecol = [
  //   { "data": "N°"},
  //   { "data": "Date"},
  //   { "data": "Utilisateur"},
  //   { "data": "Food Truck"},
  //   { "data": "Avis"},
  //   { "data": "Total"},
  //   { "data": "Supprimer"},
  //   { "data": "Ajouter"}
  // ]
  
  // var evenementcol = [
  //   { "data": "Id"},
  //   { "data": "Création"},
  //   { "data": "Intitulé"},
  //   { "data": "Date Début"},
  //   { "data": "Date Fin"},
  //   { "data": "Description"},
  //   { "data": "Logo"},
  //   { "data": "Nbr Participant"},
  //   { "data": "Utilisateur"},
  //   { "data": "Adresse"},
  //   { "data": "Supprimer"},
  //   { "data": "Ajouter"}
  // ]
  
  // var uri;
  
  // $(document).ready(function() {
  //   $("#trucks").click(function(){
  //     uri = "trucks";
  //     update(truckcol);
  //   });
  
  //   $("#utilisateur").click(function(){
  //     uri = "utilisateur";
  //     update(clientcol);
  //   });
  
  //     $("#utilisateur").click(function(){
  //         $("#card-client").show();
  //   });
  
  //   $("#commande").click(function(){
  //     uri = "commande";
  //     update(commandecol);
  //   });
    
  //   $("#evenement").click(function(){
  //     uri = "evenement";
  //     update(evenementcol);
  //   });
  
  // });
  
  // function update(val){
  //   $('#datatable').DataTable({
  //     dom: 'pftlrp',
  //     pagingType: "simple_numbers",
  //     lengthMenu:[5,10,15,20,25,50,100,150,200,250,300],
  //     pageLength: 5,
  //       "ajax": {
  //         "url": "http://trucks-mania.bwb/api/" + uri,
  //         "type": "GET"
  //     },
  //     columns : val,
  //     language: {
  //       url: "assets/scripts/data_table_translate.json"
  //     }
  //   });
  // });