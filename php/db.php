<?php
// connexion a la base de données
try{
    $db = mysqli_connect("localhost","root","root","kootlinf");
   echo "Connexion db réussie<br/>";
    
}catch(Exception $e){
    echo "La connexion au serveur à échoué revenez plus tard";
}