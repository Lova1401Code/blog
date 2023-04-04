<?php 
#session_start();  
#if (!$_SESSION['mdp_A'] and !$_SESSION['email_A']){
 # header("location:index1.php");
#}
?>
<!DOCTYPE html>
<html>
<title>blog informatique</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3/w3.css">
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
<div class="w3-dark-grey" id="navbar">
  <a href="index2.php?id=<?php echo $_SESSION['id_A']; ?>">index</a>
  <a href="#news">à propos</a>
  <a href="contactA.php?id=<?php echo $_SESSION['id_A']; ?>">Contact</a>
  <button class="b w3-right w3-black" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">deconnexion</button>

  <div id="id01" class="modal">
  
  <div class="modal-content animate" action="" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <form action="deconnection.php" method="post">
      <div class="container">
      <p style="color:black">voulez-vous vraiment deconnecter?</p>
      <button class="b w3-dark-grey" style="width: 100%;" type="submit" name="deconnecter">oui</button>
    </div>
    </form>
  </div>
</div>

</div>

<!-- fin navbar -->


<!-- Header -->
<header class="w3-container w3-center w3-padding-32"> 
  <h1><b>BLOG INFO</b></h1>
  <p>Bienveue au blog de l' <span class="w3-tag">informatique</span></p>
</header>

