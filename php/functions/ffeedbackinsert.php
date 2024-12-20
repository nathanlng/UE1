<?php
session_start();
require_once("../autoload.php");
include_once("../sessions.php");


$tab = User::getOne($_SESSION["sid"])->getFeedback($_SESSION["sid"]);
if (count($tab)<3 or is_admin()) {
    $date= new DateTime();
$systeme = new Feedback(null,$_SESSION["sid"],$_POST["fbTitle"],$date->format('Y-m-d H:i:s'),$_POST["fbNote"],$_POST["feedback"],$_POST["fbMail"],$_POST["fbCountry"],$_POST["fbCity"]);

$systeme->insert();
}


header("location: ../contact.php");