<?php

function destinatari ($con)  {
    $sql = "SELECT email FROM users WHERE newsletter = 1";
    $result = $con -> query($sql);

    if ($result->num_rows < 1) {
        echo "nessun utente iscritto alla newsletter";
        $con->close();
        exit();
    }
    $destinatari = array();
    while ($row = $result->fetch_assoc()) {
        $destinatari[] = $row['email'];
    }
    $con->close();
    return $destinatari;
}