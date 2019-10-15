<?php
$title = 'ASLCN';
require('html.php');
require('template.php');
?>

<h1 id="title_calendar">Calendrier des rencontres</h1>

<link href='<?= $_POST['URL_PATH'] ?>packages/core/main.css' rel='stylesheet' />
<link href='<?= $_POST['URL_PATH'] ?>packages/daygrid/main.css' rel='stylesheet' />
<link href='<?= $_POST['URL_PATH'] ?>packages/list/main.css' rel='stylesheet' />
<script src='<?= $_POST['URL_PATH'] ?>packages/core/main.js'></script>
<script src='<?= $_POST['URL_PATH'] ?>packages/interaction/main.js'></script>
<script src='<?= $_POST['URL_PATH'] ?>packages/daygrid/main.js'></script>
<script src='<?= $_POST['URL_PATH'] ?>packages/list/main.js'></script>
<script src='<?= $_POST['URL_PATH'] ?>packages/google-calendar/main.js'></script>
<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {

      plugins: [ 'interaction', 'dayGrid', 'list', 'googleCalendar' ],
      
     
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,listYear'
      },

      displayEventTime: false, // don't show the time column in list view

      googleCalendarApiKey: 'AIzaSyCVVVWUyooBU-M-DdwNyB93TGSdinK65jc',

      events:'aslcn44000@gmail.com',

      eventClick: function(arg) {
        // opens events in a popup window
        window.open(arg.event.url, 'google-calendar-event', 'width=700,height=600');

        arg.jsEvent.preventDefault() // don't navigate in main tab
      },

      loading: function(bool) {
        document.getElementById('loading').style.display =
          bool ? 'block' : 'none';
      }

    });

    calendar.render();
  });

</script>
<style>

  body {
    margin: 40px 10px;
    padding: 0;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
  }

  #loading {
    display: none;
    position: absolute;
    top: 10px;
    right: 10px;
  }

  #calendar {
    max-width: 900px;
    margin: 0 auto;
  }

</style>
</head>
<body>

  <div id='loading'>loading...</div>

  <div id='calendar'></div>

    <div class="button_modif">
      <a href="https://calendar.google.com/calendar/b/2/r/month/2019/10/16?eid=MjVvc2ZtaTc1c2NkOWRxa3JiNzYwNTlpajggYXNsY240NDAwMEBt&sf=true">+</a>
    </div>


</body>