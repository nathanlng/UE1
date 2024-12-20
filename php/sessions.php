<?php
session_start();

function is_logged(){
    if(isset($_SESSION["login"])){
        return true;
    }
    else{
        return false;
    }
}

function is_admin(){
    if(is_logged() && $_SESSION["srole"] == "admin"){
        return true;
    }
    else{
        return false;
    }

}

function is_joueur(){
    if(is_logged() && $_SESSION["srole"] == "player"){
        return true;
    }
    else{
        return false;
    }
}