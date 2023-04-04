<!DOCTYPE html>
<html>
<title>Blog informatique</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3/w3.css">
<script src="css/w3.js"></script>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<style>
body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">

<!-- w3-content defines a container for fixed size centered content, 
and is wrapped around the whole page content, except for the footer in this example -->
<div class="w3-content" style="max-width:1400px">


<!-- navbar -->
<div class="w3-dark-grey w3-container w3-card-4" id="navbar">
  <a class="w3-btn w3-card-4" href="index1.php">index</a>
  <a class="w3-btn w3-card-4" href="apropos.php">à propos</a>
  <a class="w3-btn w3-card-4" href="contact.php">Contact</a>

 
<!-- bouton s'inscrire -->
<button class="b w3-right w3-black" onclick="document.getElementById('id02').style.display='block'" style="width:auto;">se connecter</button>
  <div id="id02" class="modal">
  
  <form class="modal-content animate" action="connection.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="images/img_avatar.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>email</b></label>
      <input type="text" placeholder="Entrer Email" name="email" required>

      <label for="psw"><b>mot de passe</b></label>
      <input type="password" placeholder="Entrer mot de passe" name="mdp" required><br><br>
      <input type="radio" id="male" name="profil" value="suiveur">
    <label for="male" style="color: black;"><b>Suiveur</b></label>
    <input type="radio" id="female" name="profil" value="auteur">
    <label for="female" style="color: black;"><b>Auteur</b></label>
    <input type="radio" id="m" name="profil" value="admin">
    <label for="unfemale" style="color: black;"><b>Admin</b></label><br>
      <p><?php if (isset($_GET['messageErreur'])) {
        echo 'diso';
      } ?></p>
      <button class="b w3-dark-gray" style="width: 100%;" type="submit" name="connecte">se connecter</button>
    </div>
  </form>
</div>
 <!-- fin bouton se connecter-->
 <!-- debut bouton s'inscrire-->
  
 <button class="b w3-right w3-black" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">s'inscrire</button>

<div id="id01" class="modal">

<form class="modal-content animate" action="ajout.php" method="POST" enctype="multipart/form-data">
  <div class="imgcontainer">
    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  </div>

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
    <label class="control-label" style="color:black;"><b>Photo de profil</b></label>
    <input class="" type="file" name="photo"><br><br>
    <input type="radio" id="male" name="profil" value="suiveur">
    <label for="male" style="color: black;"><b>Suiveur</b></label>
    <input type="radio" id="female" name="profil" value="auteur">
    <label for="female" style="color: black;"><b>Auteur</b></label><br>


    <button class="b w3-dark-gray" style="width: 100%;" type="submit" name="inscrit">S'inscrire</button>
  </div>
</form>
</div>
<!-- fin bouton s'inscrire-->

</div>

<!-- fin navbar -->

<!-- Header -->
<header class="w3-container w3-center w3-padding-32"> 
  <h1><b>BLOG INFO</b></h1>
  <p>Bienvenue au blog de l' <span class="w3-tag">informatique</span></p>
</header>

<!-- Grid -->
<div class="w3-row">

<!-- Blog entries -->
<div class="w3-col l8 s12">
  <!-- Blog entry -->
  
<!-- END BLOG ENTRIES -->
</div>

<!-- Introduction menu -->
<div class="w3-col l4">
  <!--publicite-->
<div class="w3-card w3-margin">
       <div class="w3-container w3-padding w3-gray">
          <h4>Publicité</h4>
       </div>
       <img class="pub" src="images/p1.jpg" width="100%" height="500px">
       <img class="pub" src="images/p2.jpg" width="100%" height="500px">
       <img class="pub" src="images/p3.jpg" width="100%" height="500px">
       <img class="pub" src="images/p11.jpg" width="100%" height="500px">
       <img class="pub" src="images/p12.jpg" width="100%" height="500px">

<script>
w3.slideshow(".pub", 3000);
</script>
  </div>
  <!-- Posts -->
    <div class="w3-card w3-margin w3-margin-top">
    <div class="w3-container w3-padding">
      <h4>Poste populaire</h4>
    </div>
    <ul class="w3-ul w3-hoverable w3-white">
    </ul>

  </div>
  

  <hr> 
 
  <!-- Labels / tags -->
  <div class="w3-card w3-margin">
  <div class="w3-container w3-padding w3-gray">
      <h4>Sponsoriser par :</h4>
    </div>
    <div class="w3-container w3-light-grey">
    <p><span class="w3-tag w3-light-grey w3-small w3-margin-bottom"><img src="images/p9.jpg" width="80px" height="40px" alt="">Smart one</span> 
       <span class="w3-tag w3-light-grey w3-small w3-margin-bottom"><img src="images/p6.jpg" width="100px" height="70px" alt=""></span> 
       <span class="w3-tag w3-light-grey w3-small w3-margin-bottom"><img src="images/p16.jpg" width="90px" height="50px" alt=""></span>
       <span class="w3-tag w3-light-grey w3-small w3-margin-bottom"><img src="images/p17.jpg" width="100px" height="70px" alt=""></span>
      <span class="w3-tag w3-light-grey w3-small w3-margin-bottom"><img src="images/p7.jpg" width="125px" height="80px" alt=""></span> 
      <span class="w3-tag w3-light-grey w3-small w3-margin-bottom"><img src="images/p10.jpg" width="100px" height="75px" alt=""></span>
    </p>
    </div>
  </div>
  
<!-- END Introduction Menu -->
</div>

<!-- END GRID -->
</div><br>

<!-- END w3-content -->
</div>

<!-- script navbar -->
<script>
// When the user scrolls down 20px from the top of the document, slide down the navbar
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("navbar").style.top = "0";
  } else {
    document.getElementById("navbar").style.top = "-50px";
  }
}

// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
var modal = document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

</script>
<!--fin script navbar-->

<!-- Footer -->
<footer class="w3-container w3-dark-grey w3-padding-32 w3-margin-top">
  <p class="w3-center">créer par <a href="#" target="_blank" class="w3-btn w3-black w3-wide">lovaRamih</a></p>
</footer>

</body>

<!-- Mirrored from www.w3schools.com/w3css/tryit.asp?filename=tryw3css_templates_blog&stacked=h by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Jun 2021 20:56:13 GMT -->
</html>
