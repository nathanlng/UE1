<?php

require ("../autoload.php");
include_once("../sessions.php");

$player = Player::getOne($_GET["id"]);
// change le display du joueur ce qui fait qu'il ne sera pas affiché
$player->setDisplay(0);
$player->update();

header("location:../link.php");