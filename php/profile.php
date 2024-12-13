<?php
    include ("includes/header.php");
    require ("autoload.php");
include_once("db.php");
include_once("fonctions.php");
include_once("sessions.php");

var_dump(User::getOne($_SESSION["sid"]));
?>
