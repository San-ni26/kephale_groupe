<?php 
session_start();
$bdd = new PDO('mysql:host =localhost;dbname=kephale', 'root', 'root');
$id_article = $_GET['id_article'];
$supprime = $bdd->prepare("DELETE FROM article WHERE id_articles = ?");  
$supprime->execute(array($id_article));
header('Location: ../article/list_article.php?id='.$_SESSION['id']);
$suprime_article = $supprime->fetch() ;
var_dump($suprime_article);


?>