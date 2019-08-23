<?php
require '../src/bootstrap.php';

$data = [
    'date'  => $_GET['date'] ?? date('Y-m-d'),
    'start' => date('H:i'),
    'end'   => date('H:i')
];
$validator = new \App\Validator($data);
if (!$validator->validate('date', 'date')) {
    $data['date'] = date('Y-m-d');
}
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST;
    $validator = new Calendar\EventValidator();
    $errors = $validator->validates($_POST);
    if (empty($errors)) {
        $events = new \Calendar\Events(get_pdo());
        $event = $events->hydrate(new \Calendar\Event(), $data);
        $events->create($event);
        header('Location: ../views/viewCalendar?success=1');
        exit();
    }
}
?>