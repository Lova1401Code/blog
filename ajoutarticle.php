<?php
session_start();
  if (isset($_POST['ajouter'])) {
    if (!empty($_POST['titre']) AND !empty($_POST['contenue'])  AND !empty($_POST['datepub']) AND !empty($_FILES['photo'])) {
      include'connectBdd.php';
      $titre = htmlspecialchars($_POST['titre']);
      $contenue = htmlspecialchars($_POST['contenue']);
      $datepub = htmlspecialchars($_POST['datepub']);
      $target_dir = "images/";
      $filename = $_FILES["photo"]["name"];
      $target_file = $target_dir . basename($_FILES["photo"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      // Allow certain file formats
     if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "mp4" && $imageFileType != "pdf" && $imageFileType != "JPG " ) {
         echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
       }

      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
      } else {
      if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
          $idA = $_SESSION['id_A'];
          $insertarticle = $bdd->prepare("INSERT INTO article(id_A, contenu, titre_A, date_pub, nom_fichier) VALUES (?, ?, ?, ?, ?)");
          $insertarticle->execute(array($idA, $contenue, $titre, $datepub, $filename));
          header("location:index2.php?id=".$_SESSION['id_A']);
      } else {
      echo "Sorry, there was an error uploading your file.";
      }
     }
    } else {
      echo 'tous les champs doit être complètés';
    }
    
  } 
?>
  
  

