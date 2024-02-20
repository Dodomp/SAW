<?php
    session_start();

    include 'function/function.php';
    include  'function/cart_function.php';

    if (!isLogged()) header("Location: ../front-end/index.php");

    $con=connection();

    deleteCart($_SESSION["login"],$con);
    //ELIMINAZIONE DI TUTTE LE VARIABILI DI SESSIONE E DISTRUZIONE DELLA SESSIONE
    unset($_SESSION["login"]);
    unset($_SESSION["email"]);
    unset($_SESSION["username"]);
    unset($_SESSION["admin"]);
    ob_end_clean();
    session_unset();
    session_destroy();

    //if (isset($_COOKIE['carrello'])) {
    //}

    //CANCELLAZIONE DEL COOKIE DAL BROWSER SE PRESENTE
    if (isset($_COOKIE['id_cookie'])) {
        // ELIMINAZIONE DEL COOKIE DAL DATABASE

        $stmt = $con->prepare("UPDATE users SET id_cookie=NULL, expire=NULL, flag=0 WHERE id_cookie=?");
        $stmt->bind_param('s', $_COOKIE['id_cookie']);
        $stmt->execute();
        $stmt->close();

        // ELIMINAZIONE DEL COOKIE DAL BROWSER
        setcookie('id_cookie', '', time() - 3600, '/');
        // Impostare il valore del cookie su una stringa vuota e il tempo di scadenza a un'ora fa

        // Eliminare la variabile del cookie dalla memoria del server
        unset($_COOKIE['id_cookie']);
    }





    header("Location: ../front-end/index.php");
    exit();
