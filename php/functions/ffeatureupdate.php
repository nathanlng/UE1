<?php
require_once("../autoload.php");

$systeme = new Feature($_POST["id"], $_POST["name"],$_POST["typeOf"]);

$systeme->update();

header("location: ../features.php");