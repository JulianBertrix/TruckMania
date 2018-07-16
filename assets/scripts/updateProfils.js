function updateInfo(id){
    $.ajax({
        url : "http://trucks-mania.bwb/api/utilisateur/"+id,
        type : "POST",
        
        data : {
            email : $("#email").val(),
            adresse : $("#user_input_autocomplete_address").val(),
            mot_de_passe : $("#motDePasse").val()
        },
        
        success : function(data){
            document.location.href = document.location.href;
        },
        
        error : function(){
            alert("essaie encore");
        }
    });
}

function deleteFavoris(idUser,idFT){
    $.ajax({
        url : "http://trucks-mania.bwb/api/Favoris/delete/utilisateur/"+idUser+"/foodtruck/"+idFT,
        type : "GET",
        async: false,
        
        success : function(){
            document.location.reload();
        },
        
        error : function(){
            alert("essaie encore");
        }
    });
}

function addFavoris(idUser,idFT){
    $.ajax({
        url : "http://trucks-mania.bwb/api/Favoris/add/utilisateur/"+idUser+"/foodtruck/"+idFT,
        type : "POST",
        
        data : {
            
        },
        
        success : function(data){
            document.location.href = document.location.href;
        },
        
        error : function(){
            alert("essaie encore");
        }
    });
}

//UPDATE INFOS TRUCK
function updateTruck(idTruck){
    $.ajax({
        url : "http://trucks-mania.bwb/api/trucks/"+idTruck+"/infos",
        type : "PUT",
        data : {
           nom : $("#nomModif").val(),
           siret : $("#siretModif").val(),     
           logo : $("#logoModif").val()     
        },
        
        success : function(){
            document.location.href = document.location.href;
        },
        
        error : function(data){
            console.log(data);
            alert("essaie encore");
        }
    });
}

//UPDATE Adresse
function updateAdresse(idAdresse){
    $.ajax({
        url : "http://trucks-mania.bwb/api/adresse/"+idAdresse+"/update",
        type : "POST",
        data : {
           adresse : $("#nom"+idAdresse).val()  
        },
        
        success : function(retour){
            //Modif de la carte
            $("#carte"+idAdresse).attr("src",retour);
        },

        error : function(data){
            console.log(data);
            alert("essaie encore");
        }
    });
}

//Add Adresse
function addAdresse(){
    $.ajax({
        url : "http://trucks-mania.bwb/api/adresse/"+idTruck+"/add",
        type : "POST",
        data : {
           adresse : $("#nom"+idAdresse).val()  
        },
        
        success : function(retour){
            //Modif de la carte
            $("#carte"+idAdresse).attr("src",retour);
        },

        error : function(data){
            console.log(data);
            alert("essaie encore");
        }
    });
}


