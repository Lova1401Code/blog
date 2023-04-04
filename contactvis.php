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
        <div class="w3-dark-grey w3-fixed w3-card-4 w3-container">
        <a class=" w3-btn w3-card-4 w3-dark-gray w3-margin-top" href="index3.php?id=<?php echo $_SESSION['id_S']; ?>">index</a>
        <a class="w3-btn w3-card-4 w3-margin-top w3-dark-gray" href="#news">à propos</a>
        <a class="w3-btn w3-card-4 w3-margin-top w3-dark-gray" href="contactvis.php?id=<?php echo $_SESSION['id_S']; ?>">Contact</a>
        <button style="height: 45px;" class="b w3-right w3-black" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">deconnexion</button>

        <div id="id01" class="modal">
        
        <div class="modal-content animate" action="" method="post">
            <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            </div>

            <form action="deconnection.php" method="post">
            <div class="container">
            <p style="color:black">voulez-vous vraiment deconnecter?</p>
            <button class="b w3-black" style="width: 100%;" type="submit" name="deconnecter">oui</button>
            </div>
            </form>
        </div>
        </div>

        </div>

        <!-- fin navbar -->
        
        <div class="w3-row">
            <div class="w3-col w3-margin l3 w3-card-2  w3-animate-right">
            <div class="w3-container w3-padding w3-gray">
                <h4>Sponsoriser par :</h4>
                </div>
                <div class="w3-container w3-light-grey">
                    <p><span class="w3-tag w3-light-grey w3-small w3-margin-bottom"><img src="images/p9.jpg" width="80px" height="40px" alt="">Smart one</span> 
                    <span class="w3-tag w3-light-grey w3-small w3-margin-bottom"><img src="images/p6.jpg" width="130px" height="70px" alt=""></span> 
                    <span class="w3-tag w3-light-grey w3-small w3-margin-bottom"><img src="images/p16.jpg" width="120px" height="60px" alt=""></span>
                    <span class="w3-tag w3-light-grey w3-small w3-margin-bottom"><img src="images/p17.jpg" width="130px" height="70px" alt=""></span>
                    <span class="w3-tag w3-light-grey w3-small w3-margin-bottom"><img src="images/p7.jpg" width="135px" height="80px" alt=""></span> 
                    <span class="w3-tag w3-light-grey w3-small w3-margin-bottom"><img src="images/p10.jpg" width="120px" height="75px" alt=""></span>
                    </p>
                </div>
            </div>
            <div class="w3-col w3-margin l8 w3-card-2 w3-display-container w3-animate-left" >
               <img src="images/img_mountains.jpg" alt="" width="104%" class="w3-border w3-grayscale-max w3-opacity-min">
               <div class="w3-padding w3-display-middle">
               <form action="" class="w3-container w3-text-blue w3-margin">
                <h2 class="w3-center">Contactez-nous</h2>
                
                <div class="w3-row w3-section">
                <div class="w3-col" style="width:600px"><i class="w3-xxlarge fa fa-user"></i></div>
                    <div class="w3-rest">
                    <input class="w3-input w3-border" name="first" type="text" placeholder="Votre nom">
                    </div>
                </div>

                <div class="w3-row w3-section">
                <div class="w3-col" style="width:600px"><i class="w3-xxlarge fa fa-user"></i></div>
                    <div class="w3-rest">
                    <input class="w3-input w3-border" name="last" type="text" placeholder="Votre prenom">
                    </div>
                </div>

                <div class="w3-row w3-section">
                <div class="w3-col" style="width:600px"><i class="w3-xxlarge fa fa-envelope-o"></i></div>
                    <div class="w3-rest">
                    <input class="w3-input w3-border" name="email" type="text" placeholder="Email">
                    </div>
                </div>

                <div class="w3-row w3-section">
                <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-phone"></i></div>
                    <div class="w3-rest">
                    <input class="w3-input w3-border" name="phone" type="text" placeholder="Télephone">
                    </div>
                </div>

                <div class="w3-row w3-section">
                <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-pencil"></i></div>
                    <div class="w3-rest">
                    <textarea class="w3-input w3-border" name="message" type="text" placeholder="Message"></textarea>
                    </div>
                </div>

                <p class="w3-center">
                <button class="w3-button w3-section w3-blue w3-ripple"> Envoyer </button>
                </p>
               </form>
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
</body>
</html>