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
