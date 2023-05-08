<?php
$bdd = new PDO('mysql:host =localhost;dbname=kephale', 'root','root');
setlocale(LC_TIME,'fr');
$dte = date("Y-m-d H:i:s"); 
var_dump('$numerau');
echo $today;
if (isset($_POST['envoi']))
{
    if(!empty($_POST['nomComplais']) and !empty($_POST['nomDuBoutique']) and !empty($_POST['numerau']) and !empty($_POST['code1']) and !empty($_POST['code2']))
    {
        $nomComplais  = htmlspecialchars($_POST['nomComplais']);
        $nomDuBoutique = htmlspecialchars($_POST['nomDuBoutique']); 
        $numerau = htmlspecialchars($_POST['numerau']); 
        $choix = ($_GET['choix']);
        $code1 = sha1 ($_POST['code1']); 
        $code2 = sha1 ($_POST['code2']);  
        if ($code1 == $code2)
        {
            $insertmbr = $bdd->prepare("INSERT INTO users (nom, nomBoutique, numeraux, code, typsCommerçant ) VALUES (?, ?, ? ,?,?) "); 
            $insertmbr->execute(array($nomComplais, $nomDuBoutique, $numerau, $code2, $choix ));  
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