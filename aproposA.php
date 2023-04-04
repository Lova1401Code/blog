<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="w3/w3.css">
    <script src="css/w3.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <style>
    body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
    </style>
    <title>contacte</title>
</head>
<body class="w3-light-grey">
    <!-- navbar -->
        <div class="w3-dark-grey w3-card-4 w3-container">
        <a class="w3-btn w3-card-4" href="index2.php?id=<?php echo $_SESSION['id_A']; ?>">index</a>
        <a class="w3-btn w3-card-4" href="aproposA.php?id=<?php echo $_SESSION['id_A']; ?>">à propos</a>
        <a class="w3-btn w3-card-4" href="contactA.php?id=<?php echo $_SESSION['id_A']; ?>">Contact</a>
        <button style="height: 45px;" class="b w3-right w3-black" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">s'inscrire</button>

        <div id="id01" class="modal">
        
        <div class=" w3-card-4 modal-content animate" action="" method="post">
            <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            </div>

            <form style="width: 100%; height:100%" class=" modal-content animate" action="ajout.php" method="POST" enctype="multipart/form-data">
  

            <div class="container" >
                <div class="form-group">
                <label for="uname" style="color:black;"><b>Nom</b></label>
                <input type="text" placeholder="votre nom" name="nomS" required>
                </div>

                <label for="uname" style="color:black;"><b>email</b></label>
                <input type="text" placeholder="votre Email" name="email1" required>

                <label for="uname" style="color:black;"><b>email</b></label>
                <input type="text" placeholder="Confirme Email" name="email2" required>

                <label for="uname" style="color:black;"><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer mot de passe" name="mdp1" required>

                <label for="psw" style="color:black;"><b>confirme mot de passe</b></label>
                <input type="password" placeholder="Confirmer mot de Password" name="mdp2" required>
                <br><br>
                <label class="control-label" style="color:black;"><b>Photo de profil:</b></label>
                <input class="" type="file" name="photo"><br>
                <br>
                <input type="radio" id="male" name="profil" value="suiveur">
                <label for="male" style="color: black;"><b>Suiveur</b></label>
                <input type="radio" id="female" name="profil" value="auteur">
                <label for="female" style="color: black;"><b>Auteur</b></label><br>




    <button class="b w3-dark-gray" style="width: 100%;" type="submit" name="inscrit">S'inscrire</button>
  </div>
