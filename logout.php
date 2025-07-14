
<?php

session_start();

// Vérifier si l'utilisateur est connecté
if(isset($_SESSION['user'])) {

    // Détruire la session pour déconnecter l'utilisateur
    session_destroy();
    setcookie("user" ,"", time() - 3600, "/"); 

    echo "<h1 style=\"color:white;\">Deconnexion réussie</h1>";
    echo "<div style=\"text-align:center;\"><a href=\"index.php\"><button class=\"Bienvenue\" style=\" background-color:  rgb(66, 35, 66); /* Green */
    border-radius : 10px;
    border: 1px solid  rgb(255, 3, 255); 
   color: white;
   padding: 15px 32px;
   text-align: center;
   text-decoration: none;
   display: inline-block;
   font-size: 16px;
   margin: 4px 2px;
   cursor: pointer;\">Retour à la page d'acceuil</button></a></div>";

echo "<style>.Bienvenue:hover{box-shadow: 0 0 20px rgb(255, 3, 255),inset 0 0 20px rgb(255, 3, 255);transition:0.5s;}</style>";
  
    // Réponse HTTP indiquant que la déconnexion s'est bien déroulée
    http_response_code(200); // CODE 200 veux dire OK
} else {
    // Réponse HTTP indiquant que l'utilisateur n'était pas connecté
    http_response_code(401); // ERREUR 401
    }
?>
</body>