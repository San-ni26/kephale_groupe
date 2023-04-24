<?php
session_start();
$bdd = new PDO('mysql:host =localhost;dbname=kephale', 'root', 'root');
$requet = " SELECT * FROM article ORDER BY id ASC "; 
$result =  $bdd->query($requet);
$produit = $result->fetch(PDO::FETCH_ASSOC); 
if (!$result){
    echo 'la recuperations na pas ete faite'; 
}else{
  
    echo 'la recuperations efectue';  

}
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
                        <img src="image/<?php echo $produit['images']; ?>"alt="">
                    </div>
                    <div class="info_article">
                        <h2><?php echo $produit['nom']; ?></h2>
                        <h5><?php echo $produit['prix']; ?></h5>
                        <p><h5><?php echo $produit['descriptions']; ?></h5></p>

                    </div>
                </div>

            </div>
        </div>
    </section>
</body>

</html>