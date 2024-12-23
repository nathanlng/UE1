<?php
require_once "autoload.php";
include("includes/header.php");
require_once("sessions.php");

$player= Player::getOne($_SESSION["sid"]);

?>

<form action="functions/fplayerupdate.php" method="post">
    <label>prenom</label>
    <input type="text" name="firstName" value="<?php echo $player->getFirstName()?>"><br />
    <label>nom</label>
    <input type="text" name="name" value="<?php echo $player->getName()?>"><br />
    <label>age</label>
    <input type="number" name="age" value="<?php echo $player->getAge()?>"><br />
    <label>photo</label>
    <input type="text" name="picture" value="<?php echo $player->getPicture()?>"><br />
    <label>description</label>
    <input type="text" name="description" value="<?php echo $player->getDescription()?>">
    </input>
    <input type="submit" value="envoyer">
</form>