
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
if(isset($_SESSION['user']) && isset($_COOKIE['user'])) {


    // L'utilisateur est connecté, afficher son nom d'utilisateur
    /*echo "<img src=\"image\avatar.png\" class=\"avatar\">";    */
  


    echo "<li class=\"nav-item\"> <p style=\"margin-top:-60px;margin-right:30px;\"><i class=\"fa fa-user-circle\" style=\"font-size:20px;\">   </i>"  .$_SESSION['user'].  "</p></li>";
    echo "<a href=\"logout.php\" style=\"text-decoration:None;margin-top:90px;margin-right:3px;position:absolute;background-color:black;border-radius:10px;padding:3px;\"><i class=\"fa fa-sign-out\"></i> Se deconnecter</a>";
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
<button class="w3-button"  id="my_button" onclick="window.location.href = '#scroll_music'">Get Started</button>
      </div>
    </div> 

  </header>

<div class="container-fluid" style="background-image: url(image/fond.jfif); background-size: cover;">
  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12" style="height: 200px; text-align: center;">
      <br><br><br>
        <h1 style="color: white;">Our Collections</h1>
        <p style="color: white;">Lorem veniam delectus. Ipsa dolor rem fugiat neque praesentium unde laudantium.</p>
    </div>

    <div class="col-sm-12 col-md-12 col-lg-12" style="height: 100px; text-align: center;">
      <h1 style="color: Red;"> Recommonded </h1>
    </div>

    <div class="col-sm-12 col-md-3 col-lg-3" style="height: 300px; " id="scroll_music">
        <img src="image/music_photo/on_my_way.jfif" alt="casque" width="200px" height="200px" id="playlist" >
        <h5 style="color: white;">alan_walker_on_my_way_mp3_1.mp3</h5>
        <?php
          download(1);
        ?>
    </div>
    <div class="col-sm-12 col-md-3 col-lg-3" style="height: 300px; ">
      <img src="image/music_photo/home.jfif" alt="casque" width="200px" height="200px">
      <h5 style="color: white;">alan_walker_ruben_heading_home.mp3</h5>
      <?php
          download(2);
        ?>
    </div>
    <div class="col-sm-12 col-md-3 col-lg-3" style="height: 300px; ">
      <img src="image/music_photo/blame.jfif" alt="casque" width="200px" height="200px" >
      <h5 style="color: white;">illenium_and_blame_myself.mp3</h5>

      <?php
          download(3);
        ?>

    </div>
    <div class="col-sm-12 col-md-3 col-lg-3" style="height: 300px; ">
      <img src="image/music_photo/musician.jfif" alt="casque" width="200px" height="200px" >
      <h5 style="color: white;">porter_robinson_musician_.mp3</h5>

      <?php
          download(4);
        ?>  
    </div>
 
    <!--NEXT-->
    <br>

    <div class="col-sm-12 col-md-3 col-lg-3" style="height: 300px; margin-top: 50px; ">
      <img src="image/music_photo/sing_me_to_sleep.jfif" alt="casque" width="200px" height="200px" ">
      <h5 style="color: white;">alan_walker_sing_me_to_sleep.mp3</h5>

      <?php
          download(5);
        ?>
       
    </div>
    <div class="col-sm-12 col-md-3 col-lg-3" style="height: 300px;margin-top: 50px;">
      <img src="image/music_photo/whisper.jfif" alt="casque" width="200px" height="200px">
      <h5 style="color: white;">alan_walker_whisper.mp3</h5>

      <?php
          download(6);
        ?>
  
    </div>
    <div class="col-sm-12 col-md-3 col-lg-3" style="height: 300px;margin-top: 50px; ">
      <img src="image/music_photo/martin garrix.jfif" alt="casque" width="200px" height="200px"">
      <h5 style="color: white;">martin_garrix_bebe.mp3</h5>

      <?php
          download(7);
        ?>
       
    </div>
    <div class="col-sm-12 col-md-3 col-lg-3" style="height: 300px;margin-top: 50px; ">
      <img src="image/music_photo/powfu.jfif" alt="casque" width="200px" height="200px" >
      <h5 style="color: white;">powfu_death_bed_lyrics_mp3_59379.mp3</h5>

      <?php
          download(8);
        ?>

</div>
     


<?php

function download($id){
// Vérifie si l'utilisateur est connecté
if(isset($_SESSION['user'])) {
    // L'utilisateur est connecté, affiche le bouton de téléchargement
    echo '<button type="button" class="btn btn-outline-primary"><a href="telecharger.php?id='. $id . ' " style="text-decoration: none;">Download <i class="fa fa-download"></i></a></button>';
} else {
    // L'utilisateur n'est pas connecté, affiche un message d'erreur
    echo '<p style="color: red;">Connecter vous pour telecharger</p>';
}
  }
?>



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