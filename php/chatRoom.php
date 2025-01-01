<?php

require_once "autoload.php";
include("includes/header.php");
include_once("sessions.php");

foreach (Chat::getAll($_SESSION["sid"],$_SESSION["srole"]) as $chat) {
    if ($_SESSION["srole"]=="player") {
        $recruiter = Recruiter::getOne($chat->getIdRecruiter());
        echo "<div class='chat'>".$recruiter->getName();
        ?>
        <a href="chat.php?id=<?php echo $recruiter->getId()?>">chat</a>
        </div>
        <?php
    } else {
        $player = Player::getOne($chat->getIdPlayer());
        echo "<div class='chat'>".$player->getName();
        ?>
        <a href="chat.php?id=<?php echo $player->getId()?>">chat</a>
        </div>
        <?php
    }
}

?>