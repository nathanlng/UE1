<?php
require_once("../autoload.php");

$systeme = new Choice($_POST["id"], $_POST["name"],$_POST["value"],$_POST["idCategory"]);

$systeme->update();

header("location: ../category.php");