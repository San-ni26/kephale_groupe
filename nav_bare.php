<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,700;0,800;1,100;1,700&display=swap"
        rel="stylesheet">
</head>
<head>
        <div class="barreDeNavigation">
            <div class="logo">
                <img class="logo" src="./logo/Logo-Kephal.png" alt="">
            </div>
            <?php
            if (isset($_SESSION['id']) > 0) {
                ?>
                <a href="Pages/utilisateur.php?id=<?php echo $_SESSION['id'] ?>">
                   <h6><?php echo $userinfo['nomBoutique']; ?></h6>
                    <img class="icone_connecte" src="./src/Icone/icone_connecte.png" alt="">
                </a>
                <?php
            } else {
                ?>
                <a href="Pages/conexion_insciptions.php">
                    <img src="./src/Icone/connections.png" alt="">
                </a>
                <?php
            }
            ?>
        </div>
        <section class="fix"></section>
    </head>