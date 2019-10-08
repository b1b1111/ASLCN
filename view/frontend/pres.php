<?php
$title = 'ASLCN';
require('html.php');
require('template.php');
require_once('model/postManager.php');
?>

<?php 
vote(1);

foreach($evenement as $p) { 

    echo"<p>".$p['name']."<a href='#' class='".$p['id']."'> Vote </a>(<span id='id".$p['id']."'>".$p['vote']."</span>)</p>";

} ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
	<script src="/aslcn/public/js/vote.js"></script>