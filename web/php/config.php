<?php
session_start();

$host = "localhost";
$username = "root";
$password = "";
$dbname = "example";

$conn = new mysqli($host, $username, $password, $dbname);

?>