
<?php
$bdd = new PDO('mysql:host =localhost;dbname=kephale', 'root','root');

if (isset($_POST['envoi']))
{
    $nomArticle = $_POST['nomArticle'];
    $prixArticle = $_POST['prixArticle'];
    $desciptionArticle = $_POST['desciptionArticle'];
    if (!empty($nomArticle) AND !empty($prixArticle) AND !empty($desciptionArticle)){
        $req1 = mysqli_query($son, "SELECT nom, prix, descriptions, FROM article WHERE nom = '$nomArticle' AND  prix = '$prixArticle' AND  descriptions '$desciptionArticle' "); 
        if (mysqli_num_rows($req1) > 0 ){
            $message = '<p style="color: red;">le Produit existe deja </p>'; 
        }else{
            if (isset($_FILES['image'])){
                $img_nom = $_FILES['image']['name'];  
                $tmp_nom = $_FILES['image']['tmp_name'];  
                $time =time();  
                $nouveau_nom_img =$time.$img_nom ;   
                $deplace_image = move_uploaded_file($tmp_nom,"SRC/".$nouveau_nom_img ); 
                if ($deplace_image){
                    $req2 = mysqli_query($son, "INSERT INTO article VALUES (NULL,'$nomArticle', '$prixArticle', '$desciptionArticle', '$nouveau_nom_img')");  
                    if ($req2){
                        $message = '<p style="color: red;">larticle a ete cree </p>';  
                    }else{
                        $message = '<p style="color: red;">non envoye</p>';
                    }
                } 
            }
        }
    }else{
        $message = '<p style="color: red;">renplice tout les chans </p>';
    }
    $images = $_POST['images'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stil.css">
    <title>inscriptions</title>
</head>
<body>
    <div class="fond">
        <div>
        <?php if ( isset($message )){
             echo $message; 
        } ?> 
        </div>
        <h2>inscriptions</h2>
        <br><br><br>
        <form method="POST" action="">
        <input type="text"name="nomArticle" placeholder="Nom de l'article"><br><br>
            <input type="text"name="prixArticle" placeholder="Prix de l'article" ><br><br>
            <input type="text"name="desciptionArticle" placeholder="Descriptions" ><br><br>
            <label for="">Ajoute une image</label><br>
            <input type="file" name="image"><br><br>
        <input type="submit" name="envoi" value="je minscrit"> 
        </form>
    </div>
    <?php

        ?>  
</body>
</html>




