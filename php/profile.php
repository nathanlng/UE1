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
                <div id="age"<?php echo $player->getAge()?>></div>
              </div>
              <div class="celluleTab">
                <div class="cellule">categorie:</div>
                <div id="sexe"></div>
              </div>
              <div class="celluleTab">
                <div class="cellule">divison:</div>
                <div id="niveau"></div>
              </div>
              <div class="celluleTab">
                <div class="cellule">club:</div>
                <div id="club"></div>
              </div>
              <div class="celluleTab">
                <div class="cellule">foot:</div>
                <div id="typeF"></div>
              </div>
              <div class="celluleTab">
                <div class="cellule">poste:</div>
                <div id="poste"></div>
              </div>
              <div class="celluleTab">
                <div class="cellule">pied fort:</div>
                <div id="piedF"></div>
              </div>
            </div>

            <div id="bio" class="celluleTab"><?php echo $player->getDescription()?></div>
          </div>
        </div>
        <button id="editButton" class="buttonStyle">edit profile</button>
      </div>


<?php
// Form::createForm();
} 
?>