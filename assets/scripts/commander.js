function Commander(userId, foodtruckId, nombre){
    var listePlat = [];
    var listeQuantite = [];
    
    for(var i = 0; i < nombre; i++) {
        listePlat[i] = $("#plat"+i).text();
        listeQuantite[i] = $("#quantite"+i).val();
    }

    $.ajax({
        url:"http://trucks-mania.bwb/api/Commande",
        type:"POST",
        
        data:{
            dateRequest:$("#datePicker").val(),
            heureRequest:$("#heure").val(),
            utilisateur_id:userId,
            foodtruck_id:foodtruckId,
            plat:listePlat,
            quantite:listeQuantite,
            total:$("#total").text()
        },
        
        success: function(data){
            if(data.dateRequest != null && data.heureRequest != null && data.quantite != null){
                alert("votre commande a été validée");
            }
            else{
                alert("CONNARD!");
            }
        },

        error:function(){
            alert("erreur");
        }
    });
}

function getTotal(nombre){
    var total = 0.0;
    for (var i =0; i < nombre; i++){
        total += parseFloat($("#quantite"+i).val())*parseFloat($("#prix"+i).text());
    }
    $("#total").html(total);
}