<?php
 session_start();
$bdd = new PDO('mysql:host =localhost;dbname=kephale', 'root','root');

if (isset($_POST['envoi']))
{
    if(!empty($_POST['nomComplais']) and !empty($_POST['code1']))
    {
        $nomComplais  = htmlspecialchars($_POST['nomComplais']);
        $code1 = sha1 ($_POST['code1']); 
        $recupmbr = $bdd->prepare("SELECT * FROM users WHERE nom = ? AND code = ? ");  
        $recupmbr->execute(array($nomComplais, $code1 )); 
        if ($recupmbr->rowCount()  > 0 ){
            $_SESSION['nom'] = $nomComplais;
            $_SESSION['nomBoutique'] = $nomBoutique; 
            $_SESSION['code'] = $code1; 
            $_SESSION['id'] = $recupmbr->fetch() ['id'];     
            header('Location: utilisateur.php?id='.$_SESSION['id']);
            exit;   
        }else{
            $erreur =   "votre mote de passe ou le nom dutilisateur est incorecte";   
        }
    }else{
        $erreur =  "Tout les chant ne son pas rempli";  
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
            <link rel="stylesheet" href="../Pages_CSS/connections.css">
    <title>Connexions</title>
</head>
<body>
<h2>Créer une boutique</h2>
        <br><br><br>
        <form method="POST" action="" align ="center" >
            <input type="text" name="nomComplais"placeholder="Nom" value="<?php if (isset($nomComplais)){ echo $nomComplais; } ?>"><br><br>
            <input type="password" name="code1"placeholder="code" id=""><br><br>
        <input type="submit" name="envoi" value="Connexion" href="index.php"> 
        
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