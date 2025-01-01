<?php
require_once("../autoload.php");
require_once("../sessions.php");

$object = Feature::getOne($_GET["id"]);

$object->delete();

header("location: ../feature.php");