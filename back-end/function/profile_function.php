<?php

function update_password($user,$old_password,$new_password,$confirm_password,$con)
{
    $sql = "SELECT password FROM users WHERE id = $user";
    $result = $con->query($sql);
    $result = $result->fetch_assoc();

    if (!password_verify($old_password, $result['password'])) {
        throw new Exception("CURRENT PASSWORD WRONG");
    }


    // controllo se la nuova password e la conferma coincidono
    if ($new_password != $confirm_password) {
        throw new Exception("MISMATCHING PASSWORDS");
    }

    $hash_password = password_hash($new_password, PASSWORD_DEFAULT);


    // query per aggiornare la password
    $stmt = $con->prepare("UPDATE users SET password = ? WHERE id = ?");
    $stmt->bind_param("ss", $hash_password, $_SESSION["login"]);
    $stmt->execute();
}