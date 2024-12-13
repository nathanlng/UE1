<?php

include_once("db.php");
include_once("fonctions.php");


echo "creer un compte";


inscription_form();
echo "<a  href='/php/?page=login.php'>se connecter</a>";

// creer utilisateur avec info formulaire
if (!empty($_POST["login"]) && !empty($_POST["password"]) && !empty($_POST["srole"])) {
    $login = $_POST["login"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $typeOf= $_POST["srole"];
    $sql = "INSERT INTO user (login,password,type_of) VALUES ('$login','$password','$typeOf')";

    try{
        mysqli_query($db,$sql);
        $id_user = mysqli_insert_id($db);
        echo "compte créé avec l'id $id_user";
    }catch(Exception $e){
        echo "erreur création";
        echo"<br/> sql = ".$sql;
    }
}

