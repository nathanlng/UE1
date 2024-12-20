<?php

require ("../autoload.php");
include_once("../sessions.php");

if (!empty($_POST["first_name"]) && !empty($_POST["name"])) 
{
    
    $player= new Player($_SESSION["sid"],$_POST["name"],$_POST["first_name"],$_POST["age"],$_POST["description"]);
    $player->update();
    foreach (Category::getAll() as $ligne) 
        {
            $temp = $ligne->getName();
            $feature= new Feature(null,$ligne->getId(),$_POST["$temp"],$_SESSION["sid"]);
            $feature->insert();
        }
}