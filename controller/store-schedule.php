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
$sql = "INSERT INTO schedule SET name=:name, day=:day, start_hour=:start_hour, start_minute=:start_minute, finish_hour=:finish_hour, finish_minute=:finish_minute;";
$status = $pdo->prepare($sql)->execute($row);

if ($status) {
    $lastId = $pdo->lastInsertId();
}

header('Location: ../');
