<?php
$title = 'ASLCN';
require('html.php');
require('template.php'); 
?>

<?php foreach($event as $p) { 
   echo "<p>" . $p['name'] . "&nbsp;" . "<a href='#' class='" .$p['id']. "name='id_event'" . "'>Vote</a>&nbsp;(".$p['vote'].")</p>";

} ?>

<?php foreach($event as $a) { ?>
   <p><?= $a['name'] ?>&nbsp; <a href='#' class="<?= $a['id'] ?>">Vote</a>&nbsp;(<?= $a['vote']?>)</p>;

<?php } ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
	<script src="/aslcn/public/js/vote.js"></script>