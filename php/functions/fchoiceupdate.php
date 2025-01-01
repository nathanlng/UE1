<?php
require_once("../autoload.php");

$object = new Choice($_POST["id"], $_POST["name"],$_POST["value"],$_POST["idCategory"]);

$object->update();

header("location: ../category.php");