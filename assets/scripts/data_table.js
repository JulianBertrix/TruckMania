$(document).click(function(){
    $("#foodtrucktable").click(function(e){
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
    $("#utilisateurtable").click(function(e){
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
            url:"http://trucks-mania.bwb/api/utilisateur",
            dataType:'json',
            success: function(datas){
                updateTable(datas,cols);
            },
            error:function(e){
                console.log("erreur : " + e);
            }
        })
    });
    $("#commandetable").click(function(e){
        cols = [
            {"data":"numero"},
            {"data":"dateCommande"},
            {"data":"utilisateurId"},
            {"data":"foodtruckId"},
            {"data":"total"},
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
    $("#evenementtable").click(function(e){
        cols = [
            {"data":"nom"},
            {"data":"prenom"},
            {"data":"email"},
            {"data":"dateCreation"},
            {"data":"roleId"},
            {"data":"adresseId"},
            {"data":"foodTruckId"},
        ];
        $.ajax({
            url:"http://trucks-mania.bwb/api/evenement",
            dataType:'json',
            success: function(datas){
                updateTable(datas,cols);
            },
            error:function(e){
                console.log("erreur : " + e);
            }
        })
    });
});

function updateTable(datas,cols){
    document.location.reload();
    $('#tableAdmin').DataTable({
        hover: true,
        responsive: true,
        lengthMenu:[5,10,15,20,25,50,100,150,200],
        pageLength: 5,
        language: {
            url: "/assets/scripts/data_table_translate.json"
        },
        data : datas,
        columns:cols,
    });
}
 
