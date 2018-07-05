var id = 0;

function addAvis(numeroCommande){
    $.ajax({
        url : "http://trucks-mania.bwb/api/Avis/add/commande/"+numeroCommande+"foodtruck/"+id+"/utilisateur/1",
        type : "POST",
        
        data : {
           message : $("#message").value,
           note : $("#note").val()      
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

function showModal(idFT){
    id = idFT;
    alert(idFT);
    $("#avis").show();
}

