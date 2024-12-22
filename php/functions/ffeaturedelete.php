<?php
require_once("../autoload.php");
require_once("../sessions.php");

$objet = Feature::getOne($_GET["id"]);

$objet->delete();

header("location: ../feature.php");