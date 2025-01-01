<?php

require_once("../autoload.php");
include_once("../sessions.php");

$dateTime = new DateTime();

$message = new Message(null,$_POST["idChat"],$_POST["message"],$dateTime->format('Y/m/d H/i'),$_SESSION["sid"]);
$message->insert();

header("location: ../chat.php?id=".$_GET["id"]."");