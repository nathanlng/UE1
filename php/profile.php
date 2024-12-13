<?php

include_once("fonctions.php");
include_once("sessions.php");
include_once("db.php");

echo $_SESSION["srole"];

if (is_admin()) {
    if (!empty($_POST["nameCaract"]) && !empty($_POST["type"])) {
        $nameCaract= $_POST["nameCaract"];
        $type = $_POST["type"];
       $sql= "INSERT INTO caracteristique (nom,type) VALUES ('$nameCaract','$type')";
       try {
        mysqli_query($db,$sql);
        echo "<p> ajout reussi</p>";
       } catch (Exception $e) {
        echo "<p> un problème est survenu réesayer plus tard</p>";
       }
    }

    if (!empty($_POST["nameChoice"]) && !empty($_POST["idChoice"]) && !empty($_POST["valueChoice"])) {
        $nameChoice= $_POST["nameChoice"];
        $idChoice = $_POST["idChoice"];
        $valeur = $_POST["valueChoice"];
       $sql= "INSERT INTO choix (id_caracteristique,nom,value) VALUES ('$idChoice','$nameChoice','$valeur')";
       try {
        mysqli_query($db,$sql);
        echo "<p> ajout reussi</p>";
       } catch (Exception $e) {
        echo "<p> un problème est survenu réesayer plus tard</p>";
       }
    }



    echo "<form method='post'>
    <label>nouvelle caractéristique</label><br/>
    <label>nom</label>
    <input type='text' name='nameCaract'/>
    <select name='type'>
    <option value='number'>nombre</option>
    <option value='text'>texte</option>
    <option value='select'>choix</option>
    </select>
    <input type='submit' value='ajouter'/>
    </form>";

    echo "<form method='post'>
    <label>nouveau choix</label><br/>
    <label>nom</label>
    <input type='text' name='nameChoice'/>
    <label>valeur</label>
    <input type='text' name='valueChoice'/>
    <select name='idChoice'>";

    $sql= "SELECT nom,id FROM caracteristique WHERE type LIKE '%select%'";
    $result= mysqli_query($db,$sql);
    $data = mysqli_fetch_all($result) ;
    foreach ($data as $caract) {
        echo "<option value='".$caract[1]."'>".$caract[0]."</option>";
    }
   echo  "</select>
    <input type='submit' value='ajouter'/>
    </form>";
}


// if (is_joueur() || is_admin()) {
// create_select($db);
// }

?>

