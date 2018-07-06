
<script>
    var datas = [];
    var listeEvents = {
        events:[]
    };
    var listePlanning = {
        events:[]
    };

    var updatedPlanning;

    var idTruck = $id;

//Chargement Calendar
    $(document).ready(function() {

        // Recup des Events
        checkTheEvents(idTruck);
    
        var calendar = $('#calendar').fullCalendar('getCalendar');

        //Recup du clik utilsateur
        calendar.on('eventClick', function(calEvent, jsEvent, view) {

        var dateDebut = calEvent.start.format('DD/MM/YYYY');
        var heureDebut = calEvent.start.format('HH:mm');
        var dateFin = calEvent.end.format('DD/MM/YYYY');
        var heureFin = calEvent.end.format('HH:mm');

        $('#titreInfo').val(calEvent.title);
        $('#user_input_autocomplete_address').val(calEvent.adresse['adresse']);
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

        //Modif du bouton
        if(typeof calEvent.NombreDeParticipant !== 'undefined'){
            $('#modifButt').attr('class', 'btn btn-outline-danger btn-sm');
            $('#modifButt').attr('onclick', 'deleteEvent('+idTruck+','+calEvent.id+')');
            $('#modifButt').html('Supprimer');
        }else{
            $('#modifButt').attr('class', 'btn btn-outline-success btn-sm');
            $('#modifButt').attr('onclick', 'updateMe();');
            $('#modifButt').html('Modifier');
        };

        //Stock les id du planning modifiable
        updatedPlanning = calEvent.id; 
        });


    });

//Recup des events

    function checkTheEvents(idTruck){

        $('#calendar').fullCalendar({
            locale: 'fr',
            //showNonCurrentDates: false,
            timeFormat: 'H:mm'
        });

        //Vide le calendriers
        $('#calendar').fullCalendar('removeEventSources');

        //Vide les sources
        listeEvents = {
            events:[]
        };
        listePlanning = {
            events:[]
        };

        //Recup des Events
        $.ajax({
            url: "http://trucks-mania.bwb/api/trucks/"+idTruck+"/events",
            type: "GET",
            dataType: "json",
            async: false,

            success: function (data) {
                data.forEach(function(event) {
                    listeEvents.events.push(event);
                });
                $('#calendar').fullCalendar('addEventSource', listeEvents);
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
                    listePlanning.events.push(planning);
                });
                $('#calendar').fullCalendar('addEventSource', listePlanning);
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

        //Preparation adresse
        newAdresse = $('#user_input_autocomplete_address').val().replace(/, France/g,'');

        //Requete POST
        $.ajax({
            url: "http://trucks-mania.bwb/api/planning/update",
            type: "POST",
            data : {
                listeIds : updatedPlanning,
                adresse : newAdresse,
                date_debut : newDateStart,
                date_fin : newDateEnd,
                intitule : $('#titreInfo').val()
            },

            success: function () {
                checkTheEvents(idTruck);
            },
            error: function (param1, param2) {
                console.log("error");
            }
        });

    };

//Supprimer la participation à un évenement api/trucks/(:)/events/(:)

    function deleteEvent(idTruck,idEvent){

        $.ajax({
            url: "http://trucks-mania.bwb/api/trucks/"+idTruck+"/events/"+idEvent,
            type: "DELETE",

            success: function () {
                checkTheEvents(idTruck);
            },
            error: function (param1, param2) {
                console.log("error");
            }
        });
    }

//Duplicate du mois

    function cloneMe(){

        var dateStart = $('#calendar').fullCalendar('getView').start;
        var dateEnd = $('#calendar').fullCalendar('getView').end.subtract(1, 'days');

        //Mois en cours
        var thisMonthStart = $('#calendar').fullCalendar('getView').start.format('YYYY-MM-DD').toString();
        var thisMonthEnd = $('#calendar').fullCalendar('getView').intervalEnd.subtract(1, 'days').format('YYYY-MM-DD').toString();

        //next mois
        var nextMonthStart = $('#calendar').fullCalendar('getView').intervalStart.add(1, 'months').format('YYYY-MM-DD').toString();
        var nextMonthEnd = $('#calendar').fullCalendar('getView').intervalEnd.add(1, 'months').format('YYYY-MM-DD').toString();


        //Requete POST
        $.ajax({
            url: "http://trucks-mania.bwb/api/trucks/"+idTruck+"/planning/duplicate",
            type: "POST",
            data : {
                PostThisMonthStart : thisMonthStart,
                PostThisMonthEnd : thisMonthEnd,
                PostNextMonthStart : nextMonthStart,
                PostNextMonthEnd : nextMonthEnd
            },

            success: function () {
                checkTheEvents(idTruck);
                $('#calendar').fullCalendar('next');
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

    <div class="row">
         <!-- Calendrier -->
        <div class="col-8" id='calendar'></div>

        <!-- Infos -->
        <div class="col-4" id='infosCalendar'>

            <!-- Formulaire Modifs Infos -->
            <h5>Gestion du jour</h5>
            <form class="form">
                <!-- Titre -->
                <div class="form-row">
                    <div class="form-group">
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
                    <div class="form-group">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Lieu</div>
                            </div>
                            <input class="form-control" type="text" id="user_input_autocomplete_address">
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
                <button id="modifButt" type="button" class="btn btn-outline-success mb-2 btn-sm" onclick="updateMe();">Modifier</button>
            </form>
            <br>
            <h5>Gestion du mois</h5>
            <h6>Dupliquer le planning vers le mois suivant</h6>
            <button type="button" class="btn btn-outline-info btn-sm" onclick="cloneMe();">Dupliquer</button>
        </div>
    </div>
