function updateInfo(){
    $.ajax({
        url : "http://trucks-mania.bwb/api/utilisateur/1",
        type : "POST",
        
        data : {
            email : $("#email").val(),
            adresse : $("#user_input_autocomplete_address").val(),
            mot_de_passe : $("#motDePasse").val()
        },
        
        success : function(data){
            alert("vos modifications ont bien été prises en compte");
        },
        
        error : function(){
            alert("essaie encore");
        }
    });
}

function deleteFavoris(id){
    $.ajax({
        url : "http://trucks-mania.bwb/api/Favoris/delete/utilisateur/1/foodtruck/"+id,
        type : "POST",
        
        data : {
            
        },
        
        success : function(data){
            console.log(data);
            alert("foodtruck supprimer de vos favoris");
        },
        
        error : function(){
            alert("essaie encore");
        }
    });
}

function addFavoris(id){
    $.ajax({
        url : "http://trucks-mania.bwb/api/Favoris/add/utilisateur/1/foodtruck/"+id,
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