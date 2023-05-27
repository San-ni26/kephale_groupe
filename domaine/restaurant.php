<?php
session_start();
include_once('../connexion_db.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/resto.css">
    <title>Restaurant</title>
</head>
<body>
<head>
        <div class="barreDeNavigation">
            <div class="logo">
                <img class="logo" src="../logo/Logo-Kephal.png" alt="">
            </div>
            <?php
            if (isset($_SESSION['id']) > 0) {
                ?>
                <a href="Pages/utilisateur.php?id=<?php echo $_SESSION['id'] ?>">
                   <h6><?php echo $userinfo['nomBoutique']; ?></h6>
                    <img class="icone_connecte" src="../src/Icone/icone_connecte.png" alt="">
                </a>
                <?php
            } else {
                ?>
                <a href="Pages/conexion_insciptions.php">
                    <img src="../src/Icone/connections.png" alt="">
                </a>
                <?php
            }
            ?>
        </div>
        <section class="fix"></section>
    </head>
    <div class="bloc_resto">
        <div class="liste_resto">
            <div class="resto_info" >
                <div class="image_resto" >
                    <img src="" alt="">
                </div>
                <div class="info_resto" >
                    h
                </div>
            </div>

        </div>
    </div>
</body>
</html>