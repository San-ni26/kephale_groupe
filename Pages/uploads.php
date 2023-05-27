<?php
$dir = "uploads/" ;
$file_name = $_FILES['image']['name']; 
$tmp_name = $_FILES['image']['tmp_name'];
$type_name = explode(".",$file_name)[1];
$corect = array("png","jpg");
if(in_array($type_name,$corect)){
    echo "corecte";
}else{
    echo "non corecte"; 
}



 
//if (isset($_POST['envoi'])) {
        
        $img_upload_path = 'uploads/'.$_FILES['image']['name'];
        $img_deplace = move_uploaded_file($_FILES['image']['name'], $img_upload_path);
if ($img_deplace) {
            $inser_nom = $bdd->prepare("UPDATE users SET img_profile = ? WHERE id = ?");
            $inser_nom->execute(array($_FILES['image']['name'], $id_users));
            //header('Location: utilisateur.php?id=' . $_SESSION['id']);
        }else{
            $message = 'img non envoi';
        }
    
    ?>