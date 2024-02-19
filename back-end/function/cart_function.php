<?php


function verifyProduct($prodotto,$utente,$con): int
{
    $sql = "SELECT quantità FROM carrello WHERE id_prodotto = $prodotto AND id_utente = $utente";
    $result = $con->query($sql);
    if ($result->num_rows==0) return 0;
    $row = $result->fetch_assoc();
    return $row['quantità'];
}

function verifyAmount($prodotto,$con): bool {
    $sql="SELECT Quantita FROM quantita WHERE Id_Articolo = $prodotto";
    $result=$con->query($sql);
    $row = $result->fetch_assoc();
    if ($row['Quantita'] > 0) return true;
    else return false;
}

function increaseProduct($prodotto, $prezzo, $utente, $con)
{
    $sql="UPDATE carrello  SET quantità=quantità+1, prezzo= prezzo+$prezzo WHERE id_utente=$utente AND id_prodotto=$prodotto ";
    $con->query($sql);
    $sql="UPDATE quantita SET Quantita=Quantita-1 WHERE Id_Articolo=$prodotto ";
    $con->query($sql);
}

function decreaseProduct($prodotto, $prezzo, $utente, $con){
    $sql="UPDATE carrello SET quantità=quantità-1 , prezzo= prezzo-$prezzo WHERE id_utente=$utente AND id_prodotto=$prodotto ";
    $con->query($sql);
    $sql="UPDATE quantita SET Quantita=Quantita+1 WHERE Id_Articolo=$prodotto ";
    $con->query($sql);
}

function addProduct($prodotto, $prezzo, $utente, $con){
    $sql="INSERT INTO carrello VALUES ($utente, $prodotto, '1', $prezzo) ";
    $con->query($sql);
    $sql="UPDATE quantita SET Quantita=Quantita-1 WHERE Id_Articolo=$prodotto ";
    $con->query($sql);
}

function deleteProduct($prodotto, $prezzo, $utente, $con){
    $sql="DELETE FROM carrello WHERE id_utente=$utente AND Id_prodotto=$prodotto";
    $con->query($sql);
    $sql="UPDATE quantita SET Quantita=Quantita+1, WHERE Id_Articolo=$prodotto ";
    $con->query($sql);

}