<?php
$title = 'ASLCN';
require('html.php');
require('template.php');
?>

<h1 id="title_calendar">Calendrier des rencontres</h1>

<script>

$(document).ready(function () {
    var calendar = $('#calendar').fullCalendar({
        editable: true,
        events: "<?= $_POST['URL_PATH'] ?>model/calendar/fetch-event.php",
        displayEventTime: false,
        eventRender: function (event, element, view) {
            if (event.allDay === 'true') {
                event.allDay = true;
            } else {
                event.allDay = false;
            }
        },

        selectable: true,
        selectHelper: true,
        select: function (start, end, allDay) {
            var title = prompt('Titre de la rencontre:');
   
            if (title) {
                var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                
                <?php  if($_SESSION['id'] == true) { ?>
                $.ajax({
                    url: '<?= $_POST['URL_PATH'] ?>model/calendar/add-event.php',
                    data: 'title=' + title + '&start=' + start + '&end=' + end,
                    type: "POST",
                    success: function (data) {
                        displayMessage("C'est dans la boite");
                    }
                });

                
                calendar.fullCalendar('renderEvent',
                        {
                            title: title,
                            start: start,
                            end: end,
                            allDay: allDay
                        },
                true
                        );
            }
            calendar.fullCalendar('unselect');
        },
        
        editable: true,
        eventDrop: function (event, delta) {
            var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
            var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
            $.ajax({
                url: '<?= $_POST['URL_PATH'] ?>model/calendar/edit-event.php',
                data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
                type: "POST",
                success: function (response) {
                    displayMessage("Modif ok");
                }
            });
        },

        <?php } ?>

        <?php  if($_SESSION['admin'] == true) { ?>
        eventClick: function (event) {
            var deleteMsg = confirm("Souhaite tu vraiment supprimer ?");
            if (deleteMsg) {
                $.ajax({
                    type: "POST",
                    url: "<?= $_POST['URL_PATH'] ?>model/calendar/delete-event.php",
                    data: "&id=" + event.id,
                    success: function (response) {
                        if(parseInt(response) > 0) {
                            $('#calendar').fullCalendar('removeEvents', event.id);
                            displayMessage("Suppression ok");
                        }
                    }
                });
            }
        }
        <?php } ?>

    });
});

function displayMessage(message) {
	    $(".response").html("<div class='success'>"+message+"</div>");
    setInterval(function() { $(".success").fadeOut(); }, 3000);
}
</script>

<style>
    
body {
    margin-top: 50px;
    text-align: center;  
}

#calendar {
    font-size: 12px;
    font-family: "Lucida Grande", Helvetica, Arial, Verdana, sans-serif;
    width: 90%;
    margin: 0 auto;
}

.response {
    height: 60px;
}

.success {
    background: rgb(247, 126, 14);
    padding: 10px 60px;
    border: rgb(247, 126, 14) 1px solid;
    display: inline-block;
}
</style>
</head>
<body>
    <div class="response"></div>
    <div id='calendar'></div>
</body>


