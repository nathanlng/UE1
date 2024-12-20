<?php
    include ("includes/header.php");
    require ("autoload.php");
include_once("db.php");
include_once("fonctions.php");
include_once("sessions.php");

// var_dump(User::getOne($_SESSION["sid"]));

if (is_logged()) {
message_login();
echo "<a href='login.php?deco=1'>Déconnexion</a>";
$player=Player::getOne($_SESSION["sid"]);
// var_dump(Player::getOne($_SESSION["sid"])) ;
// var_dump($player->getFeatures($player->getId()));
if (is_joueur()){


?>

<h2>Mon profil</h2>
      <div id="profile">
        <div id="profileContainer" class="tableau">
          <div id="banniere">
            <div id="photoContainer"><?php echo $player->getPicture()?></div>
            <div id="username"><p id="userN"><?php echo $player->getFirstName()." ".$player->getName()?></p></div>
          </div>
          <div></div>
          <div id="caracteristiqueProfile">
            <div id="infoProfile">
              <div class="celluleTab">
                <div class="cellule">age:</div>
                <div id="age"><?php echo $player->getAge()?></div>
              </div>
              <?php
              foreach ($player->getFeatures($player->getId()) as $feature) {
                $category = Category::getOne($feature->getIdCategory());
                ?>
                <div class="celluleTab">
                <div class="cellule"> <?php echo "<br />".$category->getName()?>:</div>
                <div id="<?php echo $category->getName()?>">
                  <?php
                  if ($category->getTypeOf()== "select") {
                  echo $feature->getChoice();
                } else {
                  echo $feature->getValue();
                }
                 ?></div>
              </div>
              <?php
              }
              ?>
            </div>

            <div id="bio" class="celluleTab"><?php echo $player->getDescription()?></div>
          </div>
        </div>
        <button id="editButton" class="buttonStyle">edit profile</button>
      </div>


<?php
echo "abracadabra";
Form::createForm();

echo "<a href=feature.php>edit</a>";

}
} 
?>