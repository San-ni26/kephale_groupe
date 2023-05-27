<?php
session_start();
$bdd = new PDO('mysql:host =localhost;dbname=kephale', 'root', 'root');
if (isset($_GET['id']) and !empty($_GET['id'])  > 0) {

  $getid = intval($_GET['id']);
  $repmbr = $bdd->prepare("SELECT * FROM users WHERE id = ? ");
  $repmbr->execute(array($getid));
  $userinfo = $repmbr->fetch(PDO::FETCH_ASSOC);
} else {
  header('Location: connexion.php');
}
  //var_dump ($repmbr ); 
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Pages_CSS/utilisateu.css">
    <title>Document</title>
  </head>

  <body>
  <head>
        <div class="barreDeNavigation">
            <div class="logo">
                <a href="">
                <p><?php echo $userinfo['nomBoutique']; ?></p>
                </a>
            </div>
            <div class="deconextion" >
            <a href="deconnections.php">Décon...</a>
            </div>
        </div>

        <section class="fix"></section>
    </head>
    <div>
      <div>
      <?php
      if (isset($_SESSION['id']) and $userinfo['id'] ==  $_SESSION['id']) {
      ?>
      <div class="contenut" >
        <a href="../index.php?id=<?php echo $_SESSION['id'] ?>">Accuil </a>
        <a href="../article/article.php">Publie un articles </a>
        <a href="../article/list_article.php?id=<?php echo $_SESSION['id'] ?>">voir les publie </a>
        <a class="images_profile" href="images_profile.php?id=<?php echo $_SESSION['id'] ?>">
        <img src="../src/Icone/iconeplus.png" alt="">
        <p>Modifie l'image <br> de profile </p> </a> 
        </div>
      <?php
      }
      ?>
      </div>
    </div>
    <div>   
    </div>
  </body>
  </html>
 