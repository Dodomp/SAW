<?php

function TakeUsers ($con) : array {
    $stmt = $con->prepare("SELECT * FROM users");
    $stmt->execute();
    $queryResult = $stmt->get_result();
    $con->close();

    $users = array();
    while ($row = $queryResult->fetch_assoc()) {
        $users[] = $row;
    }

    return $users;
}

function toggleAdmin ($email, $con) {
    $stmt = $con->prepare("UPDATE users SET admin=admin XOR 1 WHERE email=?");
    $stmt->bind_param('s', $email);
    $stmt->execute();

    if (!$stmt->affected_rows) throw new Exception("No user found");
}