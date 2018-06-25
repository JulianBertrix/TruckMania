jQuery(function($){

    //Format francais: Repasser la date au format SQL pour insertion dans BDD
    $.datepicker.setDefaults($.datepicker.regional[ "fr" ]);

    $('#datePicker').datepicker({

    });

});

$(document).ready(function(){
    $('input.timepicker').timepicker({ 
        timeFormat: 'HH:mm',
        minTime: '07:00:00',
        defaultTime: '12:00:00'
    });
});