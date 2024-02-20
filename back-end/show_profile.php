<?php
session_start();
include 'function/function.php';
if (!isLogged()) header("Location: ../front-end/index.php");

header('Content-Type: application/json');

try {

    $con = connection();

    $user = $_SESSION['login'];
    $sql = "SELECT * FROM users WHERE id=$user";
    $result = $con->query($sql);

    $row = $result->fetch_assoc();

    $con->close();

    echo json_encode($row);

} catch (Exception $e) {

}