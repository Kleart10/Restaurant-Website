<?php
// php/connect.php
$host = 'localhost';
$username = 'root'; //  MySQL username
$password = ''; //  MySQL password
$database = 'restaurant_reservation'; //  database name

$connection = new mysqli($host, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>
