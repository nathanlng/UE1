<?php
session_start();

// verifie si le compte est connecte
function is_logged()
{
    if(isset($_SESSION["login"]))
    {
        return true;
    }
    else
    {
        return false;
    }
}

// verifie si le compte est admin
function is_admin()
{
    if(is_logged() && $_SESSION["srole"] == "admin")
    {
        return true;
    }
    else
    {
        return false;
    }

}

function is_player()
{
    if(is_logged() && $_SESSION["srole"] == "player")
    {
        return true;
    }
    else
    {
        return false;
    }
}

function is_recruiter()
{
    if(is_logged() && $_SESSION["srole"] == "recruiter")
    {
        return true;
    }
    else
    {
        return false;
    }
}