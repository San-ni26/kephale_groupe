<?php
$bdd = new PDO('mysql:host =localhost;dbname=kephale', 'root', 'root');
if (isset($_POST['envoi'])) {
    if (!empty($_POST['nomArticle']) and !empty($_POST['prixArticle']) and !empty($_POST['desciptionArticle']) and !empty($_FILES['image'])) {
        $nom_article = $_POST['nomArticle'];
        $prix_article = $_POST['prixArticle'];
        $desciption_article = $_POST['desciptionArticle'];
        if (!empty($_FILES['image']['name'])) {
            $image = $_FILES['image']['name'];
            $filename = uniqid() . $image;
            move_uploaded_file($_FILES['image']['tmp_name'], 'image/' . $filename);
        }
        if (!move_uploaded_file($image['tmp_name'], $starget_file)) {
            $inser = $bdd->prepare("INSERT INTO article  VALUES (null,?,?,?,?) ");
            $insere = $inser->execute(array($nom_article, $prix_article, $desciption_article, $filename));
            
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