<?php
require 'src/bootstrap.php';
$pdo = get_pdo();
$events = new Calendar\Events($pdo);
$errors = [];
try {
    $event = $events->find($_GET['id'] ?? null);
} 
catch (\Exception $e) {
    e404();
} 
catch (\Error $e) {
    e404();
}

$data = [
    'teamName'    => $event->getTeamName(),
    'name'        => $event->getName(),
    'date'        => $event->getStart()->format('Y-m-d'),
    'start'       => $event->getStart()->format('H:i'),
    'end'         => $event->getEnd()->format('H:i'),
    'description' => $event->getDescription()
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST;
    $validator = new Calendar\EventValidator();
    $errors = $validator->validates($data);
    if (empty($errors)) {
        $events->hydrate($event, $data);
        $events->update($event);
        header('Location: '. $_POST['URL_PATH'] . 'calendrier?success=1');
        exit();
    }
}

?>

