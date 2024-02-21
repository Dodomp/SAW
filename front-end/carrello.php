<?php
session_start();

include '../back-end/function/function.php';

if(!isLogged()) header("index.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrello</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="Style/navbar.css" />
    <link rel="stylesheet" href="Style/carrello.css" />
    <script src="js/carrello.js"></script>



</head>
<body>

<?php
    include "../back-end/NavBar.php";
?>



<div class="container">


    <div class="row">
        <div class="col-12">
            <div class="table-container">
                <table id="userTable" class="table table-light table-striped">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Immagine</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Descrizione</th>
                        <th scope="col">Quantità</th>
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

    <div style="font-size: 20px; font-weight: bold"
        <h1>Totale: </h1>
        <span id="totale">0</span>
        <span>$</span>
    </div>

    <div>
        <button class="btn btn-primary" style="margin-top: 20px">BUY</button>

    </div>







</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>