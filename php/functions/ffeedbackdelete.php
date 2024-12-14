<?php
require_once("../autoload.php");
/*
$systeme = SystemeSolaire::getOne($_GET['id']);
$systeme->delete();
*/
Feedback::delete($_GET['id']);

header("location: ../feedbackList.php");