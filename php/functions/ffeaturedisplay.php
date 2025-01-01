<?php

require ("../autoload.php");
include_once("../sessions.php");

$player = Player::getOne($_SESSION["sid"]);
foreach ($player->getFeatures() as $feature) 
{
    $temp = "check".$feature->getId();
    if (isset($_POST["$temp"]) && $_POST["$temp"]==true) 
    {
        $feature->setDisplay(1);
    } 
    else 
    {
        $feature->setDisplay(0);
    }
    $feature->display();
}

header("location: ../feature.php");

    