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