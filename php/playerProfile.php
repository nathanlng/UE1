<?php
    require_once "autoload.php";
    include ("includes/header.php");
    include_once("sessions.php");
    if (is_player()){
        $player=Player::getOne($_SESSION["sid"]);
    ?>

<div id="profileContainer" class="tableau">
          <div id="banniere">
            <div id="photoContainer"></div>
            <div id="username"><?php echo $player->getFirstName()." ".$player->getName() ?></div>
          </div>
          <div id="caracteristiqueProfile">
            <div id="infoProfile">
              <?php
              
              foreach ($player->getFeatures() as $feature) {
                if ($feature->getDisplay()==1) {
                  $category = Category::getOne($feature->getIdCategory());
                ?>
                <div class="cellule"> <?php echo $category->getName()?>:</div>
                <div class="cellule" id="<?php echo $category->getName()?>">
                  <?php
                  if ($category->getTypeOf()== "select") {
                  echo $feature->getChoice()."</div>";
                } else {
                  echo $feature->getValue()."</div>";
                }
            }
        }
    }
                 ?>
            

           
          </div>
          <div id="bio"></div>
</div>