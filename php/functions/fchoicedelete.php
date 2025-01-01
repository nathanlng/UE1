<?php
require_once("../autoload.php");

Choice::delete($_GET['id']);

header("location: ../category.php");