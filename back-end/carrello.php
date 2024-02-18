<?php

include "function/function.php";

header('Access-Control-Allow-Origin: *');
try{

$con=connection();
// Query per prendere tutti gli utenti
$stmt = $con->prepare("SELECT * FROM articoli, carrello WHERE articoli.id_Articolo=carrello.id_prodotto");
$stmt->execute();

if ($stmt->errno) {
throw new Exception("ERROR, TRY AGAIN");
}

// Ottieni il risultato della query
$queryResult = $stmt->get_result();

// Ottieni tutti i risultati
$carrello = array();
while ($row = $queryResult->fetch_assoc()) {
$carrello[] = $row;
}

// Chiudi la connessione e lo statement
$con->close();

// Invia la risposta come JSON
header('Content-Type: application/json');
echo json_encode($carrello);


} catch (Exception $e) {
echo 'Caught exception: ',  $e->getMessage(), "\n";
}