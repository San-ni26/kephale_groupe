<?php
require_once("db_connexion.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,700;0,800;1,100;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../Pages_CSS/connexion.css">
    <title>Connexions</title>
</head>

<body>
    <div class="connexion_bloc">
        <br><br><br>
        <form method="POST" action="" align="center" class="bloc_conect">
            <h2>Connexion</h2>
            <input type="text" name="nomComplais" placeholder="Nom"
                value="<?php if (isset($nomComplais)) {
                    echo $nomComplais;
                } ?>"><br><br>
            <input type="password" name="code1" placeholder="code" id=""><br><br>
            <div>
            <?php
        if (isset($erreur)) {
            echo '<font color="red">' . $erreur . "</font>";
        }
        ?>
            </div>
            <input class="envoi_conct" type="submit" name="envoi" value="Connexion" ">
        </form>

    </div>
    </div>
</body>

</html>