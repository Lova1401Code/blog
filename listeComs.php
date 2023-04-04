<?php 
session_start();
if (!$_SESSION['mdpadmin']) {
  header("location:index1.php");  
}
?>
<!DOCTYPE html>
<html>
<title>Liste des commentaire</title>
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
    <h2><b><i class="fa fa-dashboard"></i> LISTE DES COMMENTAIRES</b></h2>
</header>
<div class="w3-container w3-margin">
    <table class="w3-table-all w3-card-4">
       <tr class="w3-blue">
          <th>Photo De Profil</th>
          <th>commentaire</th>
          <th>nom_Aut</th>
          <th>Action</th>
       </tr>
  <?php 
    include'connectBdd.php';
    $recupcoms = $bdd->query("SELECT * FROM commentaire");
    while ($coms = $recupcoms->fetch()) {
  ?>
        <tr>
           <td><img src="images/<?php echo $coms['photoA']; ?>" alt="photo" class="w3-circle" style="width: 55px; border-radius:10px"></td>
           <td><?= $coms['commentaire'] ?></td>
           <td><?= $coms['nom_Aut'] ?></td>
           <td class="w3-center"><a href="modificationAuteur.ph" class="w3-btn w3-red w3-paddin">Suprimer</a></td>
        </tr>
     
  <?php
    }
  ?>
     </table>
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
