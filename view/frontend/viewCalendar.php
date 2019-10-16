<?php
$title = 'ASLCN';
require('html.php');
require('template.php');
?>

<h1 id="title_calendar">Calendrier des rencontres</h1>


    <link href="public/css/bootstrap.min.css" rel="stylesheet" />
    <link href="public/css/Calendar.css" rel="stylesheet" />
    <script src="public/js/jquery.js" type="text/javascript"></script>
    <script src="public/js/bootstrap.min.js"></script>
	
    <script type="text/javascript">
        // date variables
        var now = new Date();
        today = now.toISOString();

        var twoHoursLater = new Date(now.getTime() + (2 * 1000 * 60 * 60));
        twoHoursLater = twoHoursLater.toISOString();

        // Google api console clientID and apiKey 
        var clientId = '146099678255-ma2fiorqphfhuk4l686i2mh2djkv8psu.apps.googleusercontent.com';
        var apiKey = 'AIzaSyCVVVWUyooBU-M-DdwNyB93TGSdinK65jc';

        // enter the scope of current project (this API must be turned on in the Google console)
        var scopes = 'https://www.googleapis.com/auth/calendar';

        // OAuth2 functions
        function handleClientLoad() {
            gapi.client.setApiKey(apiKey);
            window.setTimeout(checkAuth, 1);
        }

        function checkAuth() {
            gapi.auth.authorize({ client_id: clientId, scope: scopes, immediate: true }, handleAuthResult);
        }

        // show/hide the 'authorize' button, depending on application state
        function handleAuthResult(authResult) {
            var authorizeButton = document.getElementById('authorize-button');
            var eventButton = document.getElementById('btnCreateEvents');
            var resultPanel = document.getElementById('result-panel');
            var resultTitle = document.getElementById('result-title');

            if (authResult && !authResult.error) {
                authorizeButton.style.visibility = 'hidden'; 		// if authorized, hide button
                resultPanel.className = resultPanel.className.replace(/(?:^|\s)panel-danger(?!\S)/g, '')	// remove red class
                resultPanel.className += ' panel-success'; 			// add green class
                resultTitle.innerHTML = 'Application Authorized'		// display 'authorized' text
                eventButton.style.visibility = 'visible';
                $("#txtEventDetails").attr("visibility", "visible");
            } else {													// otherwise, show button
                authorizeButton.style.visibility = 'visible';
                $("#txtEventDetails").attr("visibility", "hidden");
                eventButton.style.visibility = 'hidden';
                resultPanel.className += ' panel-danger'; 			// make panel red
                authorizeButton.onclick = handleAuthClick; 			// setup function to handle button click
            }
        }

        // function triggered when user authorizes app
        function handleAuthClick(event) {
            gapi.auth.authorize({ client_id: clientId, scope: scopes, immediate: false }, handleAuthResult);
            return false;
        }

        function refreshICalendarframe() {
            var iframe = document.getElementById('divifm')
            iframe.innerHTML = iframe.innerHTML;
        }
        // setup event details
        
        // function load the calendar api and make the api call
        function makeApiCall() {
            var eventResponse = document.getElementById('event-response');
           
            gapi.client.load('calendar', 'v3', function () {					// load the calendar api (version 3)
                var request = gapi.client.calendar.events.insert
                ({
                    'calendarId': '68csi3j172a6qfq44j5p1n1gls@group.calendar.google.com', // calendar ID
                    "resource": resource							// pass event details with api call
                });
                
                // handle the response from our api call
                request.execute(function (resp) {
                    if (resp.status == 'confirmed') {
                        eventResponse.innerHTML = "Event created successfully. View it <a href='" + resp.htmlLink + "'>online here</a>.";
                        eventResponse.className += ' panel-success';
                        refreshICalendarframe();
                    } else {
                        document.getElementById('event-response').innerHTML = "There was a problem. Reload page and try again.";
                        eventResponse.className += ' panel-danger';
                    }
                });
            });
        }
        var resource = {
            "summary": "My Event",
			      "start": {
                "dateTime": today
            },
            "end": {
                "dateTime": twoHoursLater
            },
            "description":"We are organizing events",
            "location":"US",
            "attendees":[
			{
					"email":"benjamin.lefebvre04@gmail.com",
					"displayName":"ben",
					"organizer":true,
					"self":false,
					"resource":false,
					"optional":false,
					"responseStatus":"needsAction",
					"comment":"This is event first",
					"additionalGuests":3
					
			},
			{	
				"email":"abc@gmail.com",
					"displayName":"Chatak",
					"organizer":true,
					"self":false,
					"resource":false,
					"optional":false,
					"responseStatus":"needsAction",
					"comment":"This is office event",
					"additionalGuests":3
			}
			],
		};

		// FUNCTION TO DELETE EVENT
	   function deleteEvent() {
		 gapi.client.load('calendar', 'v3', function() {  
		   var request = gapi.client.calendar.events.delete({
			 'calendarId': '24tn4fht2tr6mdfsdfertlsedk@group.calendar.google.com',
			 'eventId': 'Hdusrtsbs8'
		   });
		 request.execute(function(resp) {
			if (resp.status == 'confirmed') {
				alert("Event was successfully removed from the calendar!");
			}
			else{
				alert('An error occurred, please try again later.')
			}
		 });
		 });
	   } 
 

		</script>
    <script src="https://apis.google.com/js/client.js?onload=handleClientLoad" type="text/javascript"></script>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-bottom" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Google Calendar API</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">Simple Way to embed you calendar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-2 col-xs-12">
                <button id="authorize-button" style="visibility: hidden" class="btn btn-primary">
                    Authorize</button>
            </div>
            <!-- .col -->
            <div class="col-md-10 col-sm-10 col-xs-12">
                <div class="panel panel-danger" id="result-panel">
                    <div class="panel-heading">
                        <h1>
                            My Calendar</h1>
                        <h3 class="panel-title" id="result-title">
                            Application Not Authorized</h3>
                        &nbsp;
                        <p>
                            Insert Event into Public Calendar&hellip;</p>
                    </div>
                </div>
                       <!--  <input id="txtEventDetails" type="text" /> -->
                <button id="btnCreateEvents" class="btn btn-primary" onclick="makeApiCall();">
                    Create Events</button>  
				<button id="btnDeleteEvents" class="btn btn-primary" onclick="deleteEvent();">
                    Delete Events</button> 					
                <div id="event-response">
                </div>
                <div id="divifm">
                <iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=Europe%2FParis&amp;src=YmVuamFtaW4ubGVmZWJ2cmUwNEBnbWFpbC5jb20&amp;src=YXNsY240NDAwMEBnbWFpbC5jb20&amp;color=%23D81B60&amp;color=%233F51B5&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;showTz=0&amp;showDate=1&amp;showNav=1&amp;showTitle=0" style="border-width:0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
                </div>
            </div>
        </div>
    </div>



























    <p>Google Calendar API Quickstart</p>

    <!--Add buttons to initiate auth sequence and sign out-->
    <button id="authorize_button" style="display: none;">Authorize</button>
    <button id="signout_button" style="display: none;">Sign Out</button>

    <pre id="content" style="white-space: pre-wrap;"></pre>

    <script type="text/javascript">
      // Client ID and API key from the Developer Console
      var CLIENT_ID = '146099678255-ma2fiorqphfhuk4l686i2mh2djkv8psu.apps.googleusercontent.com';
      var API_KEY = 'AIzaSyCVVVWUyooBU-M-DdwNyB93TGSdinK65jc';

      // Array of API discovery doc URLs for APIs used by the quickstart
      var DISCOVERY_DOCS = ["https://www.googleapis.com/discovery/v1/apis/calendar/v3/rest"];

      // Authorization scopes required by the API; multiple scopes can be
      // included, separated by spaces.
      var SCOPES = "https://www.googleapis.com/auth/calendar";

      var authorizeButton = document.getElementById('authorize_button');
      var signoutButton = document.getElementById('signout_button');

      /**
       *  On load, called to load the auth2 library and API client library.
       */
      function handleClientLoad() {
        gapi.load('client:auth2', initClient);
      }

      /**
       *  Initializes the API client library and sets up sign-in state
       *  listeners.
       */
      function initClient() {
        gapi.client.init({
          apiKey: API_KEY,
          clientId: CLIENT_ID,
          discoveryDocs: DISCOVERY_DOCS,
          scope: SCOPES
        }).then(function () {
          // Listen for sign-in state changes.
          gapi.auth2.getAuthInstance().isSignedIn.listen(updateSigninStatus);

          // Handle the initial sign-in state.
          updateSigninStatus(gapi.auth2.getAuthInstance().isSignedIn.get());
          authorizeButton.onclick = handleAuthClick;
          signoutButton.onclick = handleSignoutClick;
        }, function(error) {
          appendPre(JSON.stringify(error, null, 2));
        });
      }

      /**
       *  Called when the signed in status changes, to update the UI
       *  appropriately. After a sign-in, the API is called.
       */
      function updateSigninStatus(isSignedIn) {
        if (isSignedIn) {
          authorizeButton.style.display = 'none';
          signoutButton.style.display = 'block';
          listUpcomingEvents();
        } else {
          authorizeButton.style.display = 'block';
          signoutButton.style.display = 'none';
        }
      }

      /**
       *  Sign in the user upon button click.
       */
      function handleAuthClick(event) {
        gapi.auth2.getAuthInstance().signIn();
      }

      /**
       *  Sign out the user upon button click.
       */
      function handleSignoutClick(event) {
        gapi.auth2.getAuthInstance().signOut();
      }

      /**
       * Append a pre element to the body containing the given message
       * as its text node. Used to display the results of the API call.
       *
       * @param {string} message Text to be placed in pre element.
       */
      function appendPre(message) {
        var pre = document.getElementById('content');
        var textContent = document.createTextNode(message + '\n');
        pre.appendChild(textContent);
      }

      /**
       * Print the summary and start datetime/date of the next ten events in
       * the authorized user's calendar. If no events are found an
       * appropriate message is printed.
       */
      function listUpcomingEvents() {
        gapi.client.calendar.events.list({
          'calendarId': 'primary',
          'timeMin': (new Date()).toISOString(),
          'showDeleted': false,
          'singleEvents': true,
          'maxResults': 10,
          'orderBy': 'startTime'
        }).then(function(response) {
          var events = response.result.items;
          appendPre('Upcoming events:');

          if (events.length > 0) {
            for (i = 0; i < events.length; i++) {
              var event = events[i];
              var when = event.start.dateTime;
              if (!when) {
                when = event.start.date;
              }
              appendPre(event.summary + ' (' + when + ')')
            }
          } else {
            appendPre('No upcoming events found.');
          }
        });
      }

    </script>

    <script async defer src="https://apis.google.com/js/api.js"
      onload="this.onload=function(){};handleClientLoad()"
      onreadystatechange="if (this.readyState === 'complete') this.onload()">
    </script>








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

  <?php  if($_SESSION['admin'] == true) { ?>

    <div class="button_modif">
      <a href="https://calendar.google.com/calendar/b/2/r/month/2019/10/16?eid=MjVvc2ZtaTc1c2NkOWRxa3JiNzYwNTlpajggYXNsY240NDAwMEBt&sf=true">+</a>
    </div>

  <?php } ?>

</body>