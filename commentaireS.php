<?php
session_start();
include'connectBdd.php';
$ida = $_SESSION['id_S'];
$selectnom = $bdd->query("SELECT * FROM suiveur");
while ($takenom = $selectnom->fetch()) {
    $idaut = $takenom['id_S'];
    if ($idaut==$ida) {
        $nomAut = $takenom['nom_S'];
        $files = $takenom['nom_fichierS'];
        $idarticle = $_GET['id'];
if (isset($_POST['commenter'])) {
    if (isset($_POST['commentaire']) AND !empty($_POST['commentaire'])) {
        $commentaire = htmlspecialchars($_POST['commentaire']);
        $insertcoms = $bdd->prepare("INSERT INTO commentaire(nom_suiveur, id_Article, commentaire, photoA) VALUES (?, ?, ?, ?)");
        $insertcoms->execute(array($nomAut, $idarticle, $commentaire, $files));
        header("location:index3.php");
    } else {
        echo 'Veuillez saisir des commentaire';
    }
    
}
}
}
?>