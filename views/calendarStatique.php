
<script>
    var datas = [];
    var listeEvents = {
        events:[]
    };
    var listePlanning = {
        events:[]
    };

    var updatedPlanning;

    var idTruck = $('#idTruck').val();

//Chargement Calendar
    $(document).ready(function() {

        // Recup des Events
        checkTheEvents(idTruck);
    
        var calendar = $('#calendar').fullCalendar('getCalendar');

    });

//Recup des events

    function checkTheEvents(idTruck){

        $('#calendar').fullCalendar({
            locale: 'fr',
            showNonCurrentDates: false,
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

</script>

    <div class="row">
         <!-- Calendrier -->
        <div class="col" id='calendar'></div>
    </div>
