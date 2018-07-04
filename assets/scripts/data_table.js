$(document).ready( function () {

  $("#ft").click(function(e){
      e.preventDefault;
      cols = [
          {"data":"id"},
          {"data":"siret"},
          {"data":"nom"},
          {"data":"dateCreation"},
          {"data":"logo"},
          {"data":"categorieId.intitule"},
          {"data":"moyenne"},
      ];
      $.ajax({
          url:"http://trucks-mania.bwb/api/trucks",
          dataType:'json',
          success: function(datas){
              updateTable(datas,cols);
          },
          error:function(e){
              console.log("erreur : " + e);
          }
      })
  });
  $("#cm").click(function(e){
      e.preventDefault;
      cols = [
          {"data":"id"},
          {"data":"nom"},
          {"data":"prenom"},
          {"data":"email"},
          {"data":"dateCreation"},
          {"data":"roleId"},
          {"data":"adresseId"},
          {"data":"foodTruckId"},
      ];
      $.ajax({
          url:"http://trucks-mania.bwb/api/commande",
          dataType:'json',
          success: function(datas){
              updateTable(datas,cols);
          },
          error:function(e){
              console.log("erreur : " + e);
          }
      })
  });
  $("#ev").click(function(e){
  
  });
  $("#ut").click(function(e){
  
  });
  });
  
  // $(document).ready( function () {
  //     $.ajax({
  //         url:"http://trucks-mania.bwb/api/trucks",
  //         dataType:'json',
  //         success: function(datas){
  //             updateTable1(datas);
  //         },
  //         error:function(e){
  //             console.log("erreur : " + e);
  //         }
  //     })
  // });
  
  function updateTable(datas,cols){
      $('#table').DataTable({
          hover: true,
          responsive: true,
          lengthMenu:[5,10,15,20,25,50,100,150,200],
          pageLength: 5,
          language: {
              url: "/assets/scripts/data_table_translate.json"
          },
          data : datas,
          columns:cols
      });
  }
  
  // $(document).ready( function () {
  //     $.ajax({
  //         url:"http://trucks-mania.bwb/api/utilisateur",
  //         dataType:'json',
  //         success: function(datas){
  //             updateTable2(datas);
  //         },
  //         error:function(e){
  //             console.log("erreur : " + e);
  //         }
  //     })
  // });
  
  // function updateTable2(datas){
  //     $('#myTableUtilisateur').DataTable({
  //         hover: true,
  //         responsive: true,
  //         lengthMenu:[5,10,15,20,25,50,100,150,200],
  //         pageLength: 5,
  //         language: {
  //             url: "/assets/scripts/data_table_translate.json"
  //         },
  //         data : datas,
  //         columns:[
  //             {"data":"id"},
  //             {"data":"nom"},
  //             {"data":"prenom"},
  //             {"data":"email"},
  //             {"data":"dateCreation"},
  //             {"data":"roleId"},
  //             {"data":"adresseId"},
  //             {"data":"foodTruckId"},
  //         ]
  //     });
  // }
  
  // $(document).ready( function () {
  //     $.ajax({
  //         url:"http://trucks-mania.bwb/api/commande",
  //         dataType:'json',
  //         success: function(datas){
  //             updateTable3(datas);
  //         },
  //         error:function(e){
  //             console.log("erreur : " + e);
  //         }
  //     })
  // });
  
  // function updateTable3(datas){
  //     $('#myTableCommande').DataTable({
  //         hover: true,
  //         responsive: true,
  //         lengthMenu:[5,10,15,20,25,50,100,150,200],
  //         pageLength: 5,
  //         language: {
  //             url: "/assets/scripts/data_table_translate.json"
  //         },
  //         data : datas,
          // columns:[
          //     {"data":"id"},
          //     {"data":"nom"},
          //     {"data":"prenom"},
          //     {"data":"email"},
          //     {"data":"dateCreation"},
          //     {"data":"roleId"},
          //     {"data":"adresseId"},
          //     {"data":"foodTruckId"},
          // ]
  //     });
  // }
  
  
  // $(document).ready( function () {
  //     $.ajax({
  //         url:"http://trucks-mania.bwb/api/evenement",
  //         dataType:'json',
  //         success: function(datas){
  //             updateTable4(datas);
  //         },
  //         error:function(e){
  //             console.log("erreur : " + e);
  //         }
  //     })
  // });
  
  // function updateTable4(datas){
  //     $('#myTableEvenement').DataTable({
  //         hover: true,
  //         responsive: true,
  //         lengthMenu:[5,10,15,20,25,50,100,150,200],
  //         pageLength: 5,
  //         language: {
  //             url: "/assets/scripts/data_table_translate.json"
  //         },
  //         data : datas,
  //         columns:[
  //             {"data":"id"},
  //             {"data":"dateCreation"},
  //             {"data":"intitule"},
  //             {"data":"dateDebut"},
  //             {"data":"dateFin"},
  //             {"data":"description"},
  //             {"data":"adresseIdimage"},
  //             {"data":"utilisateurId"},
  //             {"data":"adresseId"},
  //             {"data":"NombreDeParticipant"},
  //         ]
  //     });
  // }
  
  
// $(document).ready(function() {
//     $('#dataTabletruck').DataTable({
//        dom: 'pftlrp',
//        responsive: true,
//        pagingType: "simple_numbers",
//        lengthMenu:[5,10,15,20,25,50],
//        pageLength: 5,
//        language: {
//          url: "assets/scripts/data_table_translate.json"
//        }
//      });
//    });
  
  
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