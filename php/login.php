<?php
    include ("includes/header.php");
    require ("autoload.php");
require_once("fonctions.php");
require_once("db.php");
include_once("sessions.php");
include("classes/DB.php");

// condition pour deconnecter
if (isset($_GET["deco"]) && isset($_SESSION["login"])) 
{
    
    logs("s'est deconnecté");
    unset($_SESSION["login"]);
    unset($_SESSION["sid"]);
    setcookie("login","",time()-3600);
    header("location : login.php");
    // echo "compte deconnecte";

}
// verifier info connexion 
if (is_logged()) 
{
message_login();
echo "<a href='login.php?deco=1'>Déconnexion</a>";
// var_dump(User::getOne($_SESSION["sid"]));
header("location: profile.php");
} 
else if(!empty($_POST["login"]) && !empty($_POST["password"]))
{
    $sql = "SELECT * FROM user WHERE login = '".$_POST["login"]."'";
        $result = mysqli_query($db,$sql);
        if($data = mysqli_fetch_row($result))
        {
            $hash = $data[2];
            // verifie que le mdp envoyé correspond
            if (password_verify($_POST["password"],$hash)) 
            {
                $valeur = $_POST["login"]."|".password_hash($_POST["password"],PASSWORD_DEFAULT);
                setcookie("login",$valeur,time()+3600*24);
                $_SESSION["login"]=$_POST["login"];
                $_SESSION["sid"]=$data[0];
                $_SESSION["srole"]=$data[3];
                logs("s'est connecté");
                message_login();
                echo "<a href='login.php&deco=1'>Déconnexion</a>";
                header("location: profile.php");
                
            } 
            else
            {
                echo "identifiant / mot de passe incorrect";
                affiche_form();
                echo "<a  href='/php/inscription.php'>s'inscrire</a>";
            }
    }
    else
    {
        echo "identifiant / mot de passe incorrect";
        affiche_form();
        echo "<a  href='/php/inscription.php'>s'inscrire</a>";
    }

} 
else 
{
    affiche_form();
   echo "<a  href='/php/inscription.php'>s'inscrire</a>";

}
?>
