<?php
session_start();
include "function/function.php";
if (!isLogged()) header("location: ../front-end/");

header('Access-Control-Allow-Origin: *');

try{
$con=connection();
$utente=$_SESSION['login'];
// Query per prendere tutti gli utenti
$stmt = $con->prepare("SELECT * FROM articoli, carrello WHERE articoli.id_Articolo=carrello.id_prodotto AND carrello.id_utente=?");
$stmt->bind_param("i", $utente);
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