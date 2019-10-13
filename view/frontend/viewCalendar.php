<?php
$title = 'ASLCN';
require('html.php');
require('template.php');
?>

<h1 id="title_calendar">Calendrier des rencontres</h1>

<p id="p_calendar" >Perdu dans les dates ? N'hésite pas à jeter un oeil au calendrier, tu peux même enregistrer dans ton agenda les prochaines rencontres.</p>

<!-- Include CSS for JQuery Frontier Calendar plugin (Required for calendar plugin) -->
<link rel="stylesheet" type="text/css" href="../aslcn/public/css/frontierCalendar/jquery-frontier-cal-1.3.2.css" />

<!-- Include CSS for color picker plugin (Not required for calendar plugin. Used for example.) -->
<link rel="stylesheet" type="text/css" href="../aslcn/public/css/colorpicker/colorpicker.css" />

<!-- Include CSS for JQuery UI (Required for calendar plugin.) -->
<link rel="stylesheet" type="text/css" href="../aslcn/public/css/jquery-ui/smoothness/jquery-ui-1.8.1.custom.css" />

<!--
Include JQuery Core (Required for calendar plugin)
** This is our IE fix version which enables drag-and-drop to work correctly in IE. See README file in js/jquery-core folder. **
-->
<script type="text/javascript" src="../aslcn/public/js/jquery-core/jquery-1.4.2-ie-fix.min.js"></script>

<!-- Include JQuery UI (Required for calendar plugin.) -->
<script type="text/javascript" src="../aslcn/public/js/jquery-ui/smoothness/jquery-ui-1.8.1.custom.min.js"></script>

<!-- Include color picker plugin (Not required for calendar plugin. Used for example.) -->
<script type="text/javascript" src="../aslcn/public/js/colorpicker/colorpicker.js"></script>

<!-- Include jquery tooltip plugin (Not required for calendar plugin. Used for example.) -->
<script type="text/javascript" src="../aslcn/public/js/jquery-qtip-1.0.0-rc3140944/jquery.qtip-1.0.js"></script>

<!--
    (Required for plugin)
    Dependancies for JQuery Frontier Calendar plugin.
    ** THESE MUST BE INCLUDED BEFORE THE FRONTIER CALENDAR PLUGIN. **
-->
<script type="text/javascript" src="../aslcn/public/js/lib/jshashtable-2.1.js"></script>

<!-- Include JQuery Frontier Calendar plugin -->
<script type="text/javascript" src="../aslcn/public/js/frontierCalendar/jquery-frontier-cal-1.3.2.min.js"></script>






<iframe src="https://calendar.google.com/calendar/b/2/embed?height=600&amp;wkst=2&amp;bgcolor=%231e2a36&amp;ctz=Europe%2FParis&amp;src=YXNsY240NDAwMEBnbWFpbC5jb20&amp;color=%23039BE5&amp;showTitle=0&amp;showDate=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;showTz=0&amp;title=ASLCN" style="border-width:0" width="100%" height="600" frameborder="0" scrolling="no"></iframe>