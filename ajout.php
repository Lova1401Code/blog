<?php 
session_start();
   #ajout suiveur
   if (isset($_POST['inscrit'])) {
    if (!empty($_POST['nomS']) and !empty($_POST['email1']) and !empty($_POST['email2']) and !empty($_POST['mdp1']) and !empty($_POST['mdp2']) and !empty($_FILES['photo'])) {
        $nomS = htmlspecialchars($_POST['nomS']);
        $email1 = htmlspecialchars($_POST['email1']);
        $email2 = htmlspecialchars($_POST['email2']);
        $mdp1 = htmlspecialchars($_POST['mdp1']);
        $mdp2 = htmlspecialchars($_POST['mdp2']);
        $profil = $_POST['profil'];
        if ($profil == "suiveur") {
            $emailLenght1 = strlen($nomS);
            $target_dir = "images/";
            $filename = $_FILES["photo"]["name"];
            $target_file = $target_dir . basename($_FILES["photo"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            if ($nomS <= 50) {
                if ($email1 == $email2) {
                    if (filter_var($email1, FILTER_VALIDATE_EMAIL)) {
                        include"connectBdd.php";
                        $reqMail = $bdd->prepare("SELECT * FROM suiveur WHERE email_S = ?");
                        $reqMail->execute(array($email1));
                        $mailexist = $reqMail->rowCount();
                        if ($mailexist == 0) {
                         if ($mdp1 == $mdp2) {
                            
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
                                $insertUser = $bdd->prepare("INSERT INTO suiveur(nom_S, email_S, mdp_S, nom_fichierS) VALUES (?, ?, ?, ?)");
                                $insertUser->execute(array($nomS, $email1, $mdp1, $filename));
                                $requserinfo = $bdd->prepare("SELECT * FROM suiveur WHERE email_S = ? AND mdp_S = ?");
                                $requserinfo->execute(array($email1, $mdp1));
                                $suiveurinfo = $requserinfo->fetch();
                                $_SESSION['id_S'] = $suiveurinfo['id_S'];
                                $_SESSION['email_S'] = $suiveurinfo['email_S'];
                                $_SESSION['mdp_S'] = $suiveurinfo['mdp_S'];
                                header("location:index3.php?id=".$_SESSION['id_S']);
                            } else {
                            echo "Sorry, there was an error uploading your file.";
                            }
                           }
                        } else {
                            echo 'vos mot de passe ne correspond pas';
                        }
                    } else {
                        echo 'email déjà utilisés';
                    }
                    
                } else {
                    echo "votre adresse mail n'est pas valide";
                }
                
            } else {
                echo 'vos adresse email ne correspond pas';
            }
            
        } else {
            echo "email ne peut pas depasser 50 caractères";
        }   
        }else {
            $target_dir = "images/";
        $filename = $_FILES["photo"]["name"];
        $target_file = $target_dir . basename($_FILES["photo"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        $emailLenght1 = strlen($nomS);
        
        if ($nomS <= 50) {
            if ($email1 == $email2) {
                if (filter_var($email1, FILTER_VALIDATE_EMAIL)) {
                    include"connectBdd.php";
                    $reqMail = $bdd->prepare("SELECT * FROM auteur WHERE email_A = ?");
                    $reqMail->execute(array($email1));
                    $mailexist = $reqMail->rowCount();
                    if ($mailexist == 0) {
                        if ($mdp1 == $mdp2) {
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
                                $insertUser = $bdd->prepare("INSERT INTO auteur(nom_A, email_A, mdp_A, nom_fichierA) VALUES (?, ?, ?, ?)");
                                $insertUser->execute(array($nomS, $email1, $mdp1, $filename));
                                $reqauteurinfo = $bdd->prepare("SELECT * FROM auteur WHERE email_A = ? AND mdp_A = ?");
                                $reqauteurinfo->execute(array($email1, $mdp1));
                                $auteurinfo = $reqauteurinfo->fetch();
                                $_SESSION['id_A'] = $auteurinfo['id_A'];
                                $_SESSION['email_A'] = $auteurinfo['email_A'];
                                $_SESSION['mdp_A'] = $auteurinfo['mdp_A'];
                                header("location:index2.php?id=".$_SESSION['id_A']);
                            } else {
                            echo "Sorry, there was an error uploading your file.";
                            }
                        }   
                        } else {
                            echo 'vos mot de passe ne correspond pas';
                        }
                    } else {
                        echo 'email déjà utilisés';
                    }
                    
                } else {
                    echo "votre adresse mail n'est pas valide";
                }
                
            } else {
                echo 'vos adresse email ne correspond pas';
            }
            
        } else {
            echo "email ne peut pas depasser 50 caractères";
        }

        }
} else {
    echo 'Tous les champs doivent être complétés';
}
}


