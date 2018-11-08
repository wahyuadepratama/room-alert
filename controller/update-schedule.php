<?php

require_once('connection.php');

$row = [
    'name' => $_POST['name'],
    'day' => $_POST['day'],
    'start_hour' => $_POST['start_hour'],
    'start_minute' => $_POST['start_minute'],
    'finish_hour' => $_POST['finish_hour'],
    'finish_minute' => $_POST['finish_minute']
];

$id = $_GET['id'];

$sql = "UPDATE schedule SET name=:name, day=:day, start_hour=:start_hour, start_minute=:start_minute, finish_hour=:finish_hour, finish_minute=:finish_minute WHERE id = '". $id ."';";
$status = $pdo->prepare($sql)->execute($row);

header('Location: ../schedule.php');
