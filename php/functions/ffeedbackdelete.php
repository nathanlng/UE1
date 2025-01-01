<?php
require_once("../autoload.php");

Feedback::delete($_GET['id']);

header("location: ../feedbackList.php");