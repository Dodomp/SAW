<?php
session_start();
include "function/function.php";
include "function/UserManagement_function.php";

if (!isAdmin()) header("location: ../front-end/index.php");

header('Content-Type: application/json');

header('Access-Control-Allow-Origin: *');
try{

    $con=connection();

    $users = TakeUsers($con);

    echo json_encode($users);


} catch (Exception $e) {
    echo json_encode($e->getMessage());
}



