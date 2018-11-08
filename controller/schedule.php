<?php

require_once('connection.php');

$allSchedule = $pdo->query("SELECT * FROM schedule")->fetchAll();
