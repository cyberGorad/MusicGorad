<?php
// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "database";

    $conn = new mysqli($servername, $username, $password, $dbname); //connexion aux base de donnés comptes_utilisateurs
    // Vérification de la connexion
    if ($conn->connect_error) {
        die("Erreur de connexion à la base de données : " . $conn->connect_error);
    }


    // Récupération des données du formulaire
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $verify_password = $_POST['verify-password']

     //function verifier_utilisateurs($conn, $username)
       // {
            // requête SQL pour vérifier la table si utilisateurs existe deja --> GENERATE_ERROR
 $sql = "SELECT * FROM utilisateurs WHERE nom_utilisateurs= '$username'";
            $resultat = $conn->query($sql);

            if ($resultat->num_rows > 0) {
                //  _ERROR_--> choose another name
                echo "<p>utilisateur ". htmlspecialchars($username) ." existe deja : ESSAYER UNE AUTRE NOM </p>";
                echo "<style>";


echo"body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    color: #333;
    text-align: center;
    margin: 0;
    padding: 0;
}
p{
    color : red;
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

input{
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

input:hover{
    background-color :grey;
}

.submit{
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    margin-right: 10px;

}

.privacy-policy {
    margin-top: 20px;
    text-align: left;
    padding-left: 20px; /* Ajout d'un padding pour le texte de confidentialité */
}";

            echo "</style>";
            echo "<h2>Inscription</h2>";
            echo "<form method='POST' action='" . htmlspecialchars($_SERVER['PHP_SELF']) . "'>";
            echo "<label for='username'>Nom d'utilisateur :</label>";
            echo "<input type='text' name='username'><br>";
            echo "<label for='email'>email :</label>";
            echo "<input type='email' name='email'><br>";
            echo "<label for='password'>Mot de passe :</label>";
            echo "<input type='password' name='password'><br>";
            echo "<input type='submit' value='Inscrire'>";
            echo "</form>";
        } else {
                // compte invalide
       // }
       $password = md5($password); //Hasher le password en MD5
    // Insertion des données dans la base de données
    $sql = "INSERT INTO utilisateurs (nom_utilisateurs, email, mot_de_passe) VALUES ('$username', '$email', '$password')";




    if ($conn->query($sql) === TRUE) {
        echo "Inscription réussie !";
        echo"<br>";
        echo"<br>";
        echo"<br>";
        echo '<button id="butt"><a href="connexion.html"> Se connecter maintenant</a></button>';

        echo '<style>';
        echo '#butt{
            background-color:blue;
            padding:10px;
            border-radius:10px;
            border:none;      
        }
        #butt a{
            text-decoration:none;
            color:white;
        }';
    } else {
        echo "Erreur lors de l'inscription : " . $conn->error;
    }
}
    // Fermeture de la connexion à la base de données
    $conn->close();
    }
?>
