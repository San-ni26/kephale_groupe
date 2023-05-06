<?php
session_start();
$bdd = new PDO('mysql:host =localhost;dbname=kephale', 'root', 'root');
if (!$_SESSION['id'] and !$_SESSION['id']) {
    header('Location: connexion.php');
}
if (isset($_GET['id']) and $_GET['id']  > 0) {
    $getid = intval($_GET['id']);
    $repmbr = $bdd->prepare("SELECT * FROM users WHERE id = ? ");
    $repmbr->execute(array($getid));
    $userinfo = $repmbr->fetch();
}
if (isset($_GET['id']) and !empty($_GET['id'])) {
    echo 'recupere';
} else {
    echo 'Non recuper';
}
