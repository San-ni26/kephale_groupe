<?php
session_start();
include_once('connexion_db.php');
include_once('Pages/connexion_db.php');
if (isset($_GET['id']) and !empty($_GET['id']) > 0) {

    $getid = intval($_GET['id']);
    $repmbr = $bdd->prepare("SELECT * FROM users WHERE id = ? ");
    $repmbr->execute(array($getid));
    $userinfo = $repmbr->fetch(PDO::FETCH_ASSOC);
    //var_dump ( $userinfo); 
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
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
    <section class="pub">
        <img src="./logo/Logo png.png" alt="">
    </section>
    <section class="article_un">
        <a href="">Restaurant</a>
        <a href="">Hôtel</a>
        <a href="">Électronique</a>
    </section>
    <div class="utilisateur">
        <?php
        if (isset($_SESSION['id']) and $userinfo['id'] == $_SESSION['id']) {
            ?>
            <a href="pages/utilisateur.php?id=<?php echo $_SESSION['id'] ?>">mon compte</a><br> <br>
            <?php
        }
        ?>
    </div>
    <div>

    </div>
</body>

</html>