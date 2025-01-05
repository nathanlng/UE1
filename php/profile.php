<?php
    include ("includes/header.php");
    require ("autoload.php");
include_once("db.php");
include_once("fonctions.php");
include_once("sessions.php");


if (is_logged()) 
{
message_login();
echo "<a href='login.php?deco=1'>Déconnexion</a>";



  if (is_player()){
    $player=Player::getOne($_SESSION["sid"]);
  ?>

<!-- affiche le profil du joueur -->
  <h2>Mon profil</h2>
  <div id="profileContainer" class="tableau">
            <div id="banniere">
              <img id="photoContainer" src="<?php echo $player->getPicture() ?>" alt="">
              <div id="username"><?php echo $player->getFirstName()." ".$player->getName() ?></div>
            </div>
            <div id="caracteristiqueProfile">
              <div id="infoProfile">
                  <div class="cellule">age:</div>
                  <div id="age" class="cellule"><?php echo $player->getAge()?></div>
                <?php
                
                foreach ($player->getFeatures() as $feature) 
                {
                    if ($feature->getDisplay()==1) 
                    {
                        $category = Category::getOne($feature->getIdCategory());
                      ?>
                      <div class="cellule"> <?php echo $category->getName()?>:</div>
                      <div class="cellule" id="<?php echo $category->getName()?>">
                      <?php
                      if ($category->getTypeOf()== "select") 
                      {
                      echo $feature->getChoice()."</div>";
                      } 
                      else 
                      {
                        echo $feature->getValue()."</div>";
                      }
                    }
                }
      
                  ?>
              

            
            </div>
            <div id="bio"><?php echo $player->getDescription(); ?></div>
  </div>
            </div>


  <?php

  echo "<a href=feature.php>edit</a>";

  }
} 
else 
{
  echo "<a href='login.php'>se connecter</a>";
}
?>