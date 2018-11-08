<?php

require_once('connection.php');

date_default_timezone_set('Asia/Jakarta');
$today = date('l');

$allSchedule = $pdo->query("SELECT * FROM schedule WHERE day = '". $today ."'")->fetchAll();
