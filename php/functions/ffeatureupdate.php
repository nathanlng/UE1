<?php
require_once("../autoload.php");
require_once("../sessions.php");

$objet = new Feature($_POST["id"],$_POST["category"] ,$_POST["value"],$_SESSION["sid"],$_SESSION["display"]);

$objet->update();

header("location: ../feature.php");