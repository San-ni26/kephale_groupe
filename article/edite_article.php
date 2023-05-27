<?php
session_start();
$bdd = new PDO('mysql:host =localhost;dbname=kephale', 'root', 'root');

if (isset($_SESSION['id']) and $_GET['edite_article']) {
    $id_article = $_GET['edite_article'];
    $recupmbr = $bdd->prepare("SELECT id_articles,nom,prix,descriptions,images FROM article WHERE id_articles = ?");
    $recupmbr->execute(array($id_article));
    $edite_article = $recupmbr->fetch();
    if (isset($_POST['edite_nom']) and !empty($_POST['edite_nom']) and $_POST['edite_nom'] != $edite_article['nom']) {
        $nouvau_nom = htmlspecialchars($_POST['edite_nom']);
        $inser_nom = $bdd->prepare("UPDATE article SET nom = ? WHERE id_articles = ?");
        $inser_nom->execute(array($nouvau_nom, $id_article));
        header('Location: list_article.php?id=' . $_SESSION['id']);
    }
    if (isset($_POST['edite_prix']) and !empty($_POST['edite_prix']) and $_POST['edite_prix'] != $edite_article['prix']) {
        $nouvau_prix = htmlspecialchars($_POST['edite_prix']);
        $inser_nom = $bdd->prepare("UPDATE article SET prix = ? WHERE id_articles = ?");
        $inser_nom->execute(array($nouvau_prix, $id_article));
        header('Location: list_article.php?id=' . $_SESSION['id']);
    }

    if($_POST['edite_image_profile'] and $_GET['edite_article']){
        $id_article = $_GET['edite_article'];
        $recupmbr = $bdd->prepare("SELECT id_articles,nom,prix,descriptions,images FROM article WHERE id_articles = ?");
        $recupmbr->execute(array($id_article));
        $edite_article = $recupmbr->fetch();
        $hidden = $_POST['hidden'];
        $img_name = $_FILES['edite_image']['name'];
        $tmp_name = $_FILES['edite_image']['tmp_name'];
        $error = $_FILES['edite_image']['error'];
        if($error === 0) {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_to_lc = strtolower($img_ex);
            $allowed_exs = array('jpg', 'jpeg', 'png');
            if(in_array($img_ex_to_lc, $allowed_exs)){
                $new_img_name = uniqid($uname, true).'.'.$img_ex_to_lc;
               $img_upload_path = 'image/'.$new_img_name;
               $hidden_des = "image/$hidden";
               if(unlink($hidden_des)){
                move_uploaded_file($tmp_name, $img_upload_path);
                $img_modif = $bdd->prepare("UPDATE article SET images = ? WHERE id_articles = ? ");
                $img_modif->execute(array($new_img_name, $id_article));
                header('Location: list_article.php?id=' . $_SESSION['id']);
                
                echo 'ENREGISTRE';
               }else{
                move_uploaded_file($tmp_name, $img_upload_path);
                echo 'ERREUR';
               }
            }else{
                echo 'IMG_NON_CHARGE';  
            }
        }else{
            echo 'IMG_ERREUR'; 
        }
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/edite_article.css">
        <title>inscriptions</title>
    </head>

    <body>
        <div class="liste_article">
            <div class="edite_article">
                <h1>Edite l'article</h1>
                <div class="edite_img_profil">
                    <form method="POST" enctype="multipart/form-data">
                        <div style="width: 100%; display: flex; align-items: center; justify-content: space-around;; margin-bottom: 10px;" >
                        <img src="image/<?= $edite_article['images']; ?>"style="width: 100px; height: 100px; object-fit: cover;  border-radius: 7px; ">
                        <div>
                        <input type="file" name="edite_image" class="Modif_img"><br>
                        <input type="hidden" name="hidden" value="<?php echo $edite_article['images']; ?>"><br>
                        <input type="submit" name="edite_image_profile" value="Modifie"
                        style="padding: 7px 30px; margin-bottom: 20px; background-color: darkorange; border: none; border-radius: 9px; color: rgb(240, 239, 239);"
                        ><br>
                        </div>
                        </div>
                    </form>
                </div>
                <form method="POST" enctype="multipart/form-data">
                    <input type="text" name="edite_nom" value="<?php echo $edite_article['nom']; ?>"><br>
                    <input type="text" name="edite_prix" placeholder="prix" value="<?php echo $edite_article['prix']; ?>"><br>
                    <input type="text" name="edite_description" placeholder="descriptions " value="<?php echo $edite_article['descriptions']; ?>"><br>
                    <br>
                    <input type="submit" name="" value="Modifie l'article" class="Modif_article">
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