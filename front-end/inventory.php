<?php
session_start();

include '../back-end/function/function.php';


if(!isAdmin()) {
    header("location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="Style/navbar.css" />
    <link rel="shortcut icon" href="favicon.ico" />


    <style>
        .btnADD{
            display: inline-block;
            padding: 1px 8px;
            text-align: center;
            border: solid 2px #000000;
            border-radius: 50%;
            background-color: blue;
            color: #ffffff; /
        cursor: pointer;
        }
    </style>

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
                        <th scope="col">Nome Orologio</th>
                        <th scope="col">Descrizione</th>
                        <th scope="col">Prezzo</th>
                        <th scope="col">Quantità</th>
                        <th scope="col">CLICK to ADD</th>
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

<script src="js/inventory.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>

