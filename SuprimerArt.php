<?php 
   if (isset($_GET['id']) and !empty($_GET['id'])) {
        include'connectBdd.php';
        $getid = $_GET['id'];
        $recupArticle = $bdd->prepare("SELECT * FROM article WHERE id_Ar=?");
        $recupArticle->execute(array($getid));
        if ($recupArticle->rowCount() > 0) {
            $deletearticle = $bdd->prepare("DELETE FROM article WHERE id_ar=?");
            $deletearticle->execute(array($getid));
            header("location:listearticle.php");
        } else {
            echo 'aucun article trouvé'; 
        }
   } else {
       echo 'Aucun article trouvé';
   }
   
?>