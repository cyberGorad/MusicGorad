
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="GOOD VIBES ">
    <meta name="keywords" content="Video downloader">
    <meta http-equiv="content-type" content="text/html;">
    <title>Make your days GOOD | Music , Videos , Apk</title>
     <!-- Favicons -->

  <!--CSS AND BOOTSTRAP-->
  <link rel="stylesheet" href="css/font-awesome.min.css">

    <link rel="stylesheet" href="src/bootstrap.min.css">

    <link rel="stylesheet" href="w3.css">
    <!--MAin css source-->
    <link rel="stylesheet" href="style.css">
    <!--SCRIPT javascript => (js_plugins)-->
    <script src="src/angular.min.js"></script>
    <script src="src/bootstrap.bundle.min.js"></script>
    <script src="src/jquery.min.js"></script>
    <script src="swipper/popper.min.js"></script>
    <script src="swipper/swipper-bundle.min.js"></script>
    <script src="animation.js"></script>
    </head>

    <div class="spinner-container">
      <div class="custom-spinner"></div>
    </div>
    
    <!--FONTS-->


    <body class="w3-animate-opacity" id="main">
  <!--navbar section-->

  <header id="opac__">
    <div class="container-fluid" id="my_header">
      <div class="row">

<div style="height: 110px;  position: fixed; z-index: 9999;" class="my_link" id="transform"> 
  
  <img src="image/logo.png" alt="logo" width="100px" height="100px" style="position: absolute;">
  
  <ul class="nav  justify-content-end" style="padding-top: 35px;" id="my_navbar">
    <li class="nav-item">
      <a class="nav-link w3-hover-opacity" href="index.php"><i class="fa fa-home"  style="font-size:20px;"></i> Acceuil</a>
    </li>
    <li class="nav-item">
      <a class="nav-link w3-hover-opacity" href="avis.php"><i class="fa fa-globe" style="font-size:20px;"></i> donner des avis</a>
    </li>
    <li class="nav-item">
      <a class="nav-link w3-hover-opacity" href="login.html" ><i class="fa fa-user" style="font-size:20px;"></i> Se connecter</a>
    </li>
    <li class="nav-item">
      <button class="btn__inscrire" type="button" style="margin-top: -9px;"><a class="nav-link" href="inscription.html" id="sign">S'inscrire</a></button>
    </li>
<br><br><br>






<div class="offcanvas offcanvas-start" id="demo">
  <div class="offcanvas-header">
    <h1 class="offcanvas-title">Heading</h1>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body">
    <a class="text-black" href="#index.php">Acceuil</a><br>
    <a class="text-black" href="#">Communauté</a><br>
    <a class="text-black" href="login.html">Se Connecter</a><br>
    <a class="text-black" href="inscription.html">S'inscrire</a>
   
  </div>
</div>
<div class="container-fluid mt-3 w3-display-container">
  <button class="my__offcanvas nav-item" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo" id="my_offcanvas">
  &#9776;
  </button>
</div>





<?php
session_start();

// Vérifier si l'utilisateur est connecté
if  ($_SESSION){
  if ($_SESSION['user'] == 'admin'){
    echo "<button class=\"btn btn-primary\" style=\"margin-top:40px;\"><a href=\"dashboard.php\" style=\"text-decoration:none;\">dashboard</a></button>";
  } else {
  echo "";
  }
}


      ?>










    <?php
/*session_start();*/

// Vérifier si l'utilisateur est connecté
if(isset($_SESSION['user']))  {

   
echo "<li class=\"nav-item\"> <p style=\"margin-top:-60px;margin-right:30px;\"><i class=\"fa fa-user-circle\" style=\"font-size:20px;\">   </i>"  .$_SESSION['user'].  "</p></li>";
echo "<a href=\"verifier.html\" style=\"text-decoration:None;margin-top:90px;margin-right:3px;position:absolute;background-color:black;border-radius:10px;padding:3px;\"><i class=\"fa fa-sign-out\"></i> Se deconnecter</a>";
    
    
  
  } else {
    // L'utilisateur n'est pas connecté, ne rien afficher
    echo '<h6 style="color:red;font-size:14px;margin-top:-55px;margin-right:10px;">NON connecté</h6>';
      }

    ?>

  </ul>
