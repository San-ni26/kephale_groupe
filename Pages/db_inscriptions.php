<?php
$bdd = new PDO('mysql:host =localhost;dbname=kephale', 'root','root');

//var_dump('$numerau');
if (isset($_POST['envoi']))
{
    if(!empty($_POST['nomComplais']) and !empty($_POST['nomDuBoutique']) and !empty($_POST['numerau']) and !empty($_POST['code1']) and !empty($_POST['code2']))
    {
        $nomComplais  = htmlspecialchars($_POST['nomComplais']);
        $nomDuBoutique = htmlspecialchars($_POST['nomDuBoutique']); 
        $numerau = htmlspecialchars($_POST['numerau']);
        $choix = ($_POST['choix']);
        $code1 = sha1 ($_POST['code1']); 
        $code2 = sha1 ($_POST['code2']); 
        $image = $_FILES['image']['name'];
        $filename = uniqid() . $image;
        $tmp = $_FILES['image']['tmp_name']; 
        move_uploaded_file ($tmp, 'image/' . $filename);
        if ($code1 == $code2)
        {
            $insertmbr = $bdd->prepare("INSERT INTO users (nom, nomBoutique, numeraux, code, abonnement,img_profile ) VALUES (?, ?, ?, ?, ?, ?)" ); 
            $insertmbr->execute(array($nomComplais, $nomDuBoutique, $numerau, $code2, $choix,$filename )); 
            header('location: connexion.php');  
        }else{
            $erreur =  "les deux mot de passe ne ce concepond pas";  
        }
    } else
    {
        $erreur =  "Renplice tout les chans... "; 
    }
}
echo $choix;
?>