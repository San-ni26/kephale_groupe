<?php
 session_start();
$bdd = new PDO('mysql:host =localhost;dbname=kephale', 'root','root');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/liste_artcle.css">
    <title>Document</title>
</head>
<body>
    <section>
        <div class="bloc">
            <a href="article.php">Ajoute un autre Article</a>
            <h2>Liste des article</h2>
            <div class="listeArticle">
                <div class="articles">
                    <div class="imgImage">
                        <img src="SRC/tomi.jpg" alt="">
                    </div>
                    <div class="info_article">
                    <h3>Non article</h3>
                    <h5>prix article</h5>
                    <p>descriptions article</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
</body>
</html>