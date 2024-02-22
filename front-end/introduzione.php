<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Time Haven</title>
    <link rel="stylesheet" href="Style/navbar.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            color: #333;
        }

        header {
            background-color: #0069a6;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        section {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        footer {
            background-color: #0069a6;
            color: #fff;
            padding: 10px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>

<?php
    include "../back-end/NavBar.php";
?>

<header>
    <h1>Time Haven</h1>
    <p>Realizzato da Stefano Walter e Martino</p>
</header>

<section style="text-align: center">
    <h2>Benvenuti nel nostro sito di rivendita di orologi</h2>
    <p>Esplorate la nostra selezione di orologi di alta qualità provenienti dai migliori brand.</p>
    <p>Siamo appassionati di orologi e garantiamo prodotti autentici e affidabili.</p>
    <p>Scoprite stili unici e prezzi competitivi nel nostro catalogo.</p>
</section>

<footer>
    <p>&copy; 2024 Rivendita Orologi - Stefano Walter & Martino</p>
</footer>
</body>
</html>
