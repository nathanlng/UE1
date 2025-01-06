<?php

// pas encore utilisé

    require_once "autoload.php";
    include ("includes/header.php");
    include_once("sessions.php");

$temp =Player::getAll();
$players= [];

foreach ($temp as $player) {
    if ($player->getDisplay() == 1) {
       $players[]= $player;
    }
}


$result = array_filter($players,function($element){
    
});

foreach (Category::getAll() as $category) {
    if ($category->getTypeOf()=="select") {
        $temp = $category->getName();
        if (isset($_POST["$temp"])) {
            echo $_POST["$temp"];
        }
    }
    elseif ($category->getTypeOf()=="number") {
        $temp = $category->getName();
        if (!empty($_POST["min".$temp.""])) {
            echo $_POST["min".$temp.""];
        }

        if (!empty($_POST["max".$temp.""])) {
            echo $_POST["max".$temp.""];
        }
    }
}