<?php
    require_once "autoload.php";
    include ("includes/header.php");
    include_once("sessions.php");

    foreach (Player::getAll() as $player) {
        echo $player->getId()."<br />";
    }
?>