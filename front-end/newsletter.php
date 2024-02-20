<?php
session_start();
include '../back-end/function/function.php';
if (!isAdmin()) header("Location: index.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Newsletter</title>
    <link rel="stylesheet" href="Style/Newsletter.css">
    <link rel="stylesheet" href="Style/navbar.css" />
    <script src="js/newsletter.js"></script>

    <style>
        body {
            background-color: white; /* Colore di sfondo scuro */
            color: Black; /* Colore del testo bianco */
        }

        .container {
          margin-top: 40px;
            min-height: 50vh; /* Altezza minima della viewport */
            display: flex;
            flex-direction: column;
            padding: 50px;
        }

        header {
            text-align: center;
            margin-bottom: 40px;
        }

        footer {
            text-align: center;
        }
    </style>

</head>

<body>

<?php
include "../back-end/NavBar.php";
?>

  <form   action="../back-end/newsletter.php" method="post" name="emailEditor" id="emailEditor">
      <h2>Newsletter</h2>

      <input type="text" name="emailObject" id="emailObject" placeholder="Object" required> <br></br>

      <textarea  id="emailBody" name="emailBody" ></textarea> <br></br>
      <button  id="sendButton" >Send</button>
  </form>


</body>
</html>