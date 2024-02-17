<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <title>Sign-up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="js/registration.js"></script>

</head>

<body>

<!-- manca una navbar -->

<div class="container mt-5">
    <form id="registration" action="../back-end/registration.php" method="post">
        <div class="text-center">
            <h1 class="title">Sign-Up</h1>
        </div>
        <div class="mb-3">
            <label for="firstname" class="form-label">Insert firstname:</label>
            <input type="text" class="form-control" id="firstname" name="firstname" required>
        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label">Insert lastname:</label>
            <input type="text" class="form-control" id="lastname" name="lastname" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Insert email:</label>
            <input type="email" class="form-control" id="email" name="email" required onchange="checkEmail()">
            <p id="Message"></p>
        </div>
        <div class="mb-3">
            <label for="pass" class="form-label">Insert password:</label>
            <input type="password" class="form-control" id="pass" name="pass" required>
        </div>
        <div class="mb-3">
            <label for="confirm" class="form-label">Confirm password:</label>
            <input type="password" class="form-control" id="confirm" name="confirm" required>
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="Newsletter" name="Newsletter">
            <label class="form-check-label" for="Newsletter">Yes, I'd like recive Newsletter</label>
        </div>
        <input type="submit" name="submit" class="btn btn-primary mt-3" id="submit" value="Sign-Up">
        <div class="mt-3">
            <p class="link1">Do you already have an account?<a href="login.php" style="margin-left: 15px;">Go to login</a></p>
        </div>
    </form>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>