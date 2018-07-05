//Verification credits Users
function checkMyName(){

    $.ajax({
        url: "http://trucks-mania.bwb/checklogin",
        type: "POST",
        data : {
            login : $('#login').val(),
            password : $('#password').val()
        },

        success: function (data) {
            window.location.href= data
        },
        error: function (param1, param2) {
            console.log("error");
        }
    });
}

//Deconnexion
function deconnectMe(){

    $.ajax({
        url: "http://trucks-mania.bwb/logout",
        type: "GET",

        success: function (retour) {
           window.location.href= retour;
        },
        error: function (param1, param2) {
            console.log("error");
        }
    });
}