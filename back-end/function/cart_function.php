<?php


function verify_produtct($prodotto,$utente,$con) {
    $stmt = $con->prepare("SELECT id_prodotto FROM carrello WHERE id_prodotto = $prodotto AND id_utente = $utente");
    $stmt->execute();
    $result = $stmt->num_rows();
    $stmt->close();
    if ($result == 1) return true;
    else return false;
}


function verify_amount($prodotto,$con) {
    $stmt = $con->prepare("SELECT Quantita FROM quantita WHERE Id_Articolo = $prodotto");
    $stmt->execute();
    $quantita = $stmt->get_result();
    $stmt->close();
    if ($quantita > 0) return true;
    else return false;
}