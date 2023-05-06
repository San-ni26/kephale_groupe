<?php
session_start();
$bdd = new PDO('mysql:host =localhost;dbname=kephale', 'root', 'root');
$reque = $bdd->query('SELECT * FROM article');
if (isset($_GET['id']) and !empty ($_GET['id'])  > 0) {
    $id = ($_SESSION['id']);
    $requet = $bdd->prepare("SELECT article.nom,prix,descriptions,images,id_users FROM users INNER JOIN article ON users.id = article.id_users WHERE article.id_users = ' $id ' ");
    $requet->execute();
    $resulta = $requet->fetchAll(PDO::FETCH_ASSOC);
   
   
}
$recup = $bdd->prepare("SELECT id FROM article ");  
$recup->execute(); 
if ($recup->rowCount()  > 0 ){

    $_GET['idi'] = $recup->fetch() ['id'];   
}

//var_dump ($recup); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="liste_article.css">
    
    <title>Document</title>
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
    <section>
        <div class="bloc">
            <div class="linkc">
            <a href="article.php?id=<?php echo $_SESSION['id'] ?>">Ajouter un article</a>  
            </div>       
              <h2>Liste des article</h2>
            <div class="listeArticle">
            <?php       
                if ($reque->rowCount() > 0 ) {
                    while ($row = $requet->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        
                        <?php   
                    }
                }else
               { echo 'pas darticle';}
                ?>
                <?php  

                $requet->execute();
                while ($row = $requet->fetch(PDO::FETCH_ASSOC)) :
                ?>
                    <div class="articles">
                        <div class="imgImage">
                            <img src="image/<?= $row['images']; ?>" alt="">
                        </div>
                        <div class="info_article">
                            <h2><?= $row['nom']; ?></h2>
                            <h5><?= $row['prix']; ?></h5>
                            <div class="buton_modif">
                                <a href="">Modifier</a>
                                <a class="suprime" href="suprime.php?id_article=<?php echo $_GET['id'] ?>">Suprime</a>
                            </div>
                        </div>
                     
                    </div>
                <?php endwhile ?>
            </div>
        </div>
    </section>

</body>

</html>
