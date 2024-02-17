<?php
session_start();

include '../back-end/function.php';

if(!isAdmin()) header("index.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="js/UserManagement.js"></script>


</head>
<body>


<div class="container">

    <header>
        <h1>Users Management</h1>
    </header>


    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="toast" class="toast bg-dark text-white rounded" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto" style="color: #212529;">Notifica</strong>
            </div>
            <div class="toast-body" id="toast-body-content" style="background-color: #212529;">
                x <!-- x viene modificato dinamicamente -->
            </div>
        </div>
    </div>





    <div class="row">
        <div class="col-12">
            <div class="table-container">
                <table id="userTable" class="table table-dark table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Immagine</th>
                        <th scope="col">Nome Orologio</th> <!--descr breve-->
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