</div>   
<div><h1 id="my_title" class="w3-animate-left">Download <span style="color: rgb(163, 49, 163);">▶</span></h1><h1 id="auto-typing-text" class="display-4 blink" style="color: white;">Download</h1>
<H1 id="my_title_bas">For <span style="color: rgb(163, 49, 163);">Free</span> </H1>
<p style="padding-left: 80px; color: white;">Lorem ipsum dolor sit amet consectetu.</p>
<button class="w3-button"  id="my_button"  onclick="window.location.href = '#scroll'"><a href="#scroll" style="text-decoration:none;">Get Started</a></button>
      </div>
    </div>

  </header>
  <section style="background-color: rgba(0,0,0,0.8);">
    <div class="container-fluid" style="height: 300px;">
      <div class="row">
        <h1  style="text-align: center; font-size: 40px; padding-top: 100px;color: white;" class="no-card w3-animate-left"> Find Your Favorite here</h1>
        <h1 style="text-align: center; font-size: 20px; padding-top: 20px;color: white;" id="scroll">By Simple click </h1>
        <p style="text-align: center; font-size: 10px; padding-top: 20px;color: white;">Lorem ipsum do  t ratione repellat commodi voluptatum et quam! Vitae, corrupti voluptates. Nulla, numquam sint! Laudantium, hic? </p>
      </div>
      <div class="container" style="display:flex; height:10px;">
        <div class="line" style="justify-content:center; height:10px;background-color:blue;"></div>
      </div>
    </div><br><br><br><br>
    <br><br>

    <div class="container-fluid">
      <div class="row">
        <div id="premier"  class="col-sm-12 col-md-4 col-lg-4" style="height: 300px;">
            <img src="image/music.jfif" alt="casque" width="300px" height="200px" style="border-radius: 50px 5px 50px;" class="w3-hover-opacity responsive">
          <button class="button" style=" margin-top: 20px;"  onclick="window.location.href = 'music.php'"><span><a href="music.php" style="text-decoration: none;">Music 🎶</a> </span></button>
        </div>
        <div id="deuxieme" class="col-sm-12 col-md-4 col-lg-4" style="height: 300px; ">
          <img src="image/Music Platform for Music Creator.jfif" alt="casque" width="300px" height="200px" style="border-radius:50px 5px 50px;" class="w3-hover-opacity responsive">
          <button class="button" style=" margin-top: 20px;" onclick="window.location.href = 'walpaper.php'"><span><a href="walpaper.php" style="text-decoration: none;">Fond écran </a> </span></button>
        </div>
        <div id="troisieme" class="col-sm-12 col-md-4 col-lg-4" style="height: 300px; ">
          <img src="image/Network.jfif" alt="casque" width="300px" height="200px" style="border-radius: 50px 5px 50px;" class="w3-hover-opacity responsive">
          <button class="button" style="margin-top: 20px;"  onclick="window.location.href = 'application.php'" ><span><a href="application.php" style="text-decoration: none;">Applications</a> </span></button>
        </div>
      </div>
    </div>
    <br><br><br><br><br>
  </section>

