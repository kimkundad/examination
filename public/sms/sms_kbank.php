<?php

require 'config.php';

$jsonObject = json_decode(implode('', file("php://input")));

$mysqli->query("INSERT INTO sms(subject, message, date_time) VALUES ('".$jsonObject->subject."','".$jsonObject->message."','".date('Y-m-d H:i:s')."')");

?>