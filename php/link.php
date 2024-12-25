<?php
    require_once "autoload.php";
    include ("includes/header.php");
    include_once("sessions.php");
    ?>

<div class="container">
<?php

foreach (Player::getAll() as $player) {
    if ($player->getName() != " " and $player->getFirstName() != " " and $player->getFirstName() != "" and $player->getName() != "" and $player->getDisplay()==1) {
        ?>
        <div class="playerCard">
        <img src="<?php echo $player->getPicture(); ?>" alt="" class="playerImg">
        <div class="username"><?php echo $player->getFirstName()." ".$player->getName(); ?></div>
        
        <div class="features">
            
            <div><?php echo $player->getAge() ?></div>
            <?php
            foreach ($player->getFeatures() as $feature) {
                if ($feature->getValue() != null or $feature->getValue() != "") {
                    echo "<div class='feature'>".$feature->getValue()."</div>";
                }
            }
            ?>
        </div>
        <a href="playerProfile.php?id=<?php echo $player->getId()?>"> go to profile </a>
        <?php
            if (is_admin()) {
            ?>
            <a href="functions/fhidecard.php?id=<?php echo $player->getId()?>">hide</a>
            <?php
            }
        ?>
    </div>
    
    <?php
    }
}
?>
</div>
