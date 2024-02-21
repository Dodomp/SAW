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


</head>

<body>

<?php
include "../back-end/NavBar.php";
?>

  <form   action="../back-end/newsletter.php" method="post" name="emailEditor" id="emailEditor">
      <h2>Newsletter</h2>

      <input type="text" name="emailObject" id="emailObject" placeholder="Object" required> <br>

      <textarea  id="emailBody" name="emailBody" placeholder="Write here your email message"></textarea> <br>
      <button  id="sendButton" >Send</button>
  </form>


</body>
</html>