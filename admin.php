<?php 
session_start();
if (!$_SESSION['mdpadmin']) {
  header("location:index1.php");  
}
?>
<!DOCTYPE html>
<html>
<title>Page Admin</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3/w3.css">
<script src="css/w3.js"></script>
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right">BLOG INFO</span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="images/lo.png" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span class="W3-center">Bonjour, <strong>Mr Admin</strong></span><br>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Tableau de bord</h5>
  </div>
  <?php 
    include'connectBdd.php';
    $recupauteur = $bdd->query("SELECT * FROM auteur");
    $nbrauteur = $recupauteur->rowCount();
    $recuparticle = $bdd->query("SELECT * FROM article");
    $nbrarticle = $recuparticle->rowCount();
    $recupsuiveure = $bdd->query("SELECT * FROM suiveur");
    $nbrsuiveur = $recupsuiveure->rowCount();    
    $recupcoms = $bdd->query("SELECT * FROM commentaire");
    $nbrcoms = $recupcoms->rowCount();
    $recuplike = $bdd->query("SELECT * FROM likes");
    $nbrlike = $recuplike->rowCount();
    $recupdislike = $bdd->query("SELECT * FROM dislikes");
    $nbrdislikes = $recupdislike->rowCount();

  ?>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="admin.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>  Aperçu </a>
    <a href="listeDesAuteur.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>  Liste des Auteurs <span class="w3-badge w3-right"><?php echo $nbrauteur;?></span></a>
    <a href="listedesArticle.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Liste des Article<span class="w3-badge w3-right"> <?php echo $nbrarticle;?></span></a>
    <a href="listeSuiveur.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bullseye fa-fw"></i>  Liste des Suiveur<span class="w3-badge w3-right"> <?php echo $nbrsuiveur;?></span></a>
    <a href="listeComs.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-diamond fa-fw"></i>  Liste des commentaire<span class="w3-badge w3-right"> <?php echo $nbrcoms;?></span></a>
    <br><br>
    <a href="deconnectionadmin.php" class="w3-btn w3-margin w3-blue">Deconnexion</a>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> TABLEAU DE BORD</b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-comment w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $nbrlike; ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>j'aime</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $nbrdislikes; ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>je n'aime pas</h4>
      </div>
    </div>
    
    <div class="w3-quarter">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class="fa fa-share-alt w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $nbrarticle;?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Article</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $nbrcoms;?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Commentaire</h4>
      </div>
    </div>
  </div>

  
  <hr>
  <div class="w3-container">
    <h5>statu génerale</h5>
    <p>Auteur</p>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding w3-green" style="width:25%">+25%</div>
    </div>

    <p>Suiveur</p>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding w3-orange" style="width:50%">50%</div>
    </div>

    <p>article</p>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding w3-red" style="width:75%">75%</div>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Suiveur Recent</h5>
    <ul class="w3-ul w3-card-4 w3-white">
      <li class="w3-padding-16">
        <img src="images/DSC_0262.JPG" class="w3-left w3-circle w3-margin-right" style="width:35px">
        <span class="w3-xlarge">Rakotoarintsoa Sarindra</span><br>
      </li>
      <li class="w3-padding-16">
        <img src="images/DSC_0028.JPG" class="w3-left w3-circle w3-margin-right" style="width:35px">
        <span class="w3-xlarge">Rasalamamanana Henintsoa</span><br>
      </li>
      <li class="w3-padding-16">
        <img src="images/DSC_0300.JPG" class="w3-left w3-circle w3-margin-right" style="width:35px">
        <span class="w3-xlarge">Ralaimanana Tina</span><br>
      </li>
    </ul>
  </div>
  <hr>

  <div class="w3-container">
    <h5>Commentaire recent</h5>
    <div class="w3-row">
      <div class="w3-col m2 text-center">
        <img class="w3-circle" src="images/DSC_0262.JPG" style="width:96px;height:96px">
      </div>
      <div class="w3-col m10 w3-container">
        <h4>Lantoarinoro Lanto <span class="w3-opacity w3-medium">Sep 29, 2014</span></h4>
        <p>Bonjour! je m'appelle Lanto</p><br>
      </div>
    </div>

    <div class="w3-row">
      <div class="w3-col m2 text-center">
        <img class="w3-circle" src="images/DSC_0028.JPG" style="width:96px;height:96px">
      </div>
      <div class="w3-col m10 w3-container">
        <h4>Ramiharisoa Tafita <span class="w3-opacity w3-medium">Sep 28, 2014</span></h4>
        <p>Salama daholo.</p><br>
      </div>
    </div>
  </div>
  <br>

  <!-- Footer -->
  <footer class="w3-container w3-padding-16 w3-light-grey">

    <p>Créer par <a href="default.html" target="_blank">lovaRamih</a></p>
  </footer>

  <!-- End page content -->
</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>

</body>

<!-- Mirrored from www.w3schools.com/w3css/tryit.asp?filename=tryw3css_templates_analytics&stacked=h by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Jun 2021 20:57:14 GMT -->
</html>
