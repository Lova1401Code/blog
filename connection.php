<?php 
  include'connectBdd.php';
  #connection suiveur
  if (isset($_POST['connecte'])) {
session_start();
      include'connectBdd.php';
      $mailconnect = htmlspecialchars($_POST['email']);
      $mdpconnect = htmlspecialchars($_POST['mdp']);

      if (!empty($mailconnect) and !empty($mdpconnect)) {
          if ($_POST['profil'] == "suiveur") {
            $reqsuiveur = $bdd->prepare("SELECT * FROM suiveur WHERE email_S = ? AND mdp_S = ?");
            $reqsuiveur->execute(array($mailconnect, $mdpconnect));
            $suiveurexist = $reqsuiveur->rowCount();
            if ($suiveurexist == 1) {
                $suiveurinfo = $reqsuiveur->fetch();
                $_SESSION['id_S'] = $suiveurinfo['id_S'];
                $_SESSION['mdp_S'] = $suiveurinfo['mdp_S'];
                $_SESSION['email_S'] = $suiveurinfo['email_S'];
                header("Location:index3.php?id=".$_SESSION['id_S']);
            } else {
                header("location:index1.php");
            }
          }elseif ($_POST['profil'] == "auteur") {
            $reqsuiveur = $bdd->prepare("SELECT * FROM auteur WHERE email_A = ? AND mdp_A = ?");
            $reqsuiveur->execute(array($mailconnect, $mdpconnect));
            $suiveurexist = $reqsuiveur->rowCount();
            if ($suiveurexist == 1) {
                $auteurinfo = $reqsuiveur->fetch();
                $_SESSION['id_A'] = $auteurinfo['id_A'];
                $_SESSION['email_A'] = $auteurinfo['email_A'];
                $_SESSION['mdp_A'] = $auteurinfo['mdp_A'];
                header("Location:index2.php?id=".$_SESSION['id_A']);
            }else {
                header("location:index1.php");
            }
            
          }elseif ($_POST['profil'] == "admin") {
            $pseudo = "admin";
            $mdp = "admin1234";
            if (($pseudo == $mailconnect) AND ($mdp==$mdpconnect) ) {
                $_SESSION['pseudoadmin'] = $mailconnect;
                $_SESSION['mdpadmin'] = $mdpconnect;
                header("location:admin.php");
            }
        }else {
            header("location:index1.php");
        }
          
          
      } else {
          echo 'tous les champs doivent être copmlèter';
      }
      
  }
