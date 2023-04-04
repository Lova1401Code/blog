<?php
if (isset($_GET['id'])  AND (!empty($_GET['id']))) {
    if (isset($_POST['inscrit'])) {
        if (!empty($_POST['nomS']) and !empty($_POST['email1']) and !empty($_POST['email2']) and !empty($_POST['mdp1']) and !empty($_POST['mdp2'])) {
            $nomS = htmlspecialchars($_POST['nomS']);
            $email1 = htmlspecialchars($_POST['email1']);
            $email2 = htmlspecialchars($_POST['email2']);
            $mdp1 = htmlspecialchars($_POST['mdp1']);
            $mdp2 = htmlspecialchars($_POST['mdp2']);
            $emailLenght1 = strlen($nomS);

            if ($nomS <= 50) {
                
                if ($email1 == $email2) {
                    if (filter_var($email1, FILTER_VALIDATE_EMAIL)) {
                        include"connectBdd.php";
                        $reqMail = $bdd->prepare("SELECT * FROM suiveur WHERE email_S = ?");
                        $reqMail->execute(array($email1));
                        $mailexist = $reqMail->rowCount();
                        if ($mailexist == 0) {
                            if ($mdp1 == $mdp2) {
                                $id = $_GET['id'];
                                $updatsuiveur = $bdd->prepare("UPDATE suiveur SET nom_S=?, email_S=?, mdp_S=? WHERE id_S=? ");
                                $updatsuiveur->execute(array($nomS, $email1, $mdp1, $id));
                                $requserinfo = $bdd->prepare("SELECT * FROM suiveur WHERE email_S = ? AND mdp_S = ?");
                                $requserinfo->execute(array($email1, $mdp1));
                                $suiveurinfo = $requserinfo->fetch();
                                $_SESSION['id_S'] = $suiveurinfo['id_S'];
                                $_SESSION['email_S'] = $suiveurinfo['email_S'];
                                $_SESSION['mdp_S'] = $suiveurinfo['mdp_S'];
                                header("location:index3.php?id=".$_SESSION['id_S']);
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
                echo 'vos adresse email ne correspond pas';
            }
            

        } else {
            echo'tous les champs doivent être complètées';
        }
        
    }
} else {
    echo 'Aucun suiveur trouvé';
}

?>