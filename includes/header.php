<?php
require_once("includes/config.php");
require_once("includes/classes/PreviewProvider.php");
require_once("includes/classes/Entity.php");





if (!isset($_SESSION["userLoggedIn"])) {
    header("Location: register.php");
};


$userLoggedIn = $_SESSION["userLoggedIn"];


?>

<!DOCTYPE html>
<html>

<head>
    <title>Netflix</title>
    <link rel="stylesheet" type="text/css" href="assets/styles/style.css" />
    <script src="https://kit.fontawesome.com/06a651c8da.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">
    </script>
    <script src="assets/js/script.js"></script>
</head>

<body>
    <div class="wrapper">