<!-- Grid -->
<div class="w3-row">
<!-- Blog entries -->
<div class="w3-col l8 s12">
  <!-- Blog entry -->
  <?php 
    include'connection.php';
    $idAr = $_SESSION['id_A'];
    include'connection.php'; 
     $fileparpage = 3;
     $reqfiletotal = $bdd->prepare("SELECT id_Ar FROM article WHERE id_A = ?");
     $reqfiletotal->execute(array($idAr));
     $filetotal = $reqfiletotal->rowCount();
     $pagetotal = ceil($filetotal/$fileparpage);
     if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] > 0) {
       $_GET['page'] = intval($_GET['page']);
       $pagecourante = $_GET['page'];
     }else {
        $pagecourante = 1;
     }
     $depart = ($pagecourante-1)*$fileparpage;

    $recuparticle = $bdd->query('SELECT * FROM article ORDER BY id_Ar DESC LIMIT  '.$depart.','.$fileparpage);
            while ($article = $recuparticle->fetch()) {
                $idauteurAf = $article['id_A'];
                if ($idauteurAf==$idAr) {
                  ?>
                    <div class="w3-card-4 w3-margin w3-white">
                        <img class="" src="images/<?php echo $article['nom_fichier']; ?>" alt="Nature" style="width:100%">
                        <div class="w3-container">
                        <h3><b><?php echo $article['titre_A']; ?></b></h3>
                        <hr>
                        <h5>
                        <?php
                            $recupAuteur = $bdd->query("SELECT * FROM auteur");
                            while ($auteur = $recupAuteur->fetch()) {
                                $idAuteur = $article['id_A']; 
                                $idaut = $auteur['id_A'];
                                $idarticle = $article['id_Ar'];
                                $like = $bdd->prepare("SELECT id_likes FROM likes WHERE id_article=?");
                                $like->execute(array($idarticle));
                                $like = $like->rowCount();

                                $dislike = $bdd->prepare("SELECT id_dislikes FROM dislikes WHERE id_article=?");
                                $dislike->execute(array($idarticle));
                                $dislike = $dislike->rowCount();

                                $idart = $article['id_Ar'];
                                $coms = $bdd->prepare("SELECT id_C FROM commentaire WHERE id_Article=?");
                                $coms->execute(array($idart));
                                $coms = $coms->rowCount();
                                if ($idAuteur==$idaut) {
                                    echo $auteur['nom_A'];
                                }
                            }
                        ?>, 
                        
                        
                        <span class="w3-opacity"><?php echo $article['date_pub']; ?></span></h5>
                        </div>

                        <div class="w3-container">
                        <div class="w3-panel w3-leftbar">
                            <p class="w3-large w3-serif"><?php echo $article['contenu']; ?></p>
                        </div>
                        <div class="w3-row">
                            <div class="w3-col m8 s12">
                            <p><button class="w3-button w3-padding-large w3-white w3-border" id="lire"><b>LIRE PLUS »</b></button></p>
                            <a href="action.php?t=1&id=<?= $article['id_Ar'];?>" class="w3-btn w3-blue w3-wide" id="show">J'aime<span class="w3-tag  w3-white"><?= $like; ?></span></a>
                            <a href="action.php?t=2&id=<?= $article['id_Ar'];?>" class="w3-btn w3-dark-grey w3-wide" id="show">Je n'aime pas<span class="w3-tag  w3-white"><?= $dislike; ?></span></a>        
                            </div>
                            <div class="w3-col m4 w3-hide-small">
                            <p><span class="w3-padding-large w3-right"><b>Commentaire  </b> <span class="w3-tag "><?php echo $coms; ?></span></span></p>
                            <p class="w3-right">
                                <a  href="modArticle.php?=<?php echo $article['id_Ar']; ?>" class="w3-btn w3-dark-grey w3-wide">Modifier</a><a href="SuprimerArt.php?id=<?php echo $article['id_Ar']; ?>" class="w3-btn w3-red w3-wide">Suprimer</a>                      
                            </p>
                        </div>
                        </div>
                        </div>
                    </div>
                    <hr>
            <?php } } ; ?>
  <!-- Blog entry -->
   <!-- bouton ajouter -->
  <button class="b w3-button w3-xlarge w3-circle w3-dark-grey w3-right w3-left-align" onclick="document.getElementById('id03').style.display='block'" style="width:auto;"><b>+</b></button>
  <div id="id03" class="modal">
  
  <form class="modal-content animate" action="ajoutarticle.php" method="post" enctype="multipart/form-data">
  <div class="w3-container w3-blue">
   <h2>Ajout Article</h2>
   </div>
    <div class="imgcontainer">
      <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
      <label for="uname"><b>Titre de l'article</b></label>
      <input type="text" placeholder="article titre" name="titre" >

      <p><label><b>contenue de l'article</b></label>
      <textarea class="w3-input" type="text" placeholder="entrer contenue..." name="contenue"></textarea></p>
          
      <p><label for="uname"><b>date de l'ajout</b></label>
      <input class="w3-input" type="date" placeholder="date" name="datepub" ></p>
  
      <label class="control-label"><b>Ajout fichier</b></label>
      <input class="w3-input" type="file" name="photo"><br>

      <button style="width: 100%;" class="b w3-blue" type="submit" name="ajouter">Ajouter</button>
    </div>
  </form>
</div>
<!-- END BLOG ENTRIES -->
</div>

<!-- Introduction menu -->
<div class="w3-col l4">
  <!-- affichage profile-->
  <div class="w3-card w3-margin w3-margin-top">
    <form action="chercher2.php?id=<?php echo $_SESSION['id_A']; ?>" method="POST">
      <input name="surch" type="text" placeholder="titre article...">
      <button class="w3-button w3-block w3-dark-grey w3-fixed w3-border" name="chercher">chercher</button>
    </form>
  
