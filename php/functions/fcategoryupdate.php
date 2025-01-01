<?php
require_once("../autoload.php");

$object = new Category($_POST["id"], $_POST["name"],$_POST["typeOf"]);

$objet->update();

header("location: ../category.php");