<?php
session_start();
include 'function/function.php';
include 'function/UserManagement_function.php';

if (!isAdmin()) header("Location: ../front-end/index.php");

header('Content-Type: application/json');

try {

    $con = connection();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {


        $con->begin_transaction();

        //ricevo i dati json
        $data = file_get_contents("php://input");
        //decodifico i dati json
        $data = json_decode($data, true);
        $id = $data['id'];

        if ($data['id'] == $_SESSION['login']) {
            echo json_encode(array("message" => "ERRORE non puoi rimuovere te stesso"));
            exit();
        }

        removeUser($id, $con);

        $con->commit();

        $con->close();

        echo json_encode(array("message" => "Utente rimosso con successo"));
    }

} catch (mysqli_sql_exception $e) {
    if (isset($con)) $con->rollback();
    echo json_encode(array("message" => "ERRORE utente non rimosso"));
} catch (Exception $e) {
    echo json_encode(array("message" => "ERRORE utente non rimosso"));
}

