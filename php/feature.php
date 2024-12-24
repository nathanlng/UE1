<?php
    require_once "autoload.php";
    include ("includes/header.php");
    include_once("sessions.php");

    $player = Player::getOne($_SESSION["sid"]);
?>
<table class="table table-hover">
  <tr>
    <td>prenom</td>
    <td><?php echo $player->getFirstName();?></td>
  </tr>
  <tr>
    <td>nom</td>
    <td><?php echo $player->getName();?></td>
  </tr>
  <tr>
    <td>age</td>
    <td><?php echo $player->getAge();?></td>
  </tr>
  <tr>
    <td>picture</td>
    <td><?php echo $player->getPicture();?></td>
  </tr>
  <tr>
    <td>description</td>
    <td><?php echo $player->getDescription();?></td>
  </tr>
  <tr>
      <a href="playerUpdate.php">Modifier</a>
    </tr>
</table>

  <form action="functions/ffeaturedisplay.php" method="post">
<h3>Caractéristiques</h3>
<table class="table table-hover">
  <tbody>


  <?php 
  foreach($player->getFeatures() as $feature){
    $category= Category::getOne($feature->getIdCategory())
    ?>
    <tr>
        <td><?php echo $category->getName(); ?></td>
        <td><?php
        if (!empty($feature->getValue())) {
            if ($category->getTypeOf()== "select") {
                echo $feature->getChoice();
              } else {
                echo $feature->getValue();
              }
        } 
        
         ?></td>
        <td>
        <a href="featureUpdate.php?id=<?php echo ($feature->getId()); ?>">Modifier</a>
        <a href="functions/ffeaturedelete.php?id=<?php echo ($feature->getId()); ?>">Supprimer</a>
        </td>
        <td>
            <input type="checkbox" name="check<?php echo $feature->getId()?>";
            <?php
            if ($feature->getDisplay()==1) {
              echo "checked";
            }
            echo "/>";
            ?>
        </td>
    </tr>
    <?php }?>

</tbody>
    </table>
    <input type="submit" value="envoyer"/>
    </form>