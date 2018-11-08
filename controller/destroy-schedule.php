<?php

require_once('connection.php');

$where = ['id' => $_GET['id']];
$pdo->prepare("DELETE FROM schedule WHERE id=:id")->execute($where);

header('Location: ../schedule.php');
