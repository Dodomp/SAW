<?php

//
function connection()
{
    $con = new mysqli("localhost","S5240038","Walter","S5240038");
    //$con = new mysqli("localhost","root","","sawdb");

    return $con;

}

// funzione per controllare che l'utente sia loggato
function isLogged(): bool {
    if (!isset($_SESSION["login"])){
        return false;
    }
    else if (isset($_SESSION['expire']) && time() > $_SESSION['expire']) {
        // La sessione è scaduta
        session_unset();
        session_destroy();
        return false;
    }
    return true;
}

// funzione per controllare se l'utente ha l'accesso alle aree admin
function isAdmin(): bool {
    return isset($_SESSION["admin"]);
}






