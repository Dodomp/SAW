<?php

session_start();

include "function/function.php";
include "function/cart_function.php";

if (!isLogged()) header("location: ../front-end/");

header('Content-Type: application/json');



try {


    $con = connection();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        //in data ci saranno idArticolo (id) e il prezzo (price) dell'articolo e remove o add (op)
        $data = json_decode(file_get_contents('php://input'), true);


        $con->begin_transaction();

        if ($data['op'] == '1' && verifyAmount($data['id'],$con)){
            if (verifyProduct($data['id'],$_SESSION["login"],$con)>0){
                increaseProduct($data['id'],$data['price'],$_SESSION["login"],$con);
            }
            else{

                addProduct($data['id'],$data['price'],$_SESSION["login"],$con);
            }
        }
        else {
            $qta=verifyProduct($data['id'],$_SESSION["login"],$con);

            if ($qta>1) {
                decreaseProduct($data['id'], $data['price'], $_SESSION["login"], $con);
            }
            if ($qta==1){
                deleteProduct($data['id'], $data['price'], $_SESSION["login"], $con);
            }

        }

        $con->commit();

        $con->close();
        // Invia la risposta come JSON
        $message=true;

        echo json_encode($message);


    }
} catch (mysqli_sql_exception $e){
    if (isset($con)) $con->rollback();
    echo json_encode($e->getMessage());
} catch (Exception $e) {
    echo json_encode($e->getMessage());
}


