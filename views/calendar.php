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
            ],
            timeFormat: 'H:mm'
        });

        $('#calendar').fullCalendar('option', 'locale', 'fr');

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
            $('#startheure').val(heureDebut);
            $('#endDate').val(dateFin);
            $('#endHeure').val(heureFin);

            //Ajout du nombre de participants si evenement
            if(typeof calEvent.NombreDeParticipant !== 'undefined'){
                $('#rowParticipants').css("display","");
                $('#nbParticipants').val(calEvent.NombreDeParticipant);
            }else{
                $('#rowParticipants').css("display","none");
            };
            
    
        });


    });
</script>

<div class="container">
    <div class="row">
        <div class="col-8" id='calendar'></div>
        <div class="col-4" id='infosCalendar'>
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
                            <input type="text" class="form-control" id="startheure" placeholder="">
                        </div>
                    </div>
                </div>
                
                <!-- Date + Heure Debut-->
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
                <button type="submit" class="btn btn-primary mb-2">Submit</button>
            </form>
        </div>
    </div>
</div>



<?php
include 'footer.php';
?>