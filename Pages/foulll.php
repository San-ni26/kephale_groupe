<?php 
 session_start();
 $bdd = new PDO('mysql:host =localhost;dbname=kephale', 'root','root');
 if (isset($_SESSION['id']) AND !empty($_SESSION['id'])){
    echo 'conecte';

 $recup = $bdd->prepare('SELECT * FROM articl WHERE id-users  = ?');
 $recup->execute(array($_SESSION['id']));


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
<?php while( $m = $recup->fetch()){
    $p_exp =  $bdd->prepare('SELECT nom FROM users WHERE id = ?');
    $p_exp->execute(array($m['id-users'])); 
    $p_exp = $p_exp->fetch(); 
    $p_exp = ['nom'] 
  ?>   
<?php $p_exp ?> 
<?php
}
?>  
</body>
</html>
<?php } ?> 