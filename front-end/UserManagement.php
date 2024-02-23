<?php
    session_start();

  include '../back-end/function/function.php';

  if(!isAdmin()) header("index.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="Style/navbar.css" />
    <link rel="stylesheet" href="Style/UserManagement.css" />
    <link rel="shortcut icon" href="favicon.ico" />
    <script src="js/UserManagement.js"></script>


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
                    PRIORITA' ADMIN MODIFICATA
                </div>
            </div>
        </div>


      <div class="button-container" style="width: 100%">
          <button id="admin-btn-activate" class="btn btn-primary" onclick="attivaModificheAdmin(1)">
              Premi per attivare le modifiche
          </button>
          <button id="admin-btn-deactivate" class="btn btn-secondary" onclick="attivaModificheAdmin(0)">
              Premi per disabilitare le modifiche
          </button>
      </div>



      <div class="row">
            <div class="col-12">
                <div class="table-container">
                    <table id="userTable" class="table table-white table-striped">
                        <thead>
                            <tr>
                                <th scope="col">FIRSTNAME</th>
                                <th scope="col">LASTNAME</th>
                                <th scope="col">EMAIL</th>
                                <th scope="col">ADMIN </th>
                                <th scope="col">DELETE</th>
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



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
