<?php
session_start();

include "function/function.php";
include "function/cart_function.php";

if (!isLogged()) header("location: ../front-end/");



try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        //in data ci saranno idArticolo (id) e il prezzo (price) dell'articolo e remove o add (op)
        $data = json_decode(file_get_contents('php://input'), true);

        $con = connection();

        if ($data['op'] == '1' && verifyAmount($data['id'],$con)){
            if (verifyProduct($data['id'],$_SESSION["login"],$con)){
                increaseProduct($data['id'],$data['price'],$_SESSION["login"],$con);
            }
            else{
                addProduct($data['id'],$data['price'],$_SESSION["login"],$con);
            }
        }
        /*else {
            decreaseProduct($data['id'],$data['price'],$_SESSION["login"],$con);
        }*/

        // Invia la risposta come JSON
        $message=true;
        header('Content-Type: application/json');
        echo json_encode($message);


    }
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}


