<?php
include 'header.php';
?>
<script>
$( document ).ready(function() {

  //Recup des datas

   $.ajax({
        url: "http://trucks-mania.bwb/api/trucks",
        type: "GET",
        //dataType: "json",
        async: false,

        success: function (data) {
            console.log("data");
        },
        error: function (param1, param2) {
            console.log("error");
        }
    });

    var datas = [
    {
        "id": "7",
        "intitule": "Match",
        "date_debut": "2018-07-21 16:00:00",
        "date_fin": "2018-07-22 23:00:00",
        "description": "Match de pr\u00e9paration \u00e0 la coupe du monde",
        "NombreDeParticipant": "67000000",
        "adresse": {
            "id": "10",
            "adresse": "14 rue saint-joseph 06600 Antibes",
            "latitude": "43.5823278199388",
            "longitude": "7.12630916100595"
        }
    },
    {
        "id": "8",
        "intitule": "Concert Johnny Hallyday",
        "date_debut": "2018-07-12 15:00:00",
        "date_fin": "2018-07-13 01:00:00",
        "description": "Concert d\u2019adieu de Johnny",
        "NombreDeParticipant": "500000",
        "adresse": {
            "id": "5",
            "adresse": "24 route de gariou\u00e8re 31210 Les Tourreilles",
            "latitude": "43.108458135911",
            "longitude": "0.575935975316764"
        }
    }
];


    

$('#calendar').fullCalendar({

    events: [
    {
      title  : datas[0]['intitule'],
      start  : datas[0]['date_debut'],
      end : datas[0]['date_fin'],
    },
    {
      title  : 'event2',
      start  : '2018-06-05',
      end    : '2018-06-07'
    },
    {
      title  : 'event3',
      start  : '2018-06-25T12:30:00',
      allDay : false // will make the time show
    }
  ]

});

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