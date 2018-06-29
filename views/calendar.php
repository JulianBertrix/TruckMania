<?php
include 'header.php';
?>
<script>
$( document ).ready(function() {

  //Recup des datas

   $.ajax({
        url: "http://trucks-mania.bwb/api/evenements",
        type: "GET",
        dataType: "json",
        async: false,

        success: function (toto) {
          
            console.log(toto);
        },
        error: function (param1, param2) {
            alert("erreur");
        }
    });


    

$('#calendar').fullCalendar({

    events: [
    {
      title  : 'event1',
      start  : '2018-06-01'
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