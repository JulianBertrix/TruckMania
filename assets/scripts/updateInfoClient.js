function update(){
    $.ajax({
        url : "http://trucks-mania.bwb/api/utilisateur/1",
        type : "POST",
        
        data : {
            email = "$(#email.val())",
            adresse = "$(#user_input_autocomplete_address).val()",
            mot_de_pass = "$(#motDePasse).val()"
        },
        success : function(){
            alert("vos modifications ont bien été prises en compte");
        },
        
        error : function(){
            alert("essaie encore");
        }
    });
}


