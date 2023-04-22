<?php

ob_start();
session_start();

$timezone = date_default_timezone_set("Europe/Sofia");
$db = "netflix-clone";
$host = "localhost";
$username = "root";
$pass = "";

try {
    $conn  = new PDO("mysql:dbname=$db;host=$host", "$username", "$pass");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (PDOException $e) {
    exit("Connection failed: " . $e->getMessage());
}
