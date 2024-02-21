<?php
session_start();

include "function/function.php";

if (!isLogged()) header("Location: ../front-end/index.php");

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
try{

    if ($_SERVER['REQUEST_METHOD'] != "GET") {
        throw new Exception("Method not allowed");
    }

    $q = "%" . ($_GET['q'] ?? "") . "%";

    $con = connection();
    // Query per prendere tutti gli utenti
    $stmt = $con->prepare("SELECT * FROM articoli where Marca LIKE ? OR Descr LIKE ?");
    $stmt->bind_param('ss', $q, $q);
    $stmt->execute();

    // Ottieni il risultato della query
    $queryResult = $stmt->get_result();

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



