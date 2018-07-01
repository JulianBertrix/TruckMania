<?php
include 'header.php';
?>
<script>
    var datas = [];
    var listeEvents = {
        events:[]
    };
    var listePlanning = {
        events:[]
    };

    $( document ).ready(function() {

    //Recup des Events
        
        $.ajax({
            url: "http://trucks-mania.bwb/api/trucks/22/events",
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

        //Recup des Plannings
        
        $.ajax({
            url: "http://trucks-mania.bwb/api/trucks/1/planning",
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

        datas.forEach(function(planning) {
            listePlanning['events'].push(planning['events']);
        });
        
        $('#calendar').fullCalendar({
            locale: 'fr',
            eventSources: [
                listeEvents,
                listePlanning
            ]
        });

        $('#calendar').fullCalendar('option', 'locale', 'fr');

        var calendar = $('#calendar').fullCalendar('getCalendar');

        //Recup du clik utilsateur
        calendar.on('eventClick', function(calEvent, jsEvent, view) {

            console.log('Event: ' + calEvent.title);
            console.log('Event: ' + calEvent.adresse['adresse']);
    
        });


    });
</script>

<div class="container">
    <div class="row">
        <div class="col-8" id='calendar'></div>
        <div class="col-4" id='infosCalendar'>
            <h3 id="dateInfo">Date:</h3>
            <h3 id="lieuInfo">Lieu:</h3>
            <h4 id="horaireInfo">Plage horaire:</h4>
        </div>
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