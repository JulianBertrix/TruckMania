jQuery(function($){

    //Format francais: Repasser la date au format SQL pour insertion dans BDD
    $.datepicker.setDefaults($.datepicker.regional[ "fr" ]);

    $('#datePicker').datepicker({

    });

    $('#datePicker2').datepicker({

    });

});

$(document).ready(function(){
    $('input.timepicker').timepicker({ 
        timeFormat: 'HH:mm',
        minTime: '07:00:00',
        defaultTime: '12:00:00'
    });

    $('input.timepicker2').timepicker({ 
        timeFormat: 'HH:mm',
        defaultTime: '12:00:00'
    });
});