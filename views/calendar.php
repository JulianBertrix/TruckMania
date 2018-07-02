<?php
include 'header.php';
?>
<br><br>
<script>
    var datas = [];
    var listeEvents = {
        events:[]
    };
    var listePlanning = {
        events:[]
    };

    var updatedPlanning;

//Chargement Calendar
    $(document).ready(function() {

        //Recup des Plannings

        $('#calendar').fullCalendar({
            locale: 'fr',
            timeFormat: 'H:mm'
        });
        
        // Recup des Events
        checkTheEvents(22);

        // 'color' => '#89D175', 
        //    'textColor' => 'black'
        //  locale: 'fr',
        //     timeFormat: 'H:mm',
    
        var calendar = $('#calendar').fullCalendar('getCalendar');

        //Recup du clik utilsateur
        calendar.on('eventClick', function(calEvent, jsEvent, view) {

        var dateDebut = calEvent.start.format('DD/MM/YYYY');
        var heureDebut = calEvent.start.format('HH:mm');
        var dateFin = calEvent.end.format('DD/MM/YYYY');
        var heureFin = calEvent.end.format('HH:mm');

        $('#titreInfo').val(calEvent.title);
        $('#lieuInfo').val(calEvent.adresse['adresse']);
        $('#startDate').val(dateDebut);
        $('#startHeure').val(heureDebut);
        $('#endDate').val(dateFin);
        $('#endHeure').val(heureFin);

        //Ajout du nombre de participants si evenement
        if(typeof calEvent.NombreDeParticipant !== 'undefined'){
            $('#rowParticipants').css("display","");
            $('#nbParticipants').val(calEvent.NombreDeParticipant);
        }else{
            $('#rowParticipants').css("display","none");
        };

        //Stock les id du planning modifiable
        updatedPlanning = calEvent.id; 
        });


    });

    function testMe(idTruck){

        
    };



//Recup des events

    function checkTheEvents(idTruck){

        //Vide le calendriers
        $('#calendar').fullCalendar('removeEvents');

        //Recup des Events
        $.ajax({
            url: "http://trucks-mania.bwb/api/trucks/"+idTruck+"/events",
            type: "GET",
            dataType: "json",
            async: false,

            success: function (data) {
                data.forEach(function(event) {
                    $('#calendar').fullCalendar('renderEvent', event, false);
                });
            },
            error: function (param1, param2) {
                console.log("error");
            }
        });
        //Recup des Plannings
        $.ajax({
            url: "http://trucks-mania.bwb/api/trucks/"+idTruck+"/planning",
            type: "GET",
            dataType: "json",
            async: false,

            success: function (data) {
                data.forEach(function(planning) {
                    $('#calendar').fullCalendar('renderEvent', planning, false);
                });
            },
            error: function (param1, param2) {
                console.log("error");
            }
        });
    }

//Update Event
    function updateMe(){

        //creation des 2 dates:
        var newDateStart = changeTheDate($('#startDate').val(),$('#startHeure').val());
        var newDateEnd= changeTheDate($('#endDate').val(),$('#endHeure').val());

        //Requete POST
        $.ajax({
            url: "http://trucks-mania.bwb/api/planning/update",
            type: "POST",
            data : {
                listeIds : updatedPlanning,
                adresse_id : $('#lieuInfo').val(),
                date_debut : newDateStart,
                date_fin : newDateEnd,
                intitule : $('#titreInfo').val()
            },

            success: function () {
                checkTheEvents(22);
            },
            error: function (param1, param2) {
                console.log("error");
            }
        });

    };

//Convert date + heure
    function changeTheDate(oldDate,oldHeure){

        var listeDate = oldDate.split('/');

        var newDate = listeDate[2]+'-'+listeDate[1]+'-'+listeDate[0]+' '+oldHeure;

        return newDate;

    }
</script>

<div class="container">
    <div class="row">
         <!-- Calendrier -->
        <div class="col-8" id='calendar'></div>

        <!-- Infos -->
        <div class="col-4" id='infosCalendar'>

            <!-- Formulaire Modifs Infos -->
            <h5>Gestion du jour</h5><!-- NICO COL ICI -> CSS -->
            <form class="form">
                <!-- Titre -->
                <div class="form-row">
                    <div class="form-group col">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Libellé</div>
                            </div>
                            <input type="text" class="form-control" id="titreInfo" placeholder="">
                        </div>
                    </div>
                </div>
                <!-- Lieu -->
                <div class="form-row">
                    <div class="form-group col">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Lieu</div>
                            </div>
                            <input type="text" class="form-control" id="lieuInfo" placeholder="">
                        </div>
                    </div>
                </div>

                <!-- Date + Heure Debut-->
                <h6>Du</h6>
                <div class="form-row">
                    <div class="form-group col-7">
                        <div class="input-group input-group-sm mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Date</div>
                            </div>
                            <input type="text" class="form-control" id="startDate" placeholder="">
                        </div>
                    </div>
                    <div class="form-group col-5">
                        <div class="input-group input-group-sm mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Heure</div>
                            </div>
                            <input type="text" class="form-control" id="startHeure" placeholder="">
                        </div>
                    </div>
                </div>
                
                <!-- Date + Heure Fin-->
                <h6>Au</h6>
                <div class="form-row">
                    <div class="form-group col-7">
                        <div class="input-group input-group-sm mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Date</div>
                            </div>
                            <input type="text" class="form-control" id="endDate" placeholder="">
                        </div>
                    </div>
                    <div class="form-group col-5">
                        <div class="input-group input-group-sm mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Heure</div>
                            </div>
                            <input type="text" class="form-control" id="endHeure" placeholder="">
                        </div>
                    </div>
                </div>
                <!-- Titre -->
                <div class="form-row" id="rowParticipants" style="display: none;">
                    <div class="form-group col">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Participants</div>
                            </div>
                            <input type="text" class="form-control" id="nbParticipants" placeholder="">
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-outline-success mb-2 btn-sm" onclick="updateMe();">Modifier</button>
            </form>
            <br>
            <h5>Gestion du mois</h5>
            <h6>Dupliquer ce mois vers le mois suivant</h6>
            <button type="button" class="btn btn-outline-info btn-sm" onclick="testMe();">Dupliquer</button>
        </div>
    </div>
</div>


<br><br><!-- NICO -->
<?php
include 'footer.php';
?>