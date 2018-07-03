function addAvis(numeroCommande,id){
    $.ajax({
        url : "http://trucks-mania.bwb/api/Avis/add/utilisateur/1/commande/"+numeroCommande+"foodtruck/"+id,
        type : "POST",
        
        data : {
           note : $("#note").val(),
           message : $("#message").val() 
        },
        
        success : function(data){
            console.log(data);
            alert("vous avez ajouté un avis");
        },
        
        error : function(){
            alert("essaie encore");
        }
    });
} 


