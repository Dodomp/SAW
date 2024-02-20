<?php
session_start();
include "function/function.php";
include "function/profile_function.php";
if (!isLogged()) header("Location: ../front-end/index.php");

// Ottieni il corpo della richiesta JSON
$json_data = file_get_contents("php://input");

// Decodifica il JSON in un array associativo
$data = json_decode($json_data, true);

// Controllo se la decodifica è riuscita
if ($data === null) {
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'Invalid JSON data']);
    exit();
}


header('Content-Type: application/json');

try {


    $con = connection();

// Recupero i dati dall'array associativo
    $old_password = $data['old_password'];
    $new_password = $data['new_password'];
    $confirm_password = $data['confirm_password'];

// tolgo eventuali spazi bianchi
    $old_password = trim($old_password);
    $new_password = trim($new_password);
    $confirm_password = trim($confirm_password);

    // controllo che la password sia di almeno 10 caratteri
    if (strlen($new_password) < 10) {
        throw new Exception("TOO SHORT PASSWORD");
    }

    $utente = $_SESSION["login"];

    update_password($utente,$old_password,$new_password,$confirm_password,$con);

    echo json_encode(['success' => true, 'message' => 'PASSWORD UPDATED SUCCESSFULLY']);

    $con->close();



} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}


