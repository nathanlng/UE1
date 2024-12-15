<?php

function inscription_form(){
    echo '<form method="post">
    <label>Login</label>
    <input type="mail" name="login"/>
    <label>Mot de passe</label>
    <input type="password" name="password"/>
    <label>profil</label>
    <select name="srole">
    <option value="player">joueur</option>
    <option value="recruiter">recruteur</option>
    </select>
    <input type="submit" value="Envoyer"/>
  </form>';
}

function affiche_form(){
    echo '<form method="post">
    <label>Login</label>
    <input type="mail" name="login"/>
    <label>Mot de passe</label>
    <input type="password" name="password"/>
    <label>profil</label>
    <input type="submit" value="Envoyer"/>
  </form>';
}



function message_login(){
    echo "<p>bienvenue ".$_SESSION["login"]."</p>";
}

// ajouter les commandes a un fichier texte
function commande($texte){
    file_put_contents("commande.txt","\n" .date("Y-m-d H:i:s")." ".$_SESSION["login"]." \n$texte\n",FILE_APPEND);
}

// suivre tous les logs
function logs($texte){
    file_put_contents("log.txt",date("Y-m-d H:i:s")." ".$_SESSION["login"]." $texte\n",FILE_APPEND);
}

function affiche_form_menu(){
    echo '<form method="post">
    <label>nom</label>
    <input type="text" name="name"/>
    <label>description</label>
    <input type="text" name="description"/>
    <label>prix</label>
    <input type="text" name="price"/>
    <input type="submit" value="Envoyer"/>
  </form>';
}

// fonction qui recupere toutes les infos des cookies existants inutile pour l'exercice
function get_cookies(){
    if(!empty($_COOKIE["login"])){
        $cookie = $_COOKIE["login"];
        $tableau = explode("|",$cookie);
        $login = $tableau[0];
        $hash = $tableau[1];       
            // L'utilisateur est connecté
            echo "<p> Bienvenue $login </p>";
    }
    if (!empty($_COOKIE["sid"])) {
        $sid = $_COOKIE["sid"];
    }
}

function create_select($element){
    $sql = "SELECT * FROM categorie where type LIKE '%select%'";
    $result = mysqli_query($element,$sql);
    $data = mysqli_fetch_all($result) ;
    foreach ($data as $categ) {
       echo "<div>".$categ[1]."</div><select>";
       $sql= "SELECT * FROM caracteristique WHERE id_categorie = '$categ[0]' ";
       $temp= mysqli_fetch_all(mysqli_query($element,$sql));
       print_r($temp);
       foreach ($temp as $caract) {
            echo "<option value='".$caract[3]."'>".$caract[2]."</option>";
       }
       echo "</select>";
    }
}

function create_input_text($element){
    $sql = "SELECT * FROM categorie where type LIKE '%text%'";
    $result = mysqli_query($element,$sql);
    $data = mysqli_fetch_all($result) ;
    foreach ($data as $categ) {
       echo "<div>".$categ[1]."</div><select>";
       $sql= "SELECT * FROM caracteristique WHERE id_categorie = '$categ[0]' ";
       $temp= mysqli_fetch_all(mysqli_query($element,$sql));
       print_r($temp);
       foreach ($temp as $caract) {
            echo "<option value='".$caract[3]."'>".$caract[2]."</option>";
       }
       echo "</select>";
    }
}
