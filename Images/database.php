<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'reservation_db';

$db = mysqli_connect($host, $username, $password, $database)
// foutafhandeling
or die("Error: " . mysqli_connect_error());

