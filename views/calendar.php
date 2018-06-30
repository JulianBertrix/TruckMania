<?php
include 'header.php';
?>
<script>
var datas = [];
var listeEvents = {
    events:[]
};

$( document ).ready(function() {

  //Recup des Events
    
    $.ajax({
        url: "api/trucks/22/events",
        type: "GET",
        dataType: "json",
        async: false,

        success: function (data) {
            datas = data;
        },
        error: function (param1, param2) {
            console.log("error");
        }
    });

    //Creation de la variable events

    datas.forEach(function(evenement) {
        listeEvents['events'].push(evenement['events']);
    });

    $('#calendar').fullCalendar({
  eventSources: [
    listeEvents
  ]
});

//$('#calendar').fullCalendar('addEventSource', listeEvents );
    // $('#calendar').fullCalendar({

    //     eventSources: [

    //     // your event source
    //     {
    //         events: [ // put the array in the `events` property
    //         {
    //             title  : 'event1',
    //             start  : '2018-06-30'
    //         }
    //         ],
    //         color: 'black',     // an option!
    //         textColor: 'yellow' // an option!
    //     }

    //     // any other event sources...

    // ]

    // });
    var calendar = $('#calendar').fullCalendar('getCalendar');

    //Recup du clik utilsateur
    calendar.on('dayClick', function(date, jsEvent, view) {
  //console.log('clicked on ' + date.format());
  
    });


});
</script>

<div class="container">
    <div class="row">
    <div class="col-8 offset-2" id='calendar'></div>
    </div>
</div>



<?php

// use BWB\Framework\mvc\controllers\AdresseController;
// use BWB\Framework\mvc\models\AdresseModel;

// $newControl = new AdresseController();

// echo "<h3>TEST CREATE</h3><br>";
// $newItem = $newControl->retrieve(1);

// $tutu = $newControl->create($newItem);
// var_dump($tutu);



//var_dump($newControl->theLastOne());



// echo "<h3>TEST DELETE</h3><br>";
// $newItem = new FavorisModel(1,4);
// $newControl->delete($newItem);



// echo "<h3>TEST GETALL</h3><br>";

// var_dump($newControl->getAll());



// echo "<h3>TEST GETALLBY</h3><br>";

// $filtre = ['utilisateur_id' => 1];

// var_dump($newControl->getAllBy($filtre));



// echo "<h3>TEST RETRIEVE</h3><br>";
// var_dump($newControl->retrieve($newItem));



include 'footer.php';
?>