var id = 0;

function addAvis(idAvis){
    if ($("#message").val() !== ""){
        $.ajax({
            url : "http://trucks-mania.bwb/api/Avis/"+idAvis,
            type : "PUT",

            data : {
               message : $("#message").val(),
               note : $("#note").val()      
            },

            success : function(data){           
                document.location.href = document.location.href;
            },

            error : function(data){
                console.log(data);
                alert("essaie encore");
            }
        });
    }
    else{
        alert("veillez entrer un message et selectionner une note");
    }
} 

function showModal(){
    $('#avis').on('show.bs.modal', function (event) { // id of the modal with event

        var button = $(event.relatedTarget) // Image that triggered the modal

        var productid = button.data('productid') // Extract info from data-* attributes
        console.log(productid);
        $("#valider").attr("onclick", "addAvis("+productid+")");
    });
}

