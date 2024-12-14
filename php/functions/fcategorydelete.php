<?php
require_once("../autoload.php");
/*
$systeme = SystemeSolaire::getOne($_GET['id']);
$systeme->delete();
*/
Category::delete($_GET['id']);

header("location: ../category.php");