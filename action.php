<?php
session_start();
include'connectBdd.php';
if (isset($_GET['t'],$_GET['id'])) {
    $ida = $_SESSION['id_A'];
    $getid = (int)$_GET['id'];
    $gett = (int)$_GET['t'];
    
    $recupid = $bdd->prepare("SELECT id_Ar FROM article WHERE id_Ar=?");
    $recupid->execute(array($getid));
    if ($recupid->rowCount() == 1) {
        if ($gett == 1) {
            $checklike = $bdd->prepare("SELECT id_likes FROM likes WHERE id_article=? AND id_membre=?");
            $checklike->execute(array($getid, $ida));
            if ($checklike->rowCount() == 1) {
                $dellike = $bdd->prepare("DELETE FROM likes WHERE id_article=? AND id_membre=?");
                $dellike->execute(array($getid, $ida));
            }else {
                $inslike = $bdd->prepare("INSERT INTO likes(id_article, id_membre) VALUES(?, ?)");
                $inslike->execute(array($getid, $ida));
            }

        }elseif ($gett == 2) {
            $checklike = $bdd->prepare("SELECT id_dislikes FROM dislikes WHERE id_article=? AND id_membre=?");
            $checklike->execute(array($getid, $ida));
            if ($checklike->rowCount() == 1) {
                $dellike = $bdd->prepare("DELETE FROM dislikes WHERE id_article=? AND id_membre=?");
                $dellike->execute(array($getid, $ida));
            }else {
                $inslike = $bdd->prepare("INSERT INTO dislikes(id_article, id_membre) VALUES(?, ?)");
                $inslike->execute(array($getid, $ida));
            }
        }
        header("location:http://localhost/blog2.0/index2.php?id=".$ida);
    }
}
?>