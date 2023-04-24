<?php
$bdd = new PDO('mysql:host =localhost;dbname=kephale', 'root', 'root');
if (isset($_POST['envoi'])) {
    if (!empty($_POST['nomArticle']) and !empty($_POST['prixArticle']) and !empty($_POST['desciptionArticle']) and !empty($_FILES['image'])) {
        $nomArticle = $_POST['nomArticle'];
        $prixArticle = $_POST['prixArticle'];
        $desciptionArticle = $_POST['desciptionArticle'];
        $image = $_FILES['image'];
        $starget_dir = "image/";
        $starget_file = $starget_dir . basename($image['name']);
        $image_path =  $starget_dir . basename($image['name']);
        if (!move_uploaded_file($image['tmp_name'], $starget_file)) {
            $insertmbr = $bdd->prepare("INSERT INTO article (nom, prix, desciptions, images ) VALUES (?, ?, ? ,?) ");
            $insertmbr->execute(array($nomComplais, $nomDuBoutique, $numerau, $code2));
            echo'envoie';
            $sql = "INSERT INTO article (nom, prix, descriprions, images ) VALUES ('$nomArticle', '$prixArticle', '$desciptionArticle', '$image_path') ";
        } else {
            echo 'non envoie';
        }
    } else {
        echo '<p>tout les chant ne son pas renpli<p>';
    }
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
        </div>
        <h2>inscriptions</h2>
        <br><br><br>
        <form method="POST" action="article.php" enctype="multipart/form-data">
            <input type="text" name="nomArticle" placeholder="Nom de l'article"><br><br>
            <input type="text" name="prixArticle" placeholder="Prix de l'article"><br><br>
            <input type="text" name="desciptionArticle" placeholder="Descriptions"><br><br>
            <label for="">Ajoute une image</label><br>
            <input type="file" name="image" multiple><br><br>
            <input type="submit" name="envoi" value="je minscrit">
        </form>
    </div>
</body>

</html>