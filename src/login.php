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
            background-color: #f0f0f0;
            color: #333;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        h2 {
            color: #ff6347;
            margin-top: 50px;
        }
        form {
            margin-top: 20px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #666;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-right: 10px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        
        .error-message {
            color: red;
            font-weight: bold;
        }
        .other-links {
            margin-top: 20px;
        }
        .other-links a {
            text-decoration: none;
            color: #007bff;
            
            background-color : #007bff;
        }
        #button{
            margin-top:10px;
            background-color:#007bff;
            padding:10px;
            border-radius:5px;
            text-align:center;
            position:relative;
            float:center;
            border: none;
            margin-left:-10px;
        }
        #button:hover{background-color:red}
        #button a{
         text-decoration:none;
         color:white;

        } 

    </style>
</head>
<body>
    <h2>Connexion</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupération des données du formulaire
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Connexion à la base de données
        $servername = "localhost";
        $username_db = "root";
        $password_db = "";
        $dbname = "database";

        $conn = new mysqli($servername, $username_db, $password_db, $dbname);

        if ($conn->connect_error) {
            die("Erreur de connexion à la base de données : " . $conn->connect_error);
        }

        function verifier_utilisateurs($conn, $username, $password)
        {
            // requête SQL pour vérifier la table
            $password = md5($password);     //Verifier le hash du mot de passe 
            $sql = "SELECT * FROM utilisateurs WHERE nom_utilisateurs='".$conn->real_escape_string($_POST['username'])."' AND mot_de_passe='$password'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // accès _GRANTED_
                session_start();
                $_SESSION['username'] = $username;
                header("Location: acceuil.html");
                exit;
            } else {
                // compte invalide
                echo "<span class='error-message'>Nom d'utilisateur ou mot de passe incorrect</span>"; 
                return false; // Utilisateur non trouvé
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
    }
    ?>
</body>
</html>