</form>
        </div>
        </div>

        </div>

        <!-- fin navbar -->
            <div class="w3-margin w3-display-container w3-animate-left" >
               <div class="w3-row-padding  w3-padding-64 w3-container">
                   <div class="w3-content">
                      <div class="w3-twothird">
                         <h1>A PROPOS DU BLOG</h1>
                            <h5 class="w3-padding-32">Pour découvrir des journals informatiques.</h5>
                            <p class="w3-text-grey">Les blogs sont aujourd'hui des sources d'information très importantes, et ce, dans plusieurs domaines.</p>
                            <p class="w3-text-grey">Ce blog partage avec les Suiveurs toutes les information relatives à l'actualité <strong class="w3-yellow">page index</strong>, les nouveaux mis à jour des logiciels, des journals informatique, des solutions des bugs informatiques, partage d'experience,... sont partagés avec les abonnés efin de les mettre au parfun de toute l'actualité.</p>
                      </div>
                   </div>
               </div>
               <div class="w3-row-padding w3-white w3-padding-64 w3-container">
                    <div class="w3-content">
                        <div class="w3-third w3-center">
                        <i class="fa fa-coffee w3-padding-64 w3-text-red w3-margin-right"></i>
                        </div>

                        <div class="w3-twothird">
                        <h1>POUR DES SOLUTION INFORMATIQUE</h1>
                        <h5 class="w3-padding-32">L'un des avantages de ce blog est qu'il vous permet d'avoir de façon rapide des solutions à vos problème informatique.</h5>
                        <p class="w3-text-grey">Les blogueurs partagent avec vous des conseils pour résoudre certains problème notament ceux rencontrés avec votre ordinateur.De plus, des astuces de raccourcissement sont données aux lecteurs afin de leur permeettenr de trouver des solutions informatiques en un clin d'oeil.Vous pourrez désormais vous en sortir comme un expert en informatique.</p>
                        <p class="w3-text-grey">Grâce aux conseils et astuces donnés sur les blogs, vous n'aurez plus besoin de payer les service d'un informaticien pour résoudre vos problèmes mineurs. Il suffira de respecter les différentes consignes données par les blogueurs.</p>
                                             
                        </div>
                    </div>
                </div>

        </div>
        <div class="w3-container w3-black w3-center w3-opacity w3-padding-64">
            <h1 class="w3-margin w3-xlarge">A propos du développeur</h1>
        </div>
        <br>
        <div class="w3-row">
           <div class="w3-margin w3-animate-left w3-card-4 w3-white w3-col l7 container w3-padding-large" style="margin-bottom:32px">
                <div class="content">
                   <p>Mon nom c'est Ramiharisoa Tafita Herilova Gino, etudiant de l'<strong class="w3-green w3-paddingS">IESAV</strong>, parcours GENIE LOGICIEL, Niveau Licence 3. J'habitte à Ambohimanga Antsirabe, Antananarivo Madagascar. Mon Objectif est de devenir Professionnel en webmaster, et aussi pour satisfaire des clients à mes projets.</p>
                </div>
            </div>
            <div class="w3-margin w3-col l4 W3-animate-right">
               <img src="images/DSC_0307.JPG" alt="" width="100%">
           </div>
        </div>
        <br>
        <div class="w3-row">
            <div class="w3-margin w3-col l5 w3-animate-left w3-container w3-padding-large w3-gray">
                <h4 id="contact"><b>Contact développeur</b></h4>
                <div class="w3-row-padding w3-center w3-padding-24" style="margin:0 -16px">
                <div class="w3-third w3-dark-grey">
                    <p><i class="fa fa-envelope w3-xxlarge w3-text-light-grey"></i></p>
                    <p>lova@gmail.com</p>
                </div>
                <div class="w3-third w3-light-blue">
                    <p><i class="fa fa-map-marker w3-xxlarge w3-text-light-grey"></i></p>
                    <p>Antsirabe</p>
                </div>
                <div class="w3-third w3-dark-grey">
                    <p><i class="fa fa-phone w3-xxlarge w3-text-light-grey"></i></p>
                    <p>0347674566</p>
                </div>
                </div>
                <hr class="w3-opacity">
                <form action="https://www.w3schools.com/action_page.php" target="_blank">
                <div class="w3-section">
                    <label>Nom</label>
                    <input class="w3-input w3-border" type="text" name="Name" required>
                </div>
                <div class="w3-section">
                    <label>Email</label>
                    <input class="w3-input w3-border" type="text" name="Email" required>
                </div>
                <div class="w3-section">
                    <label>Message</label>
                    <input class="w3-input w3-border" type="text" name="Message" required>
                </div>
                <button type="submit" class="w3-button w3-black w3-margin-bottom"><i class="fa fa-paper-plane w3-margin-right"></i>Envoyer</button>
                </form>
            </div>
            <div class="w3-margin w3-col l6 w3-animate-right"> 
                <h4>Talent Technique</h4>
                <!-- Progress bars / Skills -->
                <p>Php</p>
                <div class="w3-grey">
                <div class="w3-container w3-dark-grey w3-padding w3-center" style="width:70%">70%</div>
                </div>
                <p>Html</p>
                <div class="w3-grey">
                <div class="w3-container w3-dark-grey w3-padding w3-center" style="width:80%">80%</div>
                </div>
                <p>css</p>
                <div class="w3-grey">
                <div class="w3-container w3-dark-grey w3-padding w3-center" style="width:60%">60%</div>
                </div>
                <p>java Script</p>
                <div class="w3-grey">
                <div class="w3-container w3-dark-grey w3-padding w3-center" style="width:40%">40%</div>
                </div>
                <p>java</p>
                <div class="w3-grey">
                <div class="w3-container w3-dark-grey w3-padding w3-center" style="width:50%">50%</div>
                </div>
                <p>Bootstrap</p>
                <div class="w3-grey">
                <div class="w3-container w3-dark-grey w3-padding w3-center" style="width:80%">80%</div>
                </div>
            </div>
        </div>
<script>

// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<footer class="w3-center w3-container w3-card-4 w3-dark-grey w3-padding-32 w3-margin-top">
<div class="w3-bar"> 
  </div>
  <p>créer par <a href="Contactme.php" target="_blank" class="w3-wide">LovaRamih</a></p>
</footer>
</body>
</html>