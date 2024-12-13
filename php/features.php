<?php
    include ("includes/header.php");
    require ("autoload.php");
    include_once("fonctions.php");
    include_once("sessions.php");
    include_once("db.php");

echo $_SESSION["srole"];

if (is_admin()) {
    if (!empty($_POST["nameCaract"]) && !empty($_POST["type"])) {
        $nameCaract= $_POST["nameCaract"];
        $type = $_POST["type"];
       $sql= "INSERT INTO feature (name,type_of) VALUES ('$nameCaract','$type')";
       try {
        mysqli_query($db,$sql);
        echo "<p> ajout reussi</p>";
       } catch (Exception $e) {
        echo "<p> un problème est survenu réesayer plus tard 1</p>";
       }
    }

    if (!empty($_POST["nameChoice"]) && !empty($_POST["idChoice"]) && !empty($_POST["valueChoice"])) {
        $nameChoice= $_POST["nameChoice"];
        $idChoice = $_POST["idChoice"];
        $value = $_POST["valueChoice"];
       $sql= "INSERT INTO choice (id_feature,name,value) VALUES ('$idChoice','$nameChoice','$value')";
       try {
        mysqli_query($db,$sql);
        echo "<p> ajout reussi</p>";
       } catch (Exception $e) {
        echo "<p> un problème est survenu réesayer plus tard 2</p>";
       }
    }
    ?>

    <form method='post'>
    <label>nouvelle caractéristique</label><br/>
    <label>nom</label>
    <input type='text' name='nameCaract'/>
    <select name='type'>
    <option value='number'>nombre</option>
    <option value='text'>texte</option>
    <option value='select'>choix</option>
    </select>
    <input type='submit' value='ajouter'/>
    </form>   
    <?php
}
?>


    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach(Feature::getAll() as $ligne){?>
    <tr>
        <td><?php echo $ligne->getId(); ?></td>
        <td><?php echo $ligne->getName(); ?></td>
        <td><?php echo $ligne->getTypeOf(); ?></td>
        <td>
        <a href="featureUpdate.php?id=<?php echo ($ligne->getId()); ?>">Modifier</a>
        <a href="functions/ffeaturedelete.php?id=<?php echo ($ligne->getId()); ?>">Supprimer</a>
        </td>
    </tr>
    <?php }?>
</tbody>
    </table>

<form method='post'>
    <label>nouveau choix</label><br/>
    <label>nom</label>
    <input type='text' name='nameChoice'/>
    <label>valeur</label>
    <input type='text' name='valueChoice'/>
    <select name='idChoice'>


    <?php

    $sql= "SELECT name,id FROM feature WHERE type_of LIKE '%select%'";
    $result= mysqli_query($db,$sql);
    $data = mysqli_fetch_all($result) ;
    foreach ($data as $caract) {
        echo "<option value='".$caract[1]."'>".$caract[0]."</option>";
    }
   echo  "</select>
    <input type='submit' value='ajouter'/>
    </form>";
    ?>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach(Choice::getAll() as $ligne){?>
    <tr>
        <td><?php echo $ligne->getId(); ?></td>
        <td><?php echo $ligne->getName(); ?></td>
        <td><?php echo $ligne->getValue(); ?></td>
        <td><?php echo Feature::getOne($ligne->getIdFeature())->getName(); ?></td>
        <td>
        <a href="choiceUpdate.php?id=<?php echo ($ligne->getId()); ?>">Modifier</a>
        <a href="functions/fchoicedelete.php?id=<?php echo ($ligne->getId()); ?>">Supprimer</a>
        </td>
    </tr>
    <?php }?>
</tbody>
</table>

  </body>
