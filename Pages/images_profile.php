<?php
session_start();
$bdd = new PDO('mysql:host =localhost;dbname=kephale', 'root', 'root');


if (isset($_SESSION['id']) and $_GET['id']) {
    $id_users = $_GET['id'];
    $recupmbr = $bdd->prepare("SELECT nom,nomBoutique,numeraux,abonnement,img_profile FROM users WHERE id = ?");
    $recupmbr->execute(array($id_users));
    $edite_article = $recupmbr->fetch();
    if (isset($_POST['edite_nom']) and !empty($_POST['edite_nom']) and $_POST['edite_nom'] != $edite_article['nom']) {
        $nouvau_nom = htmlspecialchars($_POST['edite_nom']);
        $inser_nom = $bdd->prepare("UPDATE users SET nom = ? WHERE id = ?");
        $inser_nom->execute(array($nouvau_nom, $id_users));
        header('Location: utilisateur.php?id=' . $_SESSION['id']);
    }
    if (isset($_POST['edite_boutique']) and !empty($_POST['edite_boutique']) and $_POST['edite_boutique'] != $edite_article['nomBoutique']) {
        $nouvau_nom = htmlspecialchars($_POST['edite_boutique']);
        $inser_nom = $bdd->prepare("UPDATE users SET nomBoutique = ? WHERE id = ?");
        $inser_nom->execute(array($nouvau_nom, $id_users));
        header('Location: utilisateur.php?id=' . $_SESSION['id']);
    }
    if (isset($_POST['edite_numeraux']) and !empty($_POST['edite_numeraux']) and $_POST['edite_numeraux'] != $edite_article['numeraux']) {
        $nouvau_nom = htmlspecialchars($_POST['edite_numeraux']);
        $inser_nom = $bdd->prepare("UPDATE users SET numeraux = ? WHERE id = ?");
        $inser_nom->execute(array($nouvau_nom, $id_users));
        header('Location: utilisateur.php?id=' . $_SESSION['id']);
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../article/css/edite_articl.css">
        <title>inscriptions</title>
    </head>

    <body>
        <div class="liste_article">
            <div class="edite_article">
                <h1>Edite profile</h1>
                <form method="POST"  enctype="multipart/form-data" action="images_profile.php">
                    <label for="">Nom complai</label><br><br>
                    <input type="text" name="edite_nom" value="<?php echo $edite_article['nom']; ?>"><br>
                    <label for="">Nom de la boutique</label><br><br>
                    <input type="text" name="edite_boutique" placeholder="prix"
                        value="<?php echo $edite_article['nomBoutique']; ?>"><br>
                    <label for="">Numeraux de telephone</label><br><br>
                    <input type="text" name="edite_numeraux" placeholder="descriptions "
                        value="<?php echo $edite_article['numeraux']; ?>"><br>
                    <input type="submit" name="envoi" class="Modif_article">
                </form>
            </div>
            <div class="image_profile" >
            <form method="POST" action="uploads.php">
            <label for="">Ajoute une image de profile</label><br><br>
                    <input type="file" name="image" class="Modif_img"><br><br>
                    <?php 
                    if($message){
                        echo $message; 
                    }
                    ?> 
                    <input type="submit" name="envoie" value="Ajoute">
            </form>
            </div>
        </div>



    </body>

    </html>


    <?php
} else {
    header('Location: ../Pages/connexion.php');
}
?>


