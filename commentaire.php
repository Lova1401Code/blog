<?php
session_start();
include'connectBdd.php';
$ida = $_SESSION['id_A'];
$selectnom = $bdd->query("SELECT * FROM auteur");
while ($takenom = $selectnom->fetch()) {
    $idaut = $takenom['id_A'];
    if ($idaut==$ida) {
        $nomAut = $takenom['nom_A'];
        $files = $takenom['nom_fichierA'];
$idarticle = $_GET['id'];
if (isset($_POST['coms'])) {
    if (isset($_POST['commentaire']) AND !empty($_POST['commentaire'])) {
        $commentaire = htmlspecialchars($_POST['commentaire']);
        $insertcoms = $bdd->prepare("INSERT INTO commentaire(nom_Aut, id_Article, commentaire, photoA) VALUES (?, ?, ?, ?)");
        $insertcoms->execute(array($nomAut, $idarticle, $commentaire, $files));
        header("location:index2.php");
    } else {
        echo 'Veuillez saisir des commentaire';
    }
    
}
}
}
?>