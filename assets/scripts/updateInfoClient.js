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
            alert("vos infos ont bien été mis a jour");
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
        type : "POST",
        
        data : {
            
        },
        
        success : function(data){
            alert("foodtruck supprimer de vos favoris");
            document.location.href = document.location.href;
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
            console.log(data);
            alert("foodtruck ajouter vos favoris");
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
            //Creation des tr/td
            data.forEach(element => {
                
                $("#Plats").append(
                    $("<tr>")
                        .attr("data-toggle","collapse")
                        .attr("id","ligne"+element.id)
                        .addClass("accordion-toggle")
                        //IMAGE
                        .append($("<td>")
                            .append($("<input>")
                                .attr("id", "image"+element.id)
                                .attr("type", "text")
                                .addClass("form-control form-control-sm")
                                .attr("value", element.image)))
                        //NOM
                        .append($("<td>")
                            .append($("<input>")
                                .attr("id", "plat"+element.id)
                                .attr("type", "text")
                                .addClass("form-control form-control-sm")
                                .attr("value", element.nom)))
                        //PRIX
                        .append($("<td>")
                            .append($("<input>")
                                .attr("id", "prix"+element.id)
                                .attr("type", "text")
                                .addClass("form-control form-control-sm")
                                .attr("value", element.prix)))
                        //DESCRIPTION
                        .append($("<td>")
                            .append($("<input>")
                                .attr("id", "description"+element.id)
                                .attr("type", "text")
                                .addClass("form-control form-control-sm")
                                .attr("value", element.description)))
                        //BUTTON VALIDATE
                        .append($("<td>")
                            .append($("<button>")
                                .attr("id", "butt"+element.id)
                                .attr("type", "button")
                                .addClass("btn btn-warning btn-sm")
                                .attr("onclick", "saveThePlat("+element.id+")")
                                .html("<i class='fas fa-check'></i>")))
                );
            });

            //Ajout de la ligne ajout en dernier
            $("#Plats").append(
                $("<tr>")
                    .attr("data-toggle","collapse")
                    .attr("id","ligneAjout")
                    .addClass("accordion-toggle")
                    //IMAGE
                    .append($("<td>")
                        .append($("<input>")
                            .attr("id", "ajoutImage")
                            .attr("type", "text")
                            .addClass("form-control form-control-sm")
                            .attr("value", "")))
                    //NOM
                    .append($("<td>")
                        .append($("<input>")
                            .attr("id", "ajoutPlat")
                            .attr("type", "text")
                            .addClass("form-control form-control-sm")
                            .attr("value", "")))
                    //PRIX
                    .append($("<td>")
                        .append($("<input>")
                            .attr("id", "ajoutPrix")
                            .attr("type", "text")
                            .addClass("form-control form-control-sm")
                            .attr("value", "")))
                    //DESCRIPTION
                    .append($("<td>")
                        .append($("<input>")
                            .attr("id", "ajoutDescription")
                            .attr("type", "text")
                            .addClass("form-control form-control-sm")
                            .attr("value", "")))
                    //BUTTON VALIDATE
                    .append($("<td>")
                        .append($("<button>")
                            .attr("type", "button")
                            .addClass("btn btn-success btn-sm")
                            .attr("onclick", "addThePlat("+idTruck+")")
                            .html("<i class='fas fa-plus'></i>")))
            );
        },
        error: function (param1, param2) {
            console.log("error");
        }
    });
}

//Validate Modifs Plat
function saveThePlat(idPlat){

    $.ajax({
        url : "http://trucks-mania.bwb/api/plat/"+idPlat,
        type : "POST",
        data : {
            intitule : $("#plat"+idPlat).val(),
            description : $("#description"+idPlat).val(),
            prix : $("#prix"+idPlat).val(),
            image : $("#image"+idPlat).val(),
        },
        
        success : function(retour){
            giveMeThePlats();
        },

        error : function(data){
            console.log(data);
        }
    });
}

//Ajout Plat
function addThePlat(idTruck){

    $.ajax({
        url : "http://trucks-mania.bwb/api/plat/add/"+idTruck,
        type : "POST",
        data : {
            intitule : $("#ajoutPlat").val(),
            description : $("#ajoutDescription").val(),
            prix : $("#ajoutPrix").val(),
            image : $("#ajoutImage").val(),
        },
        
        success : function(){
            giveMeThePlats();
        },

        error : function(data){
            console.log(data);
        }
    });
}