var id = 0;

function addAvis(idAvis){
    $.ajax({
        url : "http://trucks-mania.bwb/api/Avis/"+idAvis,
        type : "PUT",
        
        data : {
           message : $("#message").val(),
           note : $("#note").val()      
        },
        
        success : function(data){           
            alert("vous avez ajouté un avis");
            document.location.href = document.location.href;
        },
        
        error : function(data){
            console.log(data);
            alert("essaie encore");
        }
    });
} 

function showModal(){
    $('#avis').on('show.bs.modal', function (event) { // id of the modal with event

        var button = $(event.relatedTarget) // Image that triggered the modal

        var productid = button.data('productid') // Extract info from data-* attributes
        console.log(productid);
        $("#valider").attr("onclick", "addAvis("+productid+")");
    });
}

