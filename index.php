<?php
$bdd = new PDO('mysql:host =localhost;dbname=kephale', 'root','root');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="manifest" href="manifest.json">
    <link
            href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,700;0,800;1,100;1,700&display=swap"
            rel="stylesheet">
    <title>Accuil</title>
</head>
<body>
    <head>
            <div class="barreDeNavigation">
                <div class="logo">
                <img class="logo" src="./logo/Logo-Kephale.png" alt="">
                </div>
                <a href="Pages/conexion_insciptions.php">
                    <img src="./src/Icone/connections.png" alt="">
                </a>
            </div>
            <section class="fix"></section>
    </head>
    <section class="pub">
        <img src="./logo/Logo png.png" alt="">
    </section>
    <section class="article_un">
        <a href="">Restaurant</a>
        <a href="">Hôtel</a>
        <a href="">Électronique</a>
    </section>

</body>
</html>