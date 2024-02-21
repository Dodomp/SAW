<?php
session_start();

include '../back-end/function/function.php';



if(!isLogged()) {
    echo '
        <script>
            let message = "SIGN IN, please\nYou are about to be redirected to login";
            alert(message);
            window.location.href = "login.php";
        </script>
        ';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="Style/navbar.css" />
    <style>
        #img:hover{
            transform: scale(5);
            text-align: center;
        }
    </style>
</head>
<body>

    <?php
    include "../back-end/NavBar.php";
    ?>


<div class="container">


    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="toast" class="toast bg-dark text-white rounded" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto" style="color: #212529;">Notifica</strong>
            </div>
            <div class="toast-body" id="toast-body-content" style="background-color: #212529;">
                PRODOTTO AGGIUNTO AL CARRELLO
            </div>
        </div>
    </div>

    <div class="input-group mb-3">
        <input type="text" class="form-control" id="input-search" placeholder="Search by name or description" aria-label="Recipient's username" aria-describedby="button-search">
        <button class="btn btn-outline-secondary" type="button" id="button-search">Search</button>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="table-container">
                <table id="userTable" class="table table-light table-striped">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Immagine</th>
                        <th scope="col">Nome Orologio</th>
                        <th scope="col">Descrizione</th>
                        <th scope="col">Prezzo</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- Il contenuto della tabella verrà popolato dinamicamente -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div>

<script src="js/shop.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