//GET All plats for this Truck
function giveMeThePlats(){

    var idTruck = $('#idTruck').val();

    $.ajax({
        url: "http://trucks-mania.bwb/api/plat/"+idTruck,
        type: "GET",
        dataType: "json",
        async: false,

        success: function (data) {
            //Vide la table
            $("#Plats").empty()


            //Ajout de la ligne ajout en premier
            $("#Plats").append(
                $("<tr>")
                    .attr("data-toggle","collapse")
                    .attr("id","ligneAjout")
                    .addClass("table-info h-50")
                    //IMAGE
                    .append($("<td>")
                        .addClass("align-middle")
                        .append($("<img>")
                            .addClass("imageXs")
                            .attr("id", "ajoutImage")
                            .attr("src", "http://trucks-mania.bwb/assets/img/emptyImage.png")
                            .attr("alt", "Image plat"))
                        .append($("<input>")
                            .attr("type", "file")
                            .addClass("form-control-sm")
                            .attr("name", "image")))
                    //NOM
                    .append($("<td>")
                        .addClass("align-middle")
                        .append($("<input>")
                            .attr("id", "ajoutPlat")
                            .attr("type", "text")
                            .addClass("form-control form-control-sm")
                            .attr("value", "")))
                    //PRIX
                    .append($("<td>")
                        .addClass("align-middle")
                        .append($("<input>")
                            .attr("id", "ajoutPrix")
                            .attr("type", "text")
                            .addClass("form-control form-control-sm")
                            .attr("value", "")))
                    //DESCRIPTION
                    .append($("<td>")
                        .addClass("align-middle")
                        .append($("<input>")
                            .attr("id", "ajoutDescription")
                            .attr("type", "text")
                            .addClass("form-control form-control-sm")
                            .attr("value", "")))
                    //BUTTON VALIDATE
                    .append($("<td>")
                        .addClass("align-middle")
                        .append($("<button>")
                            .attr("type", "button")
                            .addClass("btn btn-success btn-sm")
                            .attr("onclick", "addThePlat("+idTruck+")")
                            .html("<i class='fas fa-plus'></i>")))
                    .append($("<td>"))
            );
            //Creation des tr/td
            data.forEach(element => {
                
                $("#Plats").append(
                    $("<tr>")
                        .attr("data-toggle","collapse")
                        .attr("id","ligne"+element.id)
                        .addClass("accordion-toggle")
                        //IMAGE
                        .append($("<td>")
                            .addClass("align-middle")
                            .append($("<img>")
                                .addClass("imageSmall")
                                .attr("id", "image"+element.id)
                                .attr("src", element.image)
                                .attr("alt", "Image plat "+element.id))
                            .append($("<input>")
                                .attr("type", "file")
                                .addClass("form-control-sm")
                                .attr("name", "image[]")))
                        //NOM
                        .append($("<td>")
                            .addClass("align-middle")
                            .append($("<input>")
                                .attr("id", "plat"+element.id)
                                .attr("type", "text")
                                .addClass("form-control form-control-sm")
                                .attr("value", element.nom)))
                        //PRIX
                        .append($("<td>")
                            .addClass("align-middle")
                            .append($("<input>")
                                .attr("id", "prix"+element.id)
                                .attr("type", "text")
                                .addClass("form-control form-control-sm")
                                .attr("value", element.prix+" €")))
                        //DESCRIPTION
                        .append($("<td>")
                            .addClass("align-middle")
                            .append($("<input>")
                                .attr("id", "description"+element.id)
                                .attr("type", "text")
                                .addClass("form-control form-control-sm")
                                .attr("value", element.description)))
                        //BUTTON VALIDATE
                        .append($("<td>")
                            .addClass("align-middle")
                            .append($("<button>")
                                .attr("id", "butt"+element.id)
                                .attr("type", "button")
                                .addClass("btn btn-warning btn-sm")
                                .attr("onclick", "saveThePlat("+element.id+")")
                                .html("<i class='fas fa-check'></i>")))
                        //BUTTON DELETE
                        .append($("<td>")
                            .addClass("align-middle")
                            .append($("<button>")
                                .attr("id", "suppr"+element.id)
                                .attr("type", "button")
                                .addClass("btn btn-danger btn-sm")
                                .attr("onclick", "deleteThePlat("+element.id+")")
                                .html("<i class='fas fa-trash-alt'></i>")))
                );
            });
            
        },
        error: function (param1, param2) {
            console.log("error");
        }
    });
}

//Validate Modifs Plat
function saveThePlat(idPlat){
    var form = new FormData();
    var file;
    
    var image = $("#image"+idPlat).val();
    var intitule = $("#plat"+idPlat).val();
    var prix = $("#prix"+idPlat).val();
    var description = $("#description"+idPlat).val();
    
    for (var i = 0; i < $('input[type=file]').length; i++){
        file = $('input[type=file]')[i].files[0];
        form.append('file',file);
    }
    
    form.append('image', image);
    form.append('intitule', intitule);
    form.append('prix', prix);
    form.append('description', description);

    $.ajax({
        url : "http://trucks-mania.bwb/api/plat/"+idPlat,
        type : "POST",
        
        data : form,
        processData: false,
        contentType: false,
        success : function(retour){
            console.log(retour);
            giveMeThePlats();
        },

        error : function(data){
            console.log(data);
        }
        
    });
}

//Ajout Plat
function addThePlat(idTruck){
   var form = new FormData();

    var file;
    var image = $("#ajoutImage").val();
    var intitule = $("#ajoutPlat").val();
    var prix = parseFloat($("#ajoutPrix").val());
    var description = $("#ajoutDescription").val();
    
    for (var i = 0; i < $('input[type=file]').length; i++){
        file = $('input[type=file]')[i].files[0];
        form.append('file',file);
    }
    
    form.append('image', image);
    form.append('intitule', intitule);
    form.append('prix', prix);
    form.append('description', description);
   
    $.ajax({
        url : "http://trucks-mania.bwb/api/plat/add/"+idTruck,
        type : "POST",
        data :form,
        processData: false,
        contentType: false,
        success : function(){
            giveMeThePlats();
        },

        error : function(data){
            console.log(data);
        }
    });
}

//Supprime Plat
function deleteThePlat(idTruck){
    
     $.ajax({
         url : "http://trucks-mania.bwb/api/plat/delete/"+idTruck,
         type : "GET",
         
         success : function(){
             giveMeThePlats();
         },
 
         error : function(data){
             console.log(data);
         }
     });
 }

 //Inverse la participation d'un FT à un Event
function switchParticipation(idTruck,idEvent){
    
    $.ajax({
        url : "http://trucks-mania.bwb/api/evenement/"+idEvent+"/truck/"+idTruck,
        type : "GET",
        
        success : function(){
            document.location.reload();
        },

        error : function(data){
            console.log(data);
        }
    });
}