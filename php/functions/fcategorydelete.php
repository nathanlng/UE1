<?php
require_once("../autoload.php");

Category::delete($_GET['id']);

header("location: ../category.php");