<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Newsletter</title>
    <link rel="stylesheet" href="Style/Newsletter.css">
    <!--<script src="../js/Newsletter.js"></script>-->

    <style>
        body {
            background-color: #343a40; /* Colore di sfondo scuro */
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
  <form   action="Send_Newsletter.php" method="post" name="emailEditor" id="emailEditor">
      <h2>Newsletter</h2>

      <input type="text" name="emailObject" id="emailObject" placeholder="Object" required> <br></br>

      <textarea  id="emailBody" name="emailBody" ></textarea> <br></br>
      <button  id="sendButton" >Send</button>
  </form>


</body>
</html>