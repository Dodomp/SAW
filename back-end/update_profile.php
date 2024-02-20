<?php
session_start();
include 'function/function.php';
if (!isLogged()) header("Location: ../front-end/index.php");


header('Content-Type: application/json');
try {

// Controllo se la richiesta è di tipo POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['firstname'])) {
            $data = $_POST;
        } else {
            $data = json_decode(file_get_contents('php://input'), true);
        }

        // Controllo se la decodifica è riuscita
        if ($data === null) {
            echo json_encode(['success' => false, 'message' => 'Invalid JSON data']);
            exit();
        }

        $firstname = trim($data['firstname']);
        $lastname = trim($data['lastname']);
        $descr = trim($data['description']);
        $age = trim($data['age']);
        $nationality = trim($data['nationality']);
        $email = trim($data['email']);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("INVALID EMAIL");
        }


        $con = connection();

        // Query per aggiornare i dati dell'utente
        $stmt = $con->prepare("UPDATE users SET firstname = ?, lastname = ?, age = ?, descr = ?, nationality = ?, email = ?  WHERE id = ?");
        $stmt->bind_param("ssisssi", $firstname, $lastname, $age, $descr, $nationality, $email, $_SESSION["login"]);
        $stmt->execute();

        $con->close();

        echo json_encode(['success' => true, 'message' => 'Dati aggiornati con successo']);

    }


} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'errore']);
}