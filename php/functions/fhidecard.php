<?php

require ("../autoload.php");
include_once("../sessions.php");

$player = Player::getOne($_GET["id"]);
$player->setDisplay(0);
$player->update();