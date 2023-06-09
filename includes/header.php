<?php

require_once("includes/config.php");
require_once("includes/classes/PreviewProvider.php");
require_once("includes/classes/Entity.php");
require_once("includes/classes/EntityProvider.php");
require_once("includes/classes/CategoryContainers.php");
require_once("includes/classes/ErrorMessage.php");
require_once("includes/classes/SeasonProvider.php");
require_once("includes/classes/Season.php");
require_once("includes/classes/Video.php");


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