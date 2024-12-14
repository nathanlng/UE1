<?php
require_once("../autoload.php");

$systeme = new Category($_POST["id"], $_POST["name"],$_POST["typeOf"]);

$systeme->update();

header("location: ../category.php");