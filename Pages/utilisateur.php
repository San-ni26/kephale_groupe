<?php
session_start();
$bdd = new PDO('mysql:host =localhost;dbname=kephale', 'root', 'root');
if (isset($_GET['id']) and !empty($_GET['id'])  > 0) {

  $getid = intval($_GET['id']);
  $repmbr = $bdd->prepare("SELECT * FROM users WHERE id = ? ");
  $repmbr->execute(array($getid));
  $userinfo = $repmbr->fetch(PDO::FETCH_ASSOC);
  //var_dump ($repmbr ); 
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  </head>

  <body>
    <div>
      <div>
      <?php
      if (isset($_SESSION['id']) and $userinfo['id'] ==  $_SESSION['id']) {
      ?>
        <a href="../index.php?id=<?php echo $_SESSION['id'] ?>">Accuil </a><br> <br>
      <?php
      }
      ?>
      </div>
      <h2><?php echo $userinfo['nom']; ?></h2>
      <p><?php echo $userinfo['nomBoutique']; ?></p>
      <p><?php echo $userinfo['numeraux']; ?></p>
      <?php
      if (isset($_SESSION['id']) and $userinfo['id'] ==  $_SESSION['id']) {
      ?>
        <a href="../article/article.php">Publie un articles </a><br> <br>
        <a href="../article/list_article.php?id=<?php echo $_SESSION['id'] ?>">voir c'est articles</a><br> <br>
        <a href="deconnections.php">Deconections</a>
      <?php
      }
      ?>
    </div>
    <div>
     
    </div>

  </body>

  </html>
  <?php
  } else {
    header('Location: connexion.php');
  }
    ?>