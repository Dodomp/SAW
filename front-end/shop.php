<?php
session_start();

include '../back-end/function/function.php';

if(!isAdmin()) {
    echo '
        <script>
            let message = "SIGN IN, please\nYou are about to be redirected to login";
            alert(message);
            window.location.href = "login.php";
        </script>
        ';

    //header("location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="js/shop.js"></script>

    <style>
        .table-container {
            margin-top: 20px; /* Aggiunge uno spazio sopra la tabella */
        }

        #userTable {
            border-radius: 8px; /* Aggiunge angoli arrotondati alla tabella */
        }

        #userTable th, #userTable td {
            text-align: center; /* Centra il testo nelle celle */
        }

        #userTable tbody tr:hover {
            background-color: #f5f5f5; /* Aggiunge uno sfondo più chiaro al passaggio del mouse */
        }

    </style>

</head>
<body>


<div class="container">

    <header>
        <h1>Users Management</h1>
    </header>





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



    <!-- Aggiunta dell'area di amministrazione
    <div class="admin-panel">
        <a href="AdminArea.php" style="margin-right: 10px; margin-top: 35px;">Return</a>
    </div>
      -->
    <!-- Contenuto dell'area di amministrazione
    <div class="admin-content">
       Il tuo contenuto amministrativo qui
    </div>-->

</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
