<?php
require_once "autoload.php";
include("includes/header.php");
include_once("sessions.php");

if ($_SESSION["srole"]=="recruiter") 
{
    $recruiter = Recruiter::getOne($_SESSION["sid"]);
    $player = Player::getOne($_GET["id"]);
}
else if ($_SESSION["srole"]=="player")
{
    $recruiter = Recruiter::getOne($_GET["id"]);
    $player = Player::getOne($_SESSION["sid"]);
}

if (Chat::getOne($recruiter->getId(),$player->getId()) != null) 
{
   echo "<div id='messageContainer'>";
   $chat= Chat::getOne($recruiter->getId(),$player->getId());
   foreach ($chat->getMessages($chat->getId()) as $message) 
   {
        echo "<div>";
        if ($message->getSender() == $player->getId()) 
        {
            echo $player->getName();
        }
        else
        {
            echo $recruiter->getName();
        }
        echo ": ".$message->getText()."</div>";
   }
   ?>

   <form action="functions/fmessageinsert.php?id=<?php echo $_GET["id"] ?>" method="post">
    <div id="messageInput">
    <input type="hidden" name="idChat" value="<?php echo $chat->getId() ?>">
    <input type="text" name="message" id="a">
    <input type="submit" value="envoyer">
    </div>
   </form>
   </div>
   <?php
}
else
{
    $chat = new Chat(null,$_GET["id"],$_SESSION["sid"],0);
    $chat->insert();
    header("location: chat.php?id=".$_GET["id"]."");
}

?>