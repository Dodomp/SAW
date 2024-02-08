<?php
session_start();
include "../back-end/remember_me.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Sign-in</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>


<div class="container mt-5">
    <form id="login" action="../back-end/login.php" method="post">
        <div class="text-center">
            <h1 class="title">Sign-in</h1>
        </div>
        <div class="form-group">
            <label for="email">Insert email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="pass">Insert password:</label>
            <input type="password" class="form-control" id="pass" name="pass" required>
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="remember" name="remember">
            <label class="form-check-label" for="remember">Remember me</label>
        </div>
        <input type="submit" name="submit" class="btn btn-primary mt-3">
        <div class="mt-3">
            <p class="link1">Do not have an account? <br><a href="registration.php">Go to registration</a></p>
        </div>
    </form>
</div>



</body>
</html>
