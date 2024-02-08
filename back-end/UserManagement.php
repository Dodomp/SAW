<?php
include "function.php";
header('Access-Control-Allow-Origin: *');
try{

    $con=connection();
    // Query per prendere tutti gli utenti
    $stmt = $con->prepare("SELECT * FROM users");

    // Controllo se la preparazione della query è andata a buon fine
    if (!$stmt) {
        echo "error nella preparazione della query";
        $con->close();
        exit();
    }

    $stmt->execute();

    // Ottieni il risultato della query
    $queryResult = $stmt->get_result();

    // Ottieni tutti i risultati
    $users = array();
    while ($row = $queryResult->fetch_assoc()) {
        $users[] = $row;
    }

    // Chiudi la connessione e lo statement
    $con->close();

    // Invia la risposta come JSON
    header('Content-Type: application/json');
    echo json_encode($users);


} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}



