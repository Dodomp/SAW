<?php


function verifyProduct($prodotto, $utente, $con): int
{
    $sql = "SELECT quantità FROM carrello WHERE id_prodotto = ? AND id_utente = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ii", $prodotto, $utente);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) return 0;

    $row = $result->fetch_assoc();
    return $row['quantità'];
}

function verifyAmount($prodotto, $con): bool
{
    $sql = "SELECT Quantita FROM quantita WHERE Id_Articolo = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $prodotto);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    return ($row['Quantita'] > 0);
}

function increaseProduct($prodotto, $prezzo, $utente, $con)
{
    $sql = "UPDATE carrello SET quantità = quantità + 1, prezzo = prezzo + ? WHERE id_utente = ? AND id_prodotto = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("dii", $prezzo, $utente, $prodotto);
    $stmt->execute();

    $sql = "UPDATE quantita SET Quantita = Quantita - 1 WHERE Id_Articolo = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $prodotto);
    $stmt->execute();
}

function decreaseProduct($prodotto, $prezzo, $utente, $con)
{
    $sql = "UPDATE carrello SET quantità = quantità - 1, prezzo = prezzo - ? WHERE id_utente = ? AND id_prodotto = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("dii", $prezzo, $utente, $prodotto);
    $stmt->execute();

    $sql = "UPDATE quantita SET Quantita = Quantita + 1 WHERE Id_Articolo = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $prodotto);
    $stmt->execute();
}

function addProduct($prodotto, $prezzo, $utente, $con)
{
    $sql = "INSERT INTO carrello VALUES (?, ?, '1', ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("iid", $utente, $prodotto, $prezzo);
    $stmt->execute();

    $sql = "UPDATE quantita SET Quantita = Quantita - 1 WHERE Id_Articolo = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $prodotto);
    $stmt->execute();
}

function deleteProduct($prodotto, $prezzo, $utente, $con)
{
    $sql = "DELETE FROM carrello WHERE id_utente = ? AND Id_prodotto = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ii", $utente, $prodotto);
    $stmt->execute();

    $sql = "UPDATE quantita SET Quantita = Quantita + 1 WHERE Id_Articolo = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $prodotto);
    $stmt->execute();
}