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

        if (verify_produtct($data['id'],$_SESSION["login"],$con) && verify_amount($data['id'],$con))
        {
            if ($data['op'] == "1") increasePrudutc($data['id'],$data['price'],$_SESSION["login"],$con);
            else delProduct($data['id'],$data['price'],$_SESSION["login"],$con);
        }

        addProduct();








    }
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}


