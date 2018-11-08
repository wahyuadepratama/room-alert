<?php

require_once('connection.php');
$id = $_GET['id'];

$allSchedule = $pdo->query("SELECT * FROM schedule WHERE id = '". $id ."'")->fetchAll();
