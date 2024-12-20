<?php
    require_once "autoload.php";
    include_once("sessions.php");
?>
<h3>Caractéristiques</h3>
<table class="table table-hover">
  <tbody>
  <?php 
  $player = Player::getOne($_SESSION["sid"]);
  foreach($player->getFeatures($player->getId()) as $feature){
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
    </tr>
    <?php }?>
</tbody>
    </table>