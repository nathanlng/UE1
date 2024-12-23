<?php
require_once("../autoload.php");
require_once("../sessions.php");

if (!empty($_POST["firstName"]) && !empty($_POST["name"]) && !empty($_POST["age"]) && !empty($_POST["picture"]) && !empty($_POST["description"])) {
    $player = Player::getOne($_SESSION["sid"]);
    $player->setFirstName($_POST["firstName"]);
    $player->setName($_POST["name"]);
    $player->setAge($_POST["age"]);
    $player->setPicture($_POST["picture"]);
    $player->setDescription($_POST["description"]);

    $player->update();
}

header("location: ../feature.php");