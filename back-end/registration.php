<?php

include "function.php";


try {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {


            $var = ['firstname', 'lastname', 'email', 'pass', 'confirm'];
            for ($i = 0; $i < count($var); $i++) {
                if (empty($_POST[$var[$i]])) {
                    throw new Exception("INVALID DATA");
                }
            }

            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = trim($_POST['email']);
            $password = trim($_POST['pass']);
            $confirmPassword = trim($_POST['confirm']);
            $Newsletter = isset($_POST["Newsletter"]);


            // controllo la validità dell'email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new Exception("INVALID EMAIL");
            }

            // controllo che la password sia di almeno 10 caratteri
            if (strlen($password) < 10) {
                throw new Exception("TOO SHORT PASSWORD");
            }

            // controllo che le password corrispondano
            if ($password !== $confirmPassword) {
                throw new Exception("PASSWORDS DO NOT MATCH");
            }

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // inizio il lavoro sul db
            $con = connection();

            $stmt = $con->prepare("SELECT * FROM users WHERE email=?");
            $stmt->bind_param("s", $email);
            $stmt->execute();

            if ($stmt->errno) {
                throw new Exception("ERROR, TRY AGAIN");
            }

            if ($stmt->num_rows() > 0) {
                throw new Exception("EMAIL ALREADY IN USE");
            }

            $stmt -> close();

            $stmt = $con->prepare("INSERT INTO users (firstname,lastname,email,password, newsletter) VALUES (?,?,?,?,?)");
            $stmt->bind_param('ssssi', $firstname, $lastname, $email, $hashedPassword, $Newsletter);
            $stmt -> execute();

            if ($stmt->errno) {
                throw new Exception("ERROR, TRY AGAIN");
            }

            //chiudo il database
            $con->close();

            // se la registrazione è andata a buon fine mando un alert
            echo '
            <script>
                let message = "REGISTRATION SUCCESSFUL\nYou are about to be redirected to login";
                alert(message);
                window.location.href = "../front-end/login.php";
            </script>
            ';

        }


} catch (Exception $e) {
    // Gestione delle eccezioni
    echo '
        <script>
            let message = "' . $e->getMessage() . '";
            alert(message);
            window.location.href = "../front-end/registration.php";
        </script>
        ';
}