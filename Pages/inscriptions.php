<?php
$bdd = new PDO('mysql:host =localhost;dbname=kephale', 'root','root');

if (isset($_POST['envoi']))
{
    if(!empty($_POST['nomComplais']) and !empty($_POST['nomDuBoutique']) and !empty($_POST['numerau']) and !empty($_POST['code1']) and !empty($_POST['code2']))
    {
        $nomComplais  = htmlspecialchars($_POST['nomComplais']);
        $nomDuBoutique = htmlspecialchars($_POST['nomDuBoutique']); 
        $numerau = htmlspecialchars($_POST['numerau']); 
        $code1 = sha1 ($_POST['code1']); 
        $code2 = sha1 ($_POST['code2']);  
        if ($code1 == $code2)
        {
            $insertmbr = $bdd->prepare("INSERT INTO users (nom, nomBoutique, numeraux, code ) VALUES (?, ?, ? ,?) "); 
            $insertmbr->execute(array($nomComplais, $nomDuBoutique, $numerau, $code2 ));  
            header('location: connexion.php ');  
           
        }else{
            $erreur =  "les deux mot de passe ne ce concepond pas";  
        }
    }

    else
    {
        $erreur =  "Renplice tout les chans... "; 
    }
}
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
    <link rel="stylesheet" href="../Pages_CSS/inscripptions.css">
    <title>inscriptions</title>
</head>
<body>
    <div class="fond">
        <h2>Créer une boutique</h2>
        <br><br><br>
        <form method="POST" action="" align ="center" >
            <input type="text" name="nomComplais"placeholder="Nom" value="<?php if (isset($nomComplais)){ echo $nomComplais; } ?>"><br><br>
            <input type="text" name="nomDuBoutique"placeholder="Mom de la Boutique" value="<?php if (isset($nomDuBoutique)){ echo $nomDuBoutique; } ?>"><br><br>    
            <input type="text" name="numerau"placeholder="telephone" value="<?php if (isset($numerau)){ echo $numerau; } ?>"><br><br>
            <input type="password" name="code1"placeholder="mot de passe " id=""><br><br>
            <input type="password" name="code2"placeholder="confirme" id=""><br><br>
        <input type="submit" name="envoi" value="je minscrit"> 
        </form>
        <?php
        if(isset($erreur))
        {
             echo '<font color="red">'.$erreur. "</font>"; 
        }
        ?>  
    </div>

</body>
</html>