<?php

include "function/function.php";


// Controllo se l'utente è già loggato tramite il cookie (se c'è)
if (isset($_COOKIE['id_cookie'])) {
    try {
        // Connessione al DB per prendere i valori salvati
        $con = connection();

        // Query per prendere il cookie dal DB
        $stmt = $con->prepare("SELECT * FROM users WHERE id_cookie=?");
        $stmt->bind_param('s', $_COOKIE['id_cookie']);
        $stmt->execute();
        $res = $stmt->get_result();

        // Prendo il campo password dal risultato della query e mettilo in una variabile
        $res = $res->fetch_assoc();

        // Chiudo la connessione
        $con->close();

        // Mi serve un controllo che il cookie non sia scaduto
        if (time() > $res['expire']) {
            // Cookie scaduto
            // Cancello il cookie dal DB
            // Connessione al DB

            $con = connection();

            // Query per togliere il cookie dal DB
            $stmt = $con->prepare("UPDATE users SET id_cookie=NULL, expire=NULL, flag=NULL WHERE id_cookie=?");
            $stmt->bind_param('s', $res['id_cookie']);
            $stmt->execute();

            // Chiudo la connessione
            $con->close();

            // Cancello il cookie dal browser
            setcookie($_COOKIE['id_cookie'], null, time() - 1);
            unset($_COOKIE['id_cookie']);

            // Redirect a una pagina di login o dove necessario
            header("location: ../front-end/login.php");
            exit();
        }

        // Se il cookie non è scaduto, eseguo altre operazioni

        // Aggiungo la variabile di sessione per il login
        $_SESSION["login"] = $res["id"];
        $_SESSION["email"] = $res["email"];

        // Aggiungo la variabile di sessione per il nome
        $_SESSION["username"] = $res["firstname"];

        // Aggiungo la variabile di sessione per l'admin
        if ($res["admin"]) {
            $_SESSION["admin"] = true;
        }

        // Aggiungo la variabile di sessione per la scadenza della sessione
        $_SESSION["expire"] = time() + 600;

        // Redirect alla pagina riservata
        header("location: ../front-end/index.php");
        exit();
    } catch (Exception $e) {
        // Gestione delle eccezioni
        echo '
        <script>
            let message = "' . $e->getMessage() . '";
            alert(message);
            window.location.href = "../front-end/login.php";
        </script>
        ';
    }
}
