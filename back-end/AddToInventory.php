<?php
session_start();
include "function/function.php";

if (!isAdmin()) header("location: ../front-end/index.php");

header('Content-Type: application/json');


try {


    $con = connection();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        //in data ci saranno idArticolo (id) e il prezzo (price) dell'articolo e remove o add (op)
        $data = json_decode(file_get_contents('php://input'), true);

        $id_prodotto = $data['id'];

        $sql = "UPDATE articoli SET Quantita = Quantita + 1 WHERE articoli.Id_Articolo = $id_prodotto";
        $con -> query($sql);

        $con->close();

        echo json_encode("Prodotto aggiunto all'inventario");
    }
} catch (mysqli_sql_exception $e) {
    if (isset($con)) $con->rollback();
    echo json_encode($e->getMessage());
} catch (Exception $e) {
    echo json_encode($e->getMessage());
}


