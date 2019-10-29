<?php
$title = 'ASLCN';
require('html.php');
require('template.php');
?>

<script>

$(document).ready(function () {
    var calendar = $('#pres').fullCalendar({
        editable: true,
        events: "<?= $_POST['URL_PATH'] ?>model/calendar/fetch-pres.php",
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
            var title = prompt('Ton blaze:');
   
            if (title) {
                var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                
                $.ajax({
                    url: '<?= $_POST['URL_PATH'] ?>model/calendar/add-pres.php',
                    data: 'title=' + title + '&start=' + start + '&end=' + end,
                    type: "POST",
                    success: function (data) {
                        displayMessage("Prejent");
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
                url: '<?= $_POST['URL_PATH'] ?>model/calendar/edit-pres.php',
                data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
                type: "POST",
                success: function (response) {
                    displayMessage("Modif ok");
                }
            });
        },


        eventClick: function (event) {
            var deleteMsg = confirm("Souhaite tu vraiment supprimer ?");
            if (deleteMsg) {
                $.ajax({
                    type: "POST",
                    url: "<?= $_POST['URL_PATH'] ?>model/calendar/delete-pres.php",
                    data: "&id=" + event.id,
                    success: function (response) {
                        if(parseInt(response) > 0) {
                            $('#pres').fullCalendar('removeEvents', event.id);
                            displayMessage("Suppression ok");
                        }
                    }
                });
            }
        }

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

.fc-event {
    font-size: 1em !important;
    background: #e6be0b !important;
    border: 1px solid #ffd000;
}

#pres {
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

<body>
    <div class="response"></div>
    <div id='pres'></div>
</body>