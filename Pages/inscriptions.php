<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
            href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,700;0,800;1,100;1,700&display=swap"
            rel="stylesheet">
    <link rel="stylesheet" href="../Pages_CSS/inscripption.css">
    <?php
require_once("db_inscriptions.php");

?>
    <title>inscriptions</title>
</head>
<body>
    <div class="fond">
        <form method="POST" action="" align ="center" class="liste_inscrit" >
        <h2>Créer une boutique</h2><br>
            <input type="text" name="nomComplais"placeholder="Votre nom complait" value="<?php if (isset($nomComplais)){ echo $nomComplais; } ?>"><br><br>
            <input type="text" name="nomDuBoutique"placeholder="Mom de la Boutique" value="<?php if (isset($nomDuBoutique)){ echo $nomDuBoutique; } ?>"><br><br>    
            <input type="text" name="numerau"placeholder="Telephone" value="<?php if (isset($numerau)){ echo $numerau; } ?>"><br><br>
            <input type="file" name="image">
            <select id="choix_cliant" name="choix" class="selection">
            <option value="Sélections">Sélections</option>
                <option value="Petit commerçants">Petit commerçant</option>
                <option value="Moyen commerçants">Moyen commerçant</option>
                <option value="Grand commerçants">Grand commerçant</option>
                <option value="Restaurant">Restaurant</option>
                <option value="Hôtel">Hôtel</option>
            </select><br><br>
            <input type="password" name="code1"placeholder="mot de passe " id=""><br><br>
            <input type="password" name="code2"placeholder="Confirme mot de passe" id=""><br><br>
            <div>
            <?php
        if(isset($erreur))
        {
             echo '<font color="red">'.$erreur. "</font>"; 
        }
        ?>
            </div>
        <input class="envoi_iscri" type="submit" name="envoi" value="je m'inscrit">
        </form>
    </div>

</body>
</html>
