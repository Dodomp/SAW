<?php
session_start();
include "function/function.php";

try {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

       if (empty($_POST['email']) || empty($_POST['pass'])) {
            throw new Exception("INVALID DATA");
        }

        $remember = isset($_POST['remember']);
        $email = trim($_POST['email']);
        $password = trim($_POST['pass']);



        $con = connection();

        $stmt = $con->prepare("SELECT * FROM users WHERE email=?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        if ($stmt->errno) {
            throw new Exception("ERROR, TRY AGAIN");
        }
        $res = $stmt->get_result();
        $res = $res->fetch_assoc();

        $stmt -> close();

        if (!$res) {
            $con -> close();
            throw new Exception("Something went wrong");
        }

        if (!password_verify($password, $res["password"])) {
            $con -> close();
            throw new Exception("Something went wrong");
        }

        $_SESSION["login"] = $res["id"];
        $_SESSION["email"] = $res["email"];
        $_SESSION["username"] = $res["firstname"];

        if ($res["admin"]) {
            $_SESSION["admin"] = $res["admin"];
        }

        $_SESSION["expire"] = time() + 6000;

        if ($remember) {
            $id_cookie = bin2hex(random_bytes(32)) . time();
            $expire = time() + 300;

            setcookie(
                "id_cookie",
                $id_cookie,
                $expire,
                "/"
            );


            $stmt = $con->prepare("UPDATE users SET id_cookie=?, expire=?, flag=? WHERE email=?");
            $stmt->bind_param('siis', $id_cookie, $expire, $remember, $email);
            $stmt->execute();
            if ($stmt->errno) {
                $con -> close();
                throw new Exception("ERROR, TRY AGAIN");
            }
        }

        $con -> close();
        header("location: ../front-end/index.php");
        exit();
    }


} catch (Exception $e) {
    echo '
        <script>
            let message = "' . $e->getMessage() . '";
            alert(message);
            window.location.href = "../front-end/login.php";
        </script>
        ';
}

