<?php
session_start();

include "function/function.php";

if (!isAdmin()) header("Location: ../front-end/index.php");

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
try{

    if ($_SERVER['REQUEST_METHOD'] != "GET") {
        throw new Exception("Method not allowed");
    }


    $con = connection();

    $sql = "SELECT * FROM articoli";
    $con -> query($sql);

    // Ottieni il risultato della query
    $queryResult = $con->query($sql);

    // Ottieni tutti i risultati
    $articols = array();
    while ($row = $queryResult->fetch_assoc()) {
        $articols[] = $row;
    }

    // Chiudi la connessione e lo statement
    $con->close();

    // Invia la risposta come JSON

    echo json_encode($articols);


} catch (Exception $e) {
    echo json_encode($e->getMessage());
}



