<?php
    require_once "autoload.php";
    include ("includes/header.php");
    include_once("sessions.php");
    ?>


    <?php

    foreach (Player::getAll() as $player) {
        echo $player->getPicture();
        ?>
        <div class="card" style="width: 18rem;">
  <img src="<?php echo $player->getPicture(); ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $player->getName().$player->getId() ?></h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
        
        <?php
    }
?>