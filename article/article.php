<?php
session_start();
$bdd = new PDO('mysql:host =localhost;dbname=kephale', 'root', 'root');

$id_post = $_SESSION['id'];
var_dump ('$insere'); 
if (isset($_POST['envoi'])) {
    if (!empty($_POST['nomArticle']) and !empty($_POST['prixArticle']) and !empty($_POST['desciptionArticle'])) {
        $nom_article = $_POST['nomArticle'];
        $prix_article = $_POST['prixArticle'];
        $desciption_article = $_POST['desciptionArticle'];
        $image = $_FILES['image']['name'];
        $filename = uniqid() . $image;
        $tmp = $_FILES['image']['tmp_name']; 
        move_uploaded_file ($tmp, 'image/' . $filename);
        if (!move_uploaded_file($image['tmp_name'], $filename)) {
            $inser = $bdd->prepare("INSERT INTO articl VALUES (null,?,?,?,?,?) ");
            $insere = $inser->execute(array($nom_article, $prix_article, $desciption_article, $filename, $_SESSION['id']));
        }
    } else {
        $erreur = "Tous les champs ne sont pas remplies";
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
    <link rel="stylesheet" href="article.css">
    <title>inscriptions</title>
</head>

<body>

    <head>
        <div class="barreDeNavigation">
            <div class="logo">
                <a href="../index.php?id=<?php echo $_SESSION['id'] ?>">
                    <img class="logo" src="../logo/Logo png.png" alt="">
                </a>
            </div>
            <a href="../pages/utilisateur.php?id=<?php echo $_SESSION['id'] ?>">
                <img src="../src/Icone/connections.png" alt="">
            </a>
        </div>
        <section class="fix"></section>
    </head>
    <div class="fond">
        <div class="linkc">
            <a href="list_article.php?id=<?php echo $_SESSION['id'] ?>">Liste des articles</a>
        </div>
        <h2>Publie un article</h2>
        <br>
        <form method="POST" action="article.php" enctype="multipart/form-data">
            <div class="formulair_article">
                <div class="forme_article">
                    <div class="input_type_texte">
                        <input type="text" name="nomArticle" placeholder="Nom de l'article">
                        <input type="text" name="prixArticle" placeholder="Prix de l'article">
                        <input type="text" name="desciptionArticle" placeholder="Descriptions">
                    </div>
                    <div class="input_type_lile">
                    <label for="">Ajoute une image</label><br>
                    <input type="file" name="image" multiple><br>
                    <?php
        if(isset($erreur))
        {
            ?>  
            <p><?php echo $erreur;  ?> </p> 
            <?php 
        }
        ?>  
                    </div>
                    <div class="input_type_submit">
                    <input type="submit" name="envoi" value="Publier l'article">
                    </div>
                    
                </div>
            </div>

        </form>

    </div>


</body>

</html>