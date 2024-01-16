<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'reservation_db';

$db = mysqli_connect($host, $username, $password, $database)
or die('Error 69420: ' . mysqli_connect_error());
?>
