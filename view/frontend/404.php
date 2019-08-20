<?php
http_response_code(404);
$title = 'ASLCN';
require('header.php');
$menu = view_menu(); 
require('html.php');
require('template.php');
?>

<h1>Page introuvable</h1>

