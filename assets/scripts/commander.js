function Commander(userId, foodtruckId, nombre){
    var listePlat = [];
    var listeQuantite = [];
    
    for(var i = 0; i < nombre; i++) {
        listePlat[i] = $("#plat"+i).text();
        listeQuantite[i] = $("#quantite"+i).val();
    }
    
    var total = parseFloat($("#total").text());

    //Si total <> 0 et check date et heure, la commande est passée

    console.log($("#heure").val());


    if(total > 0 && $("#datePicker").val() != ""){

        $.ajax({
            url:"http://trucks-mania.bwb/api/commande",
            type:"POST",
            
            data:{
                dateRequest:$("#datePicker").val(),
                heureRequest:$("#heure").val(),
                utilisateur_id:userId,
                foodtruck_id:foodtruckId,
                plat:listePlat,
                quantite:listeQuantite,
                total:total
            },
            
            success: function(data){
                console.log(data);
                if(data > 0){
                    alert("votre commande du "+$("#datePicker").val()+" a été validée");
                    document.location.href = "http://trucks-mania.bwb/profile/"+userId;
                }
                else{
                    alert("Zut erreur lors de la commande, veuillez essayer de nouveau SVP");
                }
                $('#order').modal('hide');
            },
    
            error:function(){
                alert("erreur");
            }
        });

    }else{
        alert("Aïe une erreur s'est produite, vérifiez votre commande SVP")
    }

    
}

function getTotal(nombre){
    var total = 0.0;
    for (var i =0; i < nombre; i++){
        total += parseFloat($("#quantite"+i).val())*parseFloat($("#prix"+i).text());
    }
    $("#total").html(total.toFixed(2)+" €");
}