<div class="container-fluid" style=" background-color: black ;">
    <div class="row">
      <div class="col-sm-12 col-md-4 col-lg-4" style=" height: 300px; text-align: center; padding-top: 50px;">
         <h1 style="color: blueviolet;">🎵 Bienvenue sur DownloadMusic 🎶</h1>
         <p style="color: white;">Plongez dans un océan de mélodies, où chaque note est une invitation à l'évasion. Chez DownloadMusic, nous croyons au pouvoir transformateur de la musique. C'est pourquoi nous mettons à votre disposition une vaste bibliothèque de chansons, de tous les genres et de toutes les époques, prêtes à être téléchargées instantanément.</p>
      </div>
      <div class="col-sm-12 col-md-4 col-lg-4" style=" height: 300px; text-align: center; padding-top: 50px;">
        <h1 style="color: blueviolet;">🚀 Votre passerelle vers l'univers sonore 🌌</h1>
        <p style="color: white;">Naviguez à travers nos recommandations soigneusement sélectionnées ou explorez nos playlists thématiques pour trouver la bande-son parfaite à chaque instant de votre vie. Avec des fonctionnalités de personnalisation avancées, vous pouvez créer vos propres playlists, marquer vos favoris et partager vos découvertes avec le monde entier.</p>
      </div>
      <div class="col-sm-12 col-md-4 col-lg-4" style=" height: 300px; text-align: center; padding-top: 50px;">
        <h1 style="color: blueviolet;">✅ Une expérience personnalisée 🌟</h1>
        <p style="color: white;">Grâce à notre plateforme conviviale et intuitive, vous pouvez non seulement télécharger votre musique préférée en quelques clics, mais également accéder à des paroles, des biographies d'artistes et des recommandations personnalisées pour enrichir votre expérience musicale comme jamais auparavant.</p>
        <br>
      </div>
    </div>
    <br><br><br>
</div>

<section style="background-image: url(image/sky/spiral.jfif);background-size: cover;background-attachment:fixed ;">

  <div class="container-fluid" >
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12" style="height: 400px; background-color: rgba(0,0,0,0.8); padding-top: 100px;">
        <h1 class="w3-center" style="color: white;">Notre Objectifs</h1>
        <p class="w3-center" style="color: white;">Plongez dans un océan de mélodies avec notre site de téléchargement de musique ! Explorez un univers infini de sons, des rythmes électrisants aux mélodies apaisantes. </p><br>

        <h1 id="counter" style="color: white;text-align: center;">0 +</h1> 
        <h4 style="color: white; text-align: center;">Download</h4>
        <br><br>
      </div>
    </div>
  </div>
</section>

  <footer>
    <style>
      *{
        margin:0;
        padding:0;
      }
    </style>
    <div class="container-fluid w3-hover-opacity" style=" background-color: black;">
      <div class="row">
          <div class="col-sm-12 col-md-4 col-lg-4" style="height: 250px;text-align: center; padding-top: 50px;">
          <h2 style="color: rgb(100, 21, 100); font-size: 40px; font-weight: 200;">UPGRADE PREMIUM</h2>
            <p style="color:white;">No Ads</p>
            <p style="color:white;">unlimited Download</p><br>
          </div>
          <div class="col-sm-12 col-md-4 col-lg-4" style="height: 250px; ; text-align: center;padding-top: 50px;">
            <h4 style="color:white;">Explore</h4>
              <a href="#" style="color:white;">TV</a><br>
              <a href="#" style="color:white;">celebrités</a><br>
              <a href="#" style="color:white;">More content</a><br>
              
<a href="#"><i class="fa fa-facebook"></i></a>
<a href="#"><i class="fa fa-twitter"></i></a>
<a href="#"><i class="fa fa-youtube-play"></i></a>
<a href="#"><i class="fa fa-instagram"></i></a>
<a href="#"><i class="fa fa-pinterest"></i></a>

          </div>
          <div class="col-sm-12 col-md-4 col-lg-4" style="height: 250px; text-align: center;padding-top: 50px;">
             <a href="#" style="color:white;">Download App</a><br>
             <a href="#" style="color:white;">Contacter Nous</a><br><br><br>
             <a href="#" style="color:white;">© Tout droits réservés 2024</a><br>
             <a href="#" style="color:white;text-decoration:none;">Inspiré par <span style="color:rgb(100, 21, 100)">Mello Matrix</span></a><br>
          </div>
      </div>
    </div>
  </footer>
</body>
</html>