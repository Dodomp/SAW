<?php

//
function connection()
{
    $con = new mysqli("localhost","root","","sawdb");

    // connection verify
    if ($con->connect_error) die("Connection failed: " . $con->connect_error);

    return $con;

}

// funzione per controllare che l'utente sia loggato
function isLogged() {
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
function isAdmin() {
    if (!isset($_SESSION["admin"])) {
        return false;
    }
    return true;
}



