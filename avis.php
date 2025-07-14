<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avis</title>
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
<body>
    <div class="w3-display-container" style="background-color:grey;height : 500px;margin-bottom:20px;" >
      
        <a href="index.php" class="w3-display-topright w3-white w3-hover-opacity"  style="background-color:darkgrey;margin:20px;border-radius:10px;padding:4px;text-decoration:none;">Acceuil</a>
        
<h1 class="w3-display-middle w3-text-white">Partagez vos pensées <br><span style="font-size:10px;"> posez des questions, ou simplement dites bonjour ! Laissez un commentaire et contribuez à rendre notre communauté encore plus dynamique. <span> </h1>

<h1 class="w3-display-topleft w3-text-white" style="margin:20px;">MeloMatrix</h1>
  

      
    </div>


	</form>

<?php
session_start();


// Obtenir la date et l'heure actuelles du serveur
$dateHeure = date('Y-m-d H:i:s');


$mysqli = new mysqli("localhost", "administrateur", "motdepassesupersecurise", "database"); // Connexion BDD (utilisateur et mot de passe définis dans demobdd.sql)
if ($mysqli->connect_errno) {
    die("Échec de la connexion - Veuillez réessayer plus tard : " . $mysqli->connect_error()); //affiche l'erreur
}
$rowscommentaires=$mysqli->query("SELECT * FROM `commentaire` ");//ATTENTION: pas d'échappement dans la requête SQL

if ($rowscommentaires->num_rows==0) {
    echo "Aucun commentaire <br>";
} else {
    while($row = $rowscommentaires->fetch_array())
    {
        echo "<span style=\"color:blue\">".htmlentities($row['pseudo'])." </span> a dit:"."<br>" ; //ATTENTION: pas d'échappement de caractères (XSS stocké)
        echo "<span style='background-color:grey;border-radius:5px;padding:5px;margin-left:10px;margin-top:10px;'>" . htmlentities($row['commentaire']) . "</span><br><span style=\"font-size:1px;margin-left:10px;\">envoyé le:".htmlentities($row['date'])."</span><br>" ;//ATTENTION: pas d'échappement de caractères (XSS stocké)


        echo "<br>";
    }														
}




if(isset($_SESSION['user'])) {
    echo $_SESSION['user']." :" ;
    $pseudo = $_SESSION['user'];
    echo "<form method=\"post\" action=\"#\">";
	echo "<textarea name=\"commentaire\" placeholder=\"Votre suggestions\"></textarea>";
	echo "<input type=\"submit\" value=\"Envoyer\" style=\"background-color:blue;color:white;border-radius:10px;padding:5px;\"/>"."<br>";
    echo '</form>';

    if (isset($_POST['commentaire'])) {
                                                        
        $queryinsert = "INSERT INTO `commentaire`(`pseudo`, `commentaire`, `date`) VALUES ('$pseudo', '" . $_POST['commentaire'] . "', '$dateHeure')";
        //ATTENTION: pas d'échappement dans la requête (Injection SQL)
        //exemple de correction avec les guillemets simples : utiliser $mysqli->real_escape_string()  autour de $_GET['id'], $_POST['pseudo'] et $_POST['commentaire'] 			
    //autre exemple de correction, en utilisant preg_replace et en enlevant les guillemets simples autour de $_GET['id'] comme vu ci-dessous							
        if($mysqli->query($queryinsert)==True){
                header("location:avis.php");
        }
        
     

    } 
 
} else {
    // L'utilisateur n'est pas connecté, affiche un message d'erreur
    echo "<span style=\"color:red;\">Vous devrez être connecté pour laissez un avis!</span>";
    echo"<a href=\"inscription.html\" class=\" w3-blue w3-hover-opacity\"  style=\"padding:5px;border-radius:10px;text-decoration:none;\">Vous n'avez pas un comptes ?</a>";
 echo"<a href=\"login.html\" class=\" w3-blue w3-hover-opacity\"  style=\"padding:5px;border-radius:10px;text-decoration:none;\">Se connecter</a>";

}




// Afficher la date et l'heure


?>






</body>
</html>