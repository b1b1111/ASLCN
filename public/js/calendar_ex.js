
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

/* Function invoked when the client javascript library is loaded */
function handleClientLoad() {
console.log("Inside handleClientLoad ...");
gapi.client.setApiKey(apiKey);
window.setTimeout(checkAuth,100);
}

/* API function to check whether the app is authorized. */
function checkAuth() {
console.log("Inside checkAuth ...");
gapi.auth.authorize({client_id: clientId, scope: scopes, immediate: true}, 
              handleAuthResult);
}

/* Invoked by different functions to handle the result of authentication checks.*/
var authData;
function handleAuthResult(authResult) {
console.log("Inside handleAuthResult ...");
authData = authResult;
var authorizeButton = document.getElementById('authorize-button');
var addButton = document.getElementById('addToCalendar');
if (authResult && !authResult.error) {
  authorizeButton.style.visibility = 'hidden';
  addButton.style.visibility = 'visible'; 
  //load the calendar client library
  gapi.client.load('calendar', 'v3', function(){ 
    console.log("Calendar library loaded.");
  });
} else {
  authorizeButton.style.visibility = '';
  authorizeButton.onclick = handleAuthClick;
}
}


/* Event handler that deals with clicking on the Authorize button.*/
function handleAuthClick(event) {
gapi.auth.authorize({client_id: clientId, scope: scopes, immediate: false}, 
                handleAuthResult);
return false;
}

/* End of PART 1 - Authentication Process. */

/* Start of PART 2 - dealing with events from the user interface and 
performing API calls. */


var addButton = document.getElementById('addToCalendar');
addButton.onclick = function(){
var userChoices = getUserInput();
console.log(userChoices);
if (userChoices) 
createEvent(userChoices);
}

function getUserInput(){

var date = document.querySelector("#date").value;
var startTime = document.querySelector("#start").value;
var endTime = document.querySelector("#end").value;
var eventDesc = document.querySelector("#event").value;

// check input values, they should not be empty
if (date=="" || startTime=="" || endTime=="" || eventDesc==""){
alert("All your input fields should have a meaningful value.");
return
}
else return {'date': date, 'startTime': startTime, 'endTime': endTime,
       'eventTitle': eventDesc}
}


// Make an API call to create an event.  Give feedback to user.
function createEvent(eventData) {
// First create resource that will be send to server.
var resource = {
"summary": eventData.eventTitle,
"start": {
  "dateTime": new Date(eventData.date + " " + eventData.startTime).toISOString()
},
"end": {
  "dateTime": new Date(eventData.date + " " + eventData.endTime).toISOString()
  }
};
// create the request
var request = gapi.client.calendar.events.insert({
'calendarId': '68csi3j172a6qfq44j5p1n1gls@group.calendar.google.com',
'resource': resource
});

// execute the request and do something with response
request.execute(function(resp) {
console.log(resp);
alert("Your event was added to the calendar.");
});
} 
