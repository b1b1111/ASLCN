<?php
require 'src/bootstrap.php';
$pdo = get_pdo();
$events = new Calendar\Events($pdo);
if (!isset($_GET['id'])) {
    header('location: 404.php');
}
try {
    $event = $events->find($_GET['id']);
} catch (\Exception $e) {
    e404();
}

?>

