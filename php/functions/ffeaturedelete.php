<?php
require_once("../autoload.php");
/*
$systeme = SystemeSolaire::getOne($_GET['id']);
$systeme->delete();
*/
Feature::delete($_GET['id']);

header("location: ../features.php");