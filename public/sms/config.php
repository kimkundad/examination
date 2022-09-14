<?php 

$db_host        = '127.0.0.1';
$db_user        = 'root';
$db_pass        = 'Kim_14298009GG';
$db_database    = 'examination'; 
$db_port        = '3306';

$mysqli = new mysqli($db_host,$db_user,$db_pass,$db_database,$db_port);

$mysqli->query("SET time_zone = '+7:00'");

define('TIMEZONE', 'Asia/Bangkok');
date_default_timezone_set(TIMEZONE);

?>