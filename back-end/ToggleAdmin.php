<?php
session_start();
include 'function/function.php';
include 'function/UserManagement_function.php';

if (!isAdmin()) header("Location: ../front-end/index.php");

header('Content-Type: application/json');

try {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $con = connection();
        //ricevo i dati json
        $data = file_get_contents("php://input");
        //decodifico i dati json
        $data = json_decode($data, true);
        $email = $data['email'];

        toggleAdmin($email, $con);

        echo json_encode(array("message" => "ok"));

        $con->close();

    }

} catch (Exception $e) {
    echo json_encode($e->getMessage());
}

