<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <style>
        /* Styles CSS pour le formulaire */
        body {
            font-family: Arial, sans-serif;
            background-image: url(image/fond.jfif);
            background-size: cover;
            color: #333;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        h2 {
            color:  rgb(255, 3, 255);
            margin-top: 50px;
        }
        form {
            margin-top: 20px;
            background-color: black;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
            border: 2px solid  rgb(255, 3, 255);
        }

        form:hover {
            transition: 0.5s;
            border: 5px solid  rgb(255, 3, 255);
            box-shadow: 0 0 20px rgb(255, 3, 255),inset 0 0 20px rgb(255, 3, 255);
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: white;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="text"]:hover,
        input[type="password"]:hover {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgb(255, 3, 255),inset 0 0 5px rgb(255, 3, 255);
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: black;
            color: #fff;
            padding: 10px 20px;
            border: 2px solid  rgb(255, 3, 255);
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-right: 10px;
        }
        input[type="submit"]:hover {
            background-color:  rgb(255, 3, 255);
            box-shadow: 0 0 20px rgb(255, 3, 255),inset 0 0 20px rgb(255, 3, 255);
        }
        .privacy-policy {
            margin-top: 20px;
            text-align: left;
            padding-left: 20px; /* Ajout d'un padding pour le texte de confidentialité */
        }
        .privacy-policy input[type="checkbox"] {
            display: inline-block;
            vertical-align: middle;
            margin-right: 5px;
        }
        .other-links {
            margin-top: 20px;
        }
        .other-links a {
            text-decoration: none;
            color: white;
            margin-right: 10px;
        }
        .error-message{
            font-size:20px;
            color:red;
        }
        #button{
            margin-top:10px;
            background-color: black;
            padding:10px;
            border-radius:5px;
            text-align:center;
            position:relative;
            float:center;
            border: none;
            margin-left:-10px;
            border: 2px solid  rgb(255, 3, 255);
        }
        #button:hover{background-color:rgb(255, 3, 255);box-shadow: 0 0 20px rgb(255, 3, 255),inset 0 0 20px rgb(255, 3, 255);}
        #button a{
         text-decoration:none;
         color:white;
        } 

    </style>
</head>
<body>
    <h2>Connexion</h2>

    <?php
    function validate_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Vérifier si le cookie existe et s'il est encore valide
 

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        try{   //Geston d'erreur en PHP
        // Récupération des données du formulaire
        $username = validate_input($_POST['username']);
        $password = validate_input($_POST['password']);

        // Connexion à la base de données
        $servername = "localhost";
        $username_db = "administrateur";
        $password_db = "motdepassesupersecurise";
        $dbname = "BeatGorad";

        $conn = new mysqli($servername, $username_db, $password_db, $dbname);

        if ($conn->connect_errno) {
            die('Impossible de se connecter');
        }

        function verifier_utilisateurs($conn, $username, $password)
        {
            // requête SQL pour vérifier la table
            $password = md5($password);     //Verifier le hash du mot de passe 
            $sql = "SELECT * FROM utilisateurs WHERE nom_utilisateurs='".$conn->real_escape_string($username)."' AND mot_de_passe='$password'";
            $result = $conn->query($sql);

            if ($result->num_rows == 0) {
                // Compte invalide
                echo "<span class='error-message'>Nom d'utilisateur ou mot de passe incorrect</span>"; 
                return false; // Utilisateur non trouvé
            } else {
                // Accès accordé
                session_start();
                setcookie("user", $username, time() + 3600, "/"); // Cookie qui expire après 1 heure
                $_SESSION['user'] = $username;
                
            
            
          
    
                echo "<h1 style=\"text-align:center;color:white;\">Bonjour ". $_SESSION['user'] ." ,Merci pour votre Soutiens 😊</h1>";
                echo "<div style=\"text-align:center;\"><a href=\"index.php\"><button class=\"Bienvenue\" style=\"background-color:  rgb(66, 35, 66); /* Green */
                         
                         border-radius : 10px;
                         border: 1px solid  rgb(255, 3, 255); 
                        color: white;
                        padding: 15px 32px;
                        text-align: center;
                        text-decoration: none;
                        display: inline-block;
                        font-size: 16px;
                        margin: 4px 2px;
                        cursor: pointer;\">Télécharger Maintenant</button></a></div>";

                echo "<style>.Bienvenue:hover{box-shadow: 0 0 20px rgb(255, 3, 255),inset 0 0 20px rgb(255, 3, 255);transition:0.5s;}</style>";
                exit;
               }
             
        }

        // ressayer si incorrect
        if (!verifier_utilisateurs($conn, $username, $password)) {
            echo "<form method='POST' action='" . htmlspecialchars($_SERVER['PHP_SELF']) . "'>";
            echo "<label for='username'>Nom d'utilisateur :</label>";
            echo "<input type='text' name='username' value='$username'><br>";
            echo "<label for='password'>Mot de passe :</label>";
            echo "<input type='password' name='password'><br>";
            echo "<input type='submit' value='Se connecter'>";
            echo '<br><button id="button"> <a href="inscription.html">Créer un compte</a></button>';
            echo "</form>";
        }

        // Fermer la connexion
        $conn->close();

} catch (Exception $e) {
    // Gérer les exceptions
    echo "Fatal error : " . $e->getMessage();
}
    }
    ?>
</body>
</html>
