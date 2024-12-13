<?php
require_once("../autoload.php");

$systeme = new Choice($_POST["id"], $_POST["name"],$_POST["value"],$_POST["idFeature"]);

$systeme->update();

header("location: ../features.php");