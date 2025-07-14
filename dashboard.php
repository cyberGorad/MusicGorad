<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin dashboard</title>
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
    
<div class="w3-display-container" style="height:100px;background-color:grey;" >
    
        <div class="w3-display-middle"><h1>Dashboard</h1></div>
        <a href="index.php" class="w3-display-topright w3-white w3-hover-opacity"  style="background-color:darkgrey;margin:20px;border-radius:10px;padding:4px;text-decoration:none;">Acceuil</a>
  
</div>

<br>
<h2>Listes utilisateurs:</h2>
        <?php
session_start();
if ($_SESSION['user'] == 'admin'){
$mysqli = new mysqli("localhost", "administrateur", "motdepassesupersecurise", "BeatGorad"); // Connexion BDD (utilisateur et mot de passe définis dans demobdd.sql)
if ($mysqli->connect_errno) {
    die("Échec de la connexion - Veuillez réessayer plus tard : " . $mysqli->connect_error()); //affiche l'erreur
}
$rowsutilisateurs=$mysqli->query("SELECT * FROM `utilisateurs` ");//ATTENTION: pas d'échappement dans la requête SQL

if ($rowsutilisateurs->num_rows==0) {
    echo "Aucun utilisateurs";
} else {
    while($row = $rowsutilisateurs->fetch_array())
    {

        /*echo $row['id'];*/
        echo "<span style=\"background-color:darkgrey;color:white;border-radius:5px;\">".$row['nom_utilisateurs']."</span><br>"; //ATTENTION: pas d'échappement de caractères (XSS stocké)
        echo $row['email'];//ATTENTION: pas d'échappement de caractères (XSS stocké)
        /*echo "<a href=\"delete.php?id=". $row['id'];">    supprimer</a>";*/
        echo "<td><button style=\"background-color:blue;color:white;border:1px solid black;\"><a href=\"delete.php?id=". $row['id'] . "\" style=\"text-decoration:none;color:white;\">Supprimer</a></button></td>";

        echo "<br>";
    }														
}

} else {
    echo "ERROR";
}



        ?>






</body>
</html>