</div>
  <?php
    include'connectBdd.php';
    $mail = $_SESSION['email_A'];
    $mdp = $_SESSION['mdp_A'];
    $recupsuiveur = $bdd->query('SELECT * FROM auteur');
    while($suiveur = $recupsuiveur->fetch()){
      $ids = $_SESSION['id_A'];
      $id = $suiveur['id_A']; 
      if ($id == $ids) {
    ?>
    <div class="w3-card w3-margin w3-margin-top">
    <h4 class="w3-center"><b>Mon profil</b> </h4>
    <img src="images/<?php echo $suiveur['nom_fichierA']; ?>" style="width:100%">
    <div class="w3-container w3-white">
         <hr>
         <p><i class="w3-margin-right w3-text-theme"></i><b> <?php echo $suiveur['nom_A']; ?></b></p>
         <p><i class="w3-margin-right w3-text-theme"></i><b> <?php echo $suiveur['email_A'];?></b></p>
         <hr>
         <p><button onclick="document.getElementById('id02').style.display='block'" class="w3-button w3-block w3-dark-grey w3-fixed">Modifier profil</button></p>
         <!-- debut modification -->
        <div id="id02" class="modal">

        <form class="modal-content animate" action="modAuteur.php?id=<?php echo $suiveur['id_A'] ?>" method="post">
          <div class="imgcontainer">
            <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
          </div>

          <div class="container" >
            <div class="form-group">
              <label for="uname" style="color:black;"><b>Nom</b></label>
              <input type="text" value="<?php echo $suiveur['nom_A']?>" name="nomS" required>
            </div>

            <label for="uname" style="color:black;"><b>email</b></label>
            <input type="text" value="<?php echo $suiveur['email_A']?>" name="email1" required>

            
            <label for="uname" style="color:black;"><b>email</b></label>
            <input type="text" value="<?php echo $suiveur['email_A']?>" name="email2" required>

            <label for="uname" style="color:black;"><b>Mot de passe</b></label>
            <input type="password" placeholder="Entrer mot de passe" name="mdp1" required>

            <label for="psw" style="color:black;"><b>confirme mot de passe</b></label>
            <input type="password" placeholder="Confirmer le mot de Password" name="mdp2" required>

            <button class="b w3-dark-grey" type="submit" name="inscrit">Modifier</button>
          </div>
        </form>
        </div>
         <!-- fin modification -->
    </div>
  </div><?php }  } ?><hr>
  
  <!-- fin affichage profil -->
  <!-- Posts -->
  <div class="w3-card w3-margin">
    <div class="w3-container w3-padding">
      <h4>Poste populaire</h4>
    </div>
    <ul class="w3-ul w3-hoverable w3-white">
     <?php
      $recuparticle2 = $bdd->query('SELECT * FROM article');
      while ($article2 = $recuparticle2->fetch()) {
     ?>
      <li class="w3-padding-16">
        <img src="images/<?php echo $article2['nom_fichier']; ?>" alt="Image" class="w3-left w3-margin-right" style="width:50px">
        <span><b><?php echo $article2['titre_A']; ?></b></span><br>
        <span class="w3-large"><?php
      $recupAuteur = $bdd->query("SELECT * FROM auteur");
      while ($auteur2 = $recupAuteur->fetch()) {
        $idAuteur2 = $auteur2['id_A']; 
        $idaut2 = $article2['id_A'];
        if ($idAuteur2==$idaut2) {echo $auteur2['nom_A'];}          
      }
      ?></span>
      </li>
      <?php } ?>
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
  
<!-- END Introduction Menu -->
  </div>
  <!-- boutton liste des article -->
  <div class="w3-card w3-padding w3-margin">
   <a class="b w3-button w3-dark-grey" href="index2.php?id=<?php echo $_SESSION['id_A']; ?>" style="padding: 7px; width: 100%;">Afficher tous les publication</a>
  </div>
  <!-- fin liste des articles -->
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
//bouton ajouter
var modal = document.getElementById('id03');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
//bouton modifier
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
<div class="w3-bar">
  <?php 
     for ($i=1; $i <= $pagetotal; $i++) { 
       echo '<a class=" w3-black w3-border w3-round w3-bar-item w3-button" href="listearticle.php?page='.$i.'">'.$i.'</a>';
     }
  ?>   
  </div>
  <p>créer par <a href="default.html" target="_blank">nous</a></p>
</footer>

</body>

<!-- Mirrored from www.w3schools.com/w3css/tryit.asp?filename=tryw3css_templates_blog&stacked=h by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Jun 2021 20:56:13 GMT -->
</